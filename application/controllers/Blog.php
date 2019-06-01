<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Blog extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model','category');
		$this->load->model('menu_options_model', 'menu');
		$this->load->model('social_medias_model', 'socialMedia');
		$this->load->model('travels_model', 'travel');
		$this->load->model('publications_model', 'publication');
	}

	public function categorias()
	{
		$categoryName = $this->uri->segment(3);
		if($categoryName == null || $categoryName == ""){
			redirect(base_url().'blog');
		}else{
			$categoryNameArray = explode('-', $categoryName);
			$categoryName = implode(' ', $categoryNameArray);

			$category = $this->category->getCategoryByName($categoryName);
			$publications =  $this->publication->getAllPublicationsFromCategory($category->getCategoryId());

			$menuOptions = $this->menu->getAllMenuOptions();
			$socialMedias = $this->socialMedia->getAllSocialMedias();
			$travels = $this->travel->getAllTravels();
			$categories = $this->category->getAllCategories();

			$data = [
				'scripts' => ['default'],
				'menuOptions' => $menuOptions,
				'travels' => $travels,
				'socialMedias' => $socialMedias,
				'categories' => $categories,
				'activeLink' => 2,
				'category' => $category,
				'publications' => $publications
			];

			$this->template->loadMain('blog/category', $data);
		}
	}

	public function index()
	{
		$publications = $this->publication->getPublications(10, 0);

		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$travels = $this->travel->getAllTravels();
		$categories = $this->category->getAllCategories();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'activeLink' => 2,
			'publications' => $publications
		];

		$this->template->loadMain('blog/home', $data);
	}

}
