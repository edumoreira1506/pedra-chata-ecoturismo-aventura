<?php

require_once "Base_model.php";

class Featured_banners_model extends Base_model
{
	private $bannerId;
	private $title;
	private $description;
	private $buttonContent;
	private $buttonLink;
	private $imagePath;

	public function __construct($title = null, $description = null, $buttonContent = null, $buttonLink = null, $imagePath = null, $bannerId = null)
	{
		parent::__construct();

		$this->buttonContent = $buttonContent;
		$this->title = $title;
		$this->description = $description;
		$this->buttonLink = $buttonLink;
		$this->imagePath = $imagePath;
		$this->bannerId = $bannerId;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getButtonContent()
	{
		return $this->buttonContent;
	}

	public function getButtonLink()
	{
		return $this->buttonLink;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

	public function getBannerId()
	{
		return $this->bannerId;
	}

	public function insert()
	{
		$data = [
			'title' => $this->title,
			'description' => $this->description,
			'button_content' => $this->buttonContent,
			'button_link' => $this->buttonLink,
			'image_path' => $this->imagePath
		];

		$this->bannerId = $this->addGetId('banners', $data);
	}

	public function getAllFeaturedBanners()
	{
		$this->db->select('*');
        $databaseFeaturedBanners  = $this->db->get('banners')->result();

        $featuredBanners = [];
        foreach ($databaseFeaturedBanners as $databaseFeaturedBanner) {
        	$featuredBanner = new Featured_banners_model(
        		$databaseFeaturedBanner->title,
        		$databaseFeaturedBanner->description,
        		$databaseFeaturedBanner->button_content,
        		$databaseFeaturedBanner->button_link,
        		$databaseFeaturedBanner->image_path,
        		$databaseFeaturedBanner->id_banner
        	);

        	$featuredBanners[] = $featuredBanner;
        }

        return $featuredBanners;
	}

	public function searchBanners($keyWord)
	{
		$this->db->select('*');
		$this->db->like('title', "$keyWord");
		$this->db->or_like('description', "$keyWord");

        $databaseUsers  = $this->db->get('banners')->result();
        return $databaseUsers;
	}

	public function getBannerById($idBanner)
	{
		$this->db->select('*');
		$this->db->where('id_banner', $idBanner); 
        $this->db->limit(1);
        return $this->db->get('banners')->row();
	}

}