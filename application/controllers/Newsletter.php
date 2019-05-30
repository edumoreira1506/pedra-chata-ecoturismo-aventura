<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Newsletter extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newsletter_model','modelNewsletter');
	}

	public function insert()
	{
		$email = $this->input->post('email');
		$validation = $this->modelNewsletter->getNewsletterByEmail($email);

		if($email == null || $email == ""){
			$response = ['title' => 'Ops','type' => 'error', 'message' => 'E-mail não pode ser nulo!'];
		}elseif(count($validation) >= 1){
			$response = ['title' => 'Ops','type' => 'error', 'message' => 'E-mail já registrado!'];
		}else{
			$subscriber = new $this->modelNewsletter($email);
			$subscriber->insert();

			$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'E-mail registrado com sucesso!'];
		}

		echo json_encode($response);
	}

}
