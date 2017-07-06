<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Front_Controller {

	/***********************************************************
	* Method Name   	: userLogin
	* Description       : User Loin Validate 
	* @Param            : email,password    
	* @return           : json data
	********************************************/
	public function userLogin()
	{
		if(isset($_POST) && !empty($_POST))
		{
			if((!empty($_POST['email']) && isset($_POST['email'])) && (!empty($_POST['password']) && isset($_POST['password'])) )
			{
				$email = $this->input->post("email");
				$pass = $this->input->post("password");
				$password = md5($pass);
				$user_info = array("email"=>$email,"password"=>$password);
				$user_exist = $this->UM->userLogin($user_info);
				if($user_exist["user_exist"]=="1")
				{
					echo json_encode(array("status"=>"1","msg"=>"Successfully Logged in","data"=>$user_exist['data']));
				}
				else{
					echo json_encode(array("status"=>"0","msg"=>"Invalid user"));
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
	* Method Name   	: registerUser
	* Description       : Insert new user
	* @Param            : first_name,last_name,mobile,email,password,i_am,position
	* @return           : json data
	********************************************/
	public function registerUser()
	{
		if(isset($_POST) && !empty($_POST))
		{
			if((!empty($_POST['first_name']) && isset($_POST['first_name'])) && (!empty($_POST['last_name']) && isset($_POST['last_name'])) && (!empty($_POST['mobile']) && isset($_POST['mobile'])) && (!empty($_POST['email']) && isset($_POST['email'])) && (!empty($_POST['password']) && isset($_POST['password'])) && (!empty($_POST['company']) && isset($_POST['company'])) && (!empty($_POST['i_am']) && isset($_POST['i_am'])) && (!empty($_POST['position']) && isset($_POST['position'])) )
			{
				$first_name = $this->input->post("first_name");
				$last_name = $this->input->post("last_name");
				$mobile = $this->input->post("mobile");
				$email = $this->input->post("email");
				$pass = $this->input->post("password");
				$company = $this->input->post("company");
				$i_am = $this->input->post("i_am");
				$position = $this->input->post("position");
				$password = md5($pass);
				$date_created =date("Y-m-d h:i:s");
				$user_info = array("first_name"=>$first_name,"last_name"=>$last_name,"email"=>$email,"mobile"=>$mobile,"password"=>$password,"company"=>$company,"i_am"=>$i_am,"position"=>$position,"create_date"=>$date_created);
				
				$check_user_info = array("email"=>$email);
				$user_exist = $this->UM->checkExistingUser($check_user_info);
				if(!empty($user_exist)){
					if($user_exist["mail_exist"]=="0")
					{
						$register= $this->UM->registerUser($user_info);
						if($register['is_insert']=='1')
						{	
							echo json_encode(array("status"=>"1","msg"=>"Successfully register"));
						}
						else{
							echo json_encode(array("status"=>"0","msg"=>"There is some problem during registration. Try again"));
						}
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Mail already Exist"));
						/*$isAlreadyExists=$this->UM->checkActiveExistingUser($check_user_info);
						
						if($isAlreadyExists['mail_exist']=='1')
						{	
							echo json_encode(array("status"=>"0","msg"=>"Mail already Exist"));
						}
						else{
							echo json_encode(array("status"=>"0","msg"=>"No invitation send to given email"));
						} */
						
					}
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
	* Method Name   	: getUserData
	* Description       : Get data for logged in user 
	* @Param            : user_id,webservice_token    
	* @return           : json data
	********************************************/
	public function getUserData()
	{ 
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) )
			{
				$user_id = $this->input->post("user_id");
				$token = $headerStringValue['webservice_token'];
				
				$user_info = array("user_id"=>$user_id,"token"=>$token);
				$user_data = $this->UM->getUserData($user_info);
				if($user_data["user_match"]=="1")
				{
					echo json_encode(array("status"=>"1","msg"=>"Data Found","data"=>$user_data['data']));
				}
				else{
					echo json_encode(array("status"=>"0","msg"=>"Data Not Found"));
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
	* Method Name   	: updateUserData
	* Description       : update data for logged in user 
	* @Param            : user_id,webservice_token,email, password,mobile, position    
	* @return           : json data
	********************************************/
	public function updateUserData()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token'])) && (!empty($_POST['email']) && isset($_POST['email'])) && (!empty($_POST['password']) && isset($_POST['password'])) && (!empty($_POST['mobile']) && isset($_POST['mobile'])) && (!empty($_POST['position']) && isset($_POST['position'])) && (!empty($_POST['company']) && isset($_POST['company']))  && (!empty($_POST['home_contact']) && isset($_POST['home_contact'])) )
			{
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1)
				{
					$email = $this->input->post("email");
					if($this->UM->checkUserEmailExists($user_id,$email))
					{
						$pass = $this->input->post("password");
						$mobile = $this->input->post("mobile");
						$home_contact =$this->input->post("home_contact");
						$company =$this->input->post("company");
						$position = $this->input->post("position");
						$password = md5($pass);
						$date_updated =date("Y-m-d h:i:s");
						$user_info = array("email"=>$email,"mobile"=>$mobile,"password"=>$password,'home_contact'=>$home_contact,'company'=>$company,"position"=>$position,"update_date"=>$date_updated);
						$user_data = $this->UM->updateUserData($user_info,$user_id);
						if($user_data["user_updated"]=="1")
						{
							echo json_encode(array("status"=>"1","msg"=>"Data Updated"));
						}
						else
						{
							echo json_encode(array("status"=>"0","msg"=>"Not Updated"));
						}
					}
					else
					{
						echo json_encode(array("status"=>"0","msg"=>"Email already used by some other user."));
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
		die();
	}

	
	/***********************************************************
	* Method Name   	: userLogout
	* Description       : Logged out user
	* @Param            : user_id,webservice_token    
	* @return           : json data
	********************************************/
	public function userLogout()
	{
		$headerStringValue = apache_request_headers();
		if(isset($_POST) && !empty($_POST))
		{
			if( (!empty($_POST['user_id']) && isset($_POST['user_id'])) && (!empty($headerStringValue['webservice_token']) ))
			{
				$user_id = $this->input->post("user_id");
				$webservice_token = $headerStringValue['webservice_token'];
				$validate_data = array("user_id"=>$user_id,"webservice_token"=>$webservice_token);
				/*call function for validate user */
				$validate = $this->UM->validateWebservice($validate_data);
				if($validate['is_valid']==1){
					
					$response = $this->UM->userLogout($user_id);
					if($response["user_logout"]=="1"){
						echo json_encode(array("status"=>"1","msg"=>"Successfully Logged out"));
					}
					else{
						echo json_encode(array("status"=>"0","msg"=>"There is some problem. Try again"));
					}
				}
				else{
					echo json_encode(array("status"=>"0","msg"=>"Invalid user"));
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
}