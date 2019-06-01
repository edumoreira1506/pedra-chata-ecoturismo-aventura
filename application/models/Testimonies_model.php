<?php

require_once "Base_model.php";

class Testimonies_model extends Base_model
{
	private $testimonyId;
	private $personName;
	private $imagePath;
	private $testimony;

	public function __construct($testimony = null, $personName = null, $imagePath = null, $testimonyId = null)
	{
		parent::__construct();

		$this->testimonyId = $testimonyId;
		$this->personName = $personName;
		$this->imagePath = $imagePath;
		$this->testimony = $testimony;
	}

	public function getTestimonyId()
	{
		return $this->testimonyId;
	}

	public function getTestimony()
	{
		return $this->testimony;
	}

	public function getPersonName()
	{
		return $this->personName;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

	public function getAllTestimonies()
	{
		$this->db->select('*');
        $databaseTestimonies  = $this->db->get('testimonies')->result();

        $testimonies = [];
        foreach ($databaseTestimonies as $databaseTestimonie) {
        	$testimony = new Testimonies_model(
        		$databaseTestimonie->testimony,
        		$databaseTestimonie->person_name,
        		$databaseTestimonie->image_path,
        		$databaseTestimonie->id_testimony
        	);

        	$testimonies[] = $testimony;
        }

        return $testimonies;
	}

	public function getTestimonyById($testimonyId)
	{
		$this->db->select('*');
		$this->db->where('id_testimony', $testimonyId); 
        $this->db->limit(1);
        return $this->db->get('testimonies')->row();
	}

	public function insert()
	{
		$data = [
			'person_name' => $this->personName,
			'image_path' => $this->imagePath,
			'testimony' => $this->testimony,
		];

		$this->add('testimonies', $data);
	}

	public function searchTestimonies($keyWord)
	{
		$this->db->select('*');
		$this->db->like('testimony', "$keyWord");
		$this->db->or_like('person_name', "$keyWord");

        $databaseTestimonies  = $this->db->get('testimonies')->result();
        return $databaseTestimonies;
	}

}