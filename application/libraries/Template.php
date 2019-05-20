<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template 
{

	public function loadMain($view, $data=array())
	{
		$CI = & get_instance();

		$CI->load->view('template_site/header',$data);
		$CI->load->view($view, $data);
		$CI->load->view('template_site/footer',$data);
		$CI->load->view('template_site/scripts',$data);
	}

	public function loadAdmin($view, $data=array())
	{
		$CI = & get_instance();

		$CI->load->view('template_admin/header',$data);
		$CI->load->view($view, $data);
		$CI->load->view('template_admin/footer',$data);
		$CI->load->view('template_admin/scripts',$data);
	}

}