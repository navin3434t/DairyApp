<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tank_Cleaning extends Front_Controller {

	/***********************************************************
	* Method Name   	: bulkMilkTankWash
	* Description       : save bulk milk tank wash program assessment details
	* @Param            : user_id,webservice_token and tank_wash_details array contains (description,volume,cleanser_sensiter,comments,temp_start,dose)
	* @return           : json data
	********************************************/
	public function milkTankCleaning()
	{
		if(isset($_POST) && !empty($_POST))
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
			$fo_email = $this->input->post("fo_email");
			$machine_technician = $this->input->post("machine_technician");
			$mt_mobile = $this->input->post("mt_mobile");
			$mt_email = $this->input->post("mt_email");
			$chemical_representative = $this->input->post("chemical_representative");
			$cr_mobile = $this->input->post("cr_mobile");
			$cr_email = $this->input->post("cr_email");
			$region = $this->input->post("region");
			$sub_region = $this->input->post("sub_region");
			$create_date = date("Y-m-d");
			/*inputs for validation */
			$user_id = $this->input->post("user_id");
			$webservice_token = $this->input->post("webservice_token");
			$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
			
			/*call function for valiadte user */
			$validate = $this->UM->validateWebservice($validate_data);
			if($validate['is_valid']==1){
				$farm_info = array("name"=>$name,"address"=>$address,"post_code"=>$post_code,"gps_cordinates"=>$gps_cordinates,"dairy_factory"=>$dairy_factory,"supplier_no"=>$supplier_no,"field_officer"=>$field_officer,"fo_mobile"=>$fo_mobile,"fo_email"=>$fo_email,"machine_technician"=>$machine_technician,"mt_mobile"=>$mt_mobile,"mt_email"=>$mt_email,"chemical_representative"=>$chemical_representative,"cr_mobile"=>$cr_mobile,"cr_email"=>$cr_email,"region"=>$region,"sub_region"=>$sub_region,"user_id"=>$user_id,"create_date"=>$create_date);
				
				$farm_primary_contact = array("primary_name"=>$primary_name,"primary_role"=>$primary_role,"primary_mobile"=>$primary_mobile,"primary_email"=>$primary_email);
				
				$farm_secondary_contact = array("secondary_name"=>$secondary_name,"secondary_role"=>$secondary_role,"secondary_mobile"=>$secondary_mobile,"secondary_email"=>$secondary_email);
				
				
				$farm_data_insert = $this->FM->insertFarmdata($farm_info,$farm_primary_contact, $farm_secondary_contact);
				
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
			echo json_encode(array("status"=>"0","msg"=>"Invalid request"));
		}
	}
	
	
}