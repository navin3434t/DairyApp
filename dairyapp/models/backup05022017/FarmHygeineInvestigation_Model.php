<?php
	class FarmHygeineInvestigation_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: investigationStep1
		* Description       : Farm Hygeine Investigation Step1
		* @Param            : All Farm Hygeine Investigation Step1  fields   
		* @return           : json data
		********************************************/
		function investigationStep1($data_arr)
		{
			$insert = $this->db->insert("da_farm_hygiene_investigation",$data_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$data_arr['user_id'],'activity_type'=>"Create Hygeine Investigation Step1",'table_name'=>'da_farm_hygiene_investigation','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1",'fhi_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: investigationStep1Update
		* Description       : Farm Hygeine Investigation Step1
		* @Param            : All Farm Hygeine Investigation Step1  fields   
		* @return           : json data
		********************************************/
		function investigationStep1Update($data_arr,$fhi_id)
		{
			$this->db->where('id',$fhi_id);
			$insert = $this->db->update("da_farm_hygiene_investigation",$data_arr);
			$insert_id = $fhi_id;
			if($insert)
			{
				$log_arr=array('user_id'=>$data_arr['updated_by'],'activity_type'=>"Update Hygeine Investigation Step1",'table_name'=>'da_farm_hygiene_investigation','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1",'fhi_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}		
		/***********************************************************
		* Method Name   	: investigationStep1Get
		* Description       : get Email by fhi_id
		* @Param            : uid   
		* @return           : json data
		********************************************/
		function investigationStep1Get($fhi_id){
			$this->db->select("*");
			$this->db->from("da_farm_hygiene_investigation");
			$this->db->where("id",$fhi_id);
			$query =$this->db->get();
			if($query->num_rows()>0){
				$result= $query->result();
				return $result;
			}
			else{
				return false;
			}
		}	
			
		/***********************************************************
		* Method Name   	: investigationStep2
		* Description       : Farm Hygeine Investigation Step2
		* @Param            : All Farm Hygeine Investigation Step2  fields   
		* @return           : json data
		********************************************/
		function investigationStep2($data_arr,$fhi_id,$user_id)
		{
			$this->db->where("id",$fhi_id);
			$update = $this->db->update("da_farm_hygiene_investigation",$data_arr);
			$insert_id = $fhi_id;
			if($update)
			{
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Update Hygeine Investigation Step2",'table_name'=>'da_farm_hygiene_investigation','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1",'fhi_id'=>$insert_id);
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;
		}	
		/***********************************************************
		* Method Name   	: investigationStep3
		* Description       : Farm Hygeine Investigation Step2
		* @Param            : All Farm Hygeine Investigation Step2  fields   
		* @return           : json data
		********************************************/
		function investigationStep3($data_arr,$fhi_id,$user_id)
		{
			foreach($data_arr as $data)
			{
				$hot_water=(isset($data['hot_water'])?$data['hot_water']:"");
				$cold_water=(isset($data['cold_water'])?$data['cold_water']:"");
				$test_date=(isset($data['test_date'])?$data['test_date']:date("Y-m-d"));
				$sample_from=(isset($data['sample_from'])?$data['sample_from']:"");
				$ph=(isset($data['ph'])?$data['ph']:"");
				$e_coli_count=(isset($data['e_coli_count'])?$data['e_coli_count']:"");
				$iron=(isset($data['iron'])?$data['iron']:"");
				$total_plate_count=(isset($data['total_plate_count'])?$data['total_plate_count']:"");
				$total_hardness=(isset($data['total_hardness'])?$data['total_hardness']:"");
				$comments=(isset($data['comments'])?$data['comments']:"");
				$data_insert=array('hot_water'=>$hot_water,'cold_water'=>$cold_water,'test_date'=>$test_date,'sample_from'=>$sample_from,'ph'=>$ph,'e_coli_count'=>$e_coli_count,'iron'=>$iron,'total_plate_count'=>$total_plate_count,'total_hardness'=>$total_hardness,'comments'=>$comments,'fhi_id'=>$fhi_id);
				$this->db->insert("da_fhi_water",$data_insert);
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step3",'table_name'=>'da_fhi_water','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			$result = array("is_insert"=>"1",'fhi_id'=>$fhi_id);
			return $result;
		}		
		/***********************************************************
		* Method Name   	: investigationStep4
		* Description       : Farm Hygeine Investigation Step4
		* @Param            : All Farm Hygeine Investigation Step4  fields   
		* @return           : json data
		********************************************/
		function investigationStep4($data_arr,$fhi_id,$user_id)
		{
			foreach($data_arr as $data)
			{
				$name=(isset($data['name'])?$data['name']:"");
				$clean=(isset($data['clean'])?$data['clean']:"");
				$deposit_found=(isset($data['deposit_found'])?$data['deposit_found']:'');
				$dirty=(isset($data['dirty'])?$data['dirty']:"");
				$deposit_not_found=(isset($data['deposit_not_found'])?$data['deposit_not_found']:"");
				$condition=(isset($data['condition'])?$data['condition']:"");
				$comment=(isset($data['comment'])?$data['comment']:"");
				$image=(isset($data['image'])?$data['image']:"");
				$pass=(isset($data['pass'])?$data['pass']:"");
				$fail=(isset($data['fail'])?$data['fail']:"");
				$data_insert=array('name'=>$name,'clean'=>$clean,'deposit_found'=>$deposit_found,'dirty'=>$dirty,'deposit_not_found'=>$deposit_not_found,'condition'=>$condition,'comment'=>$comment,'image'=>$image,'pass'=>$pass,'fail'=>$fail,'fhi_id'=>$fhi_id);
				$this->db->insert("da_fhi_equipment_inspection",$data_insert);
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_equipment_inspection','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			$result = array("is_insert"=>"1",'fhi_id'=>$fhi_id);
			return $result;
		
		}	
		/***********************************************************
		* Method Name   	: investigationStep5
		* Description       : Farm Hygeine Investigation Step5
		* @Param            : All Farm Hygeine Investigation Step5  fields   
		* @return           : json data
		********************************************/
		function investigationStep5($data_assessment,$data_cycle,$fhi_id,$user_id)
		{
			$insert = $this->db->insert("da_fhi_wash_assessment",$data_assessment);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				foreach($data_cycle as $data)
				{
					$description=(isset($data['description'])?$data['description']:"");
					$volume=(isset($data['volume'])?$data['volume']:"");
					$cleaner_sanitiser=(isset($data['cleaner_sanitiser'])?$data['cleaner_sanitiser']:'');
					$start_temp=(isset($data['start_temp'])?$data['start_temp']:"");
					$comments=(isset($data['comments'])?$data['comments']:"");
					$dose=(isset($data['dose'])?$data['dose']:"");
					$pass=(isset($data['pass'])?$data['pass']:"");
					$fail=(isset($data['fail'])?$data['fail']:"");
					$data_insert=array('description'=>$description,'volume'=>$volume,'cleaner_sanitiser'=>$cleaner_sanitiser,'start_temp'=>$start_temp,'comments'=>$comments,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'fhiwac_id'=>$insert_id);
					$this->db->insert("da_fhi_wash_assessment_cycle",$data_insert);
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_wash_assessment','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1",'fhi_id'=>$fhi_id);
				
			}
			else
			{
				$result = array("is_insert"=>"0");				
			}
			return $result;
		
		}
		/***********************************************************
		* Method Name   	: investigationStep6
		* Description       : Farm Hygeine Investigation Step6
		* @Param            : All Farm Hygeine Investigation Step6  fields   
		* @return           : json data
		********************************************/
		function investigationStep6($data_arr,$fhi_id,$user_id)
		{
			foreach($data_arr as $data)
			{
				$alkali_ph_level=(isset($data['alkali_ph_level'])?$data['alkali_ph_level']:"");
				$wash_active=(isset($data['wash_active'])?$data['wash_active']:"");
				$chlorine_level=(isset($data['chlorine_level'])?$data['chlorine_level']:'');
				$acid_ph_level=(isset($data['acid_ph_level'])?$data['acid_ph_level']:"");
				$sanitiser_ph_level=(isset($data['sanitiser_ph_level'])?$data['sanitiser_ph_level']:"");
				$data_insert=array('alkali_ph_level'=>$alkali_ph_level,'wash_active'=>$wash_active,'chlorine_level'=>$chlorine_level,'acid_ph_level'=>$acid_ph_level,'sanitiser_ph_level'=>$sanitiser_ph_level,'fhi_id'=>$fhi_id);
				$this->db->insert("da_fhi_cleaning_solution",$data_insert);
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step6",'table_name'=>'da_fhi_cleaning_solution','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			$result = array("is_insert"=>"1",'fhi_id'=>$fhi_id);
			return $result;
		
		}
		/***********************************************************
		* Method Name   	: investigationStep7
		* Description       : Farm Hygeine Investigation Step7
		* @Param            : All Farm Hygeine Investigation Step7  fields   
		* @return           : json data
		********************************************/
		function investigationStep7($data_assessment,$user_id)
		{
			$insert = $this->db->insert("da_fhi_cip_assetsment",$data_assessment);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step7",'table_name'=>'da_fhi_cip_assetsment','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1");
				
			}
			else
			{
				$result = array("is_insert"=>"0");					
			}
			return $result;
		
		}
		/***********************************************************
		* Method Name   	: investigationStep8
		* Description       : Farm Hygeine Investigation Step8
		* @Param            : All Farm Hygeine Investigation Step8  fields   
		* @return           : json data
		********************************************/
		function investigationStep8($data_assessment,$user_id)
		{
			$insert = $this->db->insert("da_fhi_slug_assessment",$data_assessment);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step8",'table_name'=>'da_fhi_slug_assessment','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1");
				
			}
			else
			{
				$result = array("is_insert"=>"0");					
			}
			return $result;
		
		}
		/***********************************************************
		* Method Name   	: investigationStep9
		* Description       : Farm Hygeine Investigation Step9
		* @Param            : All Farm Hygeine Investigation Step9  fields   
		* @return           : json data
		********************************************/
		function investigationStep9($data_arr,$data_arr_unit,$fhi_id,$user_id)
		{
			$insert = $this->db->insert("da_fhi_flow_rate",$data_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{			
				foreach($data_arr_unit as $data)
				{
					$unit_no=(isset($data['unit_no'])?$data['unit_no']:"");
					$letter_line=(isset($data['letter_line'])?$data['letter_line']:'');
					$volume_collected=(isset($data['volume_collected'])?$data['volume_collected']:"");
					$time_elapsed=(isset($data['time_elapsed'])?$data['time_elapsed']:"");
					$flow_rate=(isset($data['flow_rate'])?$data['flow_rate']:"");
					$pass_fail=(isset($data['pass_fail'])?$data['pass_fail']:"");
					$data_insert=array('unit_no'=>$unit_no,'letter_line'=>$letter_line,'volume_collected'=>$volume_collected,'time_elapsed'=>$time_elapsed,'flow_rate'=>$flow_rate,'pass_fail'=>$pass_fail,'fhi_flow_rate_id'=>$insert_id);
					$this->db->insert("da_fhi_flow_rate_cycle",$data_insert);
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_flow_rate','table_id'=>$insert_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				$result = array("is_insert"=>"1");
			}
			else
			{
				$result = array("is_insert"=>"0");					
			}
			return $result;			
		
		}
		/***********************************************************
		* Method Name   	: investigationStep10
		* Description       : Farm Hygeine Investigation Step10
		* @Param            : All Farm Hygeine Investigation Step10  fields   
		* @return           : json data
		********************************************/
		function investigationStep10($milk_tank_arr,$milk_cycle_arr,$fhi_id,$user_id)
		{
			$insert = $this->db->insert("da_fhi_program_assessment",$milk_tank_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{			
				foreach($milk_cycle_arr as $cycle_arr)
				{
					$cycling_description=(isset($cycle_arr['cycling_description'])?$cycle_arr['cycling_description']:"");
					$volume=(isset($cycle_arr['volume'])?$cycle_arr['volume']:"");
					$cleanser_sanitiser=(isset($cycle_arr['cleanser_sanitiser'])?$cycle_arr['cleanser_sanitiser']:"");
					$temp_start=(isset($cycle_arr['temp_start'])?$cycle_arr['temp_start']:"");
					$comment=(isset($cycle_arr['comment'])?$cycle_arr['comment']:"");
					$dose=(isset($cycle_arr['dose'])?$cycle_arr['dose']:"");
					$pass=(isset($cycle_arr['pass'])?$cycle_arr['pass']:"");
					$fail=(isset($cycle_arr['fail'])?$cycle_arr['fail']:"");
					$milk_tank=(isset($cycle_arr['milk_tank'])?$cycle_arr['milk_tank']:"");
					$cycle_data=array('fhi_pa'=>$insert_id,'cycle_description'=>$cycling_description,'volume'=>$volume,'cleanser_sanitiser'=>$cleanser_sanitiser,'temp_start'=>$temp_start,'comments'=>$comment,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'milk_tank'=>$milk_tank);
					$this->db->insert("da_fhi_program_assessment_cycle",$cycle_data);
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_program_assessment','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				/* Investigation Complete Status */
				$data_status=array("complete_status"=>"1");
				$this->updateInvestigationComepleteStatus($data_status,$fhi_id);
				$result = array("is_insert"=>"1");
			}
			else
			{
				$result = array("is_insert"=>"0");					
			}
			return $result;
		
		}		
		/***********************************************************
		* Method Name   	: bulkMilkTankCleaning
		* Description       : Farm Hygeine Investigation Bulk Milk Tank Cleanng
		* @Param            : All Farm Hygeine Investigation Step10  fields   
		* @return           : json data
		********************************************/
		function bulkMilkTankCleaning($milk_tank_arr,$fhi_id,$user_id)
		{
			$insert = $this->db->insert("da_fhi_milk_tank_cleaning",$milk_tank_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{			
				
				$result = array("is_insert"=>"1");
			}
			else
			{
				$result = array("is_insert"=>"0");					
			}
			return $result;
		
		}	
		/***********************************************************
		* Method Name   	: completeInvestigation
		* Description       : Upate Hygeine Investigation Complete Status
		* @Param            : activity log data    
		* @return           : 
		********************************************/		
		function completeInvestigation($data_status,$fhi_id)
		{
			$this->db->where("id",$fhi_id);
			if($this->db->update("da_farm_hygiene_investigation",$data_status))
			{
				return true;
			}
			else
			{
				return false;
			}
		}		
		/***********************************************************
		* Method Name   	: updateInvestigationComepleteStatus
		* Description       : Upate Hygeine Investigation Complete Status
		* @Param            : activity log data    
		* @return           : 
		********************************************/		
		function updateInvestigationComepleteStatus($data_status,$fhi_id)
		{
			$this->db->where("id",$fhi_id);
			if($this->db->update("da_farm_hygiene_investigation",$data_status))
			{
				return true;
			}
			else
			{
				return false;
			}
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
		/***********************************************************
		* Method Name   	: checkValidInvestigation
		* Description       : Validate Investigation with id 
		* @Param            : fhi_id    
		* @return           : 
		********************************************/		
		function checkValidInvestigation($fhi_id)
		{
			$this->db->select("*");
			$this->db->from("da_farm_hygiene_investigation");
			$this->db->where("id",$fhi_id);
			$query=$this->db->get();
			if($query->num_rows()>0)
			{
				return true;
			}
			{
				return false;
			}
		}
		/***********************************************************
		* Method Name   	: investigationRecommendation1
		* Description       : Farm Hygeine Investigation Recommendation 1
		* @Param            : All Farm Hygeine Investigation Recommendation Step1  fields    
		* @return           : json data
		********************************************/
		public function investigationRecommendation1($action_data,$fhi_id,$user_id
		){
					
			foreach($action_data as $action_arr)
			{
				$action_name=(isset($action_arr['action_name'])?$action_arr['action_name']:"");
				$assign_to=(isset($action_arr['assign_to'])?$action_arr['assign_to']:"");
				$completion_date=(isset($action_arr['completion_date'])?$action_arr['completion_date']:"");
				
				$recommendation1_data=array('fhi_id'=>$fhi_id,'action_name'=>$action_name,'assign_to'=>$assign_to,'completion_date'=>$completion_date,"create_date"=>date('Y-m-d'),"created_by"=>$user_id);
				$this->db->insert("da_fhi_recommendation1",$recommendation1_data);
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation1",'table_name'=>'da_fhi_recommendation1','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);

			$result = array("is_insert"=>"1");
			
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: investigationRecommendation2
		* Description       : Farm Hygeine Investigation Recommendation 2
		* @Param            : All Farm Hygeine Investigation Recommendation Step2
		* @return           : json data
		********************************************/
		function investigationRecommendation2($milking_machine_data,$machine_wash_data,$fhi_id,$user_id){
			$insert = $this->db->insert("da_fhi_recommendation2",$milking_machine_data);
			$insert_id = $this->db->insert_id();
			if($insert)
			{						
				foreach($machine_wash_data as $wash_detail){
					$sunday = $wash_detail["sunday"];
					$monday = $wash_detail["monday"];
					$tuesday = $wash_detail["tuesday"];
					$wednesday = $wash_detail["wednesday"];
					$thursday = $wash_detail["thursday"];
					$friday = $wash_detail["friday"];
					$saturday = $wash_detail["saturday"];
					$wash_type = $wash_detail["wash_type"];
					$cycles = $wash_detail['cycle'];
					$parameter = array("fhi_recommendation2_id"=>$insert_id,"sunday"=>$sunday,"monday"=>$monday,"tuesday"=>$tuesday,"wednesday"=>$wednesday,"thursday"=>$thursday,"friday"=>$friday,"saturday"=>$saturday,"wash_type"=>$wash_type);
					$insert_days = $this->db->insert("da_fhi_recommendation2_days",$parameter);
					if($insert_days){
						$machine_wash_days_id = $this->db->insert_id();						
						foreach($cycles as $cycle){
							$description=$cycle['description'];
							$volume=$cycle['volume'];
							$cleaner_sanitiser=$cycle['cleaner_sanitiser'];
							$comments=$cycle['comments'];
							$temp_start=$cycle['temp_start'];
							$dose=$cycle['dose'];
							$temp_dump=$cycle['temp_dump'];
							$cycle_data = array("fhi_recommendation2_days_id"=>$machine_wash_days_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"temp_dump"=>$temp_dump);
							$insert_cycle = $this->db->insert("da_fhi_recommendation2_cycle",$cycle_data);
						}
					}				
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation2",'table_name'=>'da_fhi_recommendation2','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"1");
				}
			}
				return $result;
		}
		
		/***********************************************************
		* Method Name   	: investigationRecommendation3
		* Description       : Farm Hygeine Investigation Recommendation 3
		* @Param            : All Farm Hygeine Investigation Recommendation Step3
		* @return           : json data
		********************************************/
		function investigationRecommendation3($recommend3_data,$cycle_arr,$fhi_id,$user_id){
			$insert = $this->db->insert("da_fhi_recommendation3",$recommend3_data);
			$insert_id = $this->db->insert_id();
			if($insert)
			{						
				foreach($cycle_arr as $cycle){	
					$description=$cycle['description'];
					$volume=$cycle['volume'];
					$cleaner_sanitiser=$cycle['cleaner_sanitiser'];
					$comments=$cycle['comments'];
					$temp_start=$cycle['temp_start'];
					$dose=$cycle['dose'];
					$temp_dump = $cycle['temp_dump'];
					$cycle_data = array("fhi_recommendation3_id"=>$insert_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"temp_dump"=>$temp_dump);
					$insert_cycle = $this->db->insert("da_fhi_recommendation3_cycle",$cycle_data);
						
									
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation3",'table_name'=>'da_fhi_recommendation3','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"1");
				}
			}
				return $result;
		}
		/***********************************************************
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInvite($invite_data,$user_id,$mtc_id)
		{
			$this->db->where('id', $mtc_id);
			$final = array("complete_status"=>1);
			$this->db->update('da_milk_tank_cleaning',$final);
			foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				if($is_exist==1){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						$where_cond = array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygiene_investigation");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else
					{
						$response = array("invite_sent"=>"3");	
					}
				}
				else{
					$email = (isset($invite['email'])?$invite['email']:"");
					$this->db->select("*");
					$this->db->from("da_user");
					$this->db->where("email",$email);
					$row = $this->db->get();
					if($row->num_rows()>0){
						$result =$row->result();
						$uid= $result[0]->id;
						$emailid = $this->getEmail($uid);
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygiene_investigation");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");	
						}
					}
					else{
						$user_data = array("email"=>$email,"registration_status"=>0);
						$insert_user = $this->db->insert("da_user",$user_data);
						$uid = $this->db->insert_id();
						
						$where_cond =  array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygiene_investigation");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){	
							$response = array("invite_sent"=>"0");	
						}
						else{
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");
						}
					}
				}
			}	
			return $response;
		}
		/***********************************************************
		* Method Name   	: getEmail
		* Description       : get Email by user id
		* @Param            : uid   
		* @return           : json data
		********************************************/
		function getEmail($uid){
			$this->db->select("email");
			$this->db->from("da_user");
			$this->db->where("id",$uid);
			$query =$this->db->get();
			if($query->num_rows()>0){
				$result= $query->result();
				return $result;
			}
			else{
				return false;
			}
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
			if($this->db->update('da_invite_hygiene_investigation',$where_cond))
			{
				return true;
			}
			else
			{
				return false;
			}
			
			
		}		

	}