<?php

require_once "Base_model.php";

class Contact_model extends Base_model
{
	private $name;
	private $email;
	private $message;
	private $dateContact;
	private $idContact;

	public function __construct($name = null, $email = null, $message = null, $dateContact = null, $idContact = null)
	{
		parent::__construct();

		$this->message = $message;
		$this->name = $name;
		$this->email = $email;
		$this->dateContact = $dateContact;
		$this->idContact = $idContact;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function getDateContact()
	{
		return $this->dateContact;
	}

	public function insert()
	{
		$data = [
			'message' => $this->message,
			'name' => $this->name,
			'email' => $this->email
		];

		$this->idContact = $this->addGetId('contact', $data);
	}

	public function getAllContacts()
	{
		$this->db->select("name, email, message, DATE_FORMAT(contact_date,'%d/%m/%Y %H:%i:%s') AS contact_date");
        $databaseContacts = $this->db->get('contact')->result();

        $contacts = [];
        foreach ($databaseContacts as $databaseContact) {
        	$contact = new Contact_model(
        		$databaseContact->name,
        		$databaseContact->email,
        		$databaseContact->message,
        		$databaseContact->contact_date
        	);

        	$contacts[] = $contact;
        }

        return $contacts;
	}

}