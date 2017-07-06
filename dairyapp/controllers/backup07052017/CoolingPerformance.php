<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoolingPerformance extends Front_Controller {

	/***********************************************************
	* Method Name   	: createCoolingPerformance
	* Description       : Create Cooling Performance
	* @Param            : All Cooling Performance fields  
	* @return           : json data
	********************************************/
	public function createCoolingPerformance()
	{ 
		$headerStringValue = apache_request_headers(); 
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['average_reading']) && isset($_POST['average_reading'])) && (!empty($_POST['precooling_info']) && isset($_POST['precooling_info'])) && (!empty($_POST['vat_info']) && isset($_POST['vat_info'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$average_reading = $this->input->post("average_reading");
					$precooling_info_arr = $this->input->post("precooling_info");
					$vat_info_arr = $this->input->post("vat_info");
					$farm_id = $this->input->post("farm_id");
					/* Cooling Performance Array */
					$cooling_performance_arr=array('average_reading'=>$average_reading,'farm_id'=>$farm_id,'user_id'=>$user_id,'create_date'=>date('Y-m-d'));
					
					/* Store data  */
					$response=$this->CPM->createCoolingPerformance($cooling_performance_arr,$precooling_info_arr,$vat_info_arr);
					if($response["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Created","data"=>array('cp_id'=>$response["cp_id"])));
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
	* Method Name   	: reviewCoolingPerformance
	* Description       : Review Cooling Performance
	* @Param            : cp_id   
	* @return           : json data
	********************************************/
	public function reviewCoolingPerformance()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['cp_id']) && isset($_POST['cp_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$cp_id = $this->input->post("cp_id");	
					
					/* Store data  */
					$response=$this->CPM->reviewCoolingPerformance($cp_id);
					if($response["data_get"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully get data","data"=>array('data'=>$response["data"])));
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
	* Description       : Send Invite for Cooling Performance
	* @Param            : invite_data,cp_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteCoolingPerformance()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['cp_id']) && isset($_POST['cp_id'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$cp_id = $this->input->post("cp_id");	
					
					/* Store data  */
					$response=$this->CPM->sendInvite($invite_data,$user_id,$cp_id);
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
					$response['open']= $this->FM->getActionsListName('da_cooling_performance',$user_id,'0','da_invite_cooling_performace');
					$response['close'] = $this->FM->getActionsListName('da_cooling_performance',$user_id,'1','da_invite_cooling_performace');
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
					$response = $this->CPM->acceptInvite($invite_id,$user_id,$status);
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