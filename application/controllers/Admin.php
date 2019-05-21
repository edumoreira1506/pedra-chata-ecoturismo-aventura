<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('encrypt');
		$this->load->model('users_model','modelUsers');
	}

	public function novoUsuario()
	{
		$data = [
			'scripts' => ['new-user']
		];

		$this->template->loadAdmin('admin/new-user-form', $data);
	}

	public function createNewUser()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$exists = $this->modelUsers->getUserByEmail($email);

		if($name == "" || $name == null || $email == "" || $email == null || $password == "" || $password == null){
			$response = ['status' => false, 'message' => 'Todos campos são obrigatórios'];
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$response = ['status' => false, 'message' => 'E-mail em formato incorreto'];
		}elseif(strlen($password) < 6){
			$response = ['status' => false, 'message' => 'Senha precisa ter mais que 6 caracteres'];
		}elseif(count($exists) > 0){
			$response = ['status' => false, 'message' => 'Email já esta em uso'];
		}else{
			$encryptedPassword = $this->encrypt->encode($password, encryption_key());
			$response = ['status' => true, 'message' => $encryptedPassword];
		}

		echo json_encode($response);
	}

}
