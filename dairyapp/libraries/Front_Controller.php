<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

/**
 * @subpackage      Controllers
 */
class Front_Controller extends My_Controller
{
	function Front_Controller()
	{
		parent::My_Controller();
		
			
		/*Load Models Here*/
		$this->load->model("User_Model","UM");
		$this->load->model("Farm_Model","FM");
		$this->load->model("MilkTankCleaning_Model","MTC");
		$this->load->model("DairyHygeineTracker_Model","DHT");
		$this->load->model("FarmHygeineInvestigation_Model","FHI");
		$this->load->model("MilkingMachineCleaning_Model","MMC");
		$this->load->model("CIPCleaningRoutine_Model","CCR");
		$this->load->model("CoolingPerformance_Model","CPM");
		$this->load->model("Dashboard_Model","DM");
		
		//$this->load->model("Cooling_Model","CM");
	}
	
	
	
}
/* End of Front_controller.php */
/* Location: ./studyportal/libraries/Front_Controller.php */
