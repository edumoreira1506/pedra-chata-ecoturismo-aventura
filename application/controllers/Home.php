<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Home extends Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('menu_options_model', 'menu');
		$this->load->model('social_medias_model', 'socialMedia');
		$this->load->model('featured_banners_model', 'banner');
		$this->load->model('highlights_model','highlight');
		$this->load->model('travels_model','travel');
		$this->load->model('services_model','service');
		$this->load->model('categories_model','category');
		$this->load->model('publications_model','publication');
	}

	public function index()
	{
		$menuOptions = $this->menu->getAllMenuOptions();
		$socialMedias = $this->socialMedia->getAllSocialMedias();
		$banners = $this->banner->getAllFeaturedBanners();
		$highlights = $this->highlight->getAllHighlightsActive();
		$travels = $this->travel->getAllTravels();
		$services = $this->service->getAllServices();
		$categories = $this->category->getAllCategories();
		$publications = $this->publication->getPublications(2, 0);

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'socialMedias' => $socialMedias,
			'banners' => $banners,
			'highlights' => $highlights,
			'travels' => $travels,
			'services' => $services,
			'categories' => $categories,
			'activeLink' => 0,
			'publications' => $publications
		];

		$this->template->loadMain('home', $data);
	}

}
