<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Front_Controller {

	/***********************************************************
	* Method Name   	: InvitesList
	* Description       : Fetch User Invites List
	* @Param            : user_id,webservice_token
	* @return           : json data
	********************************************/
	public function InvitesList()
	{
		$this->load->model('Dashboard_Model','DM');
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id = $this->input->post("user_id");
				$token = $headerStringValue['webservice_token'];
				
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$token);
				
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$farm_where_cond = array("user_id"=>$user_id);
					$farm_arr = $this->DM->getFarmInviteList($user_id);
					$hygeine_tracker = $this->DM->getActionHygeineTracker($user_id);
					$milking_machine_cleaning_arr = $this->DM->getActionMilkMachineCleaning($user_id);
					$milk_tank_cleaning_arr = $this->DM->getActionMilkTankCleaning($user_id);
					$cip_cleaning_arr = $this->DM->getActionCIPCleaningRoutinue($user_id);
					$cooling_performance_arr = $this->DM->getActionCoolingPerformance($user_id);
					$hygeine_investigation_arr = $this->DM->getActionFarmHygeineInvestigation($user_id);
					/* $milk_machine_cleaning_arr = $this->DM->getActionMilkMachineCleaning($user_id); */
					
					$user_data = array();
					$user_data['farm_invite_list'] = $farm_arr;
					$user_data['action_invite_list']['milk_machine_cleaning'] = $milking_machine_cleaning_arr;
					$user_data['action_invite_list']['hygeine_tracker'] = $hygeine_tracker;
					$user_data['action_invite_list']['milk_tank_cleaning'] = $milk_tank_cleaning_arr;
					$user_data['action_invite_list']['cip_cleaning'] = $cip_cleaning_arr;
					$user_data['action_invite_list']['cooling_performance'] = $cooling_performance_arr;
					$user_data['action_invite_list']['hygeine_investigation'] = $hygeine_investigation_arr;
					
					// $user_data['action_list'] = $action_arr;
					echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$user_data));
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
	* Method Name   	: uploadImage
	* Description       : Upload Image
	* @Param            : user_id,webservice_token,farm_id
	* @return           : json data
	********************************************/
	public function uploadImage()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_FILES['image']) && isset($_FILES['image']))  )
			{
				/*inputs for validation */
				$webservice_token = $headerStringValue['webservice_token'];
				$user_id = $this->input->post("user_id");
				$status = $this->input->post("status");
				
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$extension_1 = explode(".", $_FILES['image']['name']);
					$extension = end($extension_1);
					$image_name = "da_image".rand().'.'.$extension;
					$config['upload_path'] =  $this->config->item("DIR_ROOT_IMAGE")."upload/";
					$config['file_name'] = $image_name;
					$config['allowed_types'] = 'jpeg|jpg|png|JPEG|JPG|PNG';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image'))
					{
						
						echo json_encode(array("status"=>"0","msg"=>"Image Upload Error -".$this->upload->display_errors() ));
					}
					else
					{
						$image_arr=array('image'=>$image_name,'user_id'=>$user_id,'create_date'=>date("Y-m-d"));
						$response = $this->DM->uploadImage($image_arr);
						if($response['is_insert'])
						{
							
							echo json_encode(array("status"=>"1","msg"=>"Image Uploaded",'data'=>array('image_id'=>$response['image_id'])));
						}
						else
						{
							echo json_encode(array("status"=>"0","msg"=>"Date not updated try again"));
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
	
}
