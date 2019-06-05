<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Contato extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model','category');
		$this->load->model('menu_options_model', 'menu');
		$this->load->model('social_medias_model', 'socialMedia');
		$this->load->model('travels_model', 'travel');
		$this->load->model('contact_model', 'contact');
	}

	public function index()
	{
		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$travels = $this->travel->getAllTravels();
		$categories = $this->category->getAllCategories();

		$data = [
			'scripts' => ['default', 'contact'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'activeLink' => 1,
		];

		$this->template->loadMain('contact/home', $data);
	}

	public function registerNewContact()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$message = $this->input->post('message');

			if($name == null || $name = "" || $email == null || $email = "" ||$message == null || $message = ""){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(strlen($name) > 254){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Nome pode ter no máximo 255 caracteres'];
			}elseif(strlen($email) > 254){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Email pode ter no máximo 255 caracteres'];
			}else{
				$contact = new $this->contact($this->input->post('message'), $this->input->post('email'), $this->input->post('message'));		
				$contact->insert();

				$response = ['title' => 'Boa','type' => 'success', 'message' => 'Mensagem enviada! Em breve, entraremos em contato com você!'];
			}

			echo json_encode($response);
		}else{
			redirect(base_url().'contato');
		}
	}

}
