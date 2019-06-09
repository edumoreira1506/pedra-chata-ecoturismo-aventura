<?php

require_once "Base_model.php";

class Infos_model extends Base_model
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
		if(strlen($this->content) >= 100){
			return substr($this->content, 0, 100) . '...' ;
		}
		return $this->content;
	}

	public function getAllContent()
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

	public function getAllInfos()
	{
		$this->db->select("DATE_FORMAT(last_update,'%d/%m/%Y %H:%i') AS last_update, area, content, id_static");
		$this->db->where('page','INITIAL');
        $databaseInitialAreas  = $this->db->get('static_informations')->result();

        $allInfos = [];

        $initialInfos = [];
        foreach ($databaseInitialAreas as $databaseInitialArea) {
        	$info = new Infos_model(
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
        $databaseBlogAreas  = $this->db->get('static_informations')->result();

        $blogInfos = [];
        foreach ($databaseBlogAreas as $databaseBlogArea) {
        	$info = new Infos_model(
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
        $databaseContactAreas  = $this->db->get('static_informations')->result();

        $contactInfos = [];
        foreach ($databaseContactAreas as $databaseContactArea) {
        	$info = new Infos_model(
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
        $databaseTravelsArea  = $this->db->get('static_informations')->result();

        $travelsInfo = [];
        foreach ($databaseTravelsArea as $databaseTravel) {
        	$info = new Infos_model(
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
        $databaseAboutUsInfos  = $this->db->get('static_informations')->result();

        $abousUsInfos = [];
        foreach ($databaseAboutUsInfos as $databaseAboutUsInfo) {
        	$info = new Infos_model(
        		$databaseAboutUsInfo->area,
        		$databaseAboutUsInfo->content,
        		$databaseAboutUsInfo->last_update,
        		$databaseAboutUsInfo->id_static
        	);

        	$abousUsInfos[] = $info;
        }

        $allInfos['ABOUT US'] = $abousUsInfos;

        $this->db->select('*');
        $this->db->where('page','FOOTER');
        $databaseFooterInfos  = $this->db->get('static_informations')->result();

        $footerInfos = [];
        foreach ($databaseFooterInfos as $databaseFooterInfo) {
            $info = new Infos_model(
                $databaseFooterInfo->area,
                $databaseFooterInfo->content,
                $databaseFooterInfo->last_update,
                $databaseFooterInfo->id_static
            );

            $footerInfos[] = $info;
        }

        $allInfos['FOOTER'] = $footerInfos;

        return $allInfos;
    }

    public function getInfoById($infoId)
    {
      $this->db->select("DATE_FORMAT(last_update,'%d/%m/%Y %H:%i') AS last_update, area, content, id_static");
      $this->db->where('id_static', $infoId); 
      $this->db->limit(1);
      return $this->db->get('static_informations')->row();
  }

}