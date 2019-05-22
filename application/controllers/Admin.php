<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Admin extends Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('encrypt');
		$this->load->model('users_model','modelUsers');
		$this->load->model('menu_options_model','modelMenuOptions');
	}

	public function index()
	{
		if ($this->session->userdata('logado')) {
			redirect('admin/painel');
		}else{
			$data = [
				'scripts' => ['login']
			];

			$this->load->view('admin/login', $data);
		}
	}


	public function painel()
	{
		if ($this->session->userdata('logado')) {

			$data = [
				'scripts' => ['admin'],
				'active' => 0
			];
			
			$this->template->loadAdmin('admin/panel', $data);
		}else{
			redirect('admin');
		}
	}

	public function usuarios()
	{
		if ($this->session->userdata('logado')) {
			$users = $this->modelUsers->getAllUsers();

			$data = [
				'scripts' => ['admin','users', 'new-user'],
				'active' => 1,
				'users' => $users
			];

			$this->template->loadAdmin('admin/users', $data);
		}else{
			redirect('admin');
		}
	}

	public function menu()
	{
		if ($this->session->userdata('logado')) {
			$menuOptions = $this->modelMenuOptions->getAllMenuOptions();

			$data = [
				'scripts' => ['admin', 'menu-options', 'new-option-menu'],
				'active' => 2,
				'menuOptions' => $menuOptions
			];
			
			$this->template->loadAdmin('admin/menu-options', $data);
		}else{
			redirect('admin');
		}
	}

	public function getMenuOption()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar links do menu'];
			}else{
				$idMenuOption = $this->input->post('idMenuOption');
				$menuOption = $this->modelMenuOptions->getMenuOptionById($idMenuOption);
				$response = $menuOption;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function createNewUser()
	{
		if($this->input->is_ajax_request()){
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
			}elseif(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para criar usuários'];
			}else{
				$user = new $this->modelUsers($name, $email, $password);
				$user->insert();

				$response = ['type' => 'success', 'message' => 'Usuário cadastrado'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function createNewOptionMenu()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$link = $this->input->post('link');
			$exists = $this->modelMenuOptions->getMenuOptionByLink($link);

			if($name == "" || $name == null || $link == "" || $link == null){
				$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) > 0){
				$response = ['type' => 'error', 'message' => 'Link já esta em uso'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para criar usuários'];
			}else{
				$menuOption = new $this->modelMenuOptions($name, $link);
				$menuOption->insert();

				$response = ['type' => 'success', 'message' => 'Menu cadastrado'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editMenuOption()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$link = $this->input->post('link');
			$idMenuOption = $this->input->post('idMenuOption');
			$exists = $this->modelMenuOptions->getMenuOptionById($idMenuOption);

			if($name == "" || $name == null || $link == "" || $link == null){
				$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) == 0){
				$response = ['type' => 'error', 'message' => 'Esse link é inexistente'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar menus'];
			}else{
				$data =[
					'name' => $name,
					'link' => $link
				];

				$this->modelMenuOptions->edit('menu_options', $data, 'id_menu', $idMenuOption);
				$response = ['type' => 'success', 'message' => 'Menu editado com sucesso'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function login()
	{
		if($this->input->is_ajax_request() && !$this->session->userdata('logado')){
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->modelUsers->getUserByEmail($email);
			if(count($user) == 0){
				$response = ['status' => false, 'type' => 'error', 'message' => 'Email ou senha inválidos'];
			}else{
				$encryptedPassword = $user->password;
				$decryptedPassword = $this->encrypt->decode($encryptedPassword);

				if($password != $decryptedPassword){
					$response = ['status' => false, 'type' => 'error', 'message' => 'Email ou senha inválidos'];
				}else{
					$data = [
						'logado' => true
					];

					$this->session->set_userdata($data);
					$response = ['status' => true];
				}
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function exitOut()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function deleteUser()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para deletar usuários'];
			}else{
				$userId = $this->input->post('userId');
				$this->modelUsers->delete('users', 'id_user', $userId);

				$response = ['type' => 'success', 'message' => 'Usuário excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteMenuOption()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para deletar usuários'];
			}else{
				$idMenuOption = $this->input->post('idMenuOption');
				$this->modelMenuOptions->delete('menu_options', 'id_menu', $idMenuOption);

				$response = ['type' => 'success', 'message' => 'Menu/link excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchUsers()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar usuários'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$users = $this->modelUsers->searchUsers($keyWord);

				$response = ['users' => $users];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchMenuOptions()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar opções do menu'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$menuOption = $this->modelMenuOptions->searchMenuOptions($keyWord);

				$response = ['menuOptions' => $menuOption];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

}
