<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farm extends Front_Controller {

	/***********************************************************
	* Method Name   	: createFarm
	* Description       : Create Farm for logged in user
	* @Param            : All farm fields and user_id,webservice_token   
	* @return           : json data
	********************************************/
	public function createFarm()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST)) 
		{
			
			
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['name']) && isset($_POST['name'])) && ( isset($_POST['primary_name']))  && ( isset($_POST['primary_role']))  && ( isset($_POST['primary_mobile']))  && (!empty($_POST['primary_email']) && isset($_POST['primary_email']))  && ( isset($_POST['secondary_name'])) && ( isset($_POST['secondary_role'])) && ( isset($_POST['secondary_mobile'])) && (!empty($_POST['secondary_email']) && isset($_POST['secondary_email'])) && ( isset($_POST['farm_address'])) && ( isset($_POST['postcode'])) && ( isset($_POST['gps_coordinates'])) && ( isset($_POST['dairy_factory']))  && ( isset($_POST['supplier_no'])) && ( isset($_POST['field_officer'])) && ( isset($_POST['fo_company'])) && (isset($_POST['fo_mobile'])) && (!empty($_POST['fo_email']) && isset($_POST['fo_email'])) && ( isset($_POST['machine_technician'])) && ( isset($_POST['mt_company'])) && ( isset($_POST['mt_mobile'])) && ( isset($_POST['mt_email'])) && ( isset($_POST['chemical_representative'])) &&  (isset($_POST['cr_company'])) &&  ( isset($_POST['cr_mobile'])) && (!empty($_POST['cr_email']) && isset($_POST['cr_email'])) && ( isset($_POST['region'])) && ( isset($_POST['sub_region'])) )
			{
				
				
				$name = $this->input->post("name");
				$primary_name = $this->input->post("primary_name");
				$primary_role = $this->input->post("primary_role");
				$primary_mobile = $this->input->post("primary_mobile");
				$primary_email = $this->input->post("primary_email");
				$secondary_name = $this->input->post("secondary_name");
				$secondary_role = $this->input->post("secondary_role");
				$secondary_mobile = $this->input->post("secondary_mobile");
				$secondary_email = $this->input->post("secondary_email");
				$address = $this->input->post("farm_address");
				$post_code = $this->input->post("postcode");
				$gps_cordinates = $this->input->post("gps_coordinates");
				$dairy_factory = $this->input->post("dairy_factory");
				$supplier_no = $this->input->post("supplier_no");
				$field_officer = $this->input->post("field_officer");
				$fo_mobile = $this->input->post("fo_mobile");
				$fo_company = $this->input->post("fo_company");
				$fo_email = $this->input->post("fo_email");
				$machine_technician = $this->input->post("machine_technician");
				$mt_mobile = $this->input->post("mt_mobile");
				$mt_email = $this->input->post("mt_email");
				$mt_company = $this->input->post("mt_company");
				$chemical_representative = $this->input->post("chemical_representative");
				$cr_mobile = $this->input->post("cr_mobile");
				$cr_email = $this->input->post("cr_email");
				$cr_company = $this->input->post("cr_company");
				$region = $this->input->post("region");
				$sub_region = $this->input->post("sub_region");
				$create_date = date("Y-m-d");
				
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for valiadte user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					$farm_info = array("name"=>$name,"address"=>$address,"post_code"=>$post_code,"gps_cordinates"=>$gps_cordinates,"dairy_factory"=>$dairy_factory,"supplier_no"=>$supplier_no,"region"=>$region,"sub_region"=>$sub_region,"user_id"=>$user_id,"create_date"=>$create_date,"created_by"=>$user_id);
					
					$farm_primary_contact = array("primary_name"=>$primary_name,"primary_role"=>$primary_role,"primary_mobile"=>$primary_mobile,"primary_email"=>$primary_email);
					
					$farm_secondary_contact = array("secondary_name"=>$secondary_name,"secondary_role"=>$secondary_role,"secondary_mobile"=>$secondary_mobile,"secondary_email"=>$secondary_email);
					
					
					$farm_field_officer = array("name"=>$field_officer,"company"=>$fo_company,"mobile"=>$fo_mobile,"email"=>$fo_email);
					
					$farm_machine_technician = array("name"=>$machine_technician,"company"=>$mt_company,"mobile"=>$mt_mobile,"email"=>$mt_email);
					
					$farm_chemical_representative = array("name"=>$chemical_representative,"company"=>$cr_company,"mobile"=>$cr_mobile,"email"=>$cr_email);
					
					
					$farm_data_insert = $this->FM->insertFarmdata($farm_info,$farm_primary_contact, $farm_secondary_contact,$farm_field_officer,$farm_machine_technician,$farm_chemical_representative);
					
					if($farm_data_insert["is_insert"]=="1")
					{
						echo json_encode(array("status"=>"1","msg"=>"Successfully Created","data"=>$farm_data_insert['farm_id']));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not Created"));
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
		else
		{
			echo json_encode(array("status"=>"0","msg"=>"Invalid request"));
		}
	}
	
	/***********************************************************
	* Method Name   	: searchUser
	* Description       : serach user by name or email 
	* @Param            : action,user_input,user_id,webservice_token 
	* @return           : json data
	********************************************/
	public function searchUser()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if((!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && isset($_POST['name'])  && isset($_POST['email'])  )
			{
				$name = $this->input->post("name");
				$email = $this->input->post("email");
				$parameter = array("name"=>$name,"email"=>$email);
				
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					$find_user = $this->FM->searchUser($parameter);
					if($find_user['is_found']==1)
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Match Found","data"=>$find_user['data']));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not Found","data"=>"No user found"));
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
	* Method Name   	: equipmentDetails
	* Description       : save equipment details for farm equipments 
	* @Param            : farm_id,dairy_type,no_units,milk_line_size,air_injector,tank_capacity, user_id,webservice_token
	* @return           : json data
	********************************************/
	public function equipmentDetails()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && ( isset($_POST['dairy_type']))  && ( isset($_POST['no_units']))  && ( isset($_POST['milk_line_size']))  && ( isset($_POST['air_injector']))  && ( isset($_POST['tank_capacity']))  )
			{
				$farm_id = $this->input->post("farm_id");
				$dairy_type = $this->input->post("dairy_type");
				$no_units = $this->input->post("no_units");
				$milk_line_size = $this->input->post("milk_line_size");
				$air_injector = $this->input->post("air_injector");
				$tank_capacity = $this->input->post("tank_capacity");
				$create_date = date("Y-m-d");
				
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$parameter = array('created_by'=>$user_id,"farm_id"=>$farm_id,"dairy_type"=>$dairy_type,"no_units"=>$no_units,"milk_line_size"=>$milk_line_size,"air_injector"=>$air_injector,"create_date"=>$create_date);
					$equipment_details = $this->FM->equipmentDetails($parameter,$tank_capacity,$user_id);
					if($equipment_details['is_insert']=='1')
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Data inserted"));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not inserted"));
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
	* Method Name   	: waterDetails
	* Description       : save water details for farm
	* @Param            : user_id,webservice_token,farm_id and water_details array contains (hot_water,cold_water,comments,date_test,sample_from,ph,coli_count,iron, total_plate,total_hardness)
	* @return           : json data
	********************************************/
	public function waterDetails()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['water_details']) && isset($_POST['water_details'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$water_details_data = $this->input->post("water_details");
					$farm_id = $this->input->post("farm_id");
					$water_details = $this->FM->waterDetails($water_details_data,$farm_id,$user_id);
					if($water_details['is_insert']=='1')
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Data inserted"));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not inserted"));
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
	* Method Name   	: milkingMachineWash
	* Description       : save wash type and cycle details
	* @Param            : user_id,webservice_token,farm_id, reference_no and machine_wash array contains (sunday,monday,tuesday,thursday,friday,saturday,wash_type)
	* @return           : json data
	********************************************/
	public function milkingMachineWash()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['wash_details']) && isset($_POST['wash_details'])) && (!empty($_POST['reference_no']) && isset($_POST['reference_no'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$wash_details = $this->input->post("wash_details");
					$farm_id = $this->input->post("farm_id");
					$reference_no = $this->input->post("reference_no");
					$machine_wash = $this->FM->milkingMachineWash($wash_details,$farm_id,$reference_no,$user_id);
					if($machine_wash['is_insert']=='1')
					{	
						echo json_encode(array("status"=>"1","msg"=>"Data inserted"));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not inserted"));
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
	* Method Name   	: bulkMilkTankWash
	* Description       : save bulk milk cycle details
	* @Param            : user_id,webservice_token,farm_id and tank_wash_details array contains (description,volume,cleanser_sensiter,comments,temp_start,dose)
	* @return           : json data
	********************************************/
	public function bulkMilkTankWash()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) && (!empty($_POST['tank_wash_details']) && isset($_POST['tank_wash_details'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$tank_wash_details = $this->input->post("tank_wash_details");
					$farm_id = $this->input->post("farm_id");
					$tank_wash = $this->FM->bulkMilkTankWash($tank_wash_details,$farm_id,$user_id);
					if($tank_wash['is_insert']=='1')
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Data inserted"));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"Not inserted"));
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
	* Method Name   	: getFarmData
	* Description       : Get Farm Data
	* @Param            : user_id,webservice_token,farm_id
	* @return           : json data
	********************************************/
	public function getFarmData()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$farm_id = $this->input->post("farm_id");
					$response = $this->FM->getFarmData($farm_id,$user_id);
					
					if($response['is_found']=='1')
					{	
							
						echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$response["data"]));
					}
					else
					{
						$responseInvited = $this->FM->getFarmDataInvited($farm_id,$user_id);
						if($responseInvited['is_found']=='1')
						{
							echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$responseInvited["data"]));
						}
						else
						{
						echo json_encode(array("status"=>"0","msg"=>"You are not allowed to access this farm"));
						}
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
	* Method Name   	: getFarmList
	* Description       : Get Farm List
	* @Param            : user_id,webservice_token
	* @return           : json data
	********************************************/
	public function getFarmList()
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
					
					$response = $this->FM->getFarmList($user_id);
					if($response['is_found']=='1')
					{	
						echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$response["data"]));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"No farms are available for your user. Please create a farm or accept an invite for a farm."));
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
	* Method Name   	: getInvitedUsers
	* Description       : Get Invited Users
	* @Param            : user_id,webservice_token,farm_id
	* @return           : json data
	********************************************/
	public function getInvitedUsers()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id'])) )
			{
				/*inputs for validation */
				$webservice_token = $headerStringValue['webservice_token'];
				$user_id = $this->input->post("user_id");
				
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$farm_id = $this->input->post("farm_id");
					$response = $this->FM->getInvitedUsers($farm_id,$user_id);
					if($response['is_found']=='1')
					{
						
						echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$response["data"]));
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
					$response = $this->FM->acceptInvite($invite_id,$user_id,$status);
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
					$response['open']["cip_cleaning_routine"] = $this->FM->getActionsListName('da_cip_cleaning_routine',$user_id,'0','da_invite_cip_cleaning_routine','cip_cleaning_routine');
					$response['open']["cooling_performance"] = $this->FM->getActionsListName('da_cooling_performance',$user_id,'0','da_invite_cooling_performace','cooling_performance');
					$response['open']["farm_hygiene_investigation"] = $this->FM->getActionsListName('da_farm_hygiene_investigation',$user_id,'0','da_invite_hygiene_investigation','farm_hygiene_investigation');
					$response['open']["milking_machine_cleaning"] = $this->FM->getActionsListProgramName('da_milking_machine_cleaning',$user_id,'0','da_invite_milking_machine_cleaning','milking_machine_cleaning');
					$response['open']["milk_tank_cleaning"] = $this->FM->getActionsListProgramName('da_milk_tank_cleaning',$user_id,'0','da_invite_milk_tank_cleaning','milk_tank_cleaning');
					$response['open']["farm_hygiene_investigation_recommendation"] = $this->FM->getActionsListActionName('da_fhi_recommendation1',$user_id,'0','da_invite_fhi_recommendation1','farm_hygiene_investigation_recommendation');
					
					$response['close']["cip_cleaning_routine"] = $this->FM->getActionsListName('da_cip_cleaning_routine',$user_id,'1','da_invite_cip_cleaning_routine','cip_cleaning_routine');
					$response['close']["cooling_performance"] = $this->FM->getActionsListName('da_cooling_performance',$user_id,'1','da_invite_cooling_performace','cooling_performance');
					$response['close']["farm_hygiene_investigation"] = $this->FM->getActionsListName('da_farm_hygiene_investigation',$user_id,'1','da_invite_hygiene_investigation','farm_hygiene_investigation');
					$response['close']["milking_machine_cleaning"] = $this->FM->getActionsListProgramName('da_milking_machine_cleaning',$user_id,'1','da_invite_milking_machine_cleaning','milking_machine_cleaning');
					$response['close']["milk_tank_cleaning"] = $this->FM->getActionsListProgramName('da_milk_tank_cleaning',$user_id,'1','da_invite_milk_tank_cleaning','milk_tank_cleaning');
					$response['close']["farm_hygiene_investigation_recommendation"] = $this->FM->getActionsListActionName('da_fhi_recommendation1',$user_id,'1','da_invite_fhi_recommendation1','farm_hygiene_investigation_recommendation');
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
	
}