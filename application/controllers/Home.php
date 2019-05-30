<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Home extends Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('menu_options_model', 'modelMenuOptions');
		$this->load->model('social_medias_model', 'modelSocialMedias');
		$this->load->model('featured_banners_model', 'modelFeaturedBanners');
		$this->load->model('highlights_model','modelHighlights');
		$this->load->model('travels_model','modelTravels');
		$this->load->model('services_model','modelServices');
	}

	public function index()
	{
		$menuOptions = $this->modelMenuOptions->getAllMenuOptions();
		$socialMedias = $this->modelSocialMedias->getAllSocialMedias();
		$banners = $this->modelFeaturedBanners->getAllFeaturedBanners();
		$highlights = $this->modelHighlights->getAllHighlightsActive();
		$travels = $this->modelTravels->getAllTravels();
		$services = $this->modelServices->getAllServices();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'socialMedias' => $socialMedias,
			'banners' => $banners,
			'highlights' => $highlights,
			'travels' => $travels,
			'services' => $services,
			'activeLink' => 0
		];

		$this->template->loadMain('home', $data);
	}

}
