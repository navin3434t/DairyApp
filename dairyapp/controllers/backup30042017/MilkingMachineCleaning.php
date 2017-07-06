<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MilkingMachineCleaning extends Front_Controller {

	/***********************************************************
	* Method Name   	: createMilkingMachineCleaning
	* Description       : Create Milking Machine Cleaning
	* @Param            : All Milk Machine Cleaning  fields    
	* @return           : json data
	********************************************/
	public function createMilkingMachineCleaning()
	{ 
		if(isset($_POST) && !empty($_POST))
		{
			$headerStringValue = apache_request_headers();
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['program_name']) && isset($_POST['program_name']))  && (!empty($_POST['effective_date']) && isset($_POST['effective_date']))  && (!empty($_POST['litres']) && isset($_POST['litres']))  && (!empty($_POST['c_water']) && isset($_POST['c_water']))  && (!empty($_POST['mins']) && isset($_POST['mins'])) && (!empty($_POST['solution_drop']) && isset($_POST['solution_drop'])) && (!empty($_POST['is_saved']) && isset($_POST['is_saved'])) && (!empty($_POST['cleaning_days']) && isset($_POST['cleaning_days'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$effective_date = $this->input->post("effective_date");
					$litres = $this->input->post("litres");
					$c_water = $this->input->post("c_water");
					$mins = $this->input->post("mins");
					$solution_drop = $this->input->post("solution_drop");
					$program_name = $this->input->post("program_name");
					$is_saved = $this->input->post("is_saved");
					$farm_id = $this->input->post("farm_id");
					$machine_cleaning_days_arr = $this->input->post("cleaning_days");
					/* Mlik tank cleaning Array */
					$milk_machine_arr=array('effective_date'=>$effective_date,'litres'=>$litres,'c_water'=>$c_water,'mins'=>$mins,'solution_drop'=>$solution_drop,'program_name'=>$program_name,'is_saved'=>$is_saved,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->MMC->createMilkingMachineCleaning($milk_machine_arr,$machine_cleaning_days_arr);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Created","data"=>array('mmc_id'=>$response["mmc_id"])));
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
	* Method Name   	: reviewMilkMachineCleaning
	* Description       : Review Milking Machine Cleaning 
	* @Param            : mmc_id   
	* @return           : json data
	********************************************/
	public function reviewMilkMachineCleaning()
	{
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['mmc_id']) && isset($_POST['mmc_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$mmc_id = $this->input->post("mmc_id");	
					
					/* Store data  */
					$response=$this->MMC->reviewMilkMachineCleaning($mmc_id);
					if($response["data_get"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully reviewed","data"=>array('data'=>$response["data"])));
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
	* Method Name   	: sendInvite
	* Description       : Send Invite for Milking Machine Cleaning 
	* @Param            : invite_data,mmc_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteMilkingMachine()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$headerStringValue = apache_request_headers();
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($_POST['mmc_id']) && isset($_POST['mmc_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$mmc_id = $this->input->post("mmc_id");	
					
					/* Store data  */
					$response=$this->MMC->sendInvite($invite_data,$user_id,$mmc_id);
					if($response["invite_sent"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully sent"));
					}
					else if($response["invite_sent"]=="2"){
						echo json_encode(array("status"=>"0","msg"=>"Already sent"));
					}
					else if($response["invite_sent"]=="3"){
						echo json_encode(array("status"=>"0","msg"=>"User not exists"));
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
					$response['open']= $this->FM->getActionsListProgramName('da_milking_machine_cleaning',$user_id,'0','da_invite_milk_tank_cleaning');
					$response['close'] = $this->FM->getActionsListProgramName('da_milking_machine_cleaning',$user_id,'1','da_invite_milk_tank_cleaning');
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
					$response = $this->MMC->acceptInvite($invite_id,$user_id,$status);
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