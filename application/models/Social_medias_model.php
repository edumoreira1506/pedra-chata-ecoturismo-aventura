<?php

require_once "Base_model.php";

class Social_medias_model extends Base_model
{
	private $socialMediaId;
	private $name;
	private $link;
	private $icon;

	public function __construct($name = null, $icon = null, $socialMediaId = null, $link = null)
	{
		parent::__construct();

		$this->socialMediaId = $socialMediaId;
		$this->name = $name;
		$this->icon = $icon;
		$this->link = $link;
	}

	public function getSocialMediaId()
	{
		return $this->socialMediaId;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function getIcon()
	{
		return $this->icon;
	}

	public function getAllSocialMedias()
	{
		$this->db->select('*');
        $databaseSocialMedias  = $this->db->get('social_medias')->result();

        $socialMedias = [];

        foreach ($databaseSocialMedias as $databaseSocialMedia) {
        	$socialMedia = new Social_medias_model(
        		$databaseSocialMedia->name,
        		$databaseSocialMedia->icon,
        		$databaseSocialMedia->id_social_media,
        		$databaseSocialMedia->link
        	);

        	$socialMedias[] = $socialMedia;
        }

        return $socialMedias;
	}

	public function insert()
	{
		$data = [
			'name' => $this->name,
			'link' => $this->link,
			'icon' => $this->icon
		];

		$this->add('social_medias', $data);
	}

	public function getSocialMediaById($idSocialMedia)
	{
		$this->db->select('*');
		$this->db->where('id_social_media', $idSocialMedia); 
        $this->db->limit(1);
        return $this->db->get('social_medias')->row();
	}

	public function searchSocialMedia($keyWord)
	{
		$this->db->select('*');
		$this->db->like('name', "$keyWord");
		$this->db->or_like('link', "$keyWord");

        $databaseUsers  = $this->db->get('social_medias')->result();
        return $databaseUsers;
	}

}