<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Sobre extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model','category');
		$this->load->model('menu_options_model', 'menu');
		$this->load->model('social_medias_model', 'socialMedia');
		$this->load->model('travels_model', 'travel');
		$this->load->model('team_person_model', 'teamPerson');
		$this->load->model('infos_model','info');
		$this->load->model('static_images_model','staticImages');
	}

	public function index()
	{
		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$travels = $this->travel->getAllTravels();
		$categories = $this->category->getAllCategories();
		$persons = $this->teamPerson->getAllPersonsTeam();
		$infos = $this->info->getAllInfos();
		$staticImages = $this->staticImages->getAllImages();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'persons' => $persons,
			'activeLink' => 2,
			'infos' => $infos,
			'staticImages' => $staticImages,
		];

		$this->template->loadMain('about/home', $data);
	}

}
