<?php

require_once "Base_model.php";

class Travels_model extends Base_model
{
	private $travelId;
	private $title;
	private $description;
	private $price;
	private $imagePath;

	public function __construct($travelId = null, $title = null, $description = null, $price = null, $imagePath = null)
	{
		parent::__construct();

		$this->description = $description;
		$this->travelId = $travelId;
		$this->title = $title;
		$this->price = $price;
		$this->imagePath = $imagePath;
	}

	public function getTravelId()
	{
		return $this->travelId;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getFeaturedImage()
	{
		return $this->imagePath;
	}

	public function insert()
	{
		$data = [
			'title' => $this->title,
			'description' => $this->description,
			'featured_image' => $this->imagePath,
			'price' => $this->price
		];

		$this->highlightId = $this->addGetId('travels', $data);
	}

	public function getAllTravels()
	{
		$this->db->select('*');
        $databaseTravels  = $this->db->get('travels')->result();

        $travels = [];
        foreach ($databaseTravels as $databaseTravel) {
        	$travel = new Travels_model(
        		$databaseTravel->id_travel,
        		$databaseTravel->title,
        		$databaseTravel->description,
        		$databaseTravel->price,
        		$databaseTravel->featured_image
        	);

        	$travels[] = $travel;
        }

        return $travels;
	}

	public function searchTravels($keyWord)
	{
		$this->db->select('*');
		$this->db->like('title', "$keyWord");
		$this->db->or_like('description', "$keyWord");

        $databaseTravels  = $this->db->get('travels')->result();
        return $databaseTravels;
	}

	public function getTravelById($idTravel)
	{
		$this->db->select('*');
		$this->db->where('id_travel', $idTravel); 
        $this->db->limit(1);
        return $this->db->get('travels')->row();
	}

}