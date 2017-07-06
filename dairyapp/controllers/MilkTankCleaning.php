<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MilkTankCleaning extends Front_Controller {

	/***********************************************************
	* Method Name   	: createMilkTankCleaning
	* Description       : Create Milk Tank Cleaning 
	* @Param            : All Milk Tank Cleaning  fields    
	* @return           : json data
	********************************************/
	public function createMilkTankCleaning()
	{
		if(isset($_POST) && !empty($_POST))
		{ 
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['alkali_wash_ph_level']) && isset($_POST['alkali_wash_ph_level'])) && (!empty($_POST['acid_wash_ph_level']) && isset($_POST['acid_wash_ph_level']))  && (!empty($_POST['wash_active']) && isset($_POST['wash_active']))  && (!empty($_POST['sanitiser_ph_level']) && isset($_POST['sanitiser_ph_level']))  && (!empty($_POST['other_test']) && isset($_POST['other_test']))  && (!empty($_POST['program_name']) && isset($_POST['program_name'])) && (!empty($_POST['chlorine_level']) && isset($_POST['chlorine_level'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['cycle_arr']) && isset($_POST['cycle_arr']))    )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$alkali_wash_ph_level = $this->input->post("alkali_wash_ph_level");
					$acid_wash_ph_level = $this->input->post("acid_wash_ph_level");
					$wash_active = $this->input->post("wash_active");
					$sanitiser_ph_level = $this->input->post("sanitiser_ph_level");
					$other_test = $this->input->post("other_test");
					$program_name = $this->input->post("program_name");
					$chlorine_level = $this->input->post("chlorine_level");
					$farm_id = $this->input->post("farm_id");
					$milk_tank_cycle_arr = $this->input->post("cycle_arr");
					/* Mlik tank cleaning Array */
					$milk_tank_arr=array('alkali_wash_ph_level'=>$alkali_wash_ph_level,'acid_wash_ph_level'=>$acid_wash_ph_level,'wash_active'=>$wash_active,'sanitiser_ph_level'=>$sanitiser_ph_level,'other_test'=>$other_test,'program_name'=>$program_name,'chlorine_level'=>$chlorine_level,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->MTC->createMilkTankCleaning($milk_tank_arr,$milk_tank_cycle_arr);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Created","data"=>array('mtc_id'=>$response["mtc_id"])));
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
	* Method Name   	: updateMilkTankCleaning
	* Description       : Update Milk Tank Cleaning 
	* @Param            : All Milk Tank Cleaning  fields    
	* @return           : json data
	********************************************/
	public function updateMilkTankCleaning()
	{
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['mtc_id']) && isset($_POST['mtc_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['alkali_wash_ph_level']) && isset($_POST['alkali_wash_ph_level'])) && (!empty($_POST['acid_wash_ph_level']) && isset($_POST['acid_wash_ph_level']))  && (!empty($_POST['wash_active']) && isset($_POST['wash_active']))  && (!empty($_POST['sanitiser_ph_level']) && isset($_POST['sanitiser_ph_level']))  && (!empty($_POST['other_test']) && isset($_POST['other_test']))  && (!empty($_POST['program_name']) && isset($_POST['program_name'])) && (!empty($_POST['chlorine_level']) && isset($_POST['chlorine_level'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['cycle_arr']) && isset($_POST['cycle_arr']))    )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$mtc_id = $this->input->post("mtc_id");
					$alkali_wash_ph_level = $this->input->post("alkali_wash_ph_level");
					$acid_wash_ph_level = $this->input->post("acid_wash_ph_level");
					$wash_active = $this->input->post("wash_active");
					$sanitiser_ph_level = $this->input->post("sanitiser_ph_level");
					$other_test = $this->input->post("other_test");
					$program_name = $this->input->post("program_name");
					$chlorine_level = $this->input->post("chlorine_level");
					$farm_id = $this->input->post("farm_id");
					$milk_tank_cycle_arr = $this->input->post("cycle_arr");
					/* Mlik tank cleaning Array */
					$milk_tank_arr=array('alkali_wash_ph_level'=>$alkali_wash_ph_level,'acid_wash_ph_level'=>$acid_wash_ph_level,'wash_active'=>$wash_active,'sanitiser_ph_level'=>$sanitiser_ph_level,'other_test'=>$other_test,'program_name'=>$program_name,'chlorine_level'=>$chlorine_level,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->MTC->updateMilkTankCleaning($mtc_id,$milk_tank_arr,$milk_tank_cycle_arr);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Updated","data"=>array('mtc_id'=>$response["mtc_id"])));
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
	* Method Name   	: completeMilkTankCleaning
	* Description       : Complete Milk Tank Cleaning 
	* @Param            : All Milk Tank Cleaning  fields    
	* @return           : json data
	********************************************/
	public function completeMilkTankCleaning()
	{
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['mtc_id']) && isset($_POST['mtc_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['alkali_wash_ph_level']) && isset($_POST['alkali_wash_ph_level'])) && (!empty($_POST['acid_wash_ph_level']) && isset($_POST['acid_wash_ph_level']))  && (!empty($_POST['wash_active']) && isset($_POST['wash_active']))  && (!empty($_POST['sanitiser_ph_level']) && isset($_POST['sanitiser_ph_level']))  && (!empty($_POST['other_test']) && isset($_POST['other_test']))  && (!empty($_POST['program_name']) && isset($_POST['program_name'])) && (!empty($_POST['chlorine_level']) && isset($_POST['chlorine_level'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['cycle_arr']) && isset($_POST['cycle_arr']))    )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$mtc_id = $this->input->post("mtc_id");
					$alkali_wash_ph_level = $this->input->post("alkali_wash_ph_level");
					$acid_wash_ph_level = $this->input->post("acid_wash_ph_level");
					$wash_active = $this->input->post("wash_active");
					$sanitiser_ph_level = $this->input->post("sanitiser_ph_level");
					$other_test = $this->input->post("other_test");
					$program_name = $this->input->post("program_name");
					$chlorine_level = $this->input->post("chlorine_level");
					$farm_id = $this->input->post("farm_id");
					$milk_tank_cycle_arr = $this->input->post("cycle_arr");
					/* Mlik tank cleaning Array */
					$milk_tank_arr=array('alkali_wash_ph_level'=>$alkali_wash_ph_level,'acid_wash_ph_level'=>$acid_wash_ph_level,'wash_active'=>$wash_active,'sanitiser_ph_level'=>$sanitiser_ph_level,'other_test'=>$other_test,'program_name'=>$program_name,'chlorine_level'=>$chlorine_level,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->MTC->updateMilkTankCleaning($mtc_id,$milk_tank_arr,$milk_tank_cycle_arr);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Updated","data"=>array('mtc_id'=>$response["mtc_id"])));
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
	* @Param            : invite_data,mtc_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteMilkTankCleaning()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$headerStringValue = apache_request_headers();
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($_POST['mtc_id']) && isset($_POST['mtc_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$mtc_id = $this->input->post("mtc_id");	
					
					/* Store data  */
					$response=$this->MTC->sendInvite($invite_data,$user_id,$mtc_id);
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
					$response['open']= $this->FM->getActionsListProgramName('da_milk_tank_cleaning',$user_id,'0','da_invite_milking_machine_cleaning','milk_tank_cleaning');
					$response['close'] = $this->FM->getActionsListProgramName('da_milk_tank_cleaning',$user_id,'1','da_invite_milking_machine_cleaning','milk_tank_cleaning');
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
					$response = $this->MTC->acceptInvite($invite_id,$user_id,$status);
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