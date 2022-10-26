<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim_soal extends CI_Controller
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
			'judul'	=> 'Tim Soal',
			'subjudul' => 'Data Tim Soal'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/tim_soal/data');
	}

	public function data()
	{
		$this->output_json($this->master->getDatatim_soal(), false);
	}

	public function add()
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Tambah Tim Soal',
			'subjudul' => 'Tambah Data Tim Soal',
			'babak'	=> $this->master->getAllbabak()
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/tim_soal/add');
	}

	public function edit($id)
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Edit Tim Soal',
			'subjudul'	=> 'Edit Data Tim Soal',
			'babak'	=> $this->master->getAllbabak(),
			'data' 		=> $this->master->gettim_soalById($id)
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/tim_soal/edit');
	}

	public function save()
	{
		$method 	= $this->input->post('method', true);
		$id_tim_soal 	= $this->input->post('id_tim_soal', true);
		$nim 		= $this->input->post('nim', true);
		$nama_tim_soal = $this->input->post('nama_tim_soal', true);
		$email 		= $this->input->post('email', true);
		$babak 	= $this->input->post('babak', true);
		if ($method == 'add') {
			$u_nim = '|is_unique[tim_soal.nim]';
		} else {
			$dbdata 	= $this->master->gettim_soalById($id_tim_soal);
			$u_nim		= $dbdata->nim === $nim ? "" : "|is_unique[tim_soal.nim]";
		}
		$this->form_validation->set_rules('nim', 'NIM', 'required|numeric|trim|min_length[8]|max_length[12]' . $u_nim);
		$this->form_validation->set_rules('nama_tim_soal', 'Nama', 'required|trim|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('email', 'Username', 'required|trim');


		if ($this->form_validation->run() == FALSE) {
			$data = [
				'status'	=> false,
				'errors'	=> [
					'nim' => form_error('nim'),
					'nama_tim_soal' => form_error('nama_tim_soal'),
					'email' => form_error('email'),
					'babak' => form_error('babak'),
				]
			];
			$this->output_json($data);
		} else {
			$input = [
				'nim'			=> $nim,
				'nama_tim_soal' 	=> $nama_tim_soal,
				'email' 		=> $email,
				'babak_id' 	=> $babak
			];
			if ($method === 'add') {
				$action = $this->master->create('tim_soal', $input);
			} else if ($method === 'edit') {
				$babak 		= $this->input->post('babak', true);
				$input = [
					'babak_id' 	=> $babak,
					'nim'			=> $nim,
					'nama_tim_soal' 	=> $nama_tim_soal,
					'email' 		=> $email,
					'babak_id' 	=> $babak
				];
				$action = $this->master->update('tim_soal', $input, 'id_tim_soal', $id_tim_soal);
			}

			if ($action) {
				$this->output_json(['status' => true]);
			} else {
				$this->output_json(['status' => false]);
			}
		}
	}

	public function delete()
	{
		$chk = $this->input->post('checked', true);
		if (!$chk) {
			$this->output_json(['status' => false]);
		} else {
			if ($this->master->delete('tim_soal', $chk, 'id_tim_soal')) {
				$this->output_json(['status' => true, 'total' => count($chk)]);
			}
		}
	}

	public function create_user()
	{
		$id = $this->input->get('id', true);
		$data = $this->master->gettim_soalById($id);
		$nama = explode(' ', $data->nama_tim_soal);
		$first_name = $nama[0];
		$last_name = end($nama);

		$username = $data->nim;
		$password = $data->nim;
		$email = $data->email;
		$additional_data = [
			'first_name'	=> $first_name,
			'last_name'		=> $last_name
		];
		$group = array('2'); // Sets user to tim_soal.

		if ($this->ion_auth->username_check($username)) {
			$data = [
				'status' => false,
				'msg'	 => 'Nama tidak tersedia (sudah digunakan).'
			];
		} else if ($this->ion_auth->email_check($email)) {
			$data = [
				'status' => false,
				'msg'	 => 'Username tidak tersedia (sudah digunakan).'
			];
		} else {
			$this->ion_auth->register($username, $password, $email, $additional_data, $group);
			$data = [
				'status'	=> true,
				'msg'	 => 'User berhasil dibuat. NIM digunakan sebagai password pada saat login.'
			];
		}
		$this->output_json($data);
	}

	public function import($import_data = null)
	{
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Tim Soal',
			'subjudul' => 'Import Data Tim Soal',
			'babak' => $this->master->getAllbabak()
		];
		if ($import_data != null) $data['import'] = $import_data;

		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('master/tim_soal/import');
		$this->load->view('_templates/dashboard/_footer');
	}
	public function preview()
	{
		$config['upload_path']		= './uploads/import/';
		$config['allowed_types']	= 'xls|xlsx|csv';
		$config['max_size']			= 2048;
		$config['encrypt_name']		= true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('upload_file')) {
			$error = $this->upload->display_errors();
			echo $error;
			die;
		} else {
			$file = $this->upload->data('full_path');
			$ext = $this->upload->data('file_ext');

			switch ($ext) {
				case '.xlsx':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					break;
				case '.xls':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
					break;
				case '.csv':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
					break;
				default:
					echo "unknown file ext";
					die;
			}

			$spreadsheet = $reader->load($file);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			$data = [];
			for ($i = 1; $i < count($sheetData); $i++) {
				$data[] = [
					'nim' => $sheetData[$i][0],
					'nama_tim_soal' => $sheetData[$i][1],
					'email' => $sheetData[$i][2],
					'babak_id' => $sheetData[$i][3]
				];
			}

			unlink($file);

			$this->import($data);
		}
	}

	public function do_import()
	{
		$input = json_decode($this->input->post('data', true));
		$data = [];
		foreach ($input as $d) {
			$data[] = [
				'nim' => $d->nim,
				'nama_tim_soal' => $d->nama_tim_soal,
				'email' => $d->email,
				'babak_id' => $d->babak_id
			];
		}

		$save = $this->master->create('tim_soal', $data, true);
		if ($save) {
			redirect('tim_soal');
		} else {
			redirect('tim_soal/import');
		}
	}
}
