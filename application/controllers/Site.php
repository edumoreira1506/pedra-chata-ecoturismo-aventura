<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Site extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('highlights_model','highlight');
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

}
