<?php

require_once "Base_model.php";

class Static_images_model extends Base_model
{
	private $staticId;
	private $area;
	private $content;
	private $lastUpdate;

	public function __construct($area = null, $content = null, $lastUpdate = null, $staticId = null)
	{
		parent::__construct();

		$this->area = $area;
		$this->content = $content;
		$this->staticId = $staticId;
		$this->lastUpdate = $lastUpdate;
	}

	public function getArea()
	{
		return $this->area;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getLastUpdate()
	{
		return $this->lastUpdate;
	}

	public function getStaticId()
	{
		return $this->staticId;
	}

	public function getAllImages()
	{
		$this->db->select("DATE_FORMAT(last_update,'%d/%m/%Y %H:%i') AS last_update, area, content, id_static");
		$this->db->where('page','INITIAL');
        $databaseInitialAreas  = $this->db->get('static_images')->result();

        $allInfos = [];

        $initialInfos = [];
        foreach ($databaseInitialAreas as $databaseInitialArea) {
        	$info = new Static_images_model(
        		$databaseInitialArea->area,
        		$databaseInitialArea->content,
        		$databaseInitialArea->last_update,
        		$databaseInitialArea->id_static
        	);

        	$initialInfos[] = $info;
        }

        $allInfos['INITIAL'] = $initialInfos;

        $this->db->select('*');
        $this->db->where('page','BLOG');
        $databaseBlogAreas  = $this->db->get('static_images')->result();

        $blogInfos = [];
        foreach ($databaseBlogAreas as $databaseBlogArea) {
        	$info = new Static_images_model(
        		$databaseBlogArea->area,
        		$databaseBlogArea->content,
        		$databaseBlogArea->last_update,
        		$databaseBlogArea->id_static
        	);

        	$blogInfos[] = $info;
        }

        $allInfos['BLOG'] = $blogInfos;

        $this->db->select('*');
        $this->db->where('page','CONTACT');
        $databaseContactAreas  = $this->db->get('static_images')->result();

        $contactInfos = [];
        foreach ($databaseContactAreas as $databaseContactArea) {
        	$info = new Static_images_model(
        		$databaseContactArea->area,
        		$databaseContactArea->content,
        		$databaseContactArea->last_update,
        		$databaseContactArea->id_static
        	);

        	$contactInfos[] = $info;
        }

        $allInfos['CONTACT'] = $contactInfos;

        $this->db->select('*');
        $this->db->where('page','TRAVELS');
        $databaseTravelsArea  = $this->db->get('static_images')->result();

        $travelsInfo = [];
        foreach ($databaseTravelsArea as $databaseTravel) {
        	$info = new Static_images_model(
        		$databaseTravel->area,
        		$databaseTravel->content,
        		$databaseTravel->last_update,
        		$databaseTravel->id_static
        	);

        	$travelsInfo[] = $info;
        }

        $allInfos['TRAVELS'] = $travelsInfo;

        $this->db->select('*');
        $this->db->where('page','ABOUT US');
        $databaseAboutUsInfos  = $this->db->get('static_images')->result();

        $abousUsInfos = [];
        foreach ($databaseAboutUsInfos as $databaseAboutUsInfo) {
        	$info = new Static_images_model(
        		$databaseAboutUsInfo->area,
        		$databaseAboutUsInfo->content,
        		$databaseAboutUsInfo->last_update,
        		$databaseAboutUsInfo->id_static
        	);

        	$abousUsInfos[] = $info;
        }

        $allInfos['ABOUT US'] = $abousUsInfos;

        return $allInfos;
    }

    public function getImageById($imageId)
    {
      $this->db->select("DATE_FORMAT(last_update,'%d/%m/%Y %H:%i') AS last_update, area, content, id_static");
      $this->db->where('id_static', $imageId); 
      $this->db->limit(1);
      return $this->db->get('static_images')->row();
  }

}