<?php

require_once "Base_model.php";

class Services_model extends Base_model
{
	private $serviceId;
	private $title;
	private $description;
	private $icon;

	public function __construct($serviceId = null, $title = null, $description = null, $icon = null)
	{
		parent::__construct();

		$this->description = $description;
		$this->serviceId = $serviceId;
		$this->title = $title;
		$this->icon = $icon;
	}

	public function getServiceId()
	{
		return $this->serviceId;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getIcon()
	{
		return $this->icon;
	}

	public function insert()
	{
		$data = [
			'title' => $this->title,
			'description' => $this->description,
			'icon' => $this->icon
		];

		$this->serviceId = $this->addGetId('services', $data);
	}

	public function getAllServices()
	{
		$this->db->select('*');
        $databaseServices  = $this->db->get('services')->result();

        $services = [];
        foreach ($databaseServices as $databaseService) {
        	$service = new Services_model(
        		$databaseService->id_service,
        		$databaseService->title,
        		$databaseService->description,
        		$databaseService->icon
        	);

        	$services[] = $service;
        }

        return $services;
	}

	public function searchServices($keyWord)
	{
		$this->db->select('*');
		$this->db->like('title', "$keyWord");
		$this->db->or_like('description', "$keyWord");

        $databaseTravels  = $this->db->get('services')->result();
        return $databaseTravels;
	}

	public function getServiceById($idService)
	{
		$this->db->select('*');
		$this->db->where('id_service', $idService); 
        $this->db->limit(1);
        return $this->db->get('services')->row();
	}

}