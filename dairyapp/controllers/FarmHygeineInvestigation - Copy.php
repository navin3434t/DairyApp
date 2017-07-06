<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FarmHygeineInvestigation extends Front_Controller {

	/***********************************************************
	* Method Name   	: investigationStep1
	* Description       : Farm Hygeine Investigation Step1
	* @Param            : All Farm Hygeine Investigation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationStep1()
	{ 
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
		
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && ( isset($_POST['bactoscan_tpc'])) && ( isset($_POST['thermodurics']))  && (isset($_POST['other']))  && (!empty($_POST['other_description']) && isset($_POST['other_description'])) && (!empty($_POST['latest_bactoscan']) && isset($_POST['latest_bactoscan'])) && (!empty($_POST['cows_milked']) && isset($_POST['cows_milked'])) && (!empty($_POST['latest_thermoducric']) && isset($_POST['latest_thermoducric'])) && (!empty($_POST['milk_production_day']) && isset($_POST['milk_production_day'])) && (!empty($_POST['milk_frequency']) && isset($_POST['milk_frequency'])) && (!empty($_POST['bmilk_temprature']) && isset($_POST['bmilk_temprature'])) && (!empty($_POST['tank_volume']) && isset($_POST['tank_volume'])) && (!empty($_POST['temp_note_time']) && isset($_POST['temp_note_time'])) && (!empty($_POST['elapsed_hour']) && isset($_POST['elapsed_hour'])) && (!empty($_POST['elapsed_minutes']) && isset($_POST['elapsed_minutes'])) && (!empty($_POST['comments']) && isset($_POST['comments'])) && (!empty($_POST['farm_id']) && isset($_POST['farm_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$bactoscan_tpc = $this->input->post("bactoscan_tpc");
					$thermodurics = $this->input->post("thermodurics");
					$other = $this->input->post("other");
					$other_description = $this->input->post("other_description");
					$latest_bactoscan = $this->input->post("latest_bactoscan");
					$cows_milked = $this->input->post("cows_milked");
					$latest_thermoducric = $this->input->post("latest_thermoducric");
					$milk_production_day = $this->input->post("milk_production_day");
					$milk_frequency = $this->input->post("milk_frequency");
					$bmilk_temprature = $this->input->post("bmilk_temprature");
					$tank_volume = $this->input->post("tank_volume");
					$temp_note_time = $this->input->post("temp_note_time");
					$elapsed_hour = $this->input->post("elapsed_hour");
					$elapsed_minutes = $this->input->post("elapsed_minutes");
					$comments = $this->input->post("comments");
					$farm_id = $this->input->post("farm_id");
					$response_farm=$this->DHT->checkValidFarm($farm_id);
					if($response_farm)
					{
						/* Investigation Step1 Array */
						$data_arr=array('user_id'=>$user_id,'bactoscan_tpc'=>$bactoscan_tpc,'thermodurics'=>$thermodurics,'other'=>$other,'other_description'=>$other_description,'latest_bactoscan'=>$latest_bactoscan,'cows_milked'=>$cows_milked,'latest_thermoducric'=>$latest_thermoducric,'milk_production_day'=>$milk_production_day,'milk_frequency'=>$milk_frequency,'bmilk_temprature'=>$bmilk_temprature,'tank_volume'=>$tank_volume,'temp_note_time'=>$temp_note_time,'elapsed_hour'=>$elapsed_hour,'elapsed_minutes'=>$elapsed_minutes,'comments'=>$comments,'create_date'=>date("Y-m-d"),'farm_id'=>$farm_id);
						
						/* Store data  */
						$response=$this->FHI->investigationStep1($data_arr);
						if($response["is_insert"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Successfully Created",'fhi_id'=>$response['fhi_id']));
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
	* Method Name   	: investigationStep1
	* Description       : Farm Hygeine Investigation Step1
	* @Param            : All Farm Hygeine Investigation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationStep1Update()
	{ 
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
		
			if( (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['bactoscan_tpc']) && isset($_POST['bactoscan_tpc'])) && (!empty($_POST['thermodurics']) && isset($_POST['thermodurics']))  && (!empty($_POST['other']) && isset($_POST['other']))  && (!empty($_POST['other_description']) && isset($_POST['other_description'])) && (!empty($_POST['latest_bactoscan']) && isset($_POST['latest_bactoscan'])) && (!empty($_POST['cows_milked']) && isset($_POST['cows_milked'])) && (!empty($_POST['latest_thermoducric']) && isset($_POST['latest_thermoducric'])) && (!empty($_POST['milk_production_day']) && isset($_POST['milk_production_day'])) && (!empty($_POST['milk_frequency']) && isset($_POST['milk_frequency'])) && (!empty($_POST['bmilk_temprature']) && isset($_POST['bmilk_temprature'])) && (!empty($_POST['tank_volume']) && isset($_POST['tank_volume'])) && (!empty($_POST['temp_note_time']) && isset($_POST['temp_note_time'])) && (!empty($_POST['elapsed_hour']) && isset($_POST['elapsed_hour'])) && (!empty($_POST['elapsed_minutes']) && isset($_POST['elapsed_minutes'])) && (!empty($_POST['comments']) && isset($_POST['comments'])) )
			{
				$user_id=$this->input->post('user_id');
				$fhi_id=$this->input->post('fhi_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$bactoscan_tpc = $this->input->post("bactoscan_tpc");
					$thermodurics = $this->input->post("thermodurics");
					$other = $this->input->post("other");
					$other_description = $this->input->post("other_description");
					$latest_bactoscan = $this->input->post("latest_bactoscan");
					$cows_milked = $this->input->post("cows_milked");
					$latest_thermoducric = $this->input->post("latest_thermoducric");
					$milk_production_day = $this->input->post("milk_production_day");
					$milk_frequency = $this->input->post("milk_frequency");
					$bmilk_temprature = $this->input->post("bmilk_temprature");
					$tank_volume = $this->input->post("tank_volume");
					$temp_note_time = $this->input->post("temp_note_time");
					$elapsed_hour = $this->input->post("elapsed_hour");
					$elapsed_minutes = $this->input->post("elapsed_minutes");
					$comments = $this->input->post("comments");
					$farm_id = $this->input->post("farm_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Investigation Step1 Array */
						$data_arr=array('updated_by'=>$user_id,'bactoscan_tpc'=>$bactoscan_tpc,'thermodurics'=>$thermodurics,'other'=>$other,'other_description'=>$other_description,'latest_bactoscan'=>$latest_bactoscan,'cows_milked'=>$cows_milked,'latest_thermoducric'=>$latest_thermoducric,'milk_production_day'=>$milk_production_day,'milk_frequency'=>$milk_frequency,'bmilk_temprature'=>$bmilk_temprature,'tank_volume'=>$tank_volume,'temp_note_time'=>$temp_note_time,'elapsed_hour'=>$elapsed_hour,'elapsed_minutes'=>$elapsed_minutes,'comments'=>$comments,'update_date'=>date("Y-m-d"));
						
						/* Store data  */
						$response=$this->FHI->investigationStep1Update($data_arr,$fhi_id);
						if($response["is_insert"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Successfully Updated",'fhi_id'=>$response['fhi_id']));
						}
						else
						{
							echo json_encode(array("status"=>"0","msg"=>"There is some problem. Try again"));
						}	
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Invalid Farm Hygeine Investigation"));
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
	* Method Name   	: investigationStep1
	* Description       : Farm Hygeine Investigation Step1
	* @Param            : All Farm Hygeine Investigation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationStep1Get()
	{ 
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
		
			if( (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$fhi_id=$this->input->post('fhi_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{

					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Investigation Step1 Array */
						/* Store data  */
						$response=$this->FHI->investigationStep1Get($fhi_id);
						echo json_encode(array("status"=>"1","msg"=>"Hygeine Investigation Step1 Information",'data'=>$response));
							
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Invalid Farm Hygeine Investigation"));
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
	* Method Name   	: investigationStep2
	* Description       : Farm Hygeine Investigation Step2
	* @Param            : All Farm Hygeine Investigation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationStep2()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['milking_equipment']) && isset($_POST['milking_equipment'])) && (!empty($_POST['cooling_equipment']) && isset($_POST['cooling_equipment']))  && (!empty($_POST['heating_equipment']) && isset($_POST['heating_equipment']))  && (!empty($_POST['wash_program']) && isset($_POST['wash_program'])) && (!empty($_POST['wash_routinue']) && isset($_POST['wash_routinue'])) && (!empty($_POST['staff_changes']) && isset($_POST['staff_changes'])) && (!empty($_POST['other']) && isset($_POST['other'])) && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token =$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$milking_equipment = $this->input->post("milking_equipment");
					$cooling_equipment = $this->input->post("cooling_equipment");
					$heating_equipment = $this->input->post("heating_equipment");
					$wash_program = $this->input->post("wash_program");
					$wash_routinue = $this->input->post("wash_routinue");
					$staff_changes = $this->input->post("staff_changes");
					$other = $this->input->post("other");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Investigation Step2 Array */
						$data_arr=array('milking_equipment'=>$milking_equipment,'cooling_equipment'=>$cooling_equipment,'heating_equipment'=>$heating_equipment,'wash_program'=>$wash_program,'wash_routinue'=>$wash_routinue,'staff_changes'=>$staff_changes,'other_step2'=>$other);
						
						/* Store data  */
						$response=$this->FHI->investigationStep2($data_arr,$fhi_id,$user_id);
						if($response["is_insert"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Successfully Created",'fhi_id'=>$response['fhi_id']));
						}
						else
						{
							echo json_encode(array("status"=>"0","msg"=>"There is some problem. Try again"));
						}	
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep1
	* Description       : Farm Hygeine Investigation Step1
	* @Param            : All Farm Hygeine Investigation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationStep2Get()
	{ 
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
		
			if( (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$fhi_id=$this->input->post('fhi_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{

					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Investigation Step1 Array */
						/* Store data  */
						$response=$this->FHI->investigationStep2Get($fhi_id);
						echo json_encode(array("status"=>"1","msg"=>"Hygeine Investigation Step1 Information",'data'=>$response));
							
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Invalid Farm Hygeine Investigation"));
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
	* Method Name   	: investigationStep3
	* Description       : Farm Hygeine Investigation Step3
	* @Param            : All Farm Hygeine Investigation Step3  fields    
	* @return           : json data
	********************************************/
	public function investigationStep3()
	{
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['water_details']) && isset($_POST['water_details']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$water_details = $this->input->post("water_details");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationStep3($water_details,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep4
	* Description       : Farm Hygeine Investigation Step4
	* @Param            : All Farm Hygeine Investigation Step4  fields    
	* @return           : json data
	********************************************/
	public function investigationStep4()
	{
	
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['equipment_inspection']) && isset($_POST['equipment_inspection']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$equipment_inspection = $this->input->post("equipment_inspection");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationStep4($equipment_inspection,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep5
	* Description       : Farm Hygeine Investigation Step5
	* @Param            : All Farm Hygeine Investigation Step5  fields    
	* @return           : json data
	********************************************/
	public function investigationStep5()
	{
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['wash_assessment_cycle']) && isset($_POST['wash_assessment_cycle']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) && isset($_POST['pm']) && isset($_POST['am']) && isset($_POST['other']) && (!empty($_POST['name']) && isset($_POST['name']))  )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$wash_assessment_cycle = $this->input->post("wash_assessment_cycle");
					$am = $this->input->post("am");
					$pm = $this->input->post("pm");
					$other = $this->input->post("other");
					$name = $this->input->post("name");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$data_assement=array('am'=>$am,'pm'=>$pm,'other'=>$other,'name'=>$name,'fhi_id'=>$fhi_id);
						$response=$this->FHI->investigationStep5($data_assement,$wash_assessment_cycle,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep6
	* Description       : Farm Hygeine Investigation Step6
	* @Param            : All Farm Hygeine Investigation Step6  fields    
	* @return           : json data
	********************************************/
	public function investigationStep6()
	{
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['cleaning_solution']) && isset($_POST['cleaning_solution']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$cleaning_solution = $this->input->post("cleaning_solution");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationStep6($cleaning_solution,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep7
	* Description       : Farm Hygeine Investigation Step7
	* @Param            : All Farm Hygeine Investigation Step7  fields    
	* @return           : json data
	********************************************/
	public function investigationStep7()
	{
		
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			$headerStringValue = apache_request_headers();
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) &&  isset($_POST['liner_mouthpiece']) &&  isset($_POST['liner_mouthpiece_yes']) &&  isset($_POST['liner_mouthpiece_no']) &&  isset($_POST['which_unit_liner']) &&  isset($_POST['which_unit_liner_description']) &&  isset($_POST['cleaning_solution_flow']) &&  isset($_POST['cleaning_solution_flow_yes']) &&  isset($_POST['cleaning_solution_flow_no']) &&  isset($_POST['which_unit_cleaning']) &&  isset($_POST['which_unit_cleaning_description']) &&  isset($_POST['working_vacuum']) &&  isset($_POST['working_vacuum_yes']) &&  isset($_POST['working_vacuum_no']) &&  isset($_POST['vacuum_kevek']) &&  isset($_POST['vacuum_kevek_description']) &&  isset($_POST['effective_reserve']) &&  isset($_POST['effective_reserve_yes']) &&  isset($_POST['effective_reserve_no'])  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$liner_mouthpiece = $this->input->post("liner_mouthpiece");
					$liner_mouthpiece_yes = $this->input->post("liner_mouthpiece_yes");
					$liner_mouthpiece_no = $this->input->post("liner_mouthpiece_no");
					$which_unit_liner = $this->input->post("which_unit_liner");
					$which_unit_liner_description = $this->input->post("which_unit_liner_description");
					$cleaning_solution_flow = $this->input->post("cleaning_solution_flow");
					$cleaning_solution_flow_yes = $this->input->post("cleaning_solution_flow_yes");
					$cleaning_solution_flow_no = $this->input->post("cleaning_solution_flow_no");
					$which_unit_cleaning = $this->input->post("which_unit_cleaning");
					$which_unit_cleaning_description = $this->input->post("which_unit_cleaning_description");
					$working_vacuum = $this->input->post("working_vacuum");
					$working_vacuum_yes = $this->input->post("working_vacuum_yes");
					$working_vacuum_no = $this->input->post("working_vacuum_no");
					$vacuum_kevek = $this->input->post("vacuum_kevek");
					$vacuum_kevek_description = $this->input->post("vacuum_kevek_description");
					$effective_reserve = $this->input->post("effective_reserve");
					$effective_reserve_yes = $this->input->post("effective_reserve_yes");
					$effective_reserve_no = $this->input->post("effective_reserve_no");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$data_arr=array('liner_mouthpiece'=>$liner_mouthpiece,'liner_mouthpiece_yes'=>$liner_mouthpiece_yes,'liner_mouthpiece_no'=>$liner_mouthpiece_no,'which_unit_liner'=>$which_unit_liner,'which_unit_liner_description'=>$which_unit_liner_description,'cleaning_solution_flow'=>$cleaning_solution_flow,'cleaning_solution_flow_yes'=>$cleaning_solution_flow_yes,'cleaning_solution_flow_no'=>$cleaning_solution_flow_no,'which_unit_cleaning'=>$which_unit_cleaning,'which_unit_cleaning_description'=>$which_unit_cleaning_description,'working_vacuum'=>$working_vacuum,'working_vacuum_yes'=>$working_vacuum_yes,'working_vacuum_no'=>$working_vacuum_no,'vacuum_kevek'=>$vacuum_kevek,'vacuum_kevek_description'=>$vacuum_kevek_description,'effective_reserve'=>$effective_reserve,'effective_reserve_yes'=>$effective_reserve_yes,'effective_reserve_no'=>$effective_reserve_no,'fhi_id'=>$fhi_id,'create_date'=>date('Y-m-d'));
						$response=$this->FHI->investigationStep7($data_arr,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep8
	* Description       : Farm Hygeine Investigation Step8
	* @Param            : All Farm Hygeine Investigation Step8  fields    
	* @return           : json data
	********************************************/
	public function investigationStep8()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) &&  isset($_POST['injector_yes']) &&  isset($_POST['injector_no']) &&  isset($_POST['slug_wash_cycle']) &&  isset($_POST['estimated_slug_screen']) &&  isset($_POST['receiver_volume_1_2l']) &&  isset($_POST['receiver_volume_2_3_f']) &&  isset($_POST['receiver_volume_1_3_f']) &&  isset($_POST['receiver_volume_2_3_g']) &&  isset($_POST['receiver_volume_1_2_f']) &&  isset($_POST['after_turn_yes']) &&  isset($_POST['after_turn_no']) &&  isset($_POST['instant_after_turn_yes']) &&  isset($_POST['instant_after_turn_no']) &&  isset($_POST['before_turn_yes']) &&  isset($_POST['before_turn_no']) &&  isset($_POST['little_no_action_yes']) &&  isset($_POST['little_no_action_no']) &&  isset($_POST['good_action_yes']) &&  isset($_POST['good_action_no']) &&  isset($_POST['little_action_yes']) &&  isset($_POST['little_action_no']) &&  isset($_POST['other_yes']) &&  isset($_POST['other_no'])  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$injector_yes = $this->input->post("injector_yes");
					$injector_no = $this->input->post("injector_no");
					$slug_wash_cycle = $this->input->post("slug_wash_cycle");
					$estimated_slug_screen = $this->input->post("estimated_slug_screen");
					$receiver_volume_1_2l = $this->input->post("receiver_volume_1_2l");
					$receiver_volume_2_3_f = $this->input->post("receiver_volume_2_3_f");
					$receiver_volume_1_3_f = $this->input->post("receiver_volume_1_3_f");
					$receiver_volume_2_3_g = $this->input->post("receiver_volume_2_3_g");
					$receiver_volume_1_2_f = $this->input->post("receiver_volume_1_2_f");
					$after_turn_yes = $this->input->post("after_turn_yes");
					$after_turn_no = $this->input->post("after_turn_no");
					$instant_after_turn_yes = $this->input->post("instant_after_turn_yes");
					$instant_after_turn_no = $this->input->post("instant_after_turn_no");
					$before_turn_yes = $this->input->post("before_turn_yes");
					$before_turn_no = $this->input->post("before_turn_no");
					$little_no_action_yes = $this->input->post("little_no_action_yes");
					$little_no_action_no = $this->input->post("little_no_action_no");
					$good_action_yes = $this->input->post("good_action_yes");
					$good_action_no = $this->input->post("good_action_no");
					$little_action_yes = $this->input->post("little_action_yes");
					$little_action_no = $this->input->post("little_action_no");
					$other_yes = $this->input->post("other_yes");
					$other_no = $this->input->post("other_no");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$data_arr=array('injector_yes'=>$injector_yes,'injector_no'=>$injector_no,'slug_wash_cycle'=>$slug_wash_cycle,'estimated_slug_screen'=>$estimated_slug_screen,'receiver_volume_1_2l'=>$receiver_volume_1_2l,'receiver_volume_2_3_f'=>$receiver_volume_2_3_f,'receiver_volume_1_3_f'=>$receiver_volume_1_3_f,'receiver_volume_2_3_g'=>$receiver_volume_2_3_g,'receiver_volume_1_2_f'=>$receiver_volume_1_2_f,'after_turn_yes'=>$after_turn_yes,'after_turn_no'=>$after_turn_no,'instant_after_turn_yes'=>$instant_after_turn_yes,'instant_after_turn_no'=>$instant_after_turn_no,'before_turn_yes'=>$before_turn_yes,'before_turn_no'=>$before_turn_no,'little_no_action_yes'=>$little_no_action_yes,'little_no_action_no'=>$little_no_action_no,'good_action_yes'=>$good_action_yes,'little_action_yes'=>$little_action_yes,'little_action_no'=>$little_action_no,'other_yes'=>$other_yes,'good_action_no'=>$good_action_no,'other_no'=>$other_no,'fhi_id'=>$fhi_id,'create_date'=>date('Y-m-d'));
						$response=$this->FHI->investigationStep8($data_arr,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep9
	* Description       : Farm Hygeine Investigation Step9
	* @Param            : All Farm Hygeine Investigation Step9  fields    
	* @return           : json data
	********************************************/
	public function investigationStep9()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (isset($_POST['pre_rinse'])) && (isset($_POST['wash'])) && (isset($_POST['average_flow_rate'])) && (isset($_POST['final_rinse'])) && (isset($_POST['allowance'])) && (!empty($_POST['flow_rate_unit']) && isset($_POST['flow_rate_unit']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$pre_rinse = $this->input->post("pre_rinse");
					$wash = $this->input->post("wash");
					$average_flow_rate = $this->input->post("average_flow_rate");
					$final_rinse = $this->input->post("final_rinse");
					$allowance = $this->input->post("allowance");
					$flow_rate_unit = $this->input->post("flow_rate_unit");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$data_arr=array('pre_rinse'=>$pre_rinse,'wash'=>$wash,'average_flow_rate'=>$average_flow_rate,'final_rinse'=>$final_rinse,'allowance'=>$allowance,'fhi_id'=>$fhi_id);
						$response=$this->FHI->investigationStep9($data_arr,$flow_rate_unit,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationStep10
	* Description       : Farm Hygeine Investigation Step10
	* @Param            : All Farm Hygeine Investigation Step10  fields    
	* @return           : json data
	********************************************/
	public function investigationStep10()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['alkali_wash_ph_level']) && isset($_POST['alkali_wash_ph_level'])) && (!empty($_POST['acid_wash_ph_level']) && isset($_POST['acid_wash_ph_level']))  && (!empty($_POST['wash_active']) && isset($_POST['wash_active']))  && (!empty($_POST['sanitiser_ph_level']) && isset($_POST['sanitiser_ph_level']))  && (!empty($_POST['other_test']) && isset($_POST['other_test']))  && (!empty($_POST['program_name']) && isset($_POST['program_name'])) && (!empty($_POST['chlorine_level']) && isset($_POST['chlorine_level'])) && (!empty($_POST['milk_cycle']) && isset($_POST['milk_cycle']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
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
					$milk_cycle = $this->input->post("milk_cycle");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$milk_tank_arr=array('alkali_wash_ph_level'=>$alkali_wash_ph_level,'acid_wash_ph_level'=>$acid_wash_ph_level,'wash_active'=>$wash_active,'sanitiser_ph_level'=>$sanitiser_ph_level,'other_test'=>$other_test,'program_name'=>$program_name,'chlorine_level'=>$chlorine_level,'fhi_id'=>$fhi_id,'create_date'=>date('Y-m-d'));						
						$response=$this->FHI->investigationStep10($milk_tank_arr,$milk_cycle,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: bulkMilkTankCleaning
	* Description       : Farm Hygeine Investigation Step Bulk Milk Tank Cleaning
	* @Param            : All Farm Hygeine Investigation Step10  fields    
	* @return           : json data
	********************************************/
	public function bulkMilkTankCleaning()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (isset($_POST['alkali_ph_level'])) && ( isset($_POST['acid_ph_level']))  && (isset($_POST['alkal_wash_active']))  && ( isset($_POST['sanitizer_ph_level']))  && ( isset($_POST['chlorine_level'])) && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$alkali_ph_level = $this->input->post("alkali_ph_level");
					$acid_ph_level = $this->input->post("acid_ph_level");
					$alkal_wash_active = $this->input->post("alkal_wash_active");
					$sanitizer_ph_level = $this->input->post("sanitizer_ph_level");
					$chlorine_level = $this->input->post("chlorine_level");					
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$milk_tank_arr=array('alkali_ph_level'=>$alkali_ph_level,'acid_ph_level'=>$acid_ph_level,'alkal_wash_active'=>$alkal_wash_active,'sanitizer_ph_level'=>$sanitizer_ph_level,'chlorine_level'=>$chlorine_level,'created_by'=>$user_id,'fhi_id'=>$fhi_id,'create_date'=>date('Y-m-d'));						
						$response=$this->FHI->bulkMilkTankCleaning($milk_tank_arr,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: completeInvestigation
	* Description       : Farm Hygeine Investigation Step Bulk Milk Tank Cleaning
	* @Param            : All Farm Hygeine Investigation Step10  fields    
	* @return           : json data
	********************************************/
	public function completeInvestigation()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (isset($_POST['other_test_observation'])) && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					
					$other_test_observation = $this->input->post("other_test_observation");
					
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$data_arr=array('other_test_observation'=>$other_test_observation);						
						$response=$this->FHI->completeInvestigation($data_arr,$fhi_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationRecommendation1
	* Description       : Farm Hygeine Investigation Recommendation 1
	* @Param            : All Farm Hygeine Investigation Recommendation Step1  fields    
	* @return           : json data
	********************************************/
	public function investigationRecommendation1(){
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['action_data']) && isset($_POST['action_data'])) && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))  )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$action_data = $this->input->post("action_data");
					
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationRecommendation1($action_data,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationRecommendation2
	* Description       : Farm Hygeine Investigation Recommendation 2
	* @Param            : All Farm Hygeine Investigation Recommendation Step2  fields    
	* @return           : json data
	********************************************/
	public function investigationRecommendation2()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['retain_existing']) && isset($_POST['retain_existing'])) &&  isset($_POST['new_recommendation']) &&  isset($_POST['reference_number']) && (!empty($_POST['machine_wash_data']) && isset($_POST['machine_wash_data']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$retain_existing = $this->input->post("retain_existing");
					$new_recommendation = $this->input->post("new_recommendation");
					$reference_number = $this->input->post("reference_number");
					$fhi_id = $this->input->post("fhi_id");
					$milking_machine_data = array("retain_existing"=>$retain_existing,"new_recommendation"=>$new_recommendation,"reference_number"=>$reference_number,"fhi_id"=>$fhi_id,"create_date"=>date("Y-m-d"),"created_by"=>$user_id);
					$machine_wash_data = $this->input->post("machine_wash_data");
					
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationRecommendation2($milking_machine_data,$machine_wash_data,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationRecommendation3
	* Description       : Farm Hygeine Investigation Recommendation 3
	* @Param            : All Farm Hygeine Investigation Recommendation Step3  fields    
	* @return           : json data
	********************************************/
	public function investigationRecommendation3()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['cycle_arr']) && isset($_POST['cycle_arr'])) && isset($_POST['retain_existing']) && isset($_POST['new_recommendation'])  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$retain_existing = $this->input->post("retain_existing");
					$new_recommendation = $this->input->post("new_recommendation");
					$fhi_id = $this->input->post("fhi_id");
					$cycle_arr = $this->input->post("cycle_arr");
					
					$recommend3_data = array("retain_existing"=>$retain_existing,"new_recommendation"=>$new_recommendation,"fhi_id"=>$fhi_id,"create_date"=>date("Y-m-d"),"created_by"=>$user_id);
					
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationRecommendation3($recommend3_data,$cycle_arr,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Method Name   	: investigationRecommendation4
	* Description       : Farm Hygeine Investigation Recommendation 4
	* @Param            : All Farm Hygeine Investigation Step6  fields    
	* @return           : json data
	********************************************/
	public function investigationRecommendation4()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			/* Check for Webservice paramaters */
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['cleaning_solution']) && isset($_POST['cleaning_solution']))  && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id']))   )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$cleaning_solution = $this->input->post("cleaning_solution");
					$fhi_id = $this->input->post("fhi_id");
					$response_investigation=$this->FHI->checkValidInvestigation($fhi_id);
					if($response_investigation)
					{
						/* Store data  */
						$response=$this->FHI->investigationRecommendation4($cleaning_solution,$fhi_id,$user_id);
						if($response)
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
						echo json_encode(array("status"=>"0","msg"=>"Invalid Hygeine Investigation"));
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
	* Description       : Send Invite for Hygeine Investigation
	* @Param            : invite_data,fhi_id,user_id,webservice_token
	* @return           : json data
	********************************************/
	public function sendInviteHygeineInvestigation()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$headerStringValue = apache_request_headers();
			/* Check for Webservice paramaters */
			if( (!empty($_POST['invite_data']) && isset($_POST['invite_data'])) && (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($_POST['fhi_id']) && isset($_POST['fhi_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id=$this->input->post('user_id');
				$webservice_token=$headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
	   
				/*call function for valiadate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$invite_data = $this->input->post("invite_data");	
					$fhi_id = $this->input->post("fhi_id");	
					
					/* Store data  */
					$response=$this->FHI->sendInvite($invite_data,$user_id,$fhi_id);
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
					$response['open']= $this->FM->getActionsListName('da_farm_hygiene_investigation',$user_id,'0','da_invite_hygiene_investigation');
					$response['close'] = $this->FM->getActionsListName('da_farm_hygiene_investigation',$user_id,'1','da_invite_hygiene_investigation');
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
	* Method Name   	: offlineFarmHygeineInvestigation
	* Description       : Get Actions List
	* @Param            : user_id,webservice_token
	* @return           : json data
	********************************************/
	public function offlineFarmHygeineInvestigation()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['investigationStep1']) && isset($_POST['investigationStep1'])) && (!empty($_POST['investigationStep2']) && isset($_POST['investigationStep2'])) && (!empty($_POST['investigationStep3']) && isset($_POST['investigationStep3'])) && (!empty($_POST['investigationStep4']) && isset($_POST['investigationStep4'])) && (!empty($_POST['investigationStep5']) && isset($_POST['investigationStep5'])) && (!empty($_POST['investigationStep6']) && isset($_POST['investigationStep6'])) && (!empty($_POST['investigationStep7']) && isset($_POST['investigationStep7'])) && (!empty($_POST['investigationStep8']) && isset($_POST['investigationStep8'])) && (!empty($_POST['investigationStep9']) && isset($_POST['investigationStep9'])) && (!empty($_POST['investigationStep10']) && isset($_POST['investigationStep10'])) && (!empty($_POST['bulkMilkTankCleaning']) && isset($_POST['bulkMilkTankCleaning'])) && (!empty($_POST['completeInvestigation']) && isset($_POST['completeInvestigation'])) && (!empty($_POST['investigationRecommendation1']) && isset($_POST['investigationRecommendation1'])) && (!empty($_POST['investigationRecommendation2']) && isset($_POST['investigationRecommendation2'])) && (!empty($_POST['investigationRecommendation3']) && isset($_POST['investigationRecommendation3'])) && (!empty($_POST['investigationRecommendation4']) && isset($_POST['investigationRecommendation4'])) )
			{
				/*inputs for validation */
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					/* Steps Input parameter start*/
					$investigationStep1=$_POST['investigationStep1'];					
					$investigationStep2=$_POST['investigationStep2'];					
					$investigationStep3=$_POST['investigationStep3'];					
					$investigationStep4=$_POST['investigationStep4'];					
					$investigationStep5=$_POST['investigationStep5'];					
					$investigationStep6=$_POST['investigationStep6'];					
					$investigationStep7=$_POST['investigationStep7'];					
					$investigationStep8=$_POST['investigationStep8'];					
					$investigationStep9=$_POST['investigationStep9'];					
					$investigationStep6=$_POST['investigationStep6'];					
					$investigationStep10=$_POST['investigationStep10'];					
					$bulkMilkTankCleaning=$_POST['bulkMilkTankCleaning'];					
					$completeInvestigation=$_POST['completeInvestigation'];					
					$investigationRecommendation1=$_POST['investigationRecommendation1'];					
					$investigationRecommendation2=$_POST['investigationRecommendation2'];					
					$investigationRecommendation3=$_POST['investigationRecommendation3'];					
					$investigationRecommendation4=$_POST['investigationRecommendation4'];					
					/* Steps Input parameter end*/
					/* Step1 Input paramtere start */
					$bactoscan_tpc = $investigationStep1['bactoscan_tpc'];
					$thermodurics = $investigationStep1['thermodurics'];
					$other = $investigationStep1['other'];
					$other_description = $investigationStep1['other_description'];
					$latest_bactoscan =$investigationStep1['latest_bactoscan'] ;
					$cows_milked = $investigationStep1['cows_milked'];
					$latest_thermoducric = $investigationStep1['latest_thermoducric'];
					$milk_production_day = $investigationStep1['milk_production_day'];
					$milk_frequency =$investigationStep1['milk_frequency'] ;
					$bmilk_temprature = $investigationStep1['bmilk_temprature'];
					$tank_volume = $investigationStep1['tank_volume'];
					$temp_note_time = $investigationStep1['temp_note_time'];
					$elapsed_hour = $investigationStep1['elapsed_hour'];
					$elapsed_minutes = $investigationStep1['elapsed_minutes'];
					$comments = $investigationStep1['comments'];
					$farm_id = $investigationStep1['farm_id'];					
					/* Step1 Input Parameter end */
					/* Step2 Input Parameter start */
					$milking_equipment_s2 = $investigationStep2['milking_equipment'];
					$cooling_equipment_s2 = $investigationStep2['cooling_equipment'];
					$heating_equipment_s2 = $investigationStep2['heating_equipment'];
					$wash_program_s2 = $investigationStep2['wash_program'];
					$wash_routinue_s2 = $investigationStep2['wash_routinue'];
					$staff_changes_s2 = $investigationStep2['staff_changes'];
					$other_s2 = $investigationStep2['other'];
					$fhi_id = $investigationStep2['comments'];
					/* Investigation Step2 Array */
					$data_arr_s2=array('milking_equipment'=>$milking_equipment_s2,'cooling_equipment'=>$cooling_equipment_s2,'heating_equipment'=>$heating_equipment_s2,'wash_program'=>$wash_program_s2,'wash_routinue'=>$wash_routinue_s2,'staff_changes'=>$staff_changes_s2,'other_step2'=>$other_s2);
						
						/* Store data  */
					$this->FHI->investigationStep2($data_arr_s2,$fhi_id,$user_id);					
					/* Step2 Input Parameter end */
					if($response_farm)
					{
						/* Investigation Step1 Array */
						$data_arr_step1=array('user_id'=>$user_id,'bactoscan_tpc'=>$bactoscan_tpc,'thermodurics'=>$thermodurics,'other'=>$other,'other_description'=>$other_description,'latest_bactoscan'=>$latest_bactoscan,'cows_milked'=>$cows_milked,'latest_thermoducric'=>$latest_thermoducric,'milk_production_day'=>$milk_production_day,'milk_frequency'=>$milk_frequency,'bmilk_temprature'=>$bmilk_temprature,'tank_volume'=>$tank_volume,'temp_note_time'=>$temp_note_time,'elapsed_hour'=>$elapsed_hour,'elapsed_minutes'=>$elapsed_minutes,'comments'=>$comments,'create_date'=>date("Y-m-d"),'farm_id'=>$farm_id);
						
						/* Store data  Investigation Step1 */
						$response=$this->FHI->investigationStep1($data_arr_step1);
						if($response["is_insert"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Successfully Created",'fhi_id'=>$response['fhi_id']));
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