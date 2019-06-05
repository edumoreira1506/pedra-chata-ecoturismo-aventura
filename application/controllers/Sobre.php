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
	}

	public function index()
	{
		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$travels = $this->travel->getAllTravels();
		$categories = $this->category->getAllCategories();
		$persons = $this->teamPerson->getAllPersonsTeam();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'persons' => $persons,
			'activeLink' => 2,
		];

		$this->template->loadMain('about/home', $data);
	}

}
