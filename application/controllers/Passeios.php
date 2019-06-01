<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Passeios extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('travels_model','travel');
		$this->load->model('images_model','image');
		$this->load->model('menu_options_model', 'menu');
		$this->load->model('social_medias_model', 'socialMedia');
		$this->load->model('testimonies_model', 'testimony');
		$this->load->model('categories_model','category');
	}

	public function index()
	{
		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();

		$testimonies = $this->testimony->getAllTestimonies();
		$categories = $this->category->getAllCategories();

		$travels = $this->travel->getAllTravels();

		$data = [
			'scripts' => ['default', 'travel'],
			'menuOptions' => $menuOptions,
			'socialMedias' => $socialMedias,
			'travels' => $travels,
			'testimonies' => $testimonies,
			'categories' => $categories,
			'activeLink' => 1
		];

		$this->template->loadMain('travels/travels', $data);
	}

}
