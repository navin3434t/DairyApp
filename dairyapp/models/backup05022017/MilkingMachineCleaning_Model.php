<?php
	class MilkingMachineCleaning_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: createMilkingMachineCleaning
		* Description       : Create Milking Machine Cleaning 
		* @Param            : All Milk Machine Cleaning  fields    
		* @return           : json data
		********************************************/
		function createMilkingMachineCleaning($milk_machine_arr,$machine_cleaning_days_arr)
		{
			$insert = $this->db->insert("da_milking_machine_cleaning",$milk_machine_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$milk_machine_arr['user_id'],'activity_type'=>"Create Milk Machine Cleaning",'table_name'=>'da_milking_machine_cleaning','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save Milk Tank Cleaning Cycle Save */
				foreach($machine_cleaning_days_arr as $days_arr)
				{
					$sunday=(isset($days_arr['sunday'])?$days_arr['sunday']:"");
					$monday=(isset($days_arr['monday'])?$days_arr['monday']:"");
					$tuesday=(isset($days_arr['tuesday'])?$days_arr['tuesday']:"");
					$wednesday=(isset($days_arr['wednesday'])?$days_arr['wednesday']:"");
					$thursday=(isset($days_arr['thursday'])?$days_arr['thursday']:"");
					$friday=(isset($days_arr['friday'])?$days_arr['friday']:"");
					$saturday=(isset($days_arr['saturday'])?$days_arr['saturday']:"");
					$am_pm=(isset($days_arr['am_pm'])?$days_arr['am_pm']:"");
					$pre_re=(isset($days_arr['pre_re'])?$days_arr['pre_re']:"");
					$days_data=array('mmc_id'=>$insert_id,'sunday'=>$sunday,'monday'=>$monday,'tuesday'=>$tuesday,'wednesday'=>$wednesday,'thursday'=>$thursday,'friday'=>$friday,'saturday'=>$saturday,'am_pm'=>$am_pm,'pre_re'=>$pre_re);
					$this->db->insert("da_milking_machine_cleaning_days",$days_data);
				}
				
				$result = array("is_insert"=>"1",'mmc_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: reviewMilkMachineCleaning
		* Description       : Review Milking Machine Cleaning 
		* @Param            : mmc_id   
		* @return           : json data
		********************************************/
		function reviewMilkMachineCleaning($mmc_id)
		{
			$this->db->select("a.*,b.*");
			$this->db->from("da_milking_machine_cleaning as a");
			$this->db->join("da_milking_machine_cleaning_days as b","a.id=b.mmc_id");
			$this->db->where("a.id",$mmc_id);
			
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
		function sendInvite($invite_data,$user_id,$mmc_id)
		{
			$this->db->where('id', $mmc_id);
			$final = array("complete_status"=>1);
			$this->db->update('da_milking_machine_cleaning',$final);
			foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				if($is_exist==1){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						$where_cond = array("user_id"=>$uid,"table_id"=>$mmc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milking_machine_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mmc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milking_machine_cleaning",$insert_data);
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
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mmc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milking_machine_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mmc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milking_machine_cleaning",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mmc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milking_machine_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mmc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milking_machine_cleaning",$insert_data);
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
			if($this->db->update('da_invite_milking_machine_cleaning',$where_cond))
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