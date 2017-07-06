<?php
	class Dashboard_Model extends CI_Model
	{
		
		/***********************************************************
		* Method Name   	: getFarmInviteList
		* Description       : Fetch User Invites List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getFarmInviteList($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.create_date as create_date,c.post_code as farm_post_code,a.id as farm_invitation_id,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_farm_invite as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_farm as c',"c.id=a.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$farm_Data=array();
				foreach($result as $data)
				{
					$farm_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'farm_invitation_id'=>$data->farm_invitation_id,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$farm_Data;
			}
			else
			{
				$response = array();
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: getFarmInviteList
		* Description       : Fetch User Invites List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionMilkTankCleaning($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.program_name as action_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_milk_tank_cleaning as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_milk_tank_cleaning as d',"d.id=a.table_id");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>$data->action_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;				
			}
			else
			{
				$response = array();
			}
			return $response;
		}		
		
		/***********************************************************
		* Method Name   	: getActionCIPCleaningRoutinue
		* Description       : Fetch User Invites List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionCIPCleaningRoutinue($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.name as action_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_cip_cleaning_routine as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_cip_cleaning_routine as d',"d.id=a.table_id");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>$data->action_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$response = array();
			}
			return $response;
		}
		/***********************************************************
		* Method Name   	: getActionCoolingPerformance
		* Description       : Fetch User Invites List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionCoolingPerformance($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.name as action_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_cooling_performace as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_cooling_performance as d',"d.id=a.table_id");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>$data->action_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$result = array();
			}
			return $result;
		}	
		/***********************************************************
		* Method Name   	: getActionFarmHygeineInvestigation
		* Description       : Fetch User Action Invite List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionFarmHygeineInvestigation($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.name as action_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_hygiene_investigation as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_farm_hygiene_investigation as d',"d.id=a.table_id");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>'Investigation - '.$data->farm_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$response = array();
			}
			return $response;
		}
		/***********************************************************
		* Method Name   	: getActionHygeineInvestigationRecommendation1
		* Description       : Fetch Investigation Recommendation1 Invite List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionHygeineInvestigationRecommendation1($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.action_name as action_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_fhi_recommendation1 as a');
			$this->db->join('da_user as b',"b.id=a.user_id");
			$this->db->join('da_fhi_recommendation1 as d',"d.id=a.table_id");
			$this->db->join(' da_farm_hygiene_investigation as e',"e.id=d.fhi_id");
			$this->db->join('da_farm as c',"c.id=e.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>$data->action_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$response = array();
			}
			return $response;
		}
		/***********************************************************
		* Method Name   	: getActionMilkMachineCleaning
		* Description       : Fetch User Action Invite List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionMilkMachineCleaning($user_id)
		{
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.program_name as action_name,b.first_name as invite_first_name,b.last_name as invite_last_name,d.create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id');
			$this->db->from('da_invite_milking_machine_cleaning as a');
			$this->db->join('da_user as b',"b.id=a.invited_by");
			$this->db->join('da_milking_machine_cleaning as d',"d.id=a.table_id");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>$data->action_name,'created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$response = array();
			}
			return $response;
		}		
		
		/***********************************************************
		* Method Name   	: getActionHygeineTracker
		* Description       : Fetch User Action Invite List
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function getActionHygeineTracker($user_id)
		{
			/* $this->db->select('a.*'); */
			$this->db->select('c.name as farm_name,c.id as farm_id,c.address as farm_address,c.post_code as farm_post_code,a.id as action_invite_id,d.date as action_date,b.first_name as invite_first_name,b.last_name as invite_last_name,d.date as create_date,b.first_name as u_first_name,b.last_name as u_last_name,b.id as user_id'); 
			$this->db->from('da_invite_hygeine_tracker as a');
			$this->db->join('da_hygeine_tracker as d',"d.id=a.table_id");
			$this->db->join('da_user as b',"b.id=a.invited_by");
			$this->db->join('da_farm as c',"c.id=d.farm_id");
			$this->db->where("a.user_id",$user_id);
			$this->db->where("a.status","0");
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$action_Data=array();
				foreach($result as $data)
				{
					$action_Data[]=array('farm_name'=>$data->farm_name,'farm_id'=>$data->farm_id,'farm_address'=>$data->farm_address,'create_date'=>$data->create_date,'farm_post_code'=>$data->farm_post_code,'action_invite_id'=>$data->action_invite_id,'action_name'=>'','created_by'=>$data->u_first_name." ".$data->u_last_name,"user_id"=>$data->user_id);
					
				}
				$response =$action_Data;					
			}
			else
			{
				$response = array();
			}
			return $response;
		}		
		/***********************************************************
		* Method Name   	: fetchFarmDetails
		* Description       : Fetch Farm Details
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function fetchFarmDetails($table,$where_cond)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
			}
			else
			{
				$result = array();
			}
			return $result;
		}
		
		/***********************************************************
		* Method Name   	: fetchFarmDetails
		* Description       : Fetch Farm Details
		* @Param            : user_id   
		* @return           : json data
		********************************************/
		function uploadImage($image_arr)
		{
			$query = $this->db->insert("da_image",$image_arr);
			if($query)
			{
				$image_id = $this->db->insert_id();
				$result = array('is_insert'=>"1",'image_id'=>$image_id);
			}
			else
			{
				$result = array('is_insert'=>"0");
			}
			return $result;
		}		
	}
?>