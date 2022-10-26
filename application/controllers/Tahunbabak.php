<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunbabak extends CI_Controller
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
			'judul'	=> 'Pemetaan Babak',
			'subjudul' => 'Data Pemetaan Babak'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/tahunbabak/data');
	}

	public function data()
	{
		$this->output_json($this->master->gettahunbabak(), false);
	}

	public function gettahunId($id)
	{
		$this->output_json($this->master->getAlltahun($id));
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Pemetaan Babak',
			'subjudul'	=> 'Tambah Data Pemetaan Babak',
			'babak'	=> $this->master->getbabak()
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/tahunbabak/add');
	}

	public function edit($id)
	{
		$data = [
			'user' 			=> $this->ion_auth->user()->row(),
			'judul'			=> 'Edit Pemetaan Babak',
			'subjudul'		=> 'Edit Data Pemetaan Babak',
			'babak'		=> $this->master->getbabakById($id, true),
			'id_babak'		=> $id,
			'all_tahun'	=> $this->master->getAlltahun(),
			'tahun'		=> $this->master->gettahunByIdbabak($id)
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('relasi/tahunbabak/edit');
	}

	public function save()
	{
		$method = $this->input->post('method', true);
		$this->form_validation->set_rules('babak_id', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('tahun_id[]', 'tahun', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'status'	=> false,
				'errors'	=> [
					'babak_id' => form_error('babak_id'),
					'tahun_id[]' => form_error('tahun_id[]'),
				]
			];
			$this->output_json($data);
		} else {
			$babak_id 	= $this->input->post('babak_id', true);
			$tahun_id = $this->input->post('tahun_id', true);
			$input = [];
			foreach ($tahun_id as $key => $val) {
				$input[] = [
					'babak_id' 	=> $babak_id,
					'tahun_id'  	=> $val
				];
			}
			if ($method === 'add') {
				$action = $this->master->create('tahun_babak', $input, true);
			} else if ($method === 'edit') {
				$id = $this->input->post('babak_id', true);
				$this->master->delete('tahun_babak', $id, 'babak_id');
				$action = $this->master->create('tahun_babak', $input, true);
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
			if ($this->master->delete('tahun_babak', $chk, 'babak_id')) {
				$this->output_json(['status' => true, 'total' => count($chk)]);
			}
		}
	}
}
