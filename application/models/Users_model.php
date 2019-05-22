<?php

require_once "Base_model.php";

class Users_model extends Base_model
{
	private $userId;
	private $name;
	private $email;
	private $password;
	private $encryptedPassowrd;

	public function __construct($name = null, $email = null, $password = null, $userId = null)
	{
		$this->load->library('encrypt');
		parent::__construct();

		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->userId = $userId;
		$this->encryptedPassowrd = $this->encrypt->encode($password);
	}

	public function getUserByEmail($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email); 
        $this->db->limit(1);
        return $this->db->get('users')->row();
	}

	public function insert()
	{
		$data = [
			'name' => $this->name,
			'email' => $this->email,
			'password' => $this->encryptedPassowrd
		];

		$this->add('users', $data);
	}

	public function getAllUsers()
	{
		$this->db->select('*');
        $databaseUsers  = $this->db->get('users')->result();

        $users = [];
        foreach ($databaseUsers as $databaseUser) {
        	$user = new Users_model(
        		$databaseUser->name,
        		$databaseUser->email,
        		null,
        		$databaseUser->id_user
        	);

        	$users[] = $user;
        }

        return $users;
	}

	public function searchUsers($keyWord)
	{
		$this->db->select('*');
		$this->db->like('email', "$keyWord");
		$this->db->or_like('name', "$keyWord");

        $databaseUsers  = $this->db->get('users')->result();
        return $databaseUsers;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getUserId()
	{
		return $this->userId;
	}

}