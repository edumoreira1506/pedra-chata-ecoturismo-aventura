<?php

require_once "Base_model.php";

class Newsletter_model extends Base_model
{
	private $email;
	private $subscriberId;

	public function __construct($email = null, $subscriberId = null)
	{
		parent::__construct();

		$this->email = $email;
		$this->subscriberId = $subscriberId;
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

}