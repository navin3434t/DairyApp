<?php
	class User_Model extends CI_Model
	{
		/***********************************************************
		* Method Name   	: userLogin
		* Description       : User Loin Validate 
		* @Param            : email,password    
		* @return           : json data
		********************************************/
		function userLogin($user_info){
			$email = $user_info["email"];
			$password = $user_info["password"];
			$where_cond = array("email"=>$email,"password"=>$password);
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$user_id = $result[0]->id;
				$email = $result[0]->email;
				$first_name = $result[0]->first_name;
				$last_name = $result[0]->last_name;
				$mobile = $result[0]->mobile;
				$home_contact = $result[0]->home_contact;
				$i_am = $result[0]->i_am;
				$position = $result[0]->position;
				$company = $result[0]->company;
				$token = bin2hex(openssl_random_pseudo_bytes(4));
				$tokendata = array("webservice_token"=>$token,"last_login"=>date("Y-m-d h:i:s"));
				$this->db->where('id', $user_id);
				$this->db->update('da_user',$tokendata);
				$data['webservice_token']= $token;
				$data['id']= $user_id;
				$data['email']= $email;
				$data['first_name']= $first_name;
				$data['last_name']= $last_name;
				$data['mobile']= $mobile;
				$data['home_contact']= $home_contact;
				$data['i_am']= $i_am;
				$data['position']= $position;
				$data['company']= $company;
				$response = array("user_exist"=>"1","data"=>$data);
			}
			else{
				$response = array("user_exist"=>"0");
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: checkExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkExistingUser($user_info)
		{
			$email = $user_info["email"];
			/* $where_cond = array("email"=>$email,"registration_status"=>1); */
			$where_cond = array("email"=>$email);
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$response = array("mail_exist"=>"1");
			}
			else
			{
				//$this->registerNewUser($user_info);
				$response = array("mail_exist"=>"0");
			}
			return $response;
			
		}
		/***********************************************************
		* Method Name   	: checkExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkUserEmailExists($user_id,$email)
		{
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where('email',$email);
			$this->db->where('id !=',$user_id);
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
		* Method Name   	: checkActiveExistingUser
		* Description       : check already existing user
		* @Param            : email
		* @return           : json data
		********************************************/
		function checkActiveExistingUser($user_info)
		{
			$email = $user_info["email"];
			$where_cond = array("email"=>$email,"registration_status"=>1);
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$response = array("mail_exist"=>"1");
			}
			else
			{
				//$this->registerNewUser($user_info);
				$response = array("mail_exist"=>"0");
			}
			return $response;
			
		}		
		
		/***********************************************************
		* Method Name   	: registerUser
		* Description       : Insert new user 
		* @Param            : first_name,last_name,mobile,email,password,i_am,position
		* @return           : json data
		********************************************/
		function registerUser($user_info)
		{
			$insert = $this->db->insert("da_user",$user_info);
			if($insert){
				$result = array("is_insert"=>"1");
			}
			else{
				$result = array("is_insert"=>"0");
			}
			return $result;			
		}
		
		/***********************************************************
		* Method Name   	: getUserData
		* Description       : Get data for logged in user 
		* @Param            : user_id,webservice_token    
		* @return           : json data
		********************************************/
		function getUserData($user_info)
		{
			$user_id = $user_info["user_id"];
			$token = $user_info["token"];
			$where_cond = array("id"=>$user_id,"webservice_token"=>$token);
			$this->db->select("first_name,last_name,email,mobile,i_am,position");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				$response = array("user_match"=>"1","data"=>$result);
			}
			else
			{
				$response = array("user_match"=>"0");
			}
			return $response;			
		}
		
		/***********************************************************
		* Method Name   	: validateWebservice
		* Description       : validate user 
		* @Param            : user_id,webservice_token    
		* @return           : json data
		********************************************/
		function validateWebservice($validate_data){
			$user_id = $validate_data['user_id'];
			$webservice_token = $validate_data['webservice_token'];
			$where_cond = array("id"=>$user_id,"webservice_token"=>$webservice_token);
			$this->db->select("*");
			$this->db->from("da_user");
			$this->db->where($where_cond);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$response = array("is_valid"=>"1");
			}
			else
			{
				$response = array("is_valid"=>"0");
			}
			return $response;
		}
		
		/***********************************************************
		* Method Name   	: updateUserData
		* Description       : update data for logged in user 
		* @Param            : user_id,webservice_token,email,password,mobile,position    
		* @return           : json data
		********************************************/
		function updateUserData($user_info,$user_id)
		{
			$this->db->from("da_user");
			$this->db->where('id', $user_id);
			$update = $this->db->update('da_user',$user_info);;
			if($update)
			{
				$response = array("user_updated"=>"1");
			}
			else
			{
				$response = array("user_updated"=>"0");
			}
			return $response;			
		}
		
		/***********************************************************
		* Method Name   	: userLogout
		* Description       : Logged out user
		* @Param            : user_id,webservice_token   
		* @return           : json data
		********************************************/
		function userLogout($user_id)
		{
			$this->db->from("da_user");
			$this->db->where('id', $user_id);
			$token = array("webservice_token"=>"");
			$update = $this->db->update('da_user',$token);
			if($update)
			{
				$response = array("user_logout"=>"1");
			}
			else
			{
				$response = array("user_logout"=>"0");
			}
			return $response;			
		}
		
	}
?>