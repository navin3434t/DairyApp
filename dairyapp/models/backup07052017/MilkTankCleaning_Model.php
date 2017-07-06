<?php
	class MilkTankCleaning_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: createMilkTankCleaning
		* Description       : Create milk tank cleaning 
		* @Param            : email,password    
		* @return           : json data
		********************************************/
		function createMilkTankCleaning($milk_tank_arr,$milk_tank_cycle_arr)
		{
			$insert = $this->db->insert("da_milk_tank_cleaning",$milk_tank_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$milk_tank_arr['user_id'],'activity_type'=>"Create Milk Tank Cleaning",'table_name'=>'da_milk_tank_cleaning','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save Milk Tank Cleaning Cycle Save */
				foreach($milk_tank_cycle_arr as $cycle_arr)
				{
					$cycling_description=(isset($cycle_arr['cycling_description'])?$cycle_arr['cycling_description']:"");
					$volume=(isset($cycle_arr['volume'])?$cycle_arr['volume']:"");
					$cleanser_sanitiser=(isset($cycle_arr['cleanser_sanitiser'])?$cycle_arr['cleanser_sanitiser']:"");
					$temp_start=(isset($cycle_arr['temp_start'])?$cycle_arr['temp_start']:"");
					$comment=(isset($cycle_arr['comment'])?$cycle_arr['comment']:"");
					$dose=(isset($cycle_arr['dose'])?$cycle_arr['dose']:"");
					$pass=(isset($cycle_arr['pass'])?$cycle_arr['pass']:"");
					$fail=(isset($cycle_arr['fail'])?$cycle_arr['fail']:"");
					$milk_tank=(isset($cycle_arr['milk_tank'])?$cycle_arr['milk_tank']:"");
					$cycle_data=array('mtc_id'=>$insert_id,'cycling_description'=>$cycling_description,'volume'=>$volume,'cleanser_sanitiser'=>$cleanser_sanitiser,'temp_start'=>$temp_start,'comment'=>$comment,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'milk_tank'=>$milk_tank);
					$this->db->insert("da_milk_tank_cleaning_cycle",$cycle_data);
				}
				
				$result = array("is_insert"=>"1",'mtc_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: updateMilkTankCleaning
		* Description       : Update milk tank cleaning 
		* @Param            : email,password    
		* @return           : json data
		********************************************/
		function updateMilkTankCleaning($mtc_id,$milk_tank_arr,$milk_tank_cycle_arr)
		{
			$this->db->where("id",$mtc_id);
			$insert = $this->db->update("da_milk_tank_cleaning",$milk_tank_arr);
			$insert_id = $mtc_id;
			if($insert)
			{
				$log_arr=array('user_id'=>$milk_tank_arr['user_id'],'activity_type'=>"Update Milk Tank Cleaning",'table_name'=>'da_milk_tank_cleaning','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$this->deleteMilkTankCleaningCycle($insert_id);
				/* Save Milk Tank Cleaning Cycle Save */
				foreach($milk_tank_cycle_arr as $cycle_arr)
				{
					$cycling_description=(isset($cycle_arr['cycling_description'])?$cycle_arr['cycling_description']:"");
					$volume=(isset($cycle_arr['volume'])?$cycle_arr['volume']:"");
					$cleanser_sanitiser=(isset($cycle_arr['cleanser_sanitiser'])?$cycle_arr['cleanser_sanitiser']:"");
					$temp_start=(isset($cycle_arr['temp_start'])?$cycle_arr['temp_start']:"");
					$comment=(isset($cycle_arr['comment'])?$cycle_arr['comment']:"");
					$dose=(isset($cycle_arr['dose'])?$cycle_arr['dose']:"");
					$pass=(isset($cycle_arr['pass'])?$cycle_arr['pass']:"");
					$fail=(isset($cycle_arr['fail'])?$cycle_arr['fail']:"");
					$milk_tank=(isset($cycle_arr['milk_tank'])?$cycle_arr['milk_tank']:"");
					$cycle_data=array('mtc_id'=>$insert_id,'cycling_description'=>$cycling_description,'volume'=>$volume,'cleanser_sanitiser'=>$cleanser_sanitiser,'temp_start'=>$temp_start,'comment'=>$comment,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'milk_tank'=>$milk_tank);
					$this->db->insert("da_milk_tank_cleaning_cycle",$cycle_data);
				}
				
				$result = array("is_insert"=>"1",'mtc_id'=>$insert_id);
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
		* Method Name   	: deleteMilkTankCleaningCycle
		* Description       : Save User Activity Log 
		* @Param            : activity log data    
		* @return           : 
		********************************************/		
		function deleteMilkTankCleaningCycle($mtc_id)
		{
			$this->db->where("mtc_id",$mtc_id);
			$this->db->delete('da_milk_tank_cleaning_cycle');
		}	
		/***********************************************************
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInvite($invite_data,$user_id,$mtc_id)
		{
			$this->db->where('id', $mtc_id);
			$final = array("complete_status"=>1);
			$this->db->update('da_milk_tank_cleaning',$final);
			foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				if($is_exist==1){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						$where_cond = array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
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
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_milk_tank_cleaning",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_milk_tank_cleaning");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
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
			if($this->db->update('da_invite_milk_tank_cleaning',$where_cond))
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