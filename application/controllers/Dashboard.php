<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->model('Dashboard_model', 'dashboard');
		$this->user = $this->ion_auth->user()->row();
	}

	public function admin_box()
	{
		$box = [
			[
				'box' 		=> 'blue',
				'total' 	=> $this->dashboard->total('tim_soal'),
				'title'		=> 'Tim Soal',
				'nama'		=> 'tim_soal',
				'icon'		=> 'user-secret'
			],
			[
				'box' 		=> 'red',
				'total' 	=> $this->dashboard->total('peserta'),
				'title'		=> 'Participant',
				'nama' 		=> 'peserta',
				'icon'		=> 'user'
			],
		];
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Data Application',
		];

		if ($this->ion_auth->is_admin()) {
			$data['info_box'] = $this->admin_box();
		} elseif ($this->ion_auth->in_group('Tim Soal')) {
			$babak = ['babak' => 'tim_soal.babak_id=babak.id_babak'];
			$data['tim_soal'] = $this->dashboard->get_where('tim_soal', 'nim', $user->username, $babak)->row();

			$kelas = ['kelas' => 'pemetaan.kelas_id=kelas.id_kelas'];
			$data['kelas'] = $this->dashboard->get_where('pemetaan', 'tim_soal_id', $data['tim_soal']->id_tim_soal, $kelas, ['nama_kelas' => 'ASC'])->result();
		} else {
			$join = [
				'kelas b' 	=> 'a.kelas_id = b.id_kelas',
				'tahun c'	=> 'b.tahun_id = c.id_tahun'
			];
			$data['peserta'] = $this->dashboard->get_where('peserta a', 'no_p', $user->username, $join)->row();
		}

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('dashboard');
	}
}
