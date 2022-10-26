<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Under extends CI_Controller
{
	public function index()
	{
		$this->load->view('404.php');
	}
}
