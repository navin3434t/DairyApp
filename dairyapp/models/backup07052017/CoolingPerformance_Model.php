<?php
	class CoolingPerformance_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: createCoolingPerformance
		* Description       : Create Cooling Performance
		* @Param            : All fields of Cooling Performance   
		* @return           : json data
		********************************************/
		function createCoolingPerformance($cooling_performance_arr,$precooling_info_arr,$vat_info_arr){
			
			$insert = $this->db->insert("da_cooling_performance",$cooling_performance_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$cooling_performance_arr['user_id'],'activity_type'=>"Create Cooling Performance",'table_name'=>'da_cooling_performance','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save Precooling info */
				foreach($precooling_info_arr as $precooling_arr)
				{
					$entering_temp_b1=(isset($precooling_arr['entering_temp_b1'])?$precooling_arr['entering_temp_b1']:"");
					$leaving_temp_b1=(isset($precooling_arr['leaving_temp_b1'])?$precooling_arr['leaving_temp_b1']:"");
					$difference_b1=(isset($precooling_arr['difference_b1'])?$precooling_arr['difference_b1']:"");
					$entering_temp_b2=(isset($precooling_arr['entering_temp_b2'])?$precooling_arr['entering_temp_b2']:"");
					$leaving_temp_b2=(isset($precooling_arr['leaving_temp_b2'])?$precooling_arr['leaving_temp_b2']:"");
					$difference_b2=(isset($precooling_arr['difference_b2'])?$precooling_arr['difference_b2']:"");
					$entering_temp_ct=(isset($precooling_arr['entering_temp_ct'])?$precooling_arr['entering_temp_ct']:"");
					$leaving_temp_ct=(isset($precooling_arr['leaving_temp_ct'])?$precooling_arr['leaving_temp_ct']:"");
					$difference_ct=(isset($precooling_arr['difference_ct'])?$precooling_arr['difference_ct']:"");
					$precooling_data=array('cp_id'=>$insert_id,'entering_temp_b1'=>$entering_temp_b1,'leaving_temp_b1'=>$leaving_temp_b1,'difference_b1'=>$difference_b1,'entering_temp_b2'=>$entering_temp_b2,'leaving_temp_b2'=>$leaving_temp_b2,'difference_b2'=>$difference_b2,'entering_temp_ct'=>$entering_temp_ct,'leaving_temp_ct'=>$leaving_temp_ct,'difference_ct'=>$difference_ct);
					$this->db->insert("da_cp_precooling_information",$precooling_data);
				}
				/* Save Vat info */
				foreach($vat_info_arr as $vat_arr)
				{
					$entering_temp_b1=(isset($vat_arr['entering_temp_b1'])?$vat_arr['entering_temp_b1']:"");
					$leaving_temp_b1=(isset($vat_arr['leaving_temp_b1'])?$vat_arr['leaving_temp_b1']:"");
					$difference_b1=(isset($vat_arr['difference_b1'])?$vat_arr['difference_b1']:"");
					$entering_temp_b2=(isset($vat_arr['entering_temp_b2'])?$vat_arr['entering_temp_b2']:"");
					$leaving_temp_b2=(isset($vat_arr['leaving_temp_b2'])?$vat_arr['leaving_temp_b2']:"");
					$difference_b2=(isset($vat_arr['difference_b2'])?$vat_arr['difference_b2']:"");
					$entering_temp_ct=(isset($vat_arr['entering_temp_ct'])?$vat_arr['entering_temp_ct']:"");
					$leaving_temp_ct=(isset($vat_arr['leaving_temp_ct'])?$vat_arr['leaving_temp_ct']:"");
					$difference_ct=(isset($vat_arr['difference_ct'])?$vat_arr['difference_ct']:"");
					$vat_data=array('cp_id'=>$insert_id,'entering_temp_b1'=>$entering_temp_b1,'leaving_temp_b1'=>$leaving_temp_b1,'difference_b1'=>$difference_b1,'entering_temp_b2'=>$entering_temp_b2,'leaving_temp_b2'=>$leaving_temp_b2,'difference_b2'=>$difference_b2,'entering_temp_ct'=>$entering_temp_ct,'leaving_temp_ct'=>$leaving_temp_ct,'difference_ct'=>$difference_ct);
					$this->db->insert("da_cp_vat_information",$vat_data);
				}
				
				$result = array("is_insert"=>"1",'cp_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: reviewCoolingPerformance
		* Description       : Review Cooling Performance
		* @Param            : cp_id   
		* @return           : json data
		********************************************/
		function reviewCoolingPerformance($cp_id)
		{
			$this->db->select("a.*,b.*,c.*");
			$this->db->from("da_cooling_performance as a");
			$this->db->join("da_cp_precooling_information as b","a.id=b.cp_id");
			$this->db->join("da_cp_vat_information as c","a.id=c.cp_id");
			$this->db->where("a.id",$cp_id);
			
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
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInvite($invite_data,$user_id,$cp_id)
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
						$where_cond = array("user_id"=>$uid,"table_id"=>$cp_id);
						$this->db->select("*");
						$this->db->from("da_invite_cooling_performace");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cp_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_cooling_performace",$insert_data);
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
						$where_cond =  array("user_id"=>$uid,"table_id"=>$cp_id);
						$this->db->select("*");
						$this->db->from("da_invite_cooling_performace");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cp_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_cooling_performace",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$cp_id);
						$this->db->select("*");
						$this->db->from("da_invite");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$cp_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_cooling_performace",$insert_data);
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
				return true;
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
			if($this->db->update('da_invite_cooling_performace',$where_cond))
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