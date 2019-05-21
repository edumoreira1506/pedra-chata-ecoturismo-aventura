<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Admin extends Base {

	public function __construct()
	{
		parent::__construct();

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
			$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios'];
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$response = ['type' => 'error', 'message' => 'E-mail em formato incorreto'];
		}elseif(strlen($password) < 6){
			$response = ['type' => 'error', 'message' => 'Senha precisa ter mais que 6 caracteres'];
		}elseif(count($exists) > 0){
			$response = ['type' => 'error', 'message' => 'Email já esta em uso'];
		}else{
			$user = new $this->modelUsers($name, $email, $password);
			$user->insert();

			$response = ['type' => 'success', 'message' => 'Usuário cadastrado'];
		}

		echo json_encode($response);
	}

}
