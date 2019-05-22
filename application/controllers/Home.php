<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Base.php";

class Home extends Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('menu_options_model', 'modelMenuOptions');
	}

	public function index()
	{
		$menuOptions = $this->modelMenuOptions->getAllMenuOptions();

		$data = [
			'scripts' => ['default'],
			'menuOptions' => $menuOptions,
			'activeLink' => 0
		];

		$this->template->loadMain('home', $data);
	}

}
