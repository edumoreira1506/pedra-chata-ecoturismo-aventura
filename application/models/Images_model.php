<?php

require_once "Base_model.php";

class Images_model extends Base_model
{
	private $imageId;
	private $imagePath;
	private $travelId;

	public function __construct($imagePath = null, $travelId = null, $imageId = null)
	{
		$this->load->library('encrypt');
		parent::__construct();

		$this->imagePath = $imagePath;
		$this->travelId = $travelId;
		$this->imageId = $imageId;
	}

	public function getImageById($idImage)
	{
		$this->db->select('*');
		$this->db->where('id_image', $idImage); 
        $this->db->limit(1);
        return $this->db->get('images_travels')->row();
	}

	public function getImagesByTravelId($travelId)
	{
		$this->db->select('*');
		$this->db->where('id_travel', $travelId); 
        $databaseImages = $this->db->get('images_travels')->result();

        $images = [];
        foreach ($databaseImages as $databaseImage) {
        	$image = new Images_model(
        		$databaseImage->image_path,
        		$databaseImage->id_travel,
        		$databaseImage->id_image
        	);

        	$images[] = $image;
        }

        return $images;
	}

	public function insert()
	{
		$data = [
			'image_path' => $this->imagePath,
			'id_travel' => $this->travelId
		];

		$this->add('images_travels', $data);
	}

	public function getAllImages()
	{
		$this->db->select('*');
        $databaseImages  = $this->db->get('images_travels')->result();

        $images = [];
        foreach ($databaseImages as $databaseImage) {
        	$image = new Images_model(
        		$databaseImage->image_path,
        		$databaseImage->id_travel,
        		$databaseImage->id_image
        	);

        	$images[] = $image;
        }

        return $images;
	}

	public function searchImages($idTravel)
	{
		$this->db->select('*');
		$this->db->like('id_travel', "$idTravel");

        $images  = $this->db->get('images_travels')->result();
        return $images;
	}

	public function getImageId()
	{
		return $this->imageId;
	}

	public function getTravelId()
	{
		return $this->travelId;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

}