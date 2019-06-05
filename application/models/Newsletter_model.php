<?php

require_once "Base_model.php";

class Newsletter_model extends Base_model
{
	private $email;
	private $subscriberId;
	private $subscriberDate;

	public function __construct($email = null, $subscriberId = null, $subscriberDate = null)
	{
		parent::__construct();

		$this->email = $email;
		$this->subscriberId = $subscriberId;
		$this->subscriberDate = $subscriberDate;
	}

	public function getSubscriptionDate()
	{
		return $this->subscriberDate;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getNewsletterByEmail($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email); 
        $this->db->limit(1);
        return $this->db->get('newsletter_subscribers')->row();
	}

	public function insert()
	{
		$data = [
			'email' => $this->email
		];

		$this->add('newsletter_subscribers', $data);
	}

	public function getAllLeads()
	{
		$this->db->select("email, DATE_FORMAT(date_subscriber,'%d/%m/%Y %H:%i:%s') AS date_subscriber");
        $databaseLeads = $this->db->get('newsletter_subscribers')->result();

        $leads = [];
        foreach ($databaseLeads as $databaseLead) {
        	$lead = new Newsletter_model(
        		$databaseLead->email,
        		null,
        		$databaseLead->date_subscriber
        	);

        	$leads[] = $lead;
        }

        return $leads;
	}

}