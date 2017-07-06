<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
/**
 * 
 */

abstract class MY_Controller extends CI_Controller
{
	function MY_Controller()
	{
		parent::__construct();
		
		/*Load Base Codeigniter Files*/
		$this->load->database();
		
		/*Load Libraries*/
		$this->load->library("session");	##Load Session Class
		$this->load->library("email");		##Load Email Class
		
		/*Load Helpers*/
		$this->load->helper('url');		##Load URL Helper
		$this->load->helper("form");	##Load Form Helper
		
		/*Load Base Prop Files*/
		$this->load->config("prop");
	}
}
/* End of file MY_Controller.php */
/* Location: ./studyportal/libraries/MY_Controller.php */