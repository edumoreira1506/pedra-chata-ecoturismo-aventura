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
	}

	public function index()
	{
		$menuOptions = $this->modelMenuOptions->getAllMenuOptions();
		$socialMedias = $this->modelSocialMedias->getAllSocialMedias();
		$banners = $this->modelFeaturedBanners->getAllFeaturedBanners();
		$highlights = $this->modelHighlights->getAllHighlightsActive();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'socialMedias' => $socialMedias,
			'banners' => $banners,
			'highlights' => $highlights,
			'activeLink' => 0
		];

		$this->template->loadMain('home', $data);
	}

}
