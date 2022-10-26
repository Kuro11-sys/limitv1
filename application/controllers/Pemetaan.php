<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		} else if (!$this->ion_auth->is_admin()) {
			show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('', '');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index()
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Pemetaan',
			'subjudul' => 'Data Pemetaan'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/pemetaan/data');
	}

	public function data()
	{
		$this->output_json($this->master->getKelastim_soal(), false);
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Pemetaan',
			'subjudul'	=> 'Tambah Data Pemetaan',
			'tim_soal'		=> $this->master->getAlltim_soal(),
			'kelas'	    => $this->master->getAllKelas()
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/pemetaan/add');
	}

	public function edit($id)
	{
		$data = [
			'user' 			=> $this->ion_auth->user()->row(),
			'judul'			=> 'Edit Pemetaan',
			'subjudul'		=> 'Edit Data Pemetaan',
			'tim_soal'			=> $this->master->gettim_soalById($id),
			'id_tim_soal'		=> $id,
			'all_kelas'	    => $this->master->getAllKelas(),
			'kelas'		    => $this->master->getKelasBytim_soal($id)
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/pemetaan/edit');
	}

	public function save()
	{
		$method = $this->input->post('method', true);
		$this->form_validation->set_rules('tim_soal_id', 'tim_soal', 'required');
		$this->form_validation->set_rules('kelas_id[]', 'Kelas', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'status'	=> false,
				'errors'	=> [
					'tim_soal_id' => form_error('tim_soal_id'),
					'kelas_id[]' => form_error('kelas_id[]'),
				]
			];
			$this->output_json($data);
		} else {
			$tim_soal_id = $this->input->post('tim_soal_id', true);
			$kelas_id = $this->input->post('kelas_id', true);
			$input = [];
			foreach ($kelas_id as $key => $val) {
				$input[] = [
					'tim_soal_id'  => $tim_soal_id,
					'kelas_id' => $val
				];
			}
			if ($method === 'add') {
				$action = $this->master->create('pemetaan', $input, true);
			} else if ($method === 'edit') {
				$id = $this->input->post('tim_soal_id', true);
				$this->master->delete('pemetaan', $id, 'tim_soal_id');
				$action = $this->master->create('pemetaan', $input, true);
			}
			$data['status'] = $action ? TRUE : FALSE;
		}
		$this->output_json($data);
	}

	public function delete()
	{
		$chk = $this->input->post('checked', true);
		if (!$chk) {
			$this->output_json(['status' => false]);
		} else {
			if ($this->master->delete('pemetaan', $chk, 'tim_soal_id')) {
				$this->output_json(['status' => true, 'total' => count($chk)]);
			}
		}
	}
}
