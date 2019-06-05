<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Passeio extends Base {

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
		$titleTravel = $this->uri->segment(2);

		if($titleTravel == "" || $titleTravel == null){
			redirect(base_url());
		}else{
			$arrayTitle = explode('-', $titleTravel);
			$titleTravel = implode(' ', $arrayTitle);
			$travel = $this->travel->getTravelByTitle($titleTravel);
			$images = $this->image->getImagesByTravelId($travel->getTravelId());

			$menuOptions = $this->menu->getAllMenuOptions();
			$socialMedias = $this->socialMedia->getAllSocialMedias();
			$testimonies = $this->testimony->getAllTestimonies();
			$travels = $this->travel->getAllTravels();
			$categories = $this->category->getAllCategories();

			$data = [
				'scripts' => ['default', 'travel'],
				'menuOptions' => $menuOptions,
				'socialMedias' => $socialMedias,
				'travel' => $travel,
				'travels' => $travels,
				'images' => $images,
				'categories' => $categories,
				'testimonies' => $testimonies,
				'activeLink' => 3
			];

			$this->template->loadMain('travels/travel', $data);
		}
	}

}
