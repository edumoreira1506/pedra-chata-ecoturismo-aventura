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
		$this->load->model('infos_model','info');
		$this->load->model('static_images_model','staticImages');
	}

	public function categorias()
	{
		$categoryName = $this->uri->segment(3);
		if($categoryName == null || $categoryName == ""){
			redirect(base_url().'blog');
		}else{
			$categoryNameArray = explode('-', $categoryName);
			$categoryName = implode(' ', $categoryNameArray);
			$categoryName = urldecode($categoryName);
			$category = $this->category->getCategoryByName($categoryName);
			$publications =  $this->publication->getAllPublicationsFromCategory($category->getCategoryId());

			$menuOptions = $this->menu->getAllMenuOptions();
			$socialMedias = $this->socialMedia->getAllSocialMedias();
			$travels = $this->travel->getAllTravels();
			$categories = $this->category->getAllCategories();
			$infos = $this->info->getAllInfos();
			$staticImages = $this->staticImages->getAllImages();

			$data = [
				'scripts' => ['default', 'category'],
				'menuOptions' => $menuOptions,
				'travels' => $travels,
				'socialMedias' => $socialMedias,
				'categories' => $categories,
				'activeLink' => 4,
				'category' => $category,
				'publications' => $publications,
				'infos' => $infos,
				'staticImages' => $staticImages,
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
		$infos = $this->info->getAllInfos();
		$staticImages = $this->staticImages->getAllImages();

		$data = [
			'scripts' => ['default', 'blog'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'activeLink' => 4,
			'publications' => $publications,
			'infos' => $infos,
			'staticImages' => $staticImages,
		];

		$this->template->loadMain('blog/home', $data);
	}

	public function post()
	{
		$postName = $this->uri->segment(3);
		$arrayPostName = explode('-', $postName);
		$postName = implode(' ', $arrayPostName);

		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$travels = $this->travel->getAllTravels();
		$categories = $this->category->getAllCategories();
		$publication = $this->publication->getPublicationByName($postName);
		$infos = $this->info->getAllInfos();
		$staticImages = $this->staticImages->getAllImages();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'travels' => $travels,
			'socialMedias' => $socialMedias,
			'categories' => $categories,
			'activeLink' => 4,
			'publication' => $publication,
			'infos' => $infos,
			'staticImages' => $staticImages,
		];

		$this->template->loadMain('blog/post', $data);
	}

	public function getMorePosts()
	{
		if($this->input->is_ajax_request()){
			$counterPost = $this->input->post('counterPost');
			$publications = $this->publication->getPublicationsAjax(10, $counterPost);
			echo json_encode($publications);
		}else{
			redirect(base_url());
		}
	}

	public function getMorePostsCategory()
	{
		if($this->input->is_ajax_request()){
			$counterPost = $this->input->post('counterPost');
			$categoryName = $this->input->post('categoryName');
			$publications = $this->publication->getPublicationsFromCategoryAjax(10, $counterPost, $categoryName);
			echo json_encode($publications);
		}else{
			redirect(base_url());
		}
	}

}
