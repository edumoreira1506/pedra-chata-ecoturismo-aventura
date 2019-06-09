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
		$this->load->model('infos_model','info');
		$this->load->model('static_images_model','staticImages');
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
		$infos = $this->info->getAllInfos();
		$staticImages = $this->staticImages->getAllImages();

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
			'publications' => $publications,
			'infos' => $infos,
			'staticImages' => $staticImages,
		];

		$this->template->loadMain('home', $data);
	}

}
