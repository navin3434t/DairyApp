<?php
	class CIPCleaningRoutine_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: createCIPCleaningRoutine
		* Description       : Create CIP Cleaning Routine
		* @Param            : All CIP Cleaning Routine  fields    
		* @return           : json data
		********************************************/
		function createCIPCleaningRoutine($cip_cleaning_arr,$routine_action_arr)
		{
			$insert = $this->db->insert("da_cip_cleaning_routine",$cip_cleaning_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$cip_cleaning_arr['user_id'],'activity_type'=>"Create CIP Cleaning Routine",'table_name'=>'da_cip_cleaning_routine','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save Milk Tank Cleaning Cycle Save */
				
				foreach($routine_action_arr as $action_arr)
				{
					$action=(isset($action_arr['action'])?$action_arr['action']:"");
					$image=(isset($action_arr['image'])?$action_arr['image']:"");
					$cip_action_arr=array('cip_cr_id'=>$insert_id ,'action'=>$action,'image'=>$image);
					$this->db->insert("da_cip_cleaning_routine_action",$cip_action_arr);
					
				}
				
				$result = array("is_insert"=>"1",'cip_cr_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: reviewCIPCleaningRoutine
		* Description       : Review Milking Machine Cleaning 
		* @Param            : cip_cr_id   
		* @return           : json data
		********************************************/
		function reviewCIPCleaningRoutine($cip_cr_id)
		{
			$this->db->select("a.*,b.*");
			$this->db->from("da_cip_cleaning_routine as a");
			$this->db->join("da_cip_cleaning_routine_action as b","a.id=b.cip_cr_id");
			$this->db->where("a.id",$cip_cr_id);
			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = array("data_get"=>"1","data"=>$result);
			}
			else
			{
				$response = array("data_get"=>"0");
			}
				
			return $response;
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
		* Method Name   	: sendInviteCIPCleaningRoutine
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInviteCIPCleaningRoutine($invite_data,$user_id,$cip_id)
		{
			$action ='CIP Cleaning Routine';
			$type= 'action';
			$this->db->where('id', $cip_id);
			$complete = array("complete_status"=>1);
			$this->db->update('da_cip_cleaning_routine',$complete);
						foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				if($is_exist==1){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						$where_cond = array("user_id"=>$uid,"table_id"=>$cip_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cip_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milk_tank_cleaning",$insert_data);
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
						$where_cond =  array("user_id"=>$uid,"table_id"=>$cip_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cip_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milk_tank_cleaning",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$cip_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cip_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milk_tank_cleaning",$insert_data);
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
			if($this->db->update('da_invite_cip_cleaning_routine',$where_cond))
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