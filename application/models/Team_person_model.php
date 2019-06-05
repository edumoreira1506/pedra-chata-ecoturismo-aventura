<?php

require_once "Base_model.php";

class Team_person_model extends Base_model
{
	private $name;
	private $description;
	private $imagePath;
	private $idPerson;
	private $facebookLink;
	private $instagramLink;

	public function __construct($name = null, $description = null, $facebookLink = null, $instagramLink = null, $imagePath = null,  $idPerson = null)
	{
		parent::__construct();

		$this->imagePath = $imagePath;
		$this->name = $name;
		$this->description = $description;
		$this->idPerson = $idPerson;
		$this->instagramLink = $instagramLink;
		$this->facebookLink = $facebookLink;
	}

	public function insert()
	{
		$data = [
			'description' => $this->description,
			'name' => $this->name,
			'image_path' => $this->imagePath,
			'facebook' => $this->facebookLink,
			'instagram' => $this->instagramLink
		];

		$this->idPerson = $this->addGetId('persons_of_team', $data);
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getImagePath()
	{
		return $this->imagePath;
	}

	public function getFacebookLink()
	{
		return $this->facebookLink;
	}

	public function getInstagramLink()
	{
		return $this->instagramLink;
	}

	public function getPersonId()
	{
		return $this->idPerson;
	}

	public function getAllPersonsTeam()
	{
		$this->db->select("*");
		$this->db->from('persons_of_team');
		$databasePersons = $this->db->get()->result();

		$persons = [];
		foreach ($databasePersons as $databasePerson) {
			$person = new Team_person_model(
				$databasePerson->name,
				$databasePerson->description,
				$databasePerson->facebook,
				$databasePerson->instagram,
				$databasePerson->image_path,
				$databasePerson->id_person
			);

			$persons[] = $person;
		}

		return $persons;
	}

	public function getPersonById($idPerson)
	{
		$this->db->select('*');
		$this->db->where('id_person', $idPerson); 
        $this->db->limit(1);
        return $this->db->get('persons_of_team')->row();
	}

	public function searchPersons($keyWord)
	{
		$this->db->select("*");
		$this->db->from('persons_of_team');
		$this->db->like('name', "$keyWord");
		$this->db->or_like('description', "$keyWord");
		return $this->db->get()->result();
	}

}