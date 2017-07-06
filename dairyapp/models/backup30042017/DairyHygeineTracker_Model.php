<?php
	class DairyHygeineTracker_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: hygeineTracker
		* Description       : Dairy Hygeine Tracker
		* @Param            : All Dairy Hygeine Tracker  fields    
		* @return           : json data
		********************************************/
		function hygeineTracker($tracker_arr)
		{
			$insert = $this->db->insert("da_hygeine_tracker",$tracker_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$tracker_arr['user_id'],'activity_type'=>"Dairy Hygeine Tracker",'table_name'=>'da_hygeine_tracker','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
	
		/***********************************************************
		* Method Name   	: saveActivityLog
		* Description       : Save User Activity Log 
		* @Param            : activity log data    
		* @return           : 
		********************************************/		
		function saveActivityLog($data)
		{
			$this->db->insert("da_activity_log",$data);
		}
		/***********************************************************
		* Method Name   	: checkValidFarm
		* Description       : Validate Farm with farm id 
		* @Param            : farm_id    
		* @return           : 
		********************************************/		
		function checkValidFarm($farm_id)
		{
			$this->db->select("*");
			$this->db->from("da_farm");
			$this->db->where("id",$farm_id);
			$query=$this->db->get();
			if($query->num_rows()>0)
			{
				return true;
			}
			{
				return false;
			}
		}
		
		
		/***********************************************************
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInvite($invite_data,$user_id,$ht_id)
		{
			$action ='Dairy Hygeine Tracker';
			$type= 'action';
			
						foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				if($is_exist==1){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						$where_cond = array("user_id"=>$uid,"table_id"=>$ht_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygeine_tracker");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$ht_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygeine_tracker",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else
					{
						$response = array("invite_sent"=>"3");	
					}
				}
				else{
					$email = (isset($invite['email'])?$invite['email']:"");
					$this->db->select("*");
					$this->db->from("da_user");
					$this->db->where("email",$email);
					$row = $this->db->get();
					if($row->num_rows()>0){
						$result =$row->result();
						$uid= $result[0]->id;
						$emailid = $this->getEmail($uid);
						$where_cond =  array("user_id"=>$uid,"table_id"=>$ht_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygeine_tracker");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$ht_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygeine_tracker",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$ht_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygeine_tracker");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$ht_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygeine_tracker",$insert_data);
							$response = array("invite_sent"=>"1");
						}
					}
				}
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: getEmail
		* Description       : get Email by user id
		* @Param            : uid   
		* @return           : json data
		********************************************/
		function getEmail($uid){
			$this->db->select("email");
			$this->db->from("da_user");
			$this->db->where("id",$uid);
			$query =$this->db->get();
			if($query->num_rows()>0){
				$result= $query->result();
				return $result;
			}
			else{
				return false;
			}
		}
		/***********************************************************
		* Method Name   	: checkExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function acceptInvite($invite_id,$user_id,$status)
		{
			
			$where_cond = array("status"=>$status);
			$this->db->where('id',$invite_id);
			if($this->db->update('da_invite_hygeine_tracker',$where_cond))
			{
				return true;
			}
			else
			{
				return false;
			}
			
			
		}		

	}
?>