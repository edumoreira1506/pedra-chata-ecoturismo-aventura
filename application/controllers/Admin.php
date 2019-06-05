<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Admin extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('users_model','user');
		$this->load->model('menu_options_model','menu');
		$this->load->model('social_medias_model','socialMedia');
		$this->load->model('featured_banners_model','banner');
		$this->load->model('highlights_model','highlight');
		$this->load->model('travels_model','travel');
		$this->load->model('services_model','service');
		$this->load->model('images_model','image');
		$this->load->model('testimonies_model','testimony');
		$this->load->model('categories_model','category');
		$this->load->model('publications_model','publication');
		$this->load->model('team_person_model','person');
		$this->load->model('newsletter_model','lead');
		$this->load->model('accesses_model','access');
		$this->load->model('contact_model','contact');
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
			$leads = $this->lead->getAllLeads();
			$deviceAccesses = $this->access->getDeviceAccesses();
			$locationAcessess = $this->access->getLocationAccesses();
			$contacts = $this->contact->getAllContacts();

			$data = [
				'scripts' => ['admin', 'panel'],
				'active' => 0,
				'leads' => $leads,
				'deviceAccesses' => $deviceAccesses,
				'locationAcessess' => $locationAcessess,
				'contacts' => $contacts
			];
			
			$this->template->loadAdmin('admin/panel', $data);
		}else{
			redirect('admin');
		}
	}

	public function getAccesses()
	{
		if ($this->session->userdata('logado') && $this->input->is_ajax_request()) {
			$accesses = $this->access->getAccess12MonthsThisYear();
			echo json_encode($accesses);
		}else{
			redirect(base_url());
		}
	}

	public function usuarios()
	{
		if ($this->session->userdata('logado')) {
			$users = $this->user->getAllUsers();

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

	public function menus()
	{
		if ($this->session->userdata('logado')) {
			$menuOptions = $this->menu->getAllMenuOptions();

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

	public function redesSociais()
	{
		if ($this->session->userdata('logado')) {
			$socialMedias = $this->socialMedia->getAllSocialMedias();

			$data = [
				'scripts' => ['admin', 'social-medias'],
				'active' => 3,
				'socialMedias' => $socialMedias
			];
			
			$this->template->loadAdmin('admin/social-medias', $data);
		}else{
			redirect('admin');
		}
	} 

	public function bannersDestaque()
	{
		if ($this->session->userdata('logado')) {
			$banners = $this->banner->getAllFeaturedBanners();

			$data = [
				'scripts' => ['admin', 'featured-banners'],
				'active' => 4,
				'banners' => $banners
			];
			
			$this->template->loadAdmin('admin/featured-banners', $data);
		}else{
			redirect('admin');
		}
	}

	public function destaques()
	{
		if ($this->session->userdata('logado')) {
			$highlights = $this->highlight->getAllHighlights();

			$data = [
				'scripts' => ['admin', 'highlights'],
				'active' => 5,
				'highlights' => $highlights
			];
			
			$this->template->loadAdmin('admin/highlights', $data);
		}else{
			redirect('admin');
		}
	}

	public function passeios()
	{
		if ($this->session->userdata('logado')) {
			$travels = $this->travel->getAllTravels();

			$data = [
				'scripts' => ['admin', 'travels'],
				'active' => 6,
				'travels' => $travels
			];
			
			$this->template->loadAdmin('admin/travels', $data);
		}else{
			redirect('admin');
		}
	}

	public function servicos()
	{
		if ($this->session->userdata('logado')) {
			$services = $this->service->getAllServices();

			$data = [
				'scripts' => ['admin', 'services'],
				'active' => 7,
				'services' => $services
			];
			
			$this->template->loadAdmin('admin/services', $data);
		}else{
			redirect('admin');
		}
	}

	public function galeria()
	{
		if ($this->session->userdata('logado')) {
			$images = $this->image->getAllImages();
			$travels = $this->travel->getAllTravels();

			$data = [
				'scripts' => ['admin', 'images-travel'],
				'active' => 8,
				'images' => $images,
				'travels' => $travels
			];
			
			$this->template->loadAdmin('admin/images-travel', $data);
		}else{
			redirect('admin');
		}
	}

	public function depoimentos()
	{
		if ($this->session->userdata('logado')) {
			$testimonies = $this->testimony->getAllTestimonies();

			$data = [
				'scripts' => ['admin', 'testimonies'],
				'active' => 9,
				'testimonies' => $testimonies
			];
			
			$this->template->loadAdmin('admin/testimonies', $data);
		}else{
			redirect('admin');
		}
	}

	public function categorias()
	{
		if ($this->session->userdata('logado')) {
			$categories = $this->category->getAllCategories();

			$data = [
				'scripts' => ['admin', 'categories'],
				'active' => 10,
				'categories' => $categories
			];
			
			$this->template->loadAdmin('admin/categories', $data);
		}else{
			redirect('admin');
		}
	}

	public function postagens()
	{
		if ($this->session->userdata('logado')) {
			$publications = $this->publication->getPublications();
			$categories = $this->category->getAllCategories();

			$data = [
				'scripts' => ['admin', 'publications', 'summernote/summernote-bs4'],
				'active' => 11,
				'publications' => $publications,
				'categories' => $categories
			];
			
			$this->template->loadAdmin('admin/publications', $data);
		}else{
			redirect('admin');
		}
	}

	public function equipe()
	{
		if ($this->session->userdata('logado')) {
			$persons = $this->person->getAllPersonsTeam();

			$data = [
				'scripts' => ['admin', 'persons'],
				'active' => 12,
				'persons' => $persons
			];
			
			$this->template->loadAdmin('admin/persons', $data);
		}else{
			redirect('admin');
		}
	}

	public function registerNewSocialMedia()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$link = $this->input->post('link');
			$icon = $this->input->post('icon');

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar redes sociais'];
			}elseif($name == null || $name == "" || $link == null || $link == "" || $icon == null || $icon == ""){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}else{
				$socialMedia = new $this->socialMedia($name, $icon, null, $link);
				$socialMedia->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Rede social registrada!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewCategory()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$description = $this->input->post('description');

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar categorias'];
			}elseif($name == null || $name == "" || $description == null || $description == ""){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(strlen($name) > 30){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Nome da categoria precisa ter no máximo 30 caracteres'];
			}elseif(strlen($description) > 254){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Descrição da categoria precisa ter no máximo 254 caracteres'];
			}else{
				$category = new $this->category($name, $description);
				$category->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Categoria registrada!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewImage()
	{
		if($this->input->is_ajax_request()){
			$travel = $this->input->post('travel');
			$image = $_FILES['image'];

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar imagem'];
			}elseif($image == null || $travel == "" || $travel == null){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}else{
				$imageName = $image['name'];

				$data = [
					'id_travel' => $travel
				];

				if($image['name'] != ""){
					$imageName = $image['name'];
					$newImageName = date('Ymdhis').$imageName;

					$config = [
						'upload_path'   => '././public/images/images-travel',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					$data['image_path'] = $newImageName;

					if ($this->upload->do_upload('image')){
						$imageTravel = new $this->image($newImageName, $travel);
						$imageTravel->insert();

						$response = ['type' => 'success', 'message' => 'Imagem cadastrado com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				}else{
					$response = ['title' => 'Erro','type' => 'error', 'message' => 'Imagem é obrigatória'];
				}
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewPublication()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$idCategory = $this->input->post('id-category');
			$image = $_FILES['image'];

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar publicações'];
			}elseif($image == null || $title == "" || $title == null || $content == "" || $content == null || $idCategory == "" || $idCategory == null){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(strlen($title) >= 30){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Título pode ter no máximo 30 caracteres'];
			}else{
				$imageName = $image['name'];

				if($image['name'] != ""){
					$imageName = $image['name'];
					$newImageName = date('Ymdhis').$imageName;

					$config = [
						'upload_path'   => '././public/images/publications',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					if ($this->upload->do_upload('image')){
						$publication = new $this->publication($title, $content, $newImageName, null, null, $idCategory);
						$publication->insert();

						$response = ['type' => 'success', 'message' => 'Publicação cadastrada com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				}else{
					$response = ['title' => 'Erro','type' => 'error', 'message' => 'Imagem é obrigatória'];
				}
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewTestimony()
	{
		if($this->input->is_ajax_request()){
			$personName = $this->input->post('person-name');
			$testimony = $this->input->post('testimony');
			$image = $_FILES['image'];

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar depoimentos'];
			}elseif($image == null || $personName == "" || $personName == null || $testimony == "" || $testimony == null){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(strlen($personName) > 200){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Nome da pessoa pode ter no máximo 200 caracteres'];
			}elseif(strlen($testimony) > 254){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Depoimento máximo 254 caracteres'];
			}else{
				$imageName = $image['name'];

				if($image['name'] != ""){
					$imageName = $image['name'];
					$newImageName = date('Ymdhis').$imageName;

					$config = [
						'upload_path'   => '././public/images/testimonies',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);


					if ($this->upload->do_upload('image')){
						$testimony = new $this->testimony($testimony, $personName, $newImageName);
						$testimony->insert();

						$response = ['type' => 'success', 'message' => 'Depoimento cadastrado com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				}else{
					$response = ['title' => 'Erro','type' => 'error', 'message' => 'Imagem é obrigatória'];
				}
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewService()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$icon = $this->input->post('icon');

			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Você precisa estar logado para registar serviços'];
			}elseif($title == null || $title == "" || $description == null || $description == "" || $icon == null || $icon == ""){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(strlen($title) > 250){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Descrição deve ter no máximo 250 caracteres'];
			}elseif(strlen($title) >= 30){
				$response = ['title' => 'Erro','type' => 'error', 'message' => 'Título deve ter no máximo 30 caracteres'];
			}else{
				$service = new $this->service(null, $title, $description, $icon);
				$service->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Serviço registrado!'];
			}

			echo json_encode($response);
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
				$menuOption = $this->menu->getMenuOptionById($idMenuOption);
				$response = $menuOption;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getCategory()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar categorias'];
			}else{
				$idCategory = $this->input->post('idCategory');
				$category = $this->category->getCategoryById($idCategory);
				$response = $category;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getPerson()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar pessoas'];
			}else{
				$idPerson = $this->input->post('idPerson');
				$person = $this->person->getPersonById($idPerson);
				$response = $person;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getTestimony()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar depoimentos'];
			}else{
				$idTestimony = $this->input->post('idTestimony');
				$testimony = $this->testimony->getTestimonyById($idTestimony);
				$response = $testimony;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getService()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar serviços'];
			}else{
				$idService = $this->input->post('idService');
				$service = $this->service->getServiceById($idService);
				$response = $service;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getTravel()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar passeios'];
			}else{
				$idTravel = $this->input->post('idTravel');
				$travel = $this->travel->getTravelById($idTravel);
				$response = $travel;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getImage()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para visualizar imagens'];
			}else{
				$idImage = $this->input->post('idImage');
				$image = $this->image->getImageById($idImage);
				$response = $image;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getBanner()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar banners'];
			}else{
				$idBanner = $this->input->post('idBanner');
				$banner = $this->banner->getBannerById($idBanner);
				$response = $banner;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getPublication()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar publicações'];
			}else{
				$idPublication = $this->input->post('idPublication');
				$publication = $this->publication->getPublicationById($idPublication);
				$response = $publication;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getSocialMedia()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar redes sociais'];
			}else{
				$idSocialMedia = $this->input->post('idSocialMedia');
				$socialMedia = $this->socialMedia->getSocialMediaById($idSocialMedia);
				$response = $socialMedia;
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function getHighlight()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para editar destaques'];
			}else{
				$idHighlight = $this->input->post('idHighlight');
				$highlight = $this->highlight->getHighlightById($idHighlight);
				$response = $highlight;
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
			$exists = $this->user->getUserByEmail($email);

			if($name == "" || $name == null || $email == "" || $email == null || $password == "" || $password == null){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'E-mail em formato incorreto'];
			}elseif(strlen($password) < 6){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Senha precisa ter mais que 6 caracteres'];
			}elseif(count($exists) > 0){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Email já esta em uso'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Você precisa estar logado para criar usuários'];
			}else{
				$user = new $this->user($name, $email, $password);
				$user->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Usuário cadastrado'];
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
			$exists = $this->menu->getMenuOptionByLink($link);

			if($name == "" || $name == null || $link == "" || $link == null){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) > 0){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Link já esta em uso'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Você precisa estar logado para criar usuários'];
			}else{
				$menuOption = new $this->menu($name, $link);
				$menuOption->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Menu cadastrado'];
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
			$exists = $this->menu->getMenuOptionById($idMenuOption);

			if($name == "" || $name == null || $link == "" || $link == null){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) == 0){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Esse link é inexistente'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para editar menus'];
			}else{
				$data =[
					'name' => $name,
					'link' => $link
				];

				$this->menu->edit('menu_options', $data, 'id_menu', $idMenuOption);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Menu editado com sucesso'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editService()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$icon = $this->input->post('icon');
			$idService = $this->input->post('id-service');
			$exists = $this->service->getServiceById($idService);

			if($title == "" || $title == null || $description == "" || $description == null || $icon == "" || $icon == null){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) == 0){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Esse serviço é inexistente'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para editar serviços'];
			}elseif(strlen($title) <= 0 || strlen($title) >= 20){
				$response = ['type' => 'error', 'message' => 'Título precisa ter entre 1 e 20 caracteres', 'title' => 'Erro!'];
			}elseif(strlen($description) >= 200){
				$response = ['type' => 'error', 'message' => 'Descrição precisa ter entre 1 e 200 caracteres', 'title' => 'Erro!'];
			}else{
				$data =[
					'icon' => $icon,
					'title' => $title,
					'description' => $description
				];

				$this->service->edit('services', $data, 'id_service', $idService);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Serviço editado com sucesso'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editCategory()
	{
		if($this->input->is_ajax_request()){
			$idCategory = $this->input->post('idCategory');
			$name = $this->input->post('name');
			$description = $this->input->post('description');

			if($idCategory == "" || $idCategory == null || $name == "" || $name == null || $description == "" || $description == null){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado editar categorias'];
			}elseif(strlen($name) > 30){
				$response = ['type' => 'error', 'message' => 'Título precisa ter no máximo 30 caracteres', 'title' => 'Erro!'];
			}elseif(strlen($description) >= 254){
				$response = ['type' => 'error', 'message' => 'Descrição precisa ter no máximo 254 caracteres', 'title' => 'Erro!'];
			}else{
				$data = [
					'name' => $name,
					'description' => $description
				];

				$this->category->edit('categories', $data, 'id_category', $idCategory);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Categoria editado com sucesso'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editTravel()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$idTravel = $this->input->post('edit-id-travel');
			$exists = $this->travel->getTravelById($idTravel);

			if($title == "" || $title == null || $description == "" || $description == null || $price == "" || $price == null){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) == 0){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Esse passeio é inexistente'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para editar passeios'];
			}else{
				$data =[
					'title' => $title,
					'description' => $description,
					'price' => $price,
				];

				$this->travel->edit('travels', $data, 'id_travel', $idTravel);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Passeio editado com sucesso'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editBanner()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$idBanner = $this->input->post('id-banner');
			$description = $this->input->post('description');
			$buttonContent = $this->input->post('button-content');
			$buttonLink = $this->input->post('button-link');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($title == "" || $title == null || $description == "" || $description == null || $buttonContent == "" || $buttonContent == null || $buttonLink == "" || $buttonLink == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
				}else{
					$data = [
						'title' => $title,
						'description' => $description,
						'button_content' => $buttonContent,
						'button_link' => $buttonLink
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/featured-banners',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->banner->edit('banners', $data, 'id_banner', $idBanner);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Banner editado com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->banner->edit('banners', $data, 'id_banner', $idBanner);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Banner editado com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editPerson()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$idPerson = $this->input->post('id-person');
			$instagram = $this->input->post('instagram');
			$facebook = $this->input->post('facebook');
			$description = $this->input->post('description');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($name == "" || $name == null || $idPerson == "" || $idPerson == null || $instagram == "" || $instagram == null || $facebook == "" || $facebook == null || $description == "" || $description == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
				}else{
					$data = [
						'name' => $name,
						'instagram' => $instagram,
						'facebook' => $facebook,
						'description' => $description
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/persons',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->person->edit('persons_of_team', $data, 'id_person', $idPerson);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Pessoa editada com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->person->edit('persons_of_team', $data, 'id_person', $idPerson);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Pessoa editada com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editTestimony()
	{
		if($this->input->is_ajax_request()){
			$idTestimony = $this->input->post('id-testimony');
			$personName = $this->input->post('person-name');
			$testimony = $this->input->post('testimony');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($idTestimony == "" || $idTestimony == null || $personName == "" || $personName == null || $testimony == "" || $testimony == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Nome e depoimento são obrigatórios'];
				}elseif(strlen($personName) > 200){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Nome deve ter no máximo 200 caracteres'];
				}elseif(strlen($testimony) > 254){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Depoimento deve ter no máximo 254 caracteres'];
				}else{
					$data = [
						'person_name' => $personName,
						'testimony' => $testimony
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/testimonies',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->testimony->edit('testimonies', $data, 'id_testimony', $idTestimony);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Depoimento editado com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->testimony->edit('testimonies', $data, 'id_testimony', $idTestimony);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Depoimento editado com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editImage()
	{
		if($this->input->is_ajax_request()){
			$idTravel = $this->input->post('travel');
			$idImage = $this->input->post('id-image');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($idTravel == "" || $idTravel == null || $idTravel == "" || $idTravel == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Tipo de passeio é obrigatório'];
				}else{
					$data = [
						'id_travel' => $idTravel
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/images-travel',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->image->edit('images_travels', $data, 'id_image', $idImage);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Imagem editada com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->image->edit('images_travels', $data, 'id_image', $idImage);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Imagem editada com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editHighlight()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$idHighlight = $this->input->post('id-highlight');
			$description = $this->input->post('description');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($title == "" || $title == null || $idHighlight == "" || $idHighlight == null || $description == "" || $description == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
				}else{
					$data = [
						'title' => $title,
						'description' => $description
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/highlights',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->highlight->edit('highlights', $data, 'id_highlight', $idHighlight);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Destaque editado com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->highlight->edit('highlights', $data, 'id_highlight', $idHighlight);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Destaque editado com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editPublication()
	{
		if($this->input->is_ajax_request()){
			$title = $this->input->post('title');
			$idPublication = $this->input->post('id-publication');
			$content = $this->input->post('content');
			$image = $_FILES['image'];

			if ($this->session->userdata('logado')) {
				if($title == "" || $title == null || $idPublication == "" || $idPublication == null || $content == "" || $content == null){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
				}elseif(strlen($title) >= 30){
					$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Título pode ter no máximo 30 caracteres'];
				}else{
					$data = [
						'title' => $title,
						'content' => $content
					];

					if($image['name'] != ""){
						$imageName = $image['name'];
						$newImageName = date('Ymdhis').$imageName;

						$config = [
							'upload_path'   => '././public/images/publications',
							'allowed_types' => 'png|jpeg|jpg|gif',
							'file_name'     => $newImageName,
							'max_size'      => '500000'
						];  

						$this->load->library('upload');
						$this->upload->initialize($config);

						$data['image_path'] = $newImageName;

						if ($this->upload->do_upload('image')){
							$this->highlight->edit('publications', $data, 'id_publication', $idPublication);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Publicação editada com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->highlight->edit('publications', $data, 'id_publication', $idPublication);
						$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Publicação editada com sucesso'];
					}

				}
			}else{
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado', 'title' => 'Erro!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function editSocialMedia()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$link = $this->input->post('link');
			$icon = $this->input->post('icon');
			$idSocialMedia = $this->input->post('idSocialMedia');
			$exists = $this->socialMedia->getSocialMediaById($idSocialMedia);

			if($name == "" || $name == null || $link == "" || $link == null || $icon == null || $icon == ""){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) == 0){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Essa rede social é inexistente'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para editar redes sociais'];
			}else{
				$data =[
					'name' => $name,
					'link' => $link,
					'icon' => $icon
				];

				$this->socialMedia->edit('social_medias', $data, 'id_social_media', $idSocialMedia);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Rede social editada com sucesso'];
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

			$user = $this->user->getUserByEmail($email);
			if(count($user) == 0){
				$response = ['status' => false, 'title' => 'Ops' ,'type' => 'error', 'message' => 'Email ou senha inválidos'];
			}else{
				$encryptedPassword = $user->password;
				$decryptedPassword = $this->encrypt->decode($encryptedPassword);

				if($password != $decryptedPassword){
					$response = ['status' => false, 'title' => 'Ops' ,'type' => 'error', 'message' => 'Email ou senha inválidos'];
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
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar usuários'];
			}else{
				$userId = $this->input->post('userId');
				$this->user->delete('users', 'id_user', $userId);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Usuário excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deletePerson()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar pessoas da equipe'];
			}else{
				$idPerson = $this->input->post('idPerson');
				$this->person->delete('persons_of_team', 'id_person', $idPerson);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Pessoa da equipe excluida com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deletePublication()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar publicações'];
			}else{
				$idPublication = $this->input->post('idPublication');
				$this->user->delete('publications', 'id_publication', $idPublication);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Publicação excluida com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteCategory()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar categorias'];
			}else{
				$idCategory = $this->input->post('idCategory');
				$this->category->delete('categories', 'id_category', $idCategory);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Categoria excluída com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteTestimony()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar depoimentos'];
			}else{
				$idTestimony = $this->input->post('idTestimony');
				$this->user->delete('testimonies', 'id_testimony', $idTestimony);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Depoimento excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteImage()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar imagens'];
			}else{
				$idImage = $this->input->post('idImage');
				$this->image->delete('images_travels', 'id_image', $idImage);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Imagem excluida com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteService()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar serviços'];
			}else{
				$idService = $this->input->post('idService');
				$this->service->delete('services', 'id_service', $idService);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Serviço excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteTravel()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar passeios'];
			}else{
				$idTravel = $this->input->post('idTravel');
				$this->travel->delete('travels', 'id_travel', $idTravel);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Passeio excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteBanner()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar banners'];
			}else{
				$idBanner = $this->input->post('idBanner');
				$this->banner->delete('banners', 'id_banner', $idBanner);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Banner excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteHighlight()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar destaques'];
			}else{
				$idHighlight = $this->input->post('idHighlight');
				$this->highlight->delete('highlights', 'id_highlight', $idHighlight);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Destaque excluido com sucesso!'];
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
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar usuários'];
			}else{
				$idMenuOption = $this->input->post('idMenuOption');
				$this->menu->delete('menu_options', 'id_menu', $idMenuOption);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Menu/link excluido com sucesso!'];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function deleteSocialMedia()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops', 'type' => 'error', 'message' => 'Você precisa estar logado para deletar redes sociais'];
			}else{
				$idSocialMedia = $this->input->post('idSocialMedia');
				$this->socialMedia->delete('social_medias', 'id_social_media', $idSocialMedia);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Rede social excluida com sucesso!'];
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
				$users = $this->user->searchUsers($keyWord);

				$response = ['users' => $users];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchPersons()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar integrantes da equipe'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$persons = $this->person->searchPersons($keyWord);

				$response = ['persons' => $persons];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchPublications()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar posts'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$publications = $this->publication->searchPublications($keyWord);

				$response = ['publications' => $publications];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchCategories()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar categorias'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$categories = $this->category->searchCategories($keyWord);

				$response = ['categories' => $categories];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchTestimonies()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar depoimentos'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$testimonies = $this->testimony->searchTestimonies($keyWord);

				$response = ['testimonies' => $testimonies];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchImages()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar imagens'];
			}else{
				$idTravel = $this->input->post('idTravel');
				$images = $this->image->searchImages($idTravel);

				$response = ['images' => $images];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchServices()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar serviços'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$services = $this->service->searchServices($keyWord);

				$response = ['services' => $services];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchHighlights()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar destaques'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$highlights = $this->highlight->searchHighlights($keyWord);

				$response = ['highlights' => $highlights];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchBanners()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar banners'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$banners = $this->banner->searchBanners($keyWord);

				$response = ['banners' => $banners];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchTravels()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar passeios'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$travels = $this->travel->searchTravels($keyWord);

				$response = ['travels' => $travels];
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
				$menuOption = $this->menu->searchMenuOptions($keyWord);

				$response = ['menuOptions' => $menuOption];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function searchSocialMedia()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar redes sociais'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$socialMedias = $this->socialMedia->searchSocialMedia($keyWord);

				$response = ['menuOptions' => $socialMedias];
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewBanner()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para cadastrar banners', 'title' => 'Erro!'];
			}else{
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$buttonContent = $this->input->post('button-content');
				$buttonLink = $this->input->post('button-link');
				$image = $_FILES['image'];
				$imageName = $image['name'];

				if($title == null || $title == "" || $description == null || $description == "" || $buttonContent == null || $buttonContent == "" || $buttonLink == null || $buttonLink == "" || $image == null || $imageName == ""){
					$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
				}elseif(strlen($title) <= 0 || strlen($title) >= 20){
					$response = ['type' => 'error', 'message' => 'Título precisa ter entre 1 e 20 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($description) <= 0 || strlen($description) >= 200){
					$response = ['type' => 'error', 'message' => 'Descrição precisa ter entre 1 e 200 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($buttonContent) <= 0 || strlen($buttonContent) > 9){
					$response = ['type' => 'error', 'message' => 'Conteúdo do botão precisa ter entre 1 e 9 caracteres', 'title' => 'Erro!'];
				}else{
					$newImageName = date('Ymdhis').$imageName;
					$config = [
						'upload_path'   => '././public/images/featured-banners',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					if ($this->upload->do_upload('image')){
						$featuredBanner = new $this->banner($title, $description, $buttonContent, $buttonLink, $newImageName);
						$featuredBanner->insert();

						$response = ['type' => 'success', 'message' => 'Banner cadastrado com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				} 

			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewPerson()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para cadastrar pessoas na equipe', 'title' => 'Erro!'];
			}else{
				$name = $this->input->post('name');
				$instagram = $this->input->post('instagram');
				$facebook = $this->input->post('facebook');
				$description = $this->input->post('description');
				$image = $_FILES['image'];
				$imageName = $image['name'];

				if($name == null || $name == "" || $instagram == null || $instagram == "" || $facebook == null || $facebook == "" || $description == null || $description == "" || $image == null || $imageName == ""){
					$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
				}elseif(strlen($name) >= 255){
					$response = ['type' => 'error', 'message' => 'Nome pode ter no máximo 254 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($instagram) >= 255){
					$response = ['type' => 'error', 'message' => 'Instagram pode ter no máximo 254 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($facebook) >= 255){
					$response = ['type' => 'error', 'message' => 'Facebook pode ter no máximo 254 caracteres', 'title' => 'Erro!'];
				}else{
					$newImageName = date('Ymdhis').$imageName;
					$config = [
						'upload_path'   => '././public/images/persons',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					if ($this->upload->do_upload('image')){
						$person = new $this->person($name, $description, $facebook, $instagram, $newImageName);
						$person->insert();

						$response = ['type' => 'success', 'message' => 'Pessoa cadastrada com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				} 

			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function registerNewHighlight()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para cadastrar destaques', 'title' => 'Erro!'];
			}else{
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$image = $_FILES['image'];
				$imageName = $image['name'];

				if($title == null || $title == "" || $description == null || $description == "" || $image == null || $imageName == ""){
					$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
				}elseif(strlen($title) <= 0 || strlen($title) >= 30){
					$response = ['type' => 'error', 'message' => 'Título precisa ter entre 1 e 30 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($description) <= 0 || strlen($description) >= 200){
					$response = ['type' => 'error', 'message' => 'Descrição precisa ter entre 1 e 200 caracteres', 'title' => 'Erro!'];
				}else{
					$newImageName = date('Ymdhis').$imageName;

					$config = [
						'upload_path'   => '././public/images/highlights',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					if ($this->upload->do_upload('image')){
						$highlight = new $this->highlight(null, $title, $description, 0, $newImageName);
						$highlight->insert();

						$response = ['type' => 'success', 'message' => 'Destaque cadastrado com sucesso!', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				} 

			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}	
	}

	public function registerNewTravel()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para cadastrar passeios', 'title' => 'Erro!'];
			}else{
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$price = $this->input->post('price');
				$image = $_FILES['featured-image'];
				$imageName = $image['name'];

				if($title == null || $title == "" || $description == null || $description == "" || $image == null || $imageName == "" || $price == null || $price == ""){
					$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
				}elseif(strlen($title) <= 0 || strlen($title) >= 30){
					$response = ['type' => 'error', 'message' => 'Título precisa ter entre 1 e 30 caracteres', 'title' => 'Erro!'];
				}elseif(strlen($description) <= 0 || strlen($description) >= 200){
					$response = ['type' => 'error', 'message' => 'Descrição precisa ter entre 1 e 200 caracteres', 'title' => 'Erro!'];
				}else{
					$newImageName = date('Ymdhis').$imageName;

					$config = [
						'upload_path'   => '././public/images/featured-images-travels',
						'allowed_types' => 'png|jpeg|jpg|gif',
						'file_name'     => $newImageName,
						'max_size'      => '500000'
					];  

					$this->load->library('upload');
					$this->upload->initialize($config);

					if ($this->upload->do_upload('featured-image')){
						$travel = new $this->travel(null, $title, $description, $price, $newImageName);
						$travel->insert();

						$response = ['type' => 'success', 'message' => 'Passeio cadastrado com sucesso! Para inserir imagens, basta editá-lo', 'title' => 'Boa!'];
					}else{
						$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
					}
				} 

			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}
	}

	public function changeActiveHighlight()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para mudar o status do destaque', 'title' => 'Erro!'];
			}else{
				$idHighlight = $this->input->post('idHighlight');
				$status = $this->input->post('status');
				$highlights = $this->highlight->getAllHighlightsActive();

				if(count($highlights) >= 3 && $status){
					$response = ['type' => 'error', 'message' => 'Só pode existir três destaques ativos', 'title' => 'Erro!'];
				}else{
					if($idHighlight == null || $idHighlight == "" || $status == null || $status == "" ){
						$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
					}else{
						$data = [
							'active' => $status
						];

						$this->highlight->edit('highlights', $data, 'id_highlight', $idHighlight);
						$response = ['type' => 'success', 'message' => 'Destaque editado com sucesso', 'title' => 'Boa!'];
					}
				}
			}

			echo json_encode($response);
		}else{
			redirect('admin');
		}	
	}

}
