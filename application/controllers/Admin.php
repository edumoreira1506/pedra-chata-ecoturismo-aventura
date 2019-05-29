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
		$this->load->model('social_medias_model','modelSocialMedias');
		$this->load->model('featured_banners_model','modelFeaturedBanners');
		$this->load->model('highlights_model','modelHighlights');
		$this->load->model('travels_model','modelTravels');
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

	public function menus()
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

	public function redesSociais()
	{
		if ($this->session->userdata('logado')) {
			$socialMedias = $this->modelSocialMedias->getAllSocialMedias();

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
			$banners = $this->modelFeaturedBanners->getAllFeaturedBanners();

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
			$highlights = $this->modelHighlights->getAllHighlights();

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
			$travels = $this->modelTravels->getAllTravels();

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
				$socialMedia = new $this->modelSocialMedias($name, $icon, null, $link);
				$socialMedia->insert();

				$response = ['title' => 'Sucesso','type' => 'success', 'message' => 'Rede social registrada!'];
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
				$menuOption = $this->modelMenuOptions->getMenuOptionById($idMenuOption);
				$response = $menuOption;
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
				$banner = $this->modelFeaturedBanners->getBannerById($idBanner);
				$response = $banner;
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
				$socialMedia = $this->modelSocialMedias->getSocialMediaById($idSocialMedia);
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
				$highlight = $this->modelHighlights->getHighlightById($idHighlight);
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
			$exists = $this->modelUsers->getUserByEmail($email);

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
				$user = new $this->modelUsers($name, $email, $password);
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
			$exists = $this->modelMenuOptions->getMenuOptionByLink($link);

			if($name == "" || $name == null || $link == "" || $link == null){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Todos campos são obrigatórios'];
			}elseif(count($exists) > 0){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Link já esta em uso'];
			}elseif(!$this->session->userdata('logado')){
				$response = ['title' => 'Ops','type' => 'error', 'message' => 'Você precisa estar logado para criar usuários'];
			}else{
				$menuOption = new $this->modelMenuOptions($name, $link);
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
			$exists = $this->modelMenuOptions->getMenuOptionById($idMenuOption);

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

				$this->modelMenuOptions->edit('menu_options', $data, 'id_menu', $idMenuOption);
				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Menu editado com sucesso'];
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
							$this->modelFeaturedBanners->edit('banners', $data, 'id_banner', $idBanner);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Banner editado com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->modelFeaturedBanners->edit('banners', $data, 'id_banner', $idBanner);
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
							$this->modelHighlights->edit('highlights', $data, 'id_highlight', $idHighlight);
							$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Destaque editado com sucesso'];
						}else{
							$response = ['type' => 'error', 'message' => 'Erro interno no upload', 'title' => 'Erro!'];
						}
					}else{
						$this->modelHighlights->edit('highlights', $data, 'id_highlight', $idHighlight);
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

	public function editSocialMedia()
	{
		if($this->input->is_ajax_request()){
			$name = $this->input->post('name');
			$link = $this->input->post('link');
			$icon = $this->input->post('icon');
			$idSocialMedia = $this->input->post('idSocialMedia');
			$exists = $this->modelSocialMedias->getSocialMediaById($idSocialMedia);

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

				$this->modelSocialMedias->edit('social_medias', $data, 'id_social_media', $idSocialMedia);
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

			$user = $this->modelUsers->getUserByEmail($email);
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
				$this->modelUsers->delete('users', 'id_user', $userId);

				$response = ['title' => 'Sucesso', 'type' => 'success', 'message' => 'Usuário excluido com sucesso!'];
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
				$this->modelFeaturedBanners->delete('banners', 'id_banner', $idBanner);

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
				$this->modelHighlights->delete('highlights', 'id_highlight', $idHighlight);

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
				$this->modelMenuOptions->delete('menu_options', 'id_menu', $idMenuOption);

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
				$this->modelSocialMedias->delete('social_medias', 'id_social_media', $idSocialMedia);

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
				$users = $this->modelUsers->searchUsers($keyWord);

				$response = ['users' => $users];
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
				$highlights = $this->modelHighlights->searchHighlights($keyWord);

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
				$banners = $this->modelFeaturedBanners->searchBanners($keyWord);

				$response = ['banners' => $banners];
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

	public function searchSocialMedia()
	{
		if($this->input->is_ajax_request()){
			if(!$this->session->userdata('logado')){
				$response = ['type' => 'error', 'message' => 'Você precisa estar logado para buscar redes sociais'];
			}else{
				$keyWord = $this->input->post('keyWord');
				$socialMedias = $this->modelSocialMedias->searchSocialMedia($keyWord);

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
						$featuredBanner = new $this->modelFeaturedBanners($title, $description, $buttonContent, $buttonLink, $newImageName);
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
						$highlight = new $this->modelHighlights(null, $title, $description, 0, $newImageName);
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
						$travel = new $this->modelTravels(null, $title, $description, $price, $newImageName);
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
				$highlights = $this->modelHighlights->getAllHighlightsActive();

				if(count($highlights) >= 3 && $status){
					$response = ['type' => 'error', 'message' => 'Só pode existir três destaques ativos', 'title' => 'Erro!'];
				}else{
					if($idHighlight == null || $idHighlight == "" || $status == null || $status == "" ){
						$response = ['type' => 'error', 'message' => 'Todos campos são obrigatórios', 'title' => 'Erro!'];
					}else{
						$data = [
							'active' => $status
						];

						$this->modelHighlights->edit('highlights', $data, 'id_highlight', $idHighlight);
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
