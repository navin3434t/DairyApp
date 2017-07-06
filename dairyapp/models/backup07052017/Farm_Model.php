<?php
	class Farm_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: createFarm
		* Description       : Create Farm for logged in user
		* @Param            : All farm fields and user_id,webservice_token   
		* @return           : json data
		********************************************/
		function insertFarmdata($farm_info,$farm_primary_contact,$farm_secondary_contact,$farm_field_officer,$farm_machine_technician,$farm_chemical_representative){
			
			$query = $this->db->insert("da_farm",$farm_info);
			$user_id = $farm_info['user_id'];
			$response = array();
			if($query)
			{
				$lastId = $this->db->insert_id();
				/* Save to Activity Log Start*/
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Farm",'table_name'=>'da_farm','table_id'=>$lastId,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save to Activity Log End*/
				$response['farm_id']=$lastId;
				$create_date = date("Y-m-d");
				/* Primary Contact Start */
				$check_primary_email = $this->checkUser($farm_primary_contact['primary_email']);
				
				$p_name = $farm_primary_contact["primary_name"];
				$p_email = $farm_primary_contact["primary_email"];
				$p_mobile = $farm_primary_contact["primary_mobile"];
				$p_position = $farm_primary_contact["primary_role"];
				
				$primary_data = array("first_name"=>$p_name,"email"=>$p_email,"mobile"=>$p_mobile,"position"=>$p_position,"create_date"=>$create_date);
				if($check_primary_email['mail_exist']=='1')
				{
					$response['primary_contact_exist'] = "1";
					$u_id_p = $check_primary_email['u_id'];
					$insert_data = array("user_id"=>$u_id_p,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
					$insert = $this->db->insert("da_farm_invite",$insert_data);
					$primary_contact_id=$u_id_p;
				}
				else
				{
					
					$insertuser1 = $this->insertUser($primary_data,$lastId);
					if($insertuser1['is_insert']==1){
						
						
						$u_id_p = $insertuser1['u_id'];
						$response['primary_insert'] = "1";
						$insert_data = array("user_id"=>$u_id_p,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
						$insert = $this->db->insert("da_farm_invite",$insert_data);
						$primary_contact_id=$u_id_p ;
						
					}
					else
					{
						$primary_contact_id=$user_id;
					}
					
				}
				/* Secondary Contact Start*/
				$check_secondary_email = $this->checkUser($farm_secondary_contact['secondary_email']);
				
				$s_name = $farm_secondary_contact["secondary_name"];
				$s_email = $farm_secondary_contact["secondary_email"];
				$s_mobile = $farm_secondary_contact["secondary_mobile"];
				$s_position = $farm_secondary_contact["secondary_role"];
				$secondary_data = array("first_name"=>$s_name,"email"=>$s_email,"mobile"=>$s_mobile,"position"=>$s_position,"create_date"=>$create_date);
				
				if($check_secondary_email['mail_exist']=='1'){
					$response['secondary_contact_exist'] = "1";
					$u_id_s = $check_secondary_email['u_id'];
					$insert_data = array("user_id"=>$u_id_s,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
					$insert = $this->db->insert("da_farm_invite",$insert_data);
					$secondary_contact_id=$u_id_s;
				}
				else
				{
				
					$insertuser2 = $this->insertUser($secondary_data,$lastId);
					$u_id_s = $insertuser2['u_id'];
					if($insertuser2['is_insert']==1){
						$response['secondary_insert'] = "1";
						$insert_data = array("user_id"=>$u_id_s,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
						
						$insert = $this->db->insert("da_farm_invite",$insert_data);
						$secondary_contact_id=$u_id_s;
						
					}
					else
					{
						$secondary_contact_id=$user_id;
					}
				}
				/* Secondary Contact End */
				
				/* Field Officer Contact Start*/
				
				$check_fo_email = $this->checkUser($farm_field_officer['email']);
				
				$fo_name = $farm_field_officer["name"];
				$fo_email = $farm_field_officer["email"];
				$fo_mobile = $farm_field_officer["mobile"];
				$fo_company = $farm_field_officer["company"];
				$fo_data = array("first_name"=>$fo_name,"email"=>$fo_email,"mobile"=>$fo_mobile,"company"=>$fo_company,"create_date"=>$create_date);
				
				if($check_fo_email['mail_exist']=='1'){
					
					$u_id_fo = $check_fo_email['u_id'];
					$insert_data = array("user_id"=>$u_id_fo,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
					$insert = $this->db->insert("da_farm_invite",$insert_data);
					$fo_contact_id=$u_id_fo;
				}
				else
				{
				
					$insertuserfo = $this->insertUser($fo_data,$lastId);
					$u_id_fo = $insertuserfo['u_id'];
					if($insertuserfo['is_insert']==1){
						$response['secondary_insert'] = "1";
						$insert_data = array("user_id"=>$u_id_fo,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
						
						$insert = $this->db->insert("da_farm_invite",$insert_data);
						$fo_contact_id=$u_id_fo;
						
					}
					else
					{
						$fo_contact_id=$user_id;
					}
				}
				/* Field Officer Contact End */				
				
				/* Milk Machine Technician  Contact Start*/
				$check_mt_email = $this->checkUser($farm_machine_technician['email']);
				
				$mt_name = $farm_machine_technician["name"];
				$mt_email = $farm_machine_technician["email"];
				$mt_mobile = $farm_machine_technician["mobile"];
				$mt_company = $farm_machine_technician["company"];
				$mt_data = array("first_name"=>$mt_name,"email"=>$mt_email,"mobile"=>$mt_mobile,"company"=>$mt_company,"create_date"=>$create_date);
				
				if($check_mt_email['mail_exist']=='1'){
					
					$u_id_mt = $check_mt_email['u_id'];
					$insert_data = array("user_id"=>$u_id_mt,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
					$insert = $this->db->insert("da_farm_invite",$insert_data);
					$mt_contact_id=$u_id_mt;
				}
				else
				{
				
					$insertusermt = $this->insertUser($mt_data,$lastId);
					$u_id_mt = $insertusermt['u_id'];
					if($insertusermt['is_insert']==1){
						
						$insert_data = array("user_id"=>$u_id_mt,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
						
						$insert = $this->db->insert("da_farm_invite",$insert_data);
						$mt_contact_id=$u_id_mt;
						
					}
					else
					{
						$mt_contact_id=$user_id;
					}
				}
				/* Milk Machine Technician Contact End */		

				/*Chemical Representative  Contact Start*/
				$check_cr_email = $this->checkUser($farm_chemical_representative['email']);
				
				$cr_name = $farm_chemical_representative["name"];
				$cr_email = $farm_chemical_representative["email"];
				$cr_mobile = $farm_chemical_representative["mobile"];
				$cr_company = $farm_chemical_representative["company"];
				$cr_data = array("first_name"=>$cr_name,"email"=>$cr_email,"mobile"=>$cr_mobile,"company"=>$cr_company,"create_date"=>$create_date);
				
				if($check_cr_email['mail_exist']=='1'){
					
					$u_id_cr = $check_cr_email['u_id'];
					$insert_data = array("user_id"=>$u_id_cr,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
					$insert = $this->db->insert("da_farm_invite",$insert_data);
					$cr_contact_id=$u_id_cr;
				}
				else
				{
				
					$insertusermt = $this->insertUser($cr_data,$lastId);
					$u_id_cr = $insertusermt['u_id'];
					if($insertusermt['is_insert']==1)
					{
						$insert_data = array("user_id"=>$u_id_cr,"farm_id"=>$lastId,"invited_by"=>$user_id,"status"=>0);
						$insert = $this->db->insert("da_farm_invite",$insert_data);
						$cr_contact_id=$u_id_cr;
						
					}
					else
					{
						$cr_contact_id=$user_id;
					}
				}
				/* Milk Machine Technician Contact End */
				/* Update Farm Data */
				$farm_update_arr=array('primary_contact'=>$primary_contact_id,'secondary_contact'=>$secondary_contact_id,'field_officer'=>$fo_contact_id,'machine_technician'=>$mt_contact_id,'chemical_representative'=>$cr_contact_id);
				$this->db->where('id',$lastId);
				$this->db->update('da_farm',$farm_update_arr);
				$response['is_insert'] = "1";
			}
			else{
				$response['is_insert'] = "0";
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: checkExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkUser($email)
		{
			$where_cond = array("email"=>$email);
			$this->db->select("id");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$u_id = $result[0]->id;
				$response = array("mail_exist"=>"1","u_id"=>$u_id);
			}
			else
			{
				$response = array("mail_exist"=>"0");
			}
			return $response;
			
		}
		
		/***********************************************************
		* Method Name   	: insertUser
		* Description       : Insert new user into user role and user_role table
		* @Param            : contact_info,role,farm_id
		* @return           : json data
		********************************************/
		function insertUser($contact_info,$farmId)
		{
			$insert = $this->db->insert("da_user",$contact_info);
			$insert_id = $this->db->insert_id();
			if($insert){
				$result = array("is_insert"=>"1","u_id"=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"1");
			}
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: searchUser
		* Description       : serach user by name or email 
		* @Param            : action,user_input    
		* @return           : json data
		********************************************/
		function searchUser($parameter){
			$name = $parameter["name"];
			$email = $parameter["email"];

				
				$this->db->select("id,first_name,last_name,email,mobile,i_am,position");
				$this->db->from("da_user");
				if(!empty($name))
				{
					$this->db->like('first_name',$name);
					$this->db->like('last_name',$name);
				}
				if(!empty($email))
				{
					$this->db->like('email',$email);
				}
				$query = $this->db->get();
				if($query->num_rows()>0)
				{
					$result = $query->result();
					$response = array("is_found"=>1,"data"=>$result);
				}
				else
				{
					$response = array("is_found"=>0);
				}

			return $response;
			
		}
		/***********************************************************
		* Method Name   	: checkFarmById
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkFarmById($farmId)
		{
			$where_cond = array("id"=>$farmId);
			$this->db->select("*");
			$this->db->from("da_farm");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return false;
			}
			else
			{
				return true;
			}
			
			
		}	
		/***********************************************************
		* Method Name   	: checkFarmById
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkFarmEqpById($farmId)
		{
			$where_cond = array("id"=>$farmId);
			$this->db->select("*");
			$this->db->from("da_farm_equipment");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return false;
			}
			else
			{
				return true;
			}
			
			
		}		
		/***********************************************************
		* Method Name   	: checkExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function getequipmentDetails($farmId)
		{
			$where_cond = array("farm_id"=>$farmId);
			$this->db->select("*");
			$this->db->from("da_farm_equipment");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$eqp_id = $result[0]->id;
				$response = array("is_exists"=>"1","eqp_id"=>$eqp_id);
			}
			else
			{
				$response = array("is_exists"=>"0");
			}
			return $response;
			
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
			if($this->db->update('da_farm_invite',$where_cond))
			{
				return true;
			}
			else
			{
				return false;
			}
			
			
		}		
		/***********************************************************
		* Method Name   	: equipmentDetails
		* Description       : save equipment details for farm equipments 
		* @Param            : farm_id,dairy_type,no_units,milk_line_size,air_injector,tank_capacity
		* @return           : json data
		********************************************/
		function equipmentDetails($parameter,$tank_capacity,$user_id ){
			$farmId = $parameter['farm_id'];
			$isExist=$this->checkFarmEqpById($farmId);
			if($isExist)
			{
				$insert = $this->db->insert("da_farm_equipment",$parameter);
				$create_date = date("Y-m-d");
				$insert_id = $this->db->insert_id();
				/* Save to Activity Log Start*/
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Equipment Details",'table_name'=>'da_farm_equipment','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save to Activity Log End*/					
			}
			else
			{
				$EqpDetail=$this->getequipmentDetails($farmId);
				$insert_id = $EqpDetail['eqp_id'];
				$create_date = date("Y-m-d");
				$parameterUpdate = array("dairy_type"=>$parameter['dairy_type'],"no_units"=>$parameter['no_units'],"milk_line_size"=>$parameter['milk_line_size'],"air_injector"=>$parameter['air_injector'],"update_date"=>$create_date,'updated_by'=>$user_id);	
				
				$this->db->where('farm_id',$farmId);
				$insert = $this->db->update("da_farm_equipment",$parameterUpdate);
				$create_date = date("Y-m-d");
				
				/* Delete Old Records */
				$this->db->where('farm_id',$farmId);
				$this->db->delete('da_farm_milk_tank');
				/* Save to Activity Log Start*/
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Update Farm Equipment Details",'table_name'=>'da_farm_equipment','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Save to Activity Log End*/					
				
			}
			if($insert){
			
				foreach($tank_capacity as $tank){
					$tank_data = array("farm_id"=>$farmId,"tank_capacity"=>$tank,"create_date"=>$create_date);
					$insert_tank = $this->db->insert("da_farm_milk_tank",$tank_data);
					$insert_id_mt = $this->db->insert_id();
					/* Save to Activity Log Start*/
					$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Milk Tank",'table_name'=>'da_farm_milk_tank','table_id'=>$insert_id_mt,'date_time'=>date('Y-m-d h:i:s'));
					$this->saveActivityLog($log_arr);
					/* Save to Activity Log End*/						
				}
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"1");
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: waterDetails
		* Description       : save water details for farm
		* @Param            : user_id,webservice_token and water_details array contains (farm_id,hot_water,cold_water,comments,date_test,sample_from,ph,coli_count,iron, total_plate,total_hardness)
		* @return           : json data
		********************************************/
		function waterDetails($water_details_data,$farm_id,$user_id){
			$create_date = date("Y-m-d"); 
			foreach($water_details_data as $water_details){
				$hot_water = $water_details["hot_water"];
				$cold_water = $water_details["cold_water"];
				$comments = $water_details["comments"];
				$date_test = $water_details["date_test"];
				$sample_from = $water_details["sample_from"];
				$ph = $water_details["ph"];
				$coli_count = $water_details["coli_count"];
				$iron = $water_details["iron"];
				$total_plate = $water_details["total_plate"];
				$total_hardness = $water_details["total_hardness"];
			
				$parameter = array("farm_id"=>$farm_id,"hot_water"=>$hot_water,"cold_water"=>$cold_water,"comments"=>$comments,"date_test"=>$date_test,"sample_from"=>$sample_from,"ph"=>$ph,"coli_count"=>$coli_count,"iron"=>$iron,"total_plate"=>$total_plate,"total_hardness"=>$total_hardness,"create_date"=>$create_date);
				$insert = $this->db->insert("da_farm_water_details",$parameter);
				$insert_id = $this->db->insert_id();
				/* Save to Activity Log Start*/
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Water Details",'table_name'=>'da_farm_water_details','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
			}
			if($insert){
				
				/* Save to Activity Log End*/
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"1");
			}
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: milkingMachineWash
		* Description       : save wash type and cycle details
		* @Param            : user_id,webservice_token,farm_id, reference_no and machine_wash array contains (sunday,monday,tuesday,wednesday,thursday,friday,saturday,wash_type)
		* @return           : json data
		********************************************/
		function milkingMachineWash($wash_details,$farm_id,$reference_no,$user_id){
			$create_date = date("Y-m-d"); 
			/* Update Reference No */
			$this->db->where('id',$farm_id);
			$this->db->update('da_farm',array('reference_number'=>$reference_no));
			foreach($wash_details as $wash_detail){
				$sunday = $wash_detail["sunday"];
				$monday = $wash_detail["monday"];
				$tuesday = $wash_detail["tuesday"];
				$wednesday = $wash_detail["wednesday"];
				$thursday = $wash_detail["thursday"];
				$friday = $wash_detail["friday"];
				$saturday = $wash_detail["saturday"];
				$wash_type = $wash_detail["wash_type"];
				$cycles = $wash_detail['cycle'];
				$parameter = array("farm_id"=>$farm_id,"sunday"=>$sunday,"monday"=>$monday,"tuesday"=>$tuesday,"wednesday"=>$wednesday,"thursday"=>$thursday,"friday"=>$friday,"saturday"=>$saturday,"wash_type"=>$wash_type,"create_date"=>$create_date);
				$insert = $this->db->insert("da_farm_machine_wash",$parameter);
				
				if($insert){
					$farm_machine_wash_id = $this->db->insert_id();
					/* Save to Activity Log Start*/
					$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Machine Wash",'table_name'=>'da_farm_machine_wash','table_id'=>$farm_machine_wash_id,'date_time'=>date('Y-m-d h:i:s'));
					$this->saveActivityLog($log_arr);
					/* Save to Activity Log End*/					
					foreach($cycles as $cycle){
						$description=$cycle['description'];
						$volume=$cycle['volume'];
						$cleanser_sensiter=$cycle['cleanser_sensiter'];
						$comments=$cycle['comments'];
						$temp_start=$cycle['temp_start'];
						$dose=$cycle['dose'];
						$cycle_data = array("farm_machine_wash_id"=>$farm_machine_wash_id,"description"=>$description,"volume"=>$volume,"cleanser_sensiter"=>$cleanser_sensiter,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"create_date"=>$create_date);
						$insert_cycle = $this->db->insert("da_farm_machine_wash_cycle",$cycle_data);
						$farm_machine_wash_cycle_id = $this->db->insert_id();
						/* Save to Activity Log Start*/
						$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Machine Wash Cycle",'table_name'=>'da_farm_machine_wash_cycle','table_id'=>$farm_machine_wash_cycle_id,'date_time'=>date('Y-m-d h:i:s'));
						$this->saveActivityLog($log_arr);
						/* Save to Activity Log End*/						
					}
				}				
			}
			if($insert_cycle){
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"1");
			}
			return $result;
		}
	
	
		/***********************************************************
		* Method Name   	: bulkMilkTankWash
		* Description       : save bulk milk cycle details
		* @Param            : user_id,webservice_token,farm_id and tank_wash_details array contains (milk_tank,description,volume,cleanser_sensiter,comments,temp_start,dose)
		* @return           : json data
		********************************************/
		function bulkMilkTankWash($water_details_data,$farm_id,$user_id){
			$create_date = date("Y-m-d");
			//foreach($tank_wash_details as $wash_detail){		
				foreach($water_details_data as $cycle){
					$milk_tank = $cycle["milk_tank"];
					$description=$cycle['description'];
					$volume=$cycle['volume'];
					$cleanser_sensiter=$cycle['cleanser_sensiter'];
					$comments=$cycle['comments'];
					$temp_start=$cycle['temp_start'];
					$dose=$cycle['dose'];
					$cycle_data = array("farm_id"=>$farm_id,"milk_tank"=>$milk_tank,"description"=>$description,"volume"=>$volume,"cleanser_sensiter"=>$cleanser_sensiter,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"create_date"=>$create_date);
					$insert = $this->db->insert("da_farm_milk_tank_wash_cycle",$cycle_data);
					$farm_machine_wash_cycle_id = $this->db->insert_id();
					/* Save to Activity Log Start*/
					$log_arr=array('user_id'=>$user_id,'activity_type'=>"Insert Farm Milk Tank Wash Cycle",'table_name'=>'da_farm_milk_tank_wash_cycle','table_id'=>$farm_machine_wash_cycle_id,'date_time'=>date('Y-m-d h:i:s'));
					$this->saveActivityLog($log_arr);
					/* Save to Activity Log End*/					
				}				
			//}
			if($insert){
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"1");
			}
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: getFarmData
		* Description       : Get Farm Data
		* @Param            : user_id,webservice_token,farm_id contains
		* @return           : json data
		********************************************/
		function getFarmData($farm_id,$user_id){
			$this->db->select("a.id as farm_id,a.name as farm_name,a.address as farm_adderess,a.post_code as farm_post_code,a.gps_cordinates as farm_gps_cordinates,a.primary_contact,a.user_id,a.secondary_contact,a.status as complete_status,a.create_date as farm_create_date");
			$this->db->from("da_farm as a");
			$where_cond = array('a.id'=>$farm_id,"a.user_id"=>$user_id);
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$primary_user=$this->getFarmUsersByID($result[0]->primary_contact);
				$primary_user_arr=array('id'=>$primary_user[0]->id,'first_name'=>$primary_user[0]->first_name,'last_name'=>$primary_user[0]->last_name,'email'=>$primary_user[0]->email,'mobile'=>$primary_user[0]->mobile);
				$secondary_user=$this->getFarmUsersByID($result[0]->secondary_contact);
				$secondary_user_arr=array('id'=>$secondary_user[0]->id,'first_name'=>$secondary_user[0]->first_name,'last_name'=>$secondary_user[0]->last_name,'email'=>$secondary_user[0]->email,'mobile'=>$secondary_user[0]->mobile);
				$farm_user=$this->getFarmUsersByID($result[0]->user_id);
				$farm_user_arr=array('id'=>$farm_user[0]->id,'first_name'=>$farm_user[0]->first_name,'last_name'=>$farm_user[0]->last_name,'email'=>$farm_user[0]->email,'mobile'=>$farm_user[0]->mobile);
				
				$response_farm_users = $this->getFarmUsers($farm_id);
				
				$new_result_arr=array('farm_id'=>$result[0]->farm_id,'farm_name'=>$result[0]->farm_name,'farm_address'=>$result[0]->farm_adderess,'farm_post_code'=>$result[0]->farm_post_code,'farm_gps_cordinates'=>$result[0]->farm_gps_cordinates,'complete_status'=>$result[0]->complete_status,'create_date'=>$result[0]->farm_create_date,'primary_contact'=>$primary_user_arr,'secondary_contact'=>$secondary_user_arr,'user_details'=>$farm_user_arr,'farm_users'=>$response_farm_users);
				$response = array("is_found"=>1,"data"=>array("farm_details"=>$new_result_arr));
			}
			
			else{
				$response = array("is_found"=>0);
			}
			return $response;
		}
		
/***********************************************************
		* Method Name   	: getFarmUsers
		* Description       : Get Invited Users
		* @Param            : user_id,webservice_token,farm_id contains
		* @return           : json data
		********************************************/
		function getFarmUsersByID($user_id){
			$this->db->select("a.id as id,a.first_name as first_name, a.last_name last_name,a.email as email,a.mobile");
			$this->db->from("da_user as a");
			$where_cond = array('a.id'=>$user_id);
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = $result;
			}
			
			else{
				$response = array();
			}
			return $response;
		}		
		
		/***********************************************************
		* Method Name   	: getFarmList
		* Description       : Get Farm List
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getFarmList($user_id){
			$this->db->select("a.id as farm_id,a.name as farm_name,a.address as farm_address,a.post_code as farm_post_code,a.gps_cordinates as farm_gps_cordinates,a.status as complete_status,a.create_date as farm_create_date,count(d.user_id) as user_count,a.user_id");
			/* $this->db->select("a.id as farm_id,a.name as farm_name,a.address as farm_address,a.post_code as farm_post_code,a.gps_cordinates as farm_gps_cordinates,a.status as complete_status,a.create_date as farm_create_date,c.first_name as user_first_name,c.last_name as user_last_name,c.email as user_email,c.mobile as user_mobile"); */
			$this->db->from("da_farm as a");
			$where_cond = array("a.user_id"=>$user_id);
			/* $this->db->join("da_user as c","c.id=a.user_id"); **/
			$this->db->join("da_farm_invite as d","d.farm_id=a.id");
			
			$this->db->group_by('a.id');
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$result_new_arr=array();
				$result_invite_arr=$this->getFarmListInvited($user_id);
				foreach($result as $farmlist)
				{
					$farm_user=$this->getFarmUsersByID($farmlist->user_id);
					$result_new_arr[]=array('farm_id'=>$farmlist->farm_id,'farm_name'=>$farmlist->farm_name,'farm_address'=>$farmlist->farm_address,'farm_post_code'=>$farmlist->farm_post_code,'farm_gps_cordinates'=>$farmlist->farm_gps_cordinates,'complete_status'=>$farmlist->complete_status,'create_date'=>$farmlist->farm_create_date,'user_count'=>$farmlist->user_count,'user_details'=>array('id'=>$farm_user[0]->id,'first_name'=>$farm_user[0]->first_name,'last_name'=>$farm_user[0]->last_name,'email'=>$farm_user[0]->email,'email'=>$farm_user[0]->email));
					
				}
				if(!empty($result_invite_arr))
				{
					foreach($result_invite_arr as $farmlist)
					{
						$farm_user=$this->getFarmUsersByID($farmlist->user_id);
						$result_new_arr[]=array('farm_id'=>$farmlist->farm_id,'farm_name'=>$farmlist->farm_name,'farm_address'=>$farmlist->farm_address,'farm_post_code'=>$farmlist->farm_post_code,'farm_gps_cordinates'=>$farmlist->farm_gps_cordinates,'complete_status'=>$farmlist->complete_status,'create_date'=>$farmlist->farm_create_date,'user_count'=>$farmlist->user_count,'user_details'=>array('id'=>$farm_user[0]->id,'first_name'=>$farm_user[0]->first_name,'last_name'=>$farm_user[0]->last_name,'email'=>$farm_user[0]->email,'email'=>$farm_user[0]->email));
						
					}					
				}
				
				$response = array("is_found"=>1,"data"=>$result_new_arr);
			}
			
			else{
				$response = array("is_found"=>0);
			}
			return $response;
		}
		/***********************************************************
		* Method Name   	: getFarmList
		* Description       : Get Farm List
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getFarmListInvited($user_id){
			$this->db->select("a.id as farm_id,a.name as farm_name,a.address as farm_address,a.post_code as farm_post_code,a.gps_cordinates as farm_gps_cordinates,a.status as complete_status,a.create_date as farm_create_date,count(d.user_id) as user_count,a.user_id");
			/* $this->db->select("a.id as farm_id,a.name as farm_name,a.address as farm_address,a.post_code as farm_post_code,a.gps_cordinates as farm_gps_cordinates,a.status as complete_status,a.create_date as farm_create_date,c.first_name as user_first_name,c.last_name as user_last_name,c.email as user_email,c.mobile as user_mobile"); */
			$this->db->from("da_farm as a");
			$where_cond = array("d.user_id"=>$user_id,'d.status'=>"1");
			/* $this->db->join("da_user as c","c.id=a.user_id"); **/
			$this->db->join("da_farm_invite as d","d.farm_id=a.id");
			
			$this->db->group_by('a.id');
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
			}
			
			else{
				$result = array();
			}
			return $result;
		}		
		/***********************************************************
		* Method Name   	: getInvitedUsers
		* Description       : Get Invited Users
		* @Param            : user_id,webservice_token,farm_id contains
		* @return           : json data
		********************************************/
		function getInvitedUsers($farm_id,$user_id){
			$this->db->select("c.id,c.first_name,c.last_name,c.email,c.mobile");
			$this->db->from("da_farm as a");
			$where_cond = array('a.id'=>$farm_id,"a.user_id"=>$user_id,"b.invite_name"=>"Farm");
			$this->db->join("da_invite as b","b.table_id=a.id");
			$this->db->join("da_user as c","c.id=b.user_id");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = array("is_found"=>1,"data"=>$result);
			}
			
			else{
				$response = array("is_found"=>0);
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: getFarmUsers
		* Description       : Get Invited Users
		* @Param            : user_id,webservice_token,farm_id contains
		* @return           : json data
		********************************************/
		function getFarmUsers($farm_id){
			$this->db->select("b.id as id,b.first_name as first_name, b.last_name last_name,b.email as email,b.mobile,a.status as invite_status");
			$this->db->from("da_farm_invite as a");
			$this->db->join("da_user as b","b.id=a.user_id");
			$where_cond = array('a.farm_id'=>$farm_id);
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = $result;
			}
			
			else{
				$response = array();
			}
			return $response;
		}		
		/***********************************************************
		* Method Name   	: getActionsListName
		* Description       : Get Action List Name
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getActionsListName($table,$user_id,$close_status,$table_invite){
			$this->db->select("a.id as action_id,a.name as action_name,a.create_date as create_date,a.complete_status as complete_status,a.user_id");
			$this->db->from("$table as a");
			$where_cond = array("a.user_id"=>$user_id,"a.close_status"=>$close_status);
			/* $this->db->join("da_user as c","c.id=a.user_id"); */
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$result_new_arr=array();
				$result_new_arr_invited=$this->getActionsListNameInvited($table,$user_id,$close_status,$table_invite);
				
				foreach($result as $action_list)
				{
					$action_users=$this->getFarmUsersByID($action_list->user_id);
					$result_new_arr['action_details'][]=array('action_id'=>$action_list->action_id,'action_name'=>$action_list->action_name,'create_date'=>$action_list->create_date,'complete_status'=>$action_list->complete_status,'user_details'=>$action_users);
				}
				/* Invited Action List */
				if(!empty($result_new_arr_invited))
				{
					foreach($result_new_arr_invited as $action_list)
					{
						$action_users=$this->getFarmUsersByID($action_list->user_id);
						$result_new_arr['action_details'][]=array('action_id'=>$action_list->action_id,'action_name'=>$action_list->action_name,'create_date'=>$action_list->create_date,'complete_status'=>$action_list->complete_status,'user_details'=>$action_users);
					}					
				}
				
				$response = $result_new_arr;
			}
			
			else{
				$response = array();
			}
			return $response;
		}
		/***********************************************************
		* Method Name   	: getActionsListName
		* Description       : Get Action List Name
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getActionsListNameInvited($table,$user_id,$close_status,$table_invite){
			$this->db->select("a.id as action_id,a.name as action_name,a.create_date as create_date,a.complete_status as complete_status,a.user_id");
			$this->db->from("$table as a");
			$where_cond = array("c.user_id"=>$user_id,"a.close_status"=>$close_status,'c.status'=>"1");
			
			$this->db->join("$table_invite as c","c.table_id=a.id");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = $result;
			}
			
			else{
				$response = array();
			}
			
			return $response;
		}		
				/***********************************************************
		* Method Name   	: getActionsListProgramName
		* Description       : Get Action List Program Name
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getActionsListProgramName($table,$user_id,$close_status,$table_invite){
			$this->db->select("a.id as action_id,a.program_name as action_name,a.create_date as create_date,a.complete_status as complete_status,a.user_id");
			$this->db->from("$table as a");
			$where_cond = array("a.user_id"=>$user_id,"a.close_status"=>$close_status);
			/* $this->db->join("da_user as c","c.id=a.user_id");*/
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$result_new_arr=array();
				$result_new_arr_invited=$this->getActionsListProgramNameInvited($table,$user_id,$close_status,$table_invite);
				foreach($result as $action_list)
				{
					$action_users=$this->getFarmUsersByID($action_list->user_id);
					$result_new_arr['action_details'][]=array('action_id'=>$action_list->action_id,'action_name'=>$action_list->action_name,'create_date'=>$action_list->create_date,'complete_status'=>$action_list->complete_status,'user_details'=>$action_users);
				}
				/* Invited Action List */
				if(!empty($result_new_arr_invited))
				{
					foreach($result_new_arr_invited as $action_list)
					{
						$action_users=$this->getFarmUsersByID($action_list->user_id);
						$result_new_arr['action_details'][]=array('action_id'=>$action_list->action_id,'action_name'=>$action_list->action_name,'create_date'=>$action_list->create_date,'complete_status'=>$action_list->complete_status,'user_details'=>$action_users);
					}					
				}				
				$response = $result_new_arr;				
			}
			
			else{
				$response = array();
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: getActionsListName
		* Description       : Get Action List Name
		* @Param            : user_id,webservice_token
		* @return           : json data
		********************************************/
		function getActionsListProgramNameInvited($table,$user_id,$close_status,$table_invite){
			$this->db->select("a.id as action_id,a.program_name as action_name,a.create_date as create_date,a.complete_status as complete_status,a.user_id");
			$this->db->from("$table as a");
			$where_cond = array("c.user_id"=>$user_id,"a.close_status"=>$close_status,'c.status'=>"1");
			
			$this->db->join("$table_invite as c","c.table_id=a.id");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = $result;
			}
			
			else{
				$response = array();
			}
			
			return $response;
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
	}
?>