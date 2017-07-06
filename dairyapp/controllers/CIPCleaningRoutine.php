<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CIPCleaningRoutine extends Front_Controller {

	/***********************************************************
	* Method Name   	: createCIPCleaningRoutine
	* Description       : Create CIP Cleaning Routine
	* @Param            : All CIP Cleaning Routine  fields    
	* @return           : json data
	********************************************/
	public function createCIPCleaningRoutine()
	{ 
		$headerStringValue = apache_request_headers(); 
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['name']) && isset($_POST['name']))  && (!empty($_POST['effective_date']) && isset($_POST['effective_date'])) && (!empty($_POST['routine_action']) && isset($_POST['routine_action'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$effective_date = $this->input->post("effective_date");
					$name = $this->input->post("name");
					$farm_id = $this->input->post("farm_id");
					//$routine_action_arr = $this->input->post("routine_action");
					/* Mlik tank cleaning Array */
					$cip_cleaning_arr=array('effective_date'=>$effective_date,'name'=>$name,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->CCR->createCIPCleaningRoutine($cip_cleaning_arr,$_POST['routine_action']);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Created","data"=>array('cip_cr_id'=>$response["cip_cr_id"])));
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
	* Method Name   	: reviewCIPCleaningRoutine
	* Description       : Review Milking Machine Cleaning 
	* @Param            : cip_cr_id   
	* @return           : json data
	********************************************/
	public function reviewCIPCleaningRoutine()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{	
			
			/* Check for Webservice paramaters */
			if( (!empty($_POST['cip_cr_id']) && isset($_POST['cip_cr_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token']) && isset($headerStringValue['webservice_token']))  )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$cip_cr_id = $this->input->post("cip_cr_id");	
					
					/* Store data  */
					$response=$this->CCR->reviewCIPCleaningRoutine($cip_cr_id);
					if($response["data_get"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully reviewed","data"=>array('data'=>$response["data"])));
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Record not exists"));
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
	* Method Name   	: sendInviteCIPCleaningRoutine
	* Description       : Send Invite for CIP Cleaning 
	* @Param            : invite_data,cip_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteCIPCleaningRoutine()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['cip_id']) && isset($_POST['cip_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$cip_id = $this->input->post("cip_id");	
					
					/* Store data  */
					$response=$this->CCR->sendInviteCIPCleaningRoutine($invite_data,$user_id,$cip_id);
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
	* Method Name   	: getActionsList
	* Description       : Get Actions List
	* @Param            : user_id,webservice_token
	* @return           : json data
	********************************************/
	public function getActionsList()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					$response['open'] = $this->FM->getActionsListName('da_cip_cleaning_routine',$user_id,'0','da_invite_cip_cleaning_routine','cip_cleaning_routine');
					
					$response['close'] = $this->FM->getActionsListName('da_cip_cleaning_routine',$user_id,'1','da_invite_cip_cleaning_routine','cip_cleaning_routine');
					if(!empty($response))
					{	
						echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$response));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not found"));
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
					$response = $this->CCR->acceptInvite($invite_id,$user_id,$status);
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