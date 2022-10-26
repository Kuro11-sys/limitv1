<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Skor_model");
	}
	public function index()
	{
		$player1 = $this->Skor_model->get(1);
		$player2 = $this->Skor_model->get(2);
		$player3 = $this->Skor_model->get(3);
		$player4 = $this->Skor_model->get(4);
		$player5 = $this->Skor_model->get(5);
		$data = [
			'player1' => $player1,
			'player2' => $player2,
			'player3' => $player3,
			'player4' => $player4,
			'player5' => $player5
		];
		$this->load->view('skor.php', $data);
	}
	public function save(){
		$skor1=$this->input->get('nilai5',true);
		print_r($skor1);
		exit();
	}
}
