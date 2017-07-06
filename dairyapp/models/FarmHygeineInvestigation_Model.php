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
		* Method Name   	: investigationStep1offline
		* Description       : Farm Hygeine Investigation Step1
		* @Param            : All Farm Hygeine Investigation Step1  fields   
		* @return           : json data
		********************************************/
		function investigationStep1offline($data_arr)
		{
			$local_db_id= $data_arr['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_farm_hygiene_investigation');
			
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
		* Description       : Farm Hygeine Investigation Step3
		* @Param            : All Farm Hygeine Investigation Step3  fields   
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
		* Method Name   	: investigationStep3offline
		* Description       : Farm Hygeine Investigation Step3
		* @Param            : All Farm Hygeine Investigation Step3  fields   
		* @return           : json data
		********************************************/
		function investigationStep3offline($data_arr,$fhi_id,$user_id,$local_db_id)
		{
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_water');
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
				$data_insert=array('hot_water'=>$hot_water,'cold_water'=>$cold_water,'test_date'=>$test_date,'sample_from'=>$sample_from,'ph'=>$ph,'e_coli_count'=>$e_coli_count,'iron'=>$iron,'total_plate_count'=>$total_plate_count,'total_hardness'=>$total_hardness,'comments'=>$comments,'fhi_id'=>$fhi_id,'local_db_id'=>$local_db_id);
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
		* Method Name   	: investigationStep4offline
		* Description       : Farm Hygeine Investigation Step4
		* @Param            : All Farm Hygeine Investigation Step4  fields   
		* @return           : json data
		********************************************/
		function investigationStep4offline($data_arr,$fhi_id,$user_id,$local_db_id)
		{
			/* Delete   */
			
			$this->db->where('local_db_id',$local_db_id);
			$isDelete=$this->db->delete('da_fhi_equipment_inspection');
			if($isDelete)
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
				$data_insert=array('name'=>$name,'clean'=>$clean,'deposit_found'=>$deposit_found,'dirty'=>$dirty,'deposit_not_found'=>$deposit_not_found,'condition'=>$condition,'comment'=>$comment,'image'=>$image,'pass'=>$pass,'fail'=>$fail,'fhi_id'=>$fhi_id,'local_db_id'=>$local_db_id);
				$this->db->insert("da_fhi_equipment_inspection",$data_insert);
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_equipment_inspection','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			$result = array("is_insert"=>"1",'fhi_id'=>$fhi_id);
			return $result;
			}
			
				
		
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
					$data_insert=array('description'=>$description,'volume'=>$volume,'cleaner_sanitiser'=>$cleaner_sanitiser,'start_temp'=>$start_temp,'comments'=>$comments,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'fhiwac_id'=>$insert_id,'');
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
		* Method Name   	: investigationStep5offline
		* Description       : Farm Hygeine Investigation Step5 offline
		* @Param            : All Farm Hygeine Investigation Step5  fields   
		* @return           : json data
		********************************************/
		function investigationStep5offline($data_assessment,$data_cycle,$fhi_id,$user_id)
		{
			$local_db_id = $data_assessment['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_wash_assessment');
			
			$insert = $this->db->insert("da_fhi_wash_assessment",$data_assessment);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				if(!empty($data_cycle))
				{
					/* Delete   */
					$this->db->where('local_db_id',$local_db_id);
					$this->db->delete('da_fhi_wash_assessment_cycle');
				
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
						$dump_temperature=(isset($data['dump_temperature'])?$data['dump_temperature']:"");
						$data_insert=array('description'=>$description,'volume'=>$volume,'cleaner_sanitiser'=>$cleaner_sanitiser,'start_temp'=>$start_temp,'comments'=>$comments,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'fhiwac_id'=>$insert_id,'local_db_id'=>$local_db_id,'dump_temperature'=>$dump_temperature);
						$this->db->insert("da_fhi_wash_assessment_cycle",$data_insert);
					}
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
		* Method Name   	: investigationStep6offline
		* Description       : Farm Hygeine Investigation Step6
		* @Param            : All Farm Hygeine Investigation Step6  fields   
		* @return           : json data
		********************************************/
		function investigationStep6offline($data_arr,$fhi_id,$user_id,$local_db_id)
		{
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_cleaning_solution');
			foreach($data_arr as $data)
			{
				$alkali_ph_level=(isset($data['alkali_ph_level'])?$data['alkali_ph_level']:"");
				$wash_active=(isset($data['wash_active'])?$data['wash_active']:"");
				$chlorine_level=(isset($data['chlorine_level'])?$data['chlorine_level']:'');
				$acid_ph_level=(isset($data['acid_ph_level'])?$data['acid_ph_level']:"");
				$sanitiser_ph_level=(isset($data['sanitiser_ph_level'])?$data['sanitiser_ph_level']:"");
				$data_insert=array('alkali_ph_level'=>$alkali_ph_level,'wash_active'=>$wash_active,'chlorine_level'=>$chlorine_level,'acid_ph_level'=>$acid_ph_level,'sanitiser_ph_level'=>$sanitiser_ph_level,'fhi_id'=>$fhi_id,'local_db_id'=>$local_db_id);
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
		* Method Name   	: investigationStep7offline
		* Description       : Farm Hygeine Investigation Step7
		* @Param            : All Farm Hygeine Investigation Step7  fields   
		* @return           : json data
		********************************************/
		function investigationStep7offline($data_assessment,$user_id)
		{
			$local_db_id = $data_assessment['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_cip_assetsment');
			/*Insert*/
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
		* Method Name   	: investigationStep8offline
		* Description       : Farm Hygeine Investigation Step8
		* @Param            : All Farm Hygeine Investigation Step8  fields   
		* @return           : json data
		********************************************/
		function investigationStep8offline($data_assessment,$user_id)
		{
			$local_db_id = $data_assessment['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_slug_assessment');
			/*Insert*/
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
					$comments =(isset($data['comments'])?$data['comments']:"");
					$data_insert=array('unit_no'=>$unit_no,'letter_line'=>$letter_line,'volume_collected'=>$volume_collected,'time_elapsed'=>$time_elapsed,'flow_rate'=>$flow_rate,'pass_fail'=>$pass_fail,'comments'=>$comments,'fhi_flow_rate_id'=>$insert_id);
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
		* Method Name   	: investigationStep9offline
		* Description       : Farm Hygeine Investigation Step9
		* @Param            : All Farm Hygeine Investigation Step9  fields   
		* @return           : json data
		********************************************/
		function investigationStep9offline($data_arr,$data_arr_unit,$fhi_id,$user_id)
		{
			$local_db_id = $data_arr['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_flow_rate');
			/*Insert*/
			$insert = $this->db->insert("da_fhi_flow_rate",$data_arr);
			$insert_id = $this->db->insert_id();
			if($insert)
			{	
				/* Delete   */
				if(!empty($data_arr_unit))
				{
				$this->db->where('local_db_id',$local_db_id);
				$this->db->delete('da_fhi_flow_rate_cycle');
				
				foreach($data_arr_unit as $data)
				{
					$unit_no=(isset($data['unit_no'])?$data['unit_no']:"");
					$letter_line=(isset($data['letter_line'])?$data['letter_line']:'');
					$volume_collected=(isset($data['volume_collected'])?$data['volume_collected']:"");
					$time_elapsed=(isset($data['time_elapsed'])?$data['time_elapsed']:"");
					$flow_rate=(isset($data['flow_rate'])?$data['flow_rate']:"");
					$pass_fail=(isset($data['pass_fail'])?$data['pass_fail']:"");
					$comments =(isset($data['comments'])?$data['comments']:"");
					$data_insert=array('unit_no'=>$unit_no,'letter_line'=>$letter_line,'volume_collected'=>$volume_collected,'time_elapsed'=>$time_elapsed,'flow_rate'=>$flow_rate,'pass_fail'=>$pass_fail,'comments'=>$comments,'fhi_flow_rate_id'=>$insert_id,'local_db_id'=>$local_db_id);
					$this->db->insert("da_fhi_flow_rate_cycle",$data_insert);
				}
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
		* Method Name   	: investigationStep10offline
		* Description       : Farm Hygeine Investigation Step10
		* @Param            : All Farm Hygeine Investigation Step10  fields   
		* @return           : json data
		********************************************/
		function investigationStep10offline($milk_tank_cycle_arr,$fhi_id,$user_id,$local_db_id)
		{
			
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_program_assessment_cycle');
			$i=0;				
			foreach($milk_tank_cycle_arr as $milk_tank_unit)
			{
				$milk_cycle_arr = $milk_tank_unit['milk_cycle'];
				foreach($milk_cycle_arr as $cycle_arr){
					$cycling_description=(isset($cycle_arr['cycling_description'])?$cycle_arr['cycling_description']:"");
					$volume=(isset($cycle_arr['volume'])?$cycle_arr['volume']:"");
					$cleanser_sanitiser=(isset($cycle_arr['cleanser_sanitiser'])?$cycle_arr['cleanser_sanitiser']:""); 
					$temp_start=(isset($cycle_arr['temp_start'])?$cycle_arr['temp_start']:"");
					$comment=(isset($cycle_arr['comment'])?$cycle_arr['comment']:"");
					$dose=(isset($cycle_arr['dose'])?$cycle_arr['dose']:"");
					$pass=(isset($cycle_arr['pass'])?$cycle_arr['pass']:"");
					$fail=(isset($cycle_arr['fail'])?$cycle_arr['fail']:"");
					$dump_temperature=(isset($cycle_arr['dump_temperature'])?$cycle_arr['dump_temperature']:"");
					$milk_tank=$i;
					$cycle_data=array('cycle_description'=>$cycling_description,'volume'=>$volume,'cleanser_sanitiser'=>$cleanser_sanitiser,'temp_start'=>$temp_start,'comments'=>$comment,'dose'=>$dose,'pass'=>$pass,'fail'=>$fail,'dump_temperature'=>$dump_temperature,'milk_tank'=>$milk_tank,'local_db_id'=>$local_db_id,'fhi_id'=>$fhi_id);
					$this->db->insert("da_fhi_program_assessment_cycle",$cycle_data);
				}
				$i++;
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Step4",'table_name'=>'da_fhi_program_assessment_cycle','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			/* Investigation Complete Status */
			$data_status=array("complete_status"=>"1");
			$this->updateInvestigationComepleteStatus($data_status,$fhi_id);
			$result = array("is_insert"=>"1");
			
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
		* Method Name   	: bulkMilkTankCleaningOffline
		* Description       : Farm Hygeine Investigation Bulk Milk Tank Cleanng
		* @Param            : All Farm Hygeine Investigation Step10  fields   
		* @return           : json data
		********************************************/
		function bulkMilkTankCleaningOffline($milk_tank_arr,$fhi_id,$user_id)
		{
			$local_db_id = $milk_tank_arr['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_milk_tank_cleaning');
			/*Insert*/
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
		public function investigationRecommendation1($action_data,$fhi_id,$user_id)
		{
					
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
		* Method Name   	: investigationRecommendation1offline
		* Description       : Farm Hygeine Investigation Recommendation 1
		* @Param            : All Farm Hygeine Investigation Recommendation Step1  fields    
		* @return           : json data
		********************************************/
		public function investigationRecommendation1offline($action_data,$fhi_id,$user_id,$local_db_id)
		{
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_recommendation1');
			/*Insert*/		
			foreach($action_data as $action_arr)
			{
				$task_id =(isset($action_arr['task_id'])?$action_arr['task_id']:"");
				$task_status =(isset($action_arr['task_status'])?$action_arr['task_status']:"");
				$action_name=(isset($action_arr['action_name'])?$action_arr['action_name']:"");
				$assign_id=(isset($action_arr['assign_id'])?$action_arr['assign_id']:"");
				$due_date=(isset($action_arr['due_date'])?$action_arr['due_date']:"");
				$assign_name=(isset($action_arr['assign_name'])?$action_arr['assign_name']:"");
				$completion_date=(isset($action_arr['completion_date'])?$action_arr['completion_date']:"");
				
				$recommendation1_data=array('fhi_id'=>$fhi_id,'task_status'=>$task_status,'task_id'=>$task_id,'action_name'=>$action_name,'assign_name'=>$assign_name,'assign_id'=>$assign_id,'due_date'=>$due_date,"create_date"=>date('Y-m-d'),"created_by"=>$user_id,'local_db_id'=>$local_db_id);
				/*$recommendation1_data=array('fhi_id'=>$fhi_id,'task_id'=>$task_id,'task_status'=>$task_status,'action_name'=>$action_name,'assign_name'=>$assign_name,'assign_id'=>$assign_id,'completion_date'=>$completion_date,"create_date"=>date('Y-m-d'),"created_by"=>$user_id,'local_db_id'=>$local_db_id); */
				$this->db->insert("da_fhi_recommendation1",$recommendation1_data);
				$insert_id = $this->db->insert_id();
				/*Insert Recommendation1 invite data*/
				$recommendation1_invite_data = array('user_id'=>$assign_id,'table_id'=>$insert_id,'invited_by'=>$user_id);
				$this->db->insert("da_invite_fhi_recommendation1",$recommendation1_invite_data);
				
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
					$sunday = isset($wash_detail["sunday"])?$wash_detail["sunday"]:"";
					$monday = isset($wash_detail["monday"])?$wash_detail["monday"]:"";
					$tuesday = isset($wash_detail["tuesday"])?$wash_detail["tuesday"]:"";
					$wednesday = isset($wash_detail["wednesday"])?$wash_detail["wednesday"]:"";
					$thursday = isset($wash_detail["thursday"])?$wash_detail["thursday"]:"";
					$friday = isset($wash_detail["friday"])?$wash_detail["friday"]:"";
					$saturday = isset($wash_detail["saturday"])?$wash_detail["saturday"]:"";
					$wash_type = isset($wash_detail["wash_type"])?$wash_detail["wash_type"]:"";
					$cycles = isset($wash_detail['cycle'])?$wash_detail['cycle']:"";
					$parameter = array("fhi_recommendation2_id"=>$insert_id,"sunday"=>$sunday,"monday"=>$monday,"tuesday"=>$tuesday,"wednesday"=>$wednesday,"thursday"=>$thursday,"friday"=>$friday,"saturday"=>$saturday,"wash_type"=>$wash_type);
					$insert_days = $this->db->insert("da_fhi_recommendation2_days",$parameter);
					$i=0;
					if($insert_days){
						$machine_wash_days_id = $this->db->insert_id();						
						foreach($cycles as $cycle){
							$description=isset($cycle['description'])?$cycle['description']:"";
							$volume=isset($cycle['volume'])?$cycle['volume']:"";
							$cleaner_sanitiser=isset($cycle['cleaner_sanitiser'])?$cycle['cleaner_sanitiser']:"";
							$comments=isset($cycle['comments'])?$cycle['comments']:"";
							$temp_start=isset($cycle['temp_start'])?$cycle['temp_start']:"";
							$dose=isset($cycle['dose'])?$cycle['dose']:"";
							$machine_wash=$i;
							$temp_dump=isset($cycle['temp_dump'])?$cycle['temp_dump']:"";
							$cycle_data = array("fhi_recommendation2_days_id"=>$machine_wash_days_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"temp_dump"=>$temp_dump,'machine_wash'=>$machine_wash);
							$insert_cycle = $this->db->insert("da_fhi_recommendation2_cycle",$cycle_data);
							$i++;
						}
					}				
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation2",'table_name'=>'da_fhi_recommendation2','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"0");
				}
			}
				return $result;
		}
		
		/***********************************************************
		* Method Name   	: investigationRecommendation2offline
		* Description       : Farm Hygeine Investigation Recommendation 2
		* @Param            : All Farm Hygeine Investigation Recommendation Step2
		* @return           : json data
		********************************************/
		function investigationRecommendation2offline($milking_machine_data,$machine_wash_data,$fhi_id,$user_id){
			$local_db_id = $milking_machine_data['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_recommendation2');
			/*Insert*/
			$insert = $this->db->insert("da_fhi_recommendation2",$milking_machine_data);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				/* Delete  */
				$this->db->where('local_db_id',$local_db_id);
				$this->db->delete('da_fhi_recommendation2_days');
				$this->db->where('local_db_id',$local_db_id);
				$this->db->delete('da_fhi_recommendation2_cycle');				
				foreach($machine_wash_data as $wash_detail){
					$i=0;
					$sunday = isset($wash_detail["sunday"])?$wash_detail["sunday"]:"";
					$monday = isset($wash_detail["monday"])?$wash_detail["monday"]:"";
					$tuesday = isset($wash_detail["tuesday"])?$wash_detail["tuesday"]:"";
					$wednesday = isset($wash_detail["wednesday"])?$wash_detail["wednesday"]:"";
					$thursday = isset($wash_detail["thursday"])?$wash_detail["thursday"]:"";
					$friday = isset($wash_detail["friday"])?$wash_detail["friday"]:"";
					$saturday = isset($wash_detail["saturday"])?$wash_detail["saturday"]:"";
					$wash_type = isset($wash_detail["wash_type"])?$wash_detail["wash_type"]:"";
					$cycles = isset($wash_detail['cycle'])?$wash_detail['cycle']:"";
					$parameter = array("fhi_recommendation2_id"=>$insert_id,"sunday"=>$sunday,"monday"=>$monday,"tuesday"=>$tuesday,"wednesday"=>$wednesday,"thursday"=>$thursday,"friday"=>$friday,"saturday"=>$saturday,"wash_type"=>$wash_type,'local_db_id'=>$local_db_id);
					$insert_days = $this->db->insert("da_fhi_recommendation2_days",$parameter);
					if($insert_days){
						$machine_wash_days_id = $this->db->insert_id();						
						foreach($cycles as $cycle){

							$description=isset($cycle['description'])?$cycle['description']:"";
							$volume=isset($cycle['volume'])?$cycle['volume']:"";
							$cleaner_sanitiser=isset($cycle['cleaner_sanitiser'])?$cycle['cleaner_sanitiser']:"";
							$comments=isset($cycle['comments'])?$cycle['comments']:"";
							$temp_start=isset($cycle['start_temp'])?$cycle['start_temp']:"";
							$dose=isset($cycle['dose'])?$cycle['dose']:"";
							$dump_temperature=isset($cycle['dump_temperature'])?$cycle['dump_temperature']:"";
							$pass=isset($cycle['pass'])?$cycle['pass']:"";
							$fail=isset($cycle['fail'])?$cycle['fail']:"";
							$machine_wash=$i;
							$cycle_data = array("fhi_recommendation2_days_id"=>$machine_wash_days_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"dump_temperature"=>$dump_temperature,'local_db_id'=>$local_db_id,'pass'=>$pass,'fail'=>$fail,'machine_wash'=>$machine_wash);
							$insert_cycle = $this->db->insert("da_fhi_recommendation2_cycle",$cycle_data);
							$i++;
						}
					}				
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation2",'table_name'=>'da_fhi_recommendation2','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"0");
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
					$description=isset($cycle['description'])?$cycle['description']:"";
					$volume=isset($cycle['volume'])?$cycle['volume']:"";
					$cleaner_sanitiser=isset($cycle['cleaner_sanitiser'])?$cycle['cleaner_sanitiser']:"";
					$comments=isset($cycle['comments'])?$cycle['comments']:"";
					$temp_start=isset($cycle['temp_start'])?$cycle['temp_start']:"";
					$dose=isset($cycle['dose'])?$cycle['dose']:"";
					$temp_dump = isset($cycle['temp_dump'])?$cycle['temp_dump']:"";
					$pass = isset($cycle['pass'])?$cycle['pass']:"";
					$fail = isset($cycle['fail'])?$cycle['fail']:"";
					$cycle_data = array("fhi_recommendation3_id"=>$insert_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"temp_dump"=>$temp_dump,'pass'=>$pass,'fail'=>$fail);
					$insert_cycle = $this->db->insert("da_fhi_recommendation3_cycle",$cycle_data);
						
									
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation3",'table_name'=>'da_fhi_recommendation3','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"0");
				}
			}
				return $result;
		}
		
		/***********************************************************
		* Method Name   	: investigationRecommendation3offline
		* Description       : Farm Hygeine Investigation Recommendation 3
		* @Param            : All Farm Hygeine Investigation Recommendation Step3
		* @return           : json data
		********************************************/
		function investigationRecommendation3offline($recommend3_data,$milk_tank_arr,$fhi_id,$user_id){
			$local_db_id = $recommend3_data['local_db_id'];
			/* Delete   */
			$this->db->where('local_db_id',$local_db_id);
			$this->db->delete('da_fhi_recommendation3');
			
			/*Insert*/
			$insert = $this->db->insert("da_fhi_recommendation3",$recommend3_data);
			$insert_id = $this->db->insert_id();
			if($insert)
			{
				/* Delete   */
				$this->db->where('local_db_id',$local_db_id);
				$this->db->delete('da_fhi_recommendation3_cycle');
				$i=0;
				foreach($milk_tank_arr as $milk_tank){
					$milk_cycle_arr = $milk_tank['milk_cycle'];
					
					foreach($milk_cycle_arr as $cycle){
						// $description=(isset($data['description'])?$data['description']:"");
						// $volume=(isset($data['volume'])?$data['volume']:"");
						// $cleaner_sanitiser=(isset($data['cleaner_sanitiser'])?$data['cleaner_sanitiser']:'');
						// $start_temp=(isset($data['start_temp'])?$data['start_temp']:"");
						// $comments=(isset($data['comments'])?$data['comments']:"");
						// $dose=(isset($data['dose'])?$data['dose']:"");
						// $pass=(isset($data['pass'])?$data['pass']:"");
						// $fail=(isset($data['fail'])?$data['fail']:"");
						// $dump_temperature=(isset($data['dump_temperature'])?$data['dump_temperature']:"");					
						$description=isset($cycle['description'])?$cycle['description']:"";
						$volume=isset($cycle['description'])?$cycle['volume']:"";
						$cleaner_sanitiser=isset($cycle['description'])?$cycle['cleaner_sanitiser']:"";
						$comments=isset($cycle['comment'])?$cycle['comment']:"";
						$temp_start=isset($cycle['temp_start'])?$cycle['temp_start']:"";
						$dose=isset($cycle['dose'])?$cycle['dose']:"";
						$dump_temperature = isset($cycle['dump_temperature'])?$cycle['dump_temperature']:"";
						$pass = isset($cycle['pass'])?$cycle['pass']:"";
						$fail = isset($cycle['fail'])?$cycle['fail']:"";
						$milk_tank=$i;
						$cycle_data = array("fhi_recommendation3_id"=>$insert_id,"cycle_description"=>$description,"volume"=>$volume,"cleaner_sanitiser"=>$cleaner_sanitiser,"comments"=>$comments,"temp_start"=>$temp_start,"dose"=>$dose,"dump_temperature"=>$dump_temperature,'local_db_id'=>$local_db_id,'pass'=>$pass,'fail'=>$fail,'milk_tank'=>$milk_tank);
						$insert_cycle = $this->db->insert("da_fhi_recommendation3_cycle",$cycle_data);
						
					}	
					$i++;					
				}
				$log_arr=array('user_id'=>$user_id,'activity_type'=>"Create Hygeine Investigation Recommendation3",'table_name'=>'da_fhi_recommendation3','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
				$this->saveActivityLog($log_arr);
				if($insert_cycle){
					$result = array("is_insert"=>"1");
				}
				else{
					$result = array("is_insert"=>"0");
				}
			}
			return $result;
		}
		/***********************************************************
		* Method Name   	: investigationRecommendation4offline
		* Description       : Farm Hygeine Investigation Recommendation 4
		* @Param            : All Farm Hygeine Investigation Recommendation Step4
		* @return           : json data
		********************************************/
		function investigationRecommendation4offline($recommend4_data_arr,$fhi_id,$user_id){
			foreach($recommend4_data_arr as $action_arr){	
				$task_id =(isset($action_arr['task_id'])?$action_arr['task_id']:"");
				$task_status =(isset($action_arr['task_status'])?$action_arr['task_status']:"");
				$comments =(isset($action_arr['comments'])?$action_arr['comments']:"");
				$completion_date =(isset($action_arr['completion_date'])?$action_arr['completion_date']:"");
				$recommend4_data = array("task_status"=>$task_status,"completion_date"=>$completion_date,"comments"=>$comments);
				$this->db->where("task_id",$task_id);
				$update_recommend4 = $this->db->update("da_fhi_recommendation1",$recommend4_data);					
			}
			$log_arr=array('user_id'=>$user_id,'activity_type'=>"Complete Hygeine Investigation Recommendation4",'table_name'=>'da_fhi_recommendation1','table_id'=>$fhi_id,'date_time'=>date('Y-m-d h:i:s'));
			$this->saveActivityLog($log_arr);
			if($update_recommend4){
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"0");
			}
			
			return $result;
		}
		/***********************************************************
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendShareEmail($invite_data) 
		{
			ini_set('memory_limit', '20M');
			// load library


			// boost the memory limit if it's low ;)
			$html = $this->load->view('investigation2/pdfmail', array('var' => 123), true);
			// render the view into HTML
			include_once APPPATH."libraries/tcpdf/tcpdf.php";

			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Dairy App');
			$pdf->SetTitle('Dairy App - Recommendation2');
			$pdf->SetSubject('Dairy App - Recommendation2');
			// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			// remove default header/footer
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);

			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			// set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

			// set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			// set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			// set some language-dependent strings (optional)
			if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
				require_once(dirname(__FILE__).'/lang/eng.php');
				$pdf->setLanguageArray($l);
			}

			// ---------------------------------------------------------

			// set font
			$pdf->SetFont('times', 'BI', 8);

			// add a page
			$pdf->AddPage();
			
			$pdfFilePath = $this->config->item("DIR_ROOT_IMAGE")."upload/attach/pdf_name.pdf";
			$pdf->WriteHTML($html);
			$pdf->Output($pdfFilePath, "F");
			$this->load->library("email");	
		$this->email->clear(TRUE);
        $config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from("navin.3434@gmail.com","Medicine Combination Request ");
		$this->email->to("navin.3434@gmail");
		/* $this->email->bcc('navin_tanwar@cyberworx.in');  */
		$this->email->subject( 'Sabka Chemist-Registration' );
		// $this->email->attach($pdfFilePath);
		$this->email->message("Test");
		$result=$this->email->send();
		$this->email->clear($pdfFilePath);
			if($result) {
				echo "Send";
				unlink($pdfFilePath); //for delete generated pdf file. 
			}			
			foreach($invite_data as $invite)
				{
					$email = (isset($invite['email'])?$invite['email']:"");
					if(!empty($email))
					{
						
					}
				}
		}			
		/***********************************************************
		* Method Name   	: sendInvite
		* Description       : sendInvite
		* @Param            : invite_data   
		* @return           : json data
		********************************************/
		function sendInvite($invite_data,$user_id,$mtc_id)
		{
			/*$this->db->where('id', $mtc_id);
			$final = array("complete_status"=>1);
			$this->db->update('da_milk_tank_cleaning',$final); */
			
			foreach($invite_data as $invite){
				$is_exist = (isset($invite['is_exist'])?$invite['is_exist']:"");
				$investigation_farmname = (isset($invite['investigation_farmname'])?$invite['investigation_farmname']:"");
				if($is_exist=="1"){
					$uid = (isset($invite['uid'])?$invite['uid']:"");
					
					$isExists = $this->getEmail($uid);
					if($isExists)
					{
						
						/*$where_cond = array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygiene_investigation");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{ */
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0,'investigation_farmname'=>$investigation_farmname);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");	
						/* } */
					}
					else
					{
						$response = array("invite_sent"=>"3");	
					}
				}
				else{
					$email = (isset($invite['email'])?$invite['email']:"");
					$mobile = (isset($invite['mobile'])?$invite['mobile']:"");
					$name = (isset($invite['name'])?$invite['name']:"");
					$this->db->select("*");
					$this->db->from("da_user");
					$this->db->where("email",$email);
					$row = $this->db->get();
					if($row->num_rows()>0){
						$result =$row->result();
						$uid= $result[0]->id;
						$emailid = $this->getEmail($uid);
						/*$where_cond =  array("user_id"=>$uid,"table_id"=>$mtc_id);
						$this->db->select("*");
						$this->db->from("da_invite_hygiene_investigation");
						$this->db->where($where_cond);
						$query = $this->db->get();
						if($query->num_rows()>0){
							$response = array("invite_sent"=>"2");	
						}
						else{ */
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0,'investigation_farmname'=>$investigation_farmname);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");	
						/* } */
					}
					else{
						$user_data = array("first_name"=>$name,'last_name'=>'',"email"=>$email,'mobile'=>$mobile,"registration_status"=>0);
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
							$insert_data = array("user_id"=>$uid,"table_id"=>$mtc_id,"invited_by"=>$user_id,"status"=>0,'investigation_farmname'=>$investigation_farmname);
							$insert = $this->db->insert("da_invite_hygiene_investigation",$insert_data);
							$response = array("invite_sent"=>"1");
						}
					}
				}
			}	
			return $response;
		}
		/***********************************************************
		* Method Name   	: getRegisterOwner
		* Description       : get Email by user id
		* @Param            : uid   
		* @return           : json data
		********************************************/
		function getRegisterOwner($Owner){
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where("email",$Owner);
			$query =$this->db->get();
			if($query->num_rows()>0)
			{
				$result= $query->result();
				$userID=$result[0]->id;
				return $userID;
			}
			else{
				$this->db->insert('da_user',array('email'=>$Owner));
				 $userID=$this->db->insert_id();
				return $userID;
			}
		}		
		/***********************************************************
		* Method Name   	: getEmailOwner
		* Description       : get Email by user id
		* @Param            : uid   
		* @return           : json data
		********************************************/
		function getEmailOwner($uid){
			$this->db->select("email");
			$this->db->from("da_user");
			$this->db->where("id",$uid);
			$query =$this->db->get();
			if($query->num_rows()>0){
				$result= $query->result();
				
				return $result[0]->email;
			}
			else{
				return '';
			}
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
		/***********************************************************
		* Method Name   	: acceptInviteRecommendation
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function acceptInviteRecommendation($invite_id,$user_id,$status)
		{	
			$where_cond = array("status"=>$status);
			$this->db->where('id',$invite_id);
			if($this->db->update('da_invite_fhi_recommendation1',$where_cond))
			{
				return true;
			}
			else
			{
				return false;
			}	
		}		
		/***********************************************************
		* Method Name   	: getFarmLastTime
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function getFarmLastTime($farm_id,$user_id)
		{	
			$data = array("farm_id"=>$farm_id,'user_id'=>$user_id,'create_date'=>date("Y-m-d"));
			if($this->db->insert('da_fhi_get',$data))
			{
				return true;
			}
			else
			{
				return false;
			}	
		}		
		/***********************************************************
		* Method Name   	: getFarmLastTimeStored
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function getFarmLastTimeStored($farm_id,$user_id)
		{	
			$this->db->select("*");
			$this->db->from("da_fhi_get");
			$this->db->where("farm_id",$farm_id);
			$this->db->where("user_id",$user_id);
			$this->db->order_by("id desc");
			$this->db->limit("1");
			$fhi_water = $this->db->get();
			if($fhi_water->num_rows()>0){
				$result= $fhi_water->result();
				$response=$result[0]->create_date;
				
			}
			else{
				$response='';
			}	
			return $response;	
			
		}		
		/***********************************************************
		* Method Name   	: getInvestigationList
		* Description       : Get Investigation List
		* @Param            : farm_id
		* @return           : json data
		********************************************/
		function getStep3Data($fhi_id)
		{
			$this->db->select("hot_water,cold_water,test_date,sample_from,ph,e_coli_count,iron,total_plate_count,total_hardness,comments");
			$this->db->from("da_fhi_water");
			$this->db->where("fhi_id",$fhi_id);
			$fhi_water = $this->db->get();
			if($fhi_water->num_rows()>0){
				$result= $fhi_water->result();
				
			}
			else{
				$result=array();
			}	
			return $result;			
		} 
		
		/***********************************************************
		* Method Name   	: getStep1InviteData
		* Description       : Get step1 invite data
		* @Param            : farm_id
		* @return           : json data
		********************************************/
		function getStep1InviteData($fhi_id)
		{
			$this->db->select("*");
			$this->db->from("da_invite_hygiene_investigation");
			$this->db->where("table_id",$fhi_id);
			$fhi_water = $this->db->get();
			
			if($fhi_water->num_rows()>0){
				$result_arr=array();
				$results= $fhi_water->result();
				foreach($results as $result){
					
					$user_id = $result->user_id;
					
					$this->db->select("first_name,last_name,email,mobile");
					$this->db->from("da_user");
					$this->db->where("id",$user_id);
					$invite_user = $this->db->get();
					if($invite_user->num_rows()>0){
						$users= $invite_user->result();
						$result_arr[] = array("user_id"=>$result->user_id,'investigation_farmname'=>$result->investigation_farmname,"name"=>$users[0]->first_name." ".$users[0]->last_name,"email"=>$users[0]->email,"mobile"=>$users[0]->mobile);
					}
				}
			}
			else{
				$result_arr=array();
			}	
			return $result_arr;			
		}		
		
		/***********************************************************
		* Method Name   	: getInvestigationList
		* Description       : Get Investigation List
		* @Param            : farm_id
		* @return           : json data
		********************************************/
		function getInvestigationList($farm_id,$lastGetDate)
		{
			$result = array();
			$result_return = array();
			$resultStep3 = array();
			
			$resultStep4 = array();
			$resultStep5 = array();
			$resultStep5_cycle = array();
			$resultStep6 = array();
			$resultStep7 = array();
			$resultStep8 = array();
			$resultStep9 = array();
			$resultStep11 = array();
			$resultStep12 = array();
			$resultStep12_recommend1 = array();
			$resultStep12_recommend4 = array();
			$resultStep9_cycle =array();
			$resultStep10 = array();
			$resultStep10_cycle = array(); 
			$resultStep13 = array(); 
			$resultStep13_cycle = array(); 
			$resultStep13_days = array();
			$resultStep14 = array();
			$resultStep14_cycle = array(); 
			$this->db->select("id,name,	bactoscan_tpc,thermodurics,other,other_description,latest_bactoscan,cows_milked,latest_thermoducric,milk_production_day,milk_frequency,bmilk_temprature,tank_volume,temp_note_time,elapsed_hour,elapsed_minutes,comments,milking_equipment,milking_equipment,cooling_equipment,heating_equipment,wash_program,wash_routinue,staff_changes,other_step2,other_test_observation,local_db_id,Status,OwnerID,Last_completed_index");
			$this->db->from("da_farm_hygiene_investigation");
			$this->db->where("farm_id",$farm_id);
			if(!empty($lastGetDate))
			{
				$this->db->where("create_date >=",$lastGetDate);
			}
			$query =$this->db->get();
			
			if($query->num_rows()>0){
				
				$results = $query->result();
			
				$count_step=0;
				foreach($results as $result){
					$step1_invite=array();
					$OwnerID = $result->OwnerID;
					$Last_completed_index =(int) $result->Last_completed_index;
					$Status = $result->Status;
					$fhi_id = $result->id;
					$local_db_id = $result->local_db_id;
					/*step 3*/
					$step3_datas=$this->getStep3Data($fhi_id );
					$step1_invite=$this->getStep1InviteData($fhi_id );
					
					if(!empty($step3_datas))
					{	$cont_s3=0;
						$resultStep3=array();
						foreach($step3_datas as $step3_data)
						{

							$resultStep3[$cont_s3]= array('hot_water'=>$step3_data->hot_water,'cold_water'=>$step3_data->cold_water,'test_date'=>$step3_data->test_date,'sample_from'=>$step3_data->sample_from,'ph'=>$step3_data->ph,'e_coli_count'=>$step3_data->e_coli_count,'iron'=>$step3_data->iron,'total_plate_count'=>$step3_data->total_plate_count,'total_hardness'=>$step3_data->total_hardness,'comments'=>$step3_data->comments);
							$cont_s3++;
						}	
					}
					if(!empty($step1_invite))
					{
						$cnt_s1_i=0;
						$resultStep1_invite=array();
						foreach($step1_invite as $step1_data)
						{
							if($OwnerID==$step1_data['user_id'])
							{
								$is_owner=1;
							}
							else
							{
								$is_owner=0;
							}
							$resultStep1_invite[$cnt_s1_i]= array('uid'=>$step1_data['user_id'],'is_exist'=>"1",'email'=>$step1_data['email'],'mobile'=>$step1_data['mobile'],'name'=>$step1_data['name'],'investigation_farmname'=>$step1_data['investigation_farmname'],'is_owner'=>$is_owner);
							$cnt_s1_i++;
						}
						
					}
					else
					{
						$resultStep1_invite=array();
					}
					
					/*step 4*/
					$this->db->select("name,clean,deposit_found,dirty,deposit_not_found,condition,comment,image,pass,fail");
					$this->db->from("da_fhi_equipment_inspection");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_equipment_inspection = $this->db->get();
					if($fhi_equipment_inspection->num_rows()>0){
						$cnt_s4=0;
						$resultStep4=array();
						$step4= $fhi_equipment_inspection->result();
						foreach($step4 as $step4_data){
							$resultStep4[$cnt_s4]= array('name'=>$step4_data->name,'clean'=>$step4_data->clean,'deposit_found'=>$step4_data->deposit_found,'dirty'=>$step4_data->dirty,'deposit_not_found'=>$step4_data->deposit_not_found,'condition'=>$step4_data->condition,'comment'=>$step4_data->comment,'image'=>$step4_data->image,'pass'=>$step4_data->pass,'fail'=>$step4_data->fail);
						$cnt_s4++;
						}
						
					}
					/*step 5*/
					$this->db->select("id,am,pm,other,name");
					$this->db->from("da_fhi_wash_assessment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_wash_assessment = $this->db->get();
					if($fhi_wash_assessment->num_rows()>0){
						$resultStep5_cycle = array();
						$step5 = $fhi_wash_assessment->result();
						foreach($step5 as $step5_data){
							$fhiwac_id= $step5_data->id;
							$this->db->select("description,volume,cleaner_sanitiser,start_temp,comments,dose,pass,fail,dump_temperature");
							$this->db->from("da_fhi_wash_assessment_cycle");
							$this->db->where("fhiwac_id",$fhiwac_id);
							$fhi_wash_assessment_cycle = $this->db->get();
							if($fhi_wash_assessment_cycle->num_rows()>0){
								$cnt_s5=0;
								$step5_cycle_data = $fhi_wash_assessment_cycle->result();
								foreach($step5_cycle_data as $cycle_data){
									
									$resultStep5_cycle[$cnt_s5]= array('volume'=>$cycle_data->volume,'description'=>$cycle_data->description,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'start_temp'=>$cycle_data->start_temp,'comments'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
									$cnt_s5++;
								}
							}
							$resultStep5= array('am'=>$step5_data->am,'pm'=>$step5_data->pm,'other'=>$step5_data->other,'name'=>$step5_data->name);
						}
					}
					/*step 6*/
					$this->db->select("alkali_ph_level,wash_active,chlorine_level,acid_ph_level,sanitiser_ph_level");
					$this->db->from("da_fhi_cleaning_solution");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_cleaning_solution = $this->db->get();
					if($fhi_cleaning_solution->num_rows()>0){
						$resultStep6 = array();
						$step6= $fhi_cleaning_solution->result();
						$cnt_s6=0;
						foreach($step6 as $step6_data){
							$resultStep6[$cnt_s6]= array('alkali_ph_level'=>$step6_data->alkali_ph_level,'wash_active'=>$step6_data->wash_active,'chlorine_level'=>$step6_data->chlorine_level,'acid_ph_level'=>$step6_data->acid_ph_level,'sanitiser_ph_level'=>$step6_data->sanitiser_ph_level);
							$cnt_s6++;
						}
					}
					/*step 7*/
					$this->db->select("liner_mouthpiece,liner_mouthpiece_yes,liner_mouthpiece_no,which_unit_liner,which_unit_liner_description,cleaning_solution_flow,cleaning_solution_flow_yes,cleaning_solution_flow_no,which_unit_cleaning,which_unit_cleaning_description,working_vacuum,working_vacuum_yes,working_vacuum_no,vacuum_kevek,vacuum_kevek_description,effective_reserve,effective_reserve_yes,effective_reserve_no");
					$this->db->from("da_fhi_cip_assetsment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_cip_assetsment = $this->db->get();
					if($fhi_cip_assetsment->num_rows()>0){
						$resultStep7 = array();
						$step7= $fhi_cip_assetsment->result();
						foreach($step7 as $step7_data){
							$resultStep7= array('liner_mouthpiece_yes'=>$step7_data->liner_mouthpiece_yes,'liner_mouthpiece_no'=>$step7_data->liner_mouthpiece_no,'which_unit_liner_description'=>$step7_data->which_unit_liner_description,'cleaning_solution_flow_yes'=>$step7_data->cleaning_solution_flow_yes,'cleaning_solution_flow_no'=>$step7_data->cleaning_solution_flow_no,'which_unit_cleaning_description'=>$step7_data->which_unit_cleaning_description,'working_vacuum_yes'=>$step7_data->working_vacuum_yes,'working_vacuum_no'=>$step7_data->working_vacuum_no,'vacuum_kevek_description'=>$step7_data->vacuum_kevek_description,'effective_reserve_yes'=>$step7_data->effective_reserve_yes,'effective_reserve_no'=>$step7_data->effective_reserve_no);
						}
					}
					/*step 8*/
					$this->db->select("injector_yes,injector_no,slug_wash_cycle,estimated_slug_screen,receiver_volume_1_2l,receiver_volume_2_3_f,receiver_volume_1_3_f,receiver_volume_2_3_g,receiver_volume_1_2_f,after_turn_yes,after_turn_no,instant_after_turn_yes,instant_after_turn_no,before_turn_yes,before_turn_no,little_no_action_yes,little_no_action_no,good_action_yes,little_action_yes,little_action_no,other_yes,good_action_no,other_no,comments");
					$this->db->from("da_fhi_slug_assessment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_slug_assessment = $this->db->get();
					if($fhi_slug_assessment->num_rows()>0){
						$resultStep8 = array();
						$step8= $fhi_slug_assessment->result();
						foreach($step8 as $step8_data){
							$resultStep8= array('injector_yes'=>$step8_data->injector_yes,'injector_no'=>$step8_data->injector_no,'slug_wash_cycle'=>$step8_data->slug_wash_cycle,'estimated_slug_screen'=>$step8_data->estimated_slug_screen,'receiver_volume_1_2l'=>$step8_data->receiver_volume_1_2l,'receiver_volume_2_3_f'=>$step8_data->receiver_volume_2_3_f,'receiver_volume_1_3_f'=>$step8_data->receiver_volume_1_3_f,'receiver_volume_2_3_g'=>$step8_data->receiver_volume_2_3_g,'receiver_volume_1_2_f'=>$step8_data->receiver_volume_1_2_f,'after_turn_yes'=>$step8_data->after_turn_yes,'after_turn_no'=>$step8_data->after_turn_no,'instant_after_turn_yes'=>$step8_data->instant_after_turn_yes,'instant_after_turn_no'=>$step8_data->instant_after_turn_no,'before_turn_yes'=>$step8_data->before_turn_yes,'before_turn_no'=>$step8_data->before_turn_no,'little_no_action_yes'=>$step8_data->little_no_action_yes,'little_no_action_no'=>$step8_data->little_no_action_no,'good_action_yes'=>$step8_data->good_action_yes,'little_action_yes'=>$step8_data->little_action_yes,'little_action_no'=>$step8_data->little_action_no,'other_yes'=>$step8_data->other_yes,'good_action_no'=>$step8_data->good_action_no,'other_no'=>$step8_data->other_no,'comments'=>$step8_data->comments);
						}
					}
					
					/*step 9*/
					$this->db->select("id,pre_rinse,wash,average_flow_rate,final_rinse,allowance");
					$this->db->from("da_fhi_flow_rate");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_flow_rate = $this->db->get();
					if($fhi_flow_rate->num_rows()>0){
						$resultStep9_cycle = array();
						$step9= $fhi_flow_rate->result();
						foreach($step9 as $step9_data){
							$fhi_flow_rate_id = $step9_data->id;
							$this->db->select("unit_no,letter_line,volume_collected,time_elapsed,flow_rate,pass_fail,comments");
							$this->db->from("da_fhi_flow_rate_cycle");
							$this->db->where("fhi_flow_rate_id",$fhi_flow_rate_id);
							$fhi_flow_rate_cycle = $this->db->get();
							if($fhi_flow_rate_cycle->num_rows()>0){
								$cnt_s9=0;
								$step9_cycle_data = $fhi_flow_rate_cycle->result();
								foreach($step9_cycle_data as $cycle_data){	
									$resultStep9_cycle[$cnt_s9]= array('unit_no'=>$cycle_data->unit_no,'letter_line'=>$cycle_data->letter_line,'volume_collected'=>$cycle_data->volume_collected,'time_elapsed'=>$cycle_data->time_elapsed,'flow_rate'=>$cycle_data->flow_rate,'pass_fail'=>$cycle_data->pass_fail,'comments'=>$cycle_data->comments);
									$cnt_s9++;
								}	
							}
							$resultStep9= array('pre_rinse'=>$step9_data->pre_rinse,'wash'=>$step9_data->wash,'average_flow_rate'=>$step9_data->average_flow_rate,'final_rinse'=>$step9_data->final_rinse,'allowance'=>$step9_data->allowance);
						}
					}
					/*step 10*/
							$this->db->select("cycle_description,volume,cleanser_sanitiser,temp_start,comments,dose,pass,fail,dump_temperature,milk_tank");
							$this->db->from("da_fhi_program_assessment_cycle");
							$this->db->where("fhi_id",$fhi_id);
							$this->db->group_by('milk_tank');
							
							$fhi_program_assessment_cycle = $this->db->get();
							if($fhi_program_assessment_cycle->num_rows()>0){
								$resultStep10_cycle = array();
								$step10_cycle_data= $fhi_program_assessment_cycle->result();
								$cnt_s10_out=0;
								foreach($step10_cycle_data as $cycle_data){
								$milk_tank=$cycle_data->milk_tank;
								/*Inner Query Start */
								$this->db->select("cycle_description,volume,cleanser_sanitiser,temp_start,comments,dose,pass,fail,dump_temperature,milk_tank");
								$this->db->from("da_fhi_program_assessment_cycle");
								$this->db->where("fhi_id",$fhi_id);
								$this->db->where("milk_tank",$milk_tank);
								$fhi_program_assessment_cycle_inner = $this->db->get();
								/* Inner Query End */
									if($fhi_program_assessment_cycle_inner->num_rows()>0)
									{
										
										$cnt_s10=0;
										$step10_cycle_data_inner= $fhi_program_assessment_cycle_inner->result();
										foreach($step10_cycle_data_inner as $cycle_data_inner){
										$milk_tank_in=$cycle_data->milk_tank;
										$resultStep10_cycle['milk_tank'][$milk_tank_in]['milk_cycle'][$cnt_s10]= array('cycling_description'=>$cycle_data_inner->cycle_description,'volume'=>$cycle_data_inner->volume,'cleanser_sanitiser'=>$cycle_data_inner->cleanser_sanitiser,'temp_start'=>$cycle_data_inner->temp_start,'comment'=>$cycle_data_inner->comments,'dose'=>$cycle_data_inner->dose,'pass'=>$cycle_data_inner->pass,'fail'=>$cycle_data_inner->fail,'dump_temperature'=>$cycle_data_inner->dump_temperature);
										$cnt_s10++;
										}
									}
								}
							}
						
					/*bulk milk tank*/
					$this->db->select("alkali_ph_level,acid_ph_level,alkal_wash_active,sanitizer_ph_level,chlorine_level");
					$this->db->from("da_fhi_milk_tank_cleaning");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_milk_tank_cleaning = $this->db->get();
					if($fhi_milk_tank_cleaning->num_rows()>0){
						$step11= $fhi_milk_tank_cleaning->result();
						foreach($step11 as $step11_data){
							$resultStep11= array('alkali_ph_level'=>$step11_data->alkali_ph_level,'acid_ph_level'=>$step11_data->acid_ph_level,'alkal_wash_active'=>$step11_data->alkal_wash_active,'sanitizer_ph_level'=>$step11_data->sanitizer_ph_level,'chlorine_level'=>$step11_data->chlorine_level);
						}
					}
					
					
					/*Recommendation1*/
					$this->db->select("task_id,task_status,action_name,assign_name,assign_id,completion_date,due_date,completion_status,comments");
					$this->db->from("da_fhi_recommendation1");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation1 = $this->db->get();
					if($fhi_recommendation1->num_rows()>0){
						$cnt_rec1=0;
						$step12= $fhi_recommendation1->result();
						foreach($step12 as $step12_data)
						{
							$resultStep12_recommend1[$cnt_rec1]= array('task_id'=>$step12_data->task_id,'action_name'=>$step12_data->action_name,'assign_id'=>$step12_data->assign_id,'assign_name'=>$step12_data->assign_name,'due_date'=>$step12_data->due_date,'task_status'=>$step12_data->task_status);
							$resultStep12_recommend4[$cnt_rec1]= array('task_id'=>$step12_data->task_id,'task_status'=>$step12_data->task_status,'completion_date'=>$step12_data->completion_date,'comments'=>$step12_data->comments);
							$cnt_rec1++;
						}
					}
					/*Recommendation2*/
					$this->db->select("id,retain_existing,new_recommendation,reference_number");
					$this->db->from("da_fhi_recommendation2");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation2 = $this->db->get();
					if($fhi_recommendation2->num_rows()>0){
						$step13= $fhi_recommendation2->result();
						foreach($step13 as $step13_data){
							$fhi_recommendation2_id = $step13_data->id;
							$resultStep13= array('retain_existing'=>$step13_data->retain_existing,'new_recommendation'=>$step13_data->new_recommendation,'reference_number'=>$step13_data->reference_number);
							$this->db->select("sunday,monday,tuesday,wednesday,thursday,friday,saturday,wash_type,id");
							$this->db->from("da_fhi_recommendation2_days");
							$this->db->where("fhi_recommendation2_id",$fhi_recommendation2_id);
							$fhi_recommendation2_days = $this->db->get();
							if($fhi_recommendation2_days->num_rows()>0){
								
								$step13_day= $fhi_recommendation2_days->result();
								$tank_count=0;
								foreach($step13_day as $step13_day_data){
									$fhi_recommendation2_days_id = $step13_day_data->id;
									$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,pass,fail,dump_temperature,machine_wash");
									
									$this->db->from("da_fhi_recommendation2_cycle");
									$this->db->where("fhi_recommendation2_days_id",$fhi_recommendation2_days_id);
									$fhi_recommendation2_cycle = $this->db->get();
									$resultStep13_days= array('sunday'=>$step13_day_data->sunday,'monday'=>$step13_day_data->monday,'tuesday'=>$step13_day_data->tuesday,'wednesday'=>$step13_day_data->wednesday,'thursday'=>$step13_day_data->thursday,'friday'=>$step13_day_data->friday,'saturday'=>$step13_day_data->saturday,'wash_type'=>$step13_day_data->wash_type);
									
									if($fhi_recommendation2_cycle->num_rows()>0){
										$step13_cycle_data = $fhi_recommendation2_cycle->result();
										$cycle_cnt=0;
										$resultStep13['machine_wash_data'][$tank_count]['sunday']=$resultStep13_days['sunday'];
											$resultStep13['machine_wash_data'][$tank_count]['monday']=$resultStep13_days['monday'];
											$resultStep13['machine_wash_data'][$tank_count]['monday']=$resultStep13_days['monday'];
											$resultStep13['machine_wash_data'][$tank_count]['tuesday']=$resultStep13_days['tuesday'];
											$resultStep13['machine_wash_data'][$tank_count]['wednesday']=$resultStep13_days['wednesday'];
											$resultStep13['machine_wash_data'][$tank_count]['thursday']=$resultStep13_days['thursday'];
											$resultStep13['machine_wash_data'][$tank_count]['friday']=$resultStep13_days['friday'];
											$resultStep13['machine_wash_data'][$tank_count]['saturday']=$resultStep13_days['saturday'];
											$resultStep13['machine_wash_data'][$tank_count]['wash_type']=$resultStep13_days['wash_type'];
										foreach($step13_cycle_data as $cycle_data){	
										
											$machine_wash=$cycle_data->machine_wash;
											
											
											$resultStep13['machine_wash_data'][$tank_count]['cycle'][$cycle_cnt]= array('description'=>$cycle_data->cycle_description,'volume'=>$cycle_data->volume,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'start_temp'=>$cycle_data->temp_start,'comments'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
											$cycle_cnt++;
										}
									}
									$tank_count++;
								}
							}
							
						}
					}
					/*Recommendation3*/
					$this->db->select("retain_existing,new_recommendation,id");
					$this->db->from("da_fhi_recommendation3");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation3 = $this->db->get();
					if($fhi_recommendation3->num_rows()>0){
						$step14= $fhi_recommendation3->result();
						
						$step14_data=$step14[0];
							$resultStep14= array('retain_existing'=>$step14_data->retain_existing,'new_recommendation'=>$step14_data->new_recommendation);
							$fhi_recommendation3_id = $step14_data->id;
							$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,dump_temperature,pass,fail,milk_tank");
							$this->db->from("da_fhi_recommendation3_cycle");
							$this->db->where("fhi_recommendation3_id",$fhi_recommendation3_id);
							$this->db->group_by("milk_tank");
							$fhi_recommendation3_cycle_out = $this->db->get();
							
							if($fhi_recommendation3_cycle_out->num_rows()>0){
								$step14_cycle_data_out= $fhi_recommendation3_cycle_out->result();
								$milk_tank_out_cmt=0;
							foreach($step14_cycle_data_out as $cycle_data_out)
							{
								/* inner start */
								$mik_tank_out=$cycle_data_out->milk_tank;
								$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,dump_temperature,pass,fail,milk_tank");
								$this->db->from("da_fhi_recommendation3_cycle");
								$this->db->where("fhi_recommendation3_id",$fhi_recommendation3_id);
								$this->db->where("milk_tank",$mik_tank_out);
								$fhi_recommendation3_cycle = $this->db->get();
								if($fhi_recommendation3_cycle->num_rows()>0){
									$step14_cycle_data= $fhi_recommendation3_cycle->result();
									$cnt_s14=0;
									foreach($step14_cycle_data as $cycle_data){
										$milk_tank=$cycle_data->milk_tank;
										$resultStep14['milk_tank'][$milk_tank_out_cmt]['milk_cycle'][$cnt_s14]= array('description'=>$cycle_data->cycle_description,'volume'=>$cycle_data->volume,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'temp_start'=>$cycle_data->temp_start,'comment'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
										$cnt_s14++;
										
									
									}
								}
								/* inner end */
								$milk_tank_out_cmt++;
							}
							}
							
						
					}
					
					$resultStep1 = array('fhi_id'=>$result->id,'bactoscan_tpc'=>$result->bactoscan_tpc,'thermodurics'=>$result->thermodurics,'other'=>$result->other,'other_description'=>$result->other_description,'latest_bactoscan'=>$result->latest_bactoscan,'cows_milked'=>$result->cows_milked,'latest_thermoducric'=>$result->latest_thermoducric,'milk_production_day'=>$result->milk_production_day,'milk_frequency'=>$result->milk_frequency,'bmilk_temprature'=>$result->bmilk_temprature,'tank_volume'=>$result->tank_volume,'temp_note_time'=>$result->temp_note_time,'elapsed_hour'=>$result->elapsed_hour,'elapsed_minutes'=>$result->elapsed_minutes,'comments'=>$result->comments,'invite_data'=>$resultStep1_invite);
					
					$resultStep2=array('milking_equipment'=>$result->milking_equipment,'cooling_equipment'=>$result->cooling_equipment,'heating_equipment'=>$result->heating_equipment,'wash_program'=>$result->wash_program,'wash_routinue'=>$result->wash_routinue,'staff_changes'=>$result->staff_changes,'other'=>$result->other_step2);
					
					$completeInvestigation =array('other_test_observation'=>$result->other_test_observation);
					
					/* Return JSON Start */
					$Owner = $this->getEmailOwner($OwnerID);
					$Last_completed_index = $result->Last_completed_index;
					$Status = $result->Status;					
				$result_return[$count_step]['Last_completed_index']=(int)$Last_completed_index;
				$result_return[$count_step]['Owner']=$Owner;
				$result_return[$count_step]['Status']=(int)$Status;
				$result_return[$count_step]['local_db_id']=$local_db_id;
				$result_return[$count_step]['farm_id']=$farm_id;
				$result_return[$count_step]['fhi_id']=$result->id;
				$result_return[$count_step]['investigationStep1']=$resultStep1;
				$result_return[$count_step]['investigationStep2']=$resultStep2;
				$result_return[$count_step]['investigationStep3']['water_details']=$resultStep3;
				$result_return[$count_step]['investigationStep4']['equipment_inspection']=$resultStep4;
				$result_return[$count_step] ['investigationStep5']= $resultStep5;
				$result_return[$count_step]['investigationStep5']['wash_assessment_cycle']= $resultStep5_cycle;
				$result_return[$count_step]['investigationStep6']['cleaning_solution']=$resultStep6;
				$result_return[$count_step]['investigationStep7'] = $resultStep7;
				$result_return[$count_step]['investigationStep8'] = $resultStep8;
				$result_return[$count_step]['investigationStep9'] = $resultStep9;
				$result_return[$count_step]['investigationStep9']['flow_rate_unit'] = $resultStep9_cycle;
				/*$result_return[$count_step]['investigationStep10']['milk_tank']['milk_cycle']=$resultStep10_cycle;*/
				$result_return[$count_step]['investigationStep10']=$resultStep10_cycle;
				$result_return[$count_step]['bulkMilkTankCleaning'] = $resultStep11;
				$result_return[$count_step]['completeInvestigation'] = $completeInvestigation;
				$result_return[$count_step]['investigationRecommendation1']['action_data'] = $resultStep12_recommend1;
				$result_return[$count_step]['investigationRecommendation2'] = $resultStep13;
				/* $result_return[$count_step]['investigationRecommendation2']['machine_wash_data'] = $resultStep13_days;
				$result_return[$count_step]['investigationRecommendation2']['machine_wash_data']['cycle'] = $resultStep13_cycle; */
				$result_return[$count_step]['investigationRecommendation3'] = $resultStep14;
				/* $result_return[$count_step]['investigationRecommendation3']['milk_tank']['milk_cycle']= $resultStep14_cycle; */
				$result_return[$count_step]['investigationRecommendation4']['action_data']=$resultStep12_recommend4;
				$count_step++;
				/*date_default_timezone_set('Asia/Kolkata');*/
				/*$logArr=array('message'=>serialize($result_return),'local_db_id'=>$local_db_id,'date_time'=>date("Y-m-d h:i:s")); */
						/* $logArr=array('message'=>serialize($input),'date_time'=>date("Y-m-d h:i:s")); */
						//$this->saveErrorLogGet($logArr);
					/* Return JSON End*/
				
				}
				
				return $result_return;
			}
			else{
				return false;
			}
		}
		
		/***********************************************************
		* Method Name   	: getInvestigationList
		* Description       : Get Investigation List
		* @Param            : farm_id
		* @return           : json data
		********************************************/
		function getInvestigationDetails($fhi_id)
		{
			$result = array();
			$result_return = array();
			$resultStep3 = array();
			
			$resultStep4 = array();
			$resultStep5 = array();
			$resultStep5_cycle = array();
			$resultStep6 = array();
			$resultStep7 = array();
			$resultStep8 = array();
			$resultStep9 = array();
			$resultStep11 = array();
			$resultStep12 = array();
			$resultStep12_recommend1 = array();
			$resultStep12_recommend4 = array();
			$resultStep9_cycle =array();
			$resultStep10 = array();
			$resultStep10_cycle = array(); 
			$resultStep13 = array(); 
			$resultStep13_cycle = array(); 
			$resultStep13_days = array();
			$resultStep14 = array();
			$resultStep14_cycle = array(); 
			$this->db->select("id,name,	bactoscan_tpc,thermodurics,other,other_description,latest_bactoscan,cows_milked,latest_thermoducric,milk_production_day,milk_frequency,bmilk_temprature,tank_volume,temp_note_time,elapsed_hour,elapsed_minutes,comments,milking_equipment,milking_equipment,cooling_equipment,heating_equipment,wash_program,wash_routinue,staff_changes,other_step2,other_test_observation,local_db_id,Status,OwnerID,Last_completed_index,farm_id");
			$this->db->from("da_farm_hygiene_investigation");
			$this->db->where("id",$fhi_id);

			$query =$this->db->get();
			
			if($query->num_rows()>0){
				
					$investigationData= $query->result();
					$step1_invite=array();
					$OwnerID = $investigationData[0]->OwnerID;
					$Last_completed_index =(int) $investigationData[0]->Last_completed_index;
					$Status = $investigationData[0]->Status;
					$fhi_id = $investigationData[0]->id;
					$farm_id = $investigationData[0]->farm_id;
					$local_db_id = $investigationData[0]->local_db_id;
					/*step 3*/
					$step3_datas=$this->getStep3Data($fhi_id );
					$step1_invite=$this->getStep1InviteData($fhi_id );
					
					if(!empty($step3_datas))
					{	$cont_s3=0;
						$resultStep3=array();
						foreach($step3_datas as $step3_data)
						{

							$resultStep3[$cont_s3]= array('hot_water'=>$step3_data->hot_water,'cold_water'=>$step3_data->cold_water,'test_date'=>$step3_data->test_date,'sample_from'=>$step3_data->sample_from,'ph'=>$step3_data->ph,'e_coli_count'=>$step3_data->e_coli_count,'iron'=>$step3_data->iron,'total_plate_count'=>$step3_data->total_plate_count,'total_hardness'=>$step3_data->total_hardness,'comments'=>$step3_data->comments);
							$cont_s3++;
						}	
					}
					if(!empty($step1_invite))
					{
						$cnt_s1_i=0;
						$resultStep1_invite=array();
						foreach($step1_invite as $step1_data)
						{
							if($OwnerID==$step1_data['user_id'])
							{
								$is_owner=1;
							}
							else
							{
								$is_owner=0;
							}
							$resultStep1_invite[$cnt_s1_i]= array('uid'=>$step1_data['user_id'],'is_exist'=>"1",'email'=>$step1_data['email'],'mobile'=>$step1_data['mobile'],'name'=>$step1_data['name'],'investigation_farmname'=>$step1_data['investigation_farmname'],'is_owner'=>$is_owner);
							$cnt_s1_i++;
						}
						
					}
					else
					{
						$resultStep1_invite=array();
					}
					
					/*step 4*/
					$this->db->select("name,clean,deposit_found,dirty,deposit_not_found,condition,comment,image,pass,fail");
					$this->db->from("da_fhi_equipment_inspection");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_equipment_inspection = $this->db->get();
					if($fhi_equipment_inspection->num_rows()>0){
						$cnt_s4=0;
						$resultStep4=array();
						$step4= $fhi_equipment_inspection->result();
						foreach($step4 as $step4_data){
							$resultStep4[$cnt_s4]= array('name'=>$step4_data->name,'clean'=>$step4_data->clean,'deposit_found'=>$step4_data->deposit_found,'dirty'=>$step4_data->dirty,'deposit_not_found'=>$step4_data->deposit_not_found,'condition'=>$step4_data->condition,'comment'=>$step4_data->comment,'image'=>$step4_data->image,'pass'=>$step4_data->pass,'fail'=>$step4_data->fail);
						$cnt_s4++;
						}
						
					}
					/*step 5*/
					$this->db->select("id,am,pm,other,name");
					$this->db->from("da_fhi_wash_assessment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_wash_assessment = $this->db->get();
					if($fhi_wash_assessment->num_rows()>0){
						$resultStep5_cycle = array();
						$step5 = $fhi_wash_assessment->result();
						foreach($step5 as $step5_data){
							$fhiwac_id= $step5_data->id;
							$this->db->select("description,volume,cleaner_sanitiser,start_temp,comments,dose,pass,fail,dump_temperature");
							$this->db->from("da_fhi_wash_assessment_cycle");
							$this->db->where("fhiwac_id",$fhiwac_id);
							$fhi_wash_assessment_cycle = $this->db->get();
							if($fhi_wash_assessment_cycle->num_rows()>0){
								$cnt_s5=0;
								$step5_cycle_data = $fhi_wash_assessment_cycle->result();
								foreach($step5_cycle_data as $cycle_data){
									
									$resultStep5_cycle[$cnt_s5]= array('volume'=>$cycle_data->volume,'description'=>$cycle_data->description,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'start_temp'=>$cycle_data->start_temp,'comments'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
									$cnt_s5++;
								}
							}
							$resultStep5= array('am'=>$step5_data->am,'pm'=>$step5_data->pm,'other'=>$step5_data->other,'name'=>$step5_data->name);
						}
					}
					/*step 6*/
					$this->db->select("alkali_ph_level,wash_active,chlorine_level,acid_ph_level,sanitiser_ph_level");
					$this->db->from("da_fhi_cleaning_solution");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_cleaning_solution = $this->db->get();
					if($fhi_cleaning_solution->num_rows()>0){
						$resultStep6 = array();
						$step6= $fhi_cleaning_solution->result();
						$cnt_s6=0;
						foreach($step6 as $step6_data){
							$resultStep6[$cnt_s6]= array('alkali_ph_level'=>$step6_data->alkali_ph_level,'wash_active'=>$step6_data->wash_active,'chlorine_level'=>$step6_data->chlorine_level,'acid_ph_level'=>$step6_data->acid_ph_level,'sanitiser_ph_level'=>$step6_data->sanitiser_ph_level);
							$cnt_s6++;
						}
					}
					/*step 7*/
					$this->db->select("liner_mouthpiece,liner_mouthpiece_yes,liner_mouthpiece_no,which_unit_liner,which_unit_liner_description,cleaning_solution_flow,cleaning_solution_flow_yes,cleaning_solution_flow_no,which_unit_cleaning,which_unit_cleaning_description,working_vacuum,working_vacuum_yes,working_vacuum_no,vacuum_kevek,vacuum_kevek_description,effective_reserve,effective_reserve_yes,effective_reserve_no");
					$this->db->from("da_fhi_cip_assetsment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_cip_assetsment = $this->db->get();
					if($fhi_cip_assetsment->num_rows()>0){
						$resultStep7 = array();
						$step7= $fhi_cip_assetsment->result();
						foreach($step7 as $step7_data){
							$resultStep7= array('liner_mouthpiece_yes'=>$step7_data->liner_mouthpiece_yes,'liner_mouthpiece_no'=>$step7_data->liner_mouthpiece_no,'which_unit_liner_description'=>$step7_data->which_unit_liner_description,'cleaning_solution_flow_yes'=>$step7_data->cleaning_solution_flow_yes,'cleaning_solution_flow_no'=>$step7_data->cleaning_solution_flow_no,'which_unit_cleaning_description'=>$step7_data->which_unit_cleaning_description,'working_vacuum_yes'=>$step7_data->working_vacuum_yes,'working_vacuum_no'=>$step7_data->working_vacuum_no,'vacuum_kevek_description'=>$step7_data->vacuum_kevek_description,'effective_reserve_yes'=>$step7_data->effective_reserve_yes,'effective_reserve_no'=>$step7_data->effective_reserve_no);
						}
					}
					/*step 8*/
					$this->db->select("injector_yes,injector_no,slug_wash_cycle,estimated_slug_screen,receiver_volume_1_2l,receiver_volume_2_3_f,receiver_volume_1_3_f,receiver_volume_2_3_g,receiver_volume_1_2_f,after_turn_yes,after_turn_no,instant_after_turn_yes,instant_after_turn_no,before_turn_yes,before_turn_no,little_no_action_yes,little_no_action_no,good_action_yes,little_action_yes,little_action_no,other_yes,good_action_no,other_no,comments");
					$this->db->from("da_fhi_slug_assessment");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_slug_assessment = $this->db->get();
					if($fhi_slug_assessment->num_rows()>0){
						$resultStep8 = array();
						$step8= $fhi_slug_assessment->result();
						foreach($step8 as $step8_data){
							$resultStep8= array('injector_yes'=>$step8_data->injector_yes,'injector_no'=>$step8_data->injector_no,'slug_wash_cycle'=>$step8_data->slug_wash_cycle,'estimated_slug_screen'=>$step8_data->estimated_slug_screen,'receiver_volume_1_2l'=>$step8_data->receiver_volume_1_2l,'receiver_volume_2_3_f'=>$step8_data->receiver_volume_2_3_f,'receiver_volume_1_3_f'=>$step8_data->receiver_volume_1_3_f,'receiver_volume_2_3_g'=>$step8_data->receiver_volume_2_3_g,'receiver_volume_1_2_f'=>$step8_data->receiver_volume_1_2_f,'after_turn_yes'=>$step8_data->after_turn_yes,'after_turn_no'=>$step8_data->after_turn_no,'instant_after_turn_yes'=>$step8_data->instant_after_turn_yes,'instant_after_turn_no'=>$step8_data->instant_after_turn_no,'before_turn_yes'=>$step8_data->before_turn_yes,'before_turn_no'=>$step8_data->before_turn_no,'little_no_action_yes'=>$step8_data->little_no_action_yes,'little_no_action_no'=>$step8_data->little_no_action_no,'good_action_yes'=>$step8_data->good_action_yes,'little_action_yes'=>$step8_data->little_action_yes,'little_action_no'=>$step8_data->little_action_no,'other_yes'=>$step8_data->other_yes,'good_action_no'=>$step8_data->good_action_no,'other_no'=>$step8_data->other_no,'comments'=>$step8_data->comments);
						}
					}
					
					/*step 9*/
					$this->db->select("id,pre_rinse,wash,average_flow_rate,final_rinse,allowance");
					$this->db->from("da_fhi_flow_rate");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_flow_rate = $this->db->get();
					if($fhi_flow_rate->num_rows()>0){
						$resultStep9_cycle = array();
						$step9= $fhi_flow_rate->result();
						foreach($step9 as $step9_data){
							$fhi_flow_rate_id = $step9_data->id;
							$this->db->select("unit_no,letter_line,volume_collected,time_elapsed,flow_rate,pass_fail,comments");
							$this->db->from("da_fhi_flow_rate_cycle");
							$this->db->where("fhi_flow_rate_id",$fhi_flow_rate_id);
							$fhi_flow_rate_cycle = $this->db->get();
							if($fhi_flow_rate_cycle->num_rows()>0){
								$cnt_s9=0;
								$step9_cycle_data = $fhi_flow_rate_cycle->result();
								foreach($step9_cycle_data as $cycle_data){	
									$resultStep9_cycle[$cnt_s9]= array('unit_no'=>$cycle_data->unit_no,'letter_line'=>$cycle_data->letter_line,'volume_collected'=>$cycle_data->volume_collected,'time_elapsed'=>$cycle_data->time_elapsed,'flow_rate'=>$cycle_data->flow_rate,'pass_fail'=>$cycle_data->pass_fail,'comments'=>$cycle_data->comments);
									$cnt_s9++;
								}	
							}
							$resultStep9= array('pre_rinse'=>$step9_data->pre_rinse,'wash'=>$step9_data->wash,'average_flow_rate'=>$step9_data->average_flow_rate,'final_rinse'=>$step9_data->final_rinse,'allowance'=>$step9_data->allowance);
						}
					}
					/*step 10*/
							$this->db->select("cycle_description,volume,cleanser_sanitiser,temp_start,comments,dose,pass,fail,dump_temperature,milk_tank");
							$this->db->from("da_fhi_program_assessment_cycle");
							$this->db->where("fhi_id",$fhi_id);
							$this->db->group_by('milk_tank');
							
							$fhi_program_assessment_cycle = $this->db->get();
							if($fhi_program_assessment_cycle->num_rows()>0){
								$resultStep10_cycle = array();
								$step10_cycle_data= $fhi_program_assessment_cycle->result();
								$cnt_s10_out=0;
								foreach($step10_cycle_data as $cycle_data){
								$milk_tank=$cycle_data->milk_tank;
								/*Inner Query Start */
								$this->db->select("cycle_description,volume,cleanser_sanitiser,temp_start,comments,dose,pass,fail,dump_temperature,milk_tank");
								$this->db->from("da_fhi_program_assessment_cycle");
								$this->db->where("fhi_id",$fhi_id);
								$this->db->where("milk_tank",$milk_tank);
								$fhi_program_assessment_cycle_inner = $this->db->get();
								/* Inner Query End */
									if($fhi_program_assessment_cycle_inner->num_rows()>0)
									{
										
										$cnt_s10=0;
										$step10_cycle_data_inner= $fhi_program_assessment_cycle_inner->result();
										foreach($step10_cycle_data_inner as $cycle_data_inner){
										$milk_tank_in=$cycle_data->milk_tank;
										$resultStep10_cycle['milk_tank'][$milk_tank_in]['milk_cycle'][$cnt_s10]= array('cycling_description'=>$cycle_data_inner->cycle_description,'volume'=>$cycle_data_inner->volume,'cleanser_sanitiser'=>$cycle_data_inner->cleanser_sanitiser,'temp_start'=>$cycle_data_inner->temp_start,'comment'=>$cycle_data_inner->comments,'dose'=>$cycle_data_inner->dose,'pass'=>$cycle_data_inner->pass,'fail'=>$cycle_data_inner->fail,'dump_temperature'=>$cycle_data_inner->dump_temperature);
										$cnt_s10++;
										}
									}
								}
							}
						
					/*bulk milk tank*/
					$this->db->select("alkali_ph_level,acid_ph_level,alkal_wash_active,sanitizer_ph_level,chlorine_level");
					$this->db->from("da_fhi_milk_tank_cleaning");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_milk_tank_cleaning = $this->db->get();
					if($fhi_milk_tank_cleaning->num_rows()>0){
						$step11= $fhi_milk_tank_cleaning->result();
						foreach($step11 as $step11_data){
							$resultStep11= array('alkali_ph_level'=>$step11_data->alkali_ph_level,'acid_ph_level'=>$step11_data->acid_ph_level,'alkal_wash_active'=>$step11_data->alkal_wash_active,'sanitizer_ph_level'=>$step11_data->sanitizer_ph_level,'chlorine_level'=>$step11_data->chlorine_level);
						}
					}
					
					
					/*Recommendation1*/
					$this->db->select("task_id,task_status,action_name,assign_name,assign_id,completion_date,due_date,completion_status,comments");
					$this->db->from("da_fhi_recommendation1");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation1 = $this->db->get();
					if($fhi_recommendation1->num_rows()>0){
						$cnt_rec1=0;
						$step12= $fhi_recommendation1->result();
						foreach($step12 as $step12_data)
						{
							$resultStep12_recommend1[$cnt_rec1]= array('task_id'=>$step12_data->task_id,'action_name'=>$step12_data->action_name,'assign_id'=>$step12_data->assign_id,'assign_name'=>$step12_data->assign_name,'due_date'=>$step12_data->due_date,'task_status'=>$step12_data->task_status);
							$resultStep12_recommend4[$cnt_rec1]= array('task_id'=>$step12_data->task_id,'task_status'=>$step12_data->task_status,'completion_date'=>$step12_data->completion_date,'comments'=>$step12_data->comments);
							$cnt_rec1++;
						}
					}
					/*Recommendation2*/
					$this->db->select("id,retain_existing,new_recommendation,reference_number");
					$this->db->from("da_fhi_recommendation2");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation2 = $this->db->get();
					if($fhi_recommendation2->num_rows()>0){
						$step13= $fhi_recommendation2->result();
						foreach($step13 as $step13_data){
							$fhi_recommendation2_id = $step13_data->id;
							$resultStep13= array('retain_existing'=>$step13_data->retain_existing,'new_recommendation'=>$step13_data->new_recommendation,'reference_number'=>$step13_data->reference_number);
							$this->db->select("sunday,monday,tuesday,wednesday,thursday,friday,saturday,wash_type,id");
							$this->db->from("da_fhi_recommendation2_days");
							$this->db->where("fhi_recommendation2_id",$fhi_recommendation2_id);
							$fhi_recommendation2_days = $this->db->get();
							if($fhi_recommendation2_days->num_rows()>0){
								
								$step13_day= $fhi_recommendation2_days->result();
								$tank_count=0;
								foreach($step13_day as $step13_day_data){
									$fhi_recommendation2_days_id = $step13_day_data->id;
									$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,pass,fail,dump_temperature,machine_wash");
									
									$this->db->from("da_fhi_recommendation2_cycle");
									$this->db->where("fhi_recommendation2_days_id",$fhi_recommendation2_days_id);
									$fhi_recommendation2_cycle = $this->db->get();
									$resultStep13_days= array('sunday'=>$step13_day_data->sunday,'monday'=>$step13_day_data->monday,'tuesday'=>$step13_day_data->tuesday,'wednesday'=>$step13_day_data->wednesday,'thursday'=>$step13_day_data->thursday,'friday'=>$step13_day_data->friday,'saturday'=>$step13_day_data->saturday,'wash_type'=>$step13_day_data->wash_type);
									
									if($fhi_recommendation2_cycle->num_rows()>0){
										$step13_cycle_data = $fhi_recommendation2_cycle->result();
										$cycle_cnt=0;
										$resultStep13['machine_wash_data'][$tank_count]['sunday']=$resultStep13_days['sunday'];
											$resultStep13['machine_wash_data'][$tank_count]['monday']=$resultStep13_days['monday'];
											$resultStep13['machine_wash_data'][$tank_count]['monday']=$resultStep13_days['monday'];
											$resultStep13['machine_wash_data'][$tank_count]['tuesday']=$resultStep13_days['tuesday'];
											$resultStep13['machine_wash_data'][$tank_count]['wednesday']=$resultStep13_days['wednesday'];
											$resultStep13['machine_wash_data'][$tank_count]['thursday']=$resultStep13_days['thursday'];
											$resultStep13['machine_wash_data'][$tank_count]['friday']=$resultStep13_days['friday'];
											$resultStep13['machine_wash_data'][$tank_count]['saturday']=$resultStep13_days['saturday'];
											$resultStep13['machine_wash_data'][$tank_count]['wash_type']=$resultStep13_days['wash_type'];
										foreach($step13_cycle_data as $cycle_data){	
										
											$machine_wash=$cycle_data->machine_wash;
											
											
											$resultStep13['machine_wash_data'][$tank_count]['cycle'][$cycle_cnt]= array('description'=>$cycle_data->cycle_description,'volume'=>$cycle_data->volume,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'start_temp'=>$cycle_data->temp_start,'comments'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
											$cycle_cnt++;
										}
									}
									$tank_count++;
								}
							}
							
						}
					}
					/*Recommendation3*/
					$this->db->select("retain_existing,new_recommendation,id");
					$this->db->from("da_fhi_recommendation3");
					$this->db->where("fhi_id",$fhi_id);
					$fhi_recommendation3 = $this->db->get();
					if($fhi_recommendation3->num_rows()>0){
						$step14= $fhi_recommendation3->result();
						
						$step14_data=$step14[0];
							$resultStep14= array('retain_existing'=>$step14_data->retain_existing,'new_recommendation'=>$step14_data->new_recommendation);
							$fhi_recommendation3_id = $step14_data->id;
							$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,dump_temperature,pass,fail,milk_tank");
							$this->db->from("da_fhi_recommendation3_cycle");
							$this->db->where("fhi_recommendation3_id",$fhi_recommendation3_id);
							$this->db->group_by("milk_tank");
							$fhi_recommendation3_cycle_out = $this->db->get();
							
							if($fhi_recommendation3_cycle_out->num_rows()>0){
								$step14_cycle_data_out= $fhi_recommendation3_cycle_out->result();
								$milk_tank_out_cmt=0;
							foreach($step14_cycle_data_out as $cycle_data_out)
							{
								/* inner start */
								$mik_tank_out=$cycle_data_out->milk_tank;
								$this->db->select("cycle_description,volume,cleaner_sanitiser,comments,temp_start,dose,dump_temperature,pass,fail,milk_tank");
								$this->db->from("da_fhi_recommendation3_cycle");
								$this->db->where("fhi_recommendation3_id",$fhi_recommendation3_id);
								$this->db->where("milk_tank",$mik_tank_out);
								$fhi_recommendation3_cycle = $this->db->get();
								if($fhi_recommendation3_cycle->num_rows()>0){
									$step14_cycle_data= $fhi_recommendation3_cycle->result();
									$cnt_s14=0;
									foreach($step14_cycle_data as $cycle_data){
										$milk_tank=$cycle_data->milk_tank;
										$resultStep14['milk_tank'][$milk_tank_out_cmt]['milk_cycle'][$cnt_s14]= array('description'=>$cycle_data->cycle_description,'volume'=>$cycle_data->volume,'cleaner_sanitiser'=>$cycle_data->cleaner_sanitiser,'temp_start'=>$cycle_data->temp_start,'comment'=>$cycle_data->comments,'dose'=>$cycle_data->dose,'pass'=>$cycle_data->pass,'fail'=>$cycle_data->fail,'dump_temperature'=>$cycle_data->dump_temperature);
										$cnt_s14++;
										
									
									}
								}
								/* inner end */
								$milk_tank_out_cmt++;
							}
							}
							
						
					}
					
					$resultStep1 = array('fhi_id'=>$investigationData[0]->id,'bactoscan_tpc'=>$investigationData[0]->bactoscan_tpc,'thermodurics'=>$investigationData[0]->thermodurics,'other'=>$investigationData[0]->other,'other_description'=>$investigationData[0]->other_description,'latest_bactoscan'=>$investigationData[0]->latest_bactoscan,'cows_milked'=>$investigationData[0]->cows_milked,'latest_thermoducric'=>$investigationData[0]->latest_thermoducric,'milk_production_day'=>$investigationData[0]->milk_production_day,'milk_frequency'=>$investigationData[0]->milk_frequency,'bmilk_temprature'=>$investigationData[0]->bmilk_temprature,'tank_volume'=>$investigationData[0]->tank_volume,'temp_note_time'=>$investigationData[0]->temp_note_time,'elapsed_hour'=>$investigationData[0]->elapsed_hour,'elapsed_minutes'=>$investigationData[0]->elapsed_minutes,'comments'=>$investigationData[0]->comments,'invite_data'=>$resultStep1_invite);
					
					$resultStep2=array('milking_equipment'=>$investigationData[0]->milking_equipment,'cooling_equipment'=>$investigationData[0]->cooling_equipment,'heating_equipment'=>$investigationData[0]->heating_equipment,'wash_program'=>$investigationData[0]->wash_program,'wash_routinue'=>$investigationData[0]->wash_routinue,'staff_changes'=>$investigationData[0]->staff_changes,'other'=>$investigationData[0]->other_step2);
					
					$completeInvestigation =array('other_test_observation'=>$investigationData[0]->other_test_observation);
					
					/* Return JSON Start */
					$Owner = $this->getEmailOwner($OwnerID);
					$Last_completed_index = $investigationData[0]->Last_completed_index;
					$Status = $investigationData[0]->Status;					
				$result_return['Last_completed_index']=(int)$Last_completed_index;
				$result_return['Owner']=$Owner;
				$result_return['Status']=(int)$Status;
				$result_return['local_db_id']=$local_db_id;
				$result_return['farm_id']=$farm_id;
				$result_return['fhi_id']=$investigationData[0]->id;
				$result_return['investigationStep1']=$resultStep1;
				$result_return['investigationStep2']=$resultStep2;
				$result_return['investigationStep3']['water_details']=$resultStep3;
				$result_return['investigationStep4']['equipment_inspection']=$resultStep4;
				$result_return ['investigationStep5']= $resultStep5;
				$result_return['investigationStep5']['wash_assessment_cycle']= $resultStep5_cycle;
				$result_return['investigationStep6']['cleaning_solution']=$resultStep6;
				$result_return['investigationStep7'] = $resultStep7;
				$result_return['investigationStep8'] = $resultStep8;
				$result_return['investigationStep9'] = $resultStep9;
				$result_return['investigationStep9']['flow_rate_unit'] = $resultStep9_cycle;
				/*$result_return['investigationStep10']['milk_tank']['milk_cycle']=$resultStep10_cycle;*/
				$result_return['investigationStep10']=$resultStep10_cycle;
				$result_return['bulkMilkTankCleaning'] = $resultStep11;
				$result_return['completeInvestigation'] = $completeInvestigation;
				$result_return['investigationRecommendation1']['action_data'] = $resultStep12_recommend1;
				$result_return['investigationRecommendation2'] = $resultStep13;
				/* $result_return['investigationRecommendation2']['machine_wash_data'] = $resultStep13_days;
				$result_return['investigationRecommendation2']['machine_wash_data']['cycle'] = $resultStep13_cycle; */
				$result_return['investigationRecommendation3'] = $resultStep14;
				/* $result_return['investigationRecommendation3']['milk_tank']['milk_cycle']= $resultStep14_cycle; */
				$result_return['investigationRecommendation4']['action_data']=$resultStep12_recommend4;
				
				
				
				return $result_return;
			}
			else{
				return false;
			}
		}		
		/***********************************************************
		* Method Name   	: investigationStep9
		* Description       : Farm Hygeine Investigation Step9
		* @Param            : All Farm Hygeine Investigation Step9  fields   
		* @return           : json data
		********************************************/
		function saveErrorLogGet($log_data)
		{
			$this->db->insert("da_error_log_investigation_get",$log_data);
				
		
		}
		/***********************************************************
		* Method Name   	: investigationStep9
		* Description       : Farm Hygeine Investigation Step9
		* @Param            : All Farm Hygeine Investigation Step9  fields   
		* @return           : json data
		********************************************/
		function saveErrorLog($log_data)
		{
			$this->db->insert("da_error_log_investigation",$log_data);
				
		
		}
		/***********************************************************
		* Method Name   	: deleteInvestigation
		* Description       : Delete Investigation
		* @Param            : fhi_id   
		* @return           : json data
		********************************************/
		function deleteInvestigation($fhi_id)
		{
			/* Investigation Table    */
			$this->db->where('id',$fhi_id);
			$this->db->delete('da_farm_hygiene_investigation');
			/* Invite table */
			$this->db->where('table_id',$fhi_id);
			$this->db->delete('da_invite_hygiene_investigation');
			
				
		
		}	
		/***********************************************************
		* Method Name   	: getFarmUsers
		* Description       : Get Invited Users
		* @Param            : user_id,webservice_token,farm_id contains
		* @return           : json data
		********************************************/
		function investigationUserList($fhi_id){
			$this->db->select("b.id as id,b.first_name as first_name, b.last_name last_name,b.email as email,b.mobile,a.status as invite_status");
			$this->db->from("da_invite_hygiene_investigation as a");
			$this->db->join("da_user as b","b.id=a.user_id");
			$where_cond = array('a.table_id'=>$fhi_id);
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

	}