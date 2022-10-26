<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilUjian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}

		$this->load->library(['datatables']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->load->model('Ujian_model', 'ujian');

		$this->user = $this->ion_auth->user()->row();
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function data()
	{
		$nim_tim_soal = null;

		if ($this->ion_auth->in_group('Tim Soal')) {
			$nim_tim_soal = $this->user->username;
		}

		$this->output_json($this->ujian->getHasilUjian($nim_tim_soal), false);
	}

	public function NilaiMhs($id)
	{
		$this->output_json($this->ujian->HslUjianById($id, true), false);
	}

	public function index()
	{
		$data = [
			'user' => $this->user,
			'judul'	=> 'Hasil',
			'subjudul' => 'Hasil Ujian',
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/hasil');
	}

	public function detail($id)
	{
		$ujian = $this->ujian->getUjianById($id);
		$nilai = $this->ujian->bandingNilai($id);
		if ($ujian->babak_id == 4) {
			$data = [
				'user' => $this->user,
				'judul'	=> 'Hasil',
				'subjudul' => 'Detail Hasil Ujian',
				'ujian'	=> $ujian,
				'nilai'	=> $nilai,

			];

			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('ujian/detail_hasil');
		}
		if ($ujian->babak_id == 9) {
			$data = [
				'user' => $this->user,
				'judul'	=> 'Hasil',
				'subjudul' => 'Detail Hasil Ujian',
				'ujian'	=> $ujian,
				'nilai'	=> $nilai,

			];

			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('ujian/detail_hasil_semi');
		}
	}

	public function cetak($id)
	{
		$this->load->library('Pdf');

		$mhs 	= $this->ujian->getIdpeserta($this->user->username);
		$hasil 	= $this->ujian->HslUjian($id, $mhs->id_peserta)->row();
		$ujian 	= $this->ujian->getUjianById($id);

		$data = [
			'ujian' => $ujian,
			'hasil' => $hasil,
			'mhs'	=> $mhs
		];

		$this->load->view('ujian/cetak', $data);
	}

	public function cetak_detail($id)
	{
		$this->load->library('Pdf');

		$ujian = $this->ujian->getUjianById($id);
		$nilai = $this->ujian->bandingNilai($id);
		$hasil = $this->ujian->HslUjianById($id)->result();

		$data = [
			'ujian'	=> $ujian,
			'nilai'	=> $nilai,
			'hasil'	=> $hasil
		];

		$this->load->view('ujian/cetak_detail', $data);
	}


	public function koreksi($id)
	{
		$user = $this->ion_auth->user()->row();
		$list = $this->ujian->getJawaban($id);
		$jml = $this->ujian->getUjianById($list->ujian_id);

		$datanya = $this->ujian->getgetan($list->peserta_id);
		$data = [
			'user'      => $user,
			'judul'	    => 'Koreksi',
			'subjudul'  => 'Koreksi Jawaban',
			'jawaban'	=> $list->list_jawaban,
			'jumlah'	=> $jml->jumlah_soal,
			'kuncii'	=> $list->key_jwb,
			'ini'		=> $id,
			'datanya'	=> $datanya,
			'back'		=> $list->ujian_id,
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/koreksi.php');
	}

	public function cekkk($id)
	{
		$jwb = $this->ujian->getJawaban($id);
		$jml = $this->ujian->getUjianById($jwb->ujian_id);
		$kunci = $this->ujian->getkkunci($jml->babak_id, $jml->kelas_id);

		$this->output_json($kunci, false);
	}

	public function data1($id)
	{
		$list = $this->ujian->getJawaban($id);
		$jml = $this->ujian->getUjianById($list->ujian_id);
		$this->output_json($this->ujian->getkkunci($jml->babak_id, $jml->kelas_id), false);
	}
}
