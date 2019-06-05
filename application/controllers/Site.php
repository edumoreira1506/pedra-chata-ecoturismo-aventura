<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Site extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('highlights_model','highlight');
		$this->load->model('accesses_model','access');
		$this->load->library('ipdetails');
	}

	public function getHighlight()
	{
		if($this->input->is_ajax_request()){
			$idHighlight = $this->input->post('idHighlight');
			$highlight = $this->highlight->getHighlightById($idHighlight);
			$response = $highlight;

			echo json_encode($response);
		}else{
			redirect(base_url());
		}
	}

	public function visit()
	{
		if($this->input->is_ajax_request()){
			$dispositiveWidth = $this->input->post('dispositiveWidth');
			$ip = $this->getClientIp();

			if($dispositiveWidth > 1920){
				$device = 'TV';
			}elseif($dispositiveWidth > 768){
				$device = 'COMPUTER';
			}elseif($dispositiveWidth > 415){
				$device = 'TABLET';
			}else{
				$device = 'CELLPHONE';
			}

			$ipDetails = new $this->ipdetails($ip);
			$city = $ipDetails->get_city();

			$access = new $this->access($ip, $device, $city);
			$access->insert();
		}else{
			redirect(base_url());
		}
	}

	private function getClientIp() {
		$ipAddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipAddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipAddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipAddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipAddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipAddress = 'UNKNOWN';
		return $ipAddress;
	}

}
