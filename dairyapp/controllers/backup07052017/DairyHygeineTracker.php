<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DairyHygeineTracker extends Front_Controller {

	/***********************************************************
	* Method Name   	: hygeineTracker
	* Description       : Dairy Hygeine Tracker
	* @Param            : All Dairy Hygeine Tracker  fields    
	* @return           : json data
	********************************************/
	public function hygeineTracker()
	{ 
		$headerStringValue = apache_request_headers(); 
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['result_type']) && isset($_POST['result_type'])) && (!empty($_POST['latest_result']) && isset($_POST['latest_result']))  && (!empty($_POST['threshold_result']) && isset($_POST['threshold_result']))  && (!empty($_POST['date']) && isset($_POST['date'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id']))  )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$result_type = $this->input->post("result_type");
					$latest_result = $this->input->post("latest_result");
					$threshold_result = $this->input->post("threshold_result");
					$date = $this->input->post("date");
					$farm_id = $this->input->post("farm_id");
					$response_farm=$this->DHT->checkValidFarm($farm_id);
					if($response_farm)
					{
						/* Hygeine Tracker Array */
						$tracker_arr=array('user_id'=>$user_id,'result_type'=>$result_type,'latest_result'=>$latest_result,'threshold_result'=>$threshold_result,'date'=>$date,'farm_id'=>$farm_id);
						
						/* Store data  */
						$response=$this->DHT->hygeineTracker($tracker_arr);
						if($response["is_insert"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Successfully Created"));
						}
						else
						{
							echo json_encode(array("status"=>"0","msg"=>"There is some problem. Try again"));
						}	
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Invalid Farm"));
					}
					
				}
				else
				{
					echo json_encode(array("status"=>"0","msg"=>"Not valid user"));
				}		
		
			}
			else
			{
				echo json_encode(array("status"=>"0","msg"=>"Invalid Paramater"));
			}
			

			
			
		}
		else
		{
			echo json_encode(array("status"=>"0","msg"=>"Invalid request"));
		}
		die();
	}
	
	/***********************************************************
	* Method Name   	: sendInviteDairyHygeineTracker
	* Description       : Send Invite for Dairy Hygeine Tracker 
	* @Param            : invite_data,ht_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteDairyHygeineTracker()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($_POST['ht_id']) && isset($_POST['ht_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$ht_id = $this->input->post("ht_id");	
					
					/* Store data  */
					$response=$this->DHT->sendInvite($invite_data,$user_id,$ht_id);
					if($response["invite_sent"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully sent"));
					}
					else if($response["invite_sent"]=="2"){
						echo json_encode(array("status"=>"0","msg"=>"Already sent"));
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"There is some problem. Try again"));
					}					
				}
				else
				{
					echo json_encode(array("status"=>"0","msg"=>"Not valid user"));
				}		
		
			}
			else
			{
				echo json_encode(array("status"=>"0","msg"=>"Invalid Paramater"));
			}
	
		}
		else
		{
			echo json_encode(array("status"=>"0","msg"=>"Invalid request"));
		}
		die();
	}
	/***********************************************************
	* Method Name   	: acceptInvite
	* Description       : Get Invited Users
	* @Param            : user_id,webservice_token,farm_id
	* @return           : json data
	********************************************/
	public function acceptInvite()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['invite_id']) && isset($_POST['invite_id'])) && (!empty($_POST['status']) && isset($_POST['status'])) )
			{
				/*inputs for validation */
				$webservice_token = $headerStringValue['webservice_token'];
				$user_id = $this->input->post("user_id");
				$status = $this->input->post("status");
				
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$invite_id = $this->input->post("invite_id");
					$response = $this->DHT->acceptInvite($invite_id,$user_id,$status);
					if($response)
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Data Updated"));
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Date not updated try again"));
					}
				}
				else{
					echo json_encode(array("status"=>"0","msg"=>"Not valid user"));
				}
			}
			else
			{
				echo json_encode(array("status"=>"0","msg"=>"Invalid Paramater"));
			}	
		}
		else{
			echo json_encode(array("status"=>"0","msg"=>"Invalid request"));
		}
	}
}