<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } elseif (!$this->ion_auth->is_admin() && !$this->ion_auth->in_group('Tim Soal')) {
            show_error('Hanya Administrator dan Tim Soal yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
        $this->load->helper('my'); // Load Library Ignited-Datatables
        $this->load->model('Master_model', 'master');
        $this->load->model('Soal_model', 'soal');
        $this->load->model('Ujian_model', 'ujian');
        $this->form_validation->set_error_delimiters('', '');
    }

    public function output_json($data, $encode = true)
    {
        if ($encode) {
            $data = json_encode($data);
        }
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index()
    {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user' => $user,
            'judul'    => 'Soal',
            'subjudul' => 'Bank Soal'
        ];

        if ($this->ion_auth->is_admin()) {
            //Jika admin maka tampilkan semua babak
            $data['babak'] = $this->master->getAllbabak();
        } else {
            //Jika bukan maka babak dipilih otomatis sesuai babak tim_soal
            $data['babak'] = $this->soal->getbabaktim_soal($user->username);
        }

        $this->load->view('_templates/dashboard/_header.php', $data);
        $this->load->view('soal/data');
    }

    public function detail($id)
    {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user'      => $user,
            'judul'        => 'Soal',
            'subjudul'  => 'Edit Soal',
            'soal'      => $this->soal->getSoalById($id),
        ];

        $this->load->view('_templates/dashboard/_header.php', $data);
        $this->load->view('soal/detail');
    }

    public function add()
    {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user'      => $user,
            'judul'        => 'Soal',
            'subjudul'  => 'Buat Soal'
        ];

        if ($this->ion_auth->is_admin()) {
            //Jika admin maka tampilkan semua babak
            $data['tim_soal'] = $this->soal->getAlltim_soal();
        } else {
            //Jika bukan maka babak dipilih otomatis sesuai babak tim_soal
            $data['tim_soal'] = $this->soal->getbabaktim_soal($user->username);
        }

        $this->load->view('_templates/dashboard/_header.php', $data);
        $this->load->view('soal/add');
    }

    public function edit($id)
    {
        $user = $this->ion_auth->user()->row();
        $data = [
            'user'      => $user,
            'judul'        => 'Soal',
            'subjudul'  => 'Edit Soal',
            'soal'      => $this->soal->getSoalById($id),
        ];

        if ($this->ion_auth->is_admin()) {
            //Jika admin maka tampilkan semua babak
            $data['tim_soal'] = $this->soal->getAlltim_soal();
        } else {
            //Jika bukan maka babak dipilih otomatis sesuai babak tim_soal
            $data['tim_soal'] = $this->soal->getbabaktim_soal($user->username);
        }

        $this->load->view('_templates/dashboard/_header.php', $data);
        $this->load->view('soal/edit');
    }

    public function data($id = null, $tim_soal = null)
    {
        $this->output_json($this->soal->getDataSoal($id, $tim_soal), false);
    }

    public function validasi()
    {
        if ($this->ion_auth->is_admin()) {
            $this->form_validation->set_rules('tim_soal_id', 'tim_soal', 'required');
        }
        // $this->form_validation->set_rules('soal', 'Soal', 'required');
        // $this->form_validation->set_rules('jawaban_a', 'Jawaban A', 'required');
        // $this->form_validation->set_rules('jawaban_b', 'Jawaban B', 'required');
        // $this->form_validation->set_rules('jawaban_c', 'Jawaban C', 'required');
        // $this->form_validation->set_rules('jawaban_d', 'Jawaban D', 'required');
        // $this->form_validation->set_rules('jawaban_e', 'Jawaban E', 'required');
        $this->form_validation->set_rules('jawaban', 'Kunci Jawaban', 'required');
    }

    public function file_config()
    {
        $allowed_type     = [
            "image/jpeg", "image/jpg", "image/png", "image/gif",
            "audio/mpeg", "audio/mpg", "audio/mpeg3", "audio/mp3", "audio/x-wav", "audio/wave", "audio/wav",
            "video/mp4", "application/octet-stream"
        ];
        $config['upload_path']      = FCPATH . 'uploads/bank_soal/';
        $config['allowed_types']    = 'jpeg|jpg|png|gif|mpeg|mpg|mpeg3|mp3|wav|wave|mp4';
        $config['encrypt_name']     = true;

        return $this->load->library('upload', $config);
    }

    public function save()
    {
        $method = $this->input->post('method', true);
        $this->validasi();
        $this->file_config();


        if ($this->form_validation->run() === false) {
            $method === 'add' ? $this->add() : $this->edit();
        } else {
            $data = [
                'soal'      => $this->input->post('soal', true),
                'jawaban'   => $this->input->post('jawaban', true),
                'bobot'     => 1,

            ];

            $abjad = ['a', 'b', 'c', 'd', 'e'];

            // Inputan Opsi
            foreach ($abjad as $abj) {
                $data['opsi_' . $abj]    = $this->input->post('jawaban_' . $abj, true);
            }

            $i = 0;
            foreach ($_FILES as $key => $val) {
                $img_src = FCPATH . 'uploads/bank_soal/';
                $getsoal = $this->soal->getSoalById($this->input->post('id_soal', true));

                $error = '';
                if ($key === 'file_soal') {
                    if (!empty($_FILES['file_soal']['name'])) {
                        if (!$this->upload->do_upload('file_soal')) {
                            $error = $this->upload->display_errors();
                            show_error($error, 500, 'File Soal Error');
                            exit();
                        } else {
                            if ($method === 'edit') {
                                if (!unlink($img_src . $getsoal->file)) {
                                    show_error('Error saat delete gambar <br/>' . var_dump($getsoal), 500, 'Error Edit Gambar');
                                    exit();
                                }
                            }
                            $data['file'] = $this->upload->data('file_name');
                            $data['tipe_file'] = $this->upload->data('file_type');
                        }
                    }
                } else {
                    $file_abj = 'file_' . $abjad[$i];
                    if (!empty($_FILES[$file_abj]['name'])) {
                        if (!$this->upload->do_upload($key)) {
                            $error = $this->upload->display_errors();
                            show_error($error, 500, 'File Opsi ' . strtoupper($abjad[$i]) . ' Error');
                            exit();
                        } else {
                            if ($method === 'edit') {
                                if (!unlink($img_src . $getsoal->$file_abj)) {
                                    show_error('Error saat delete gambar', 500, 'Error Edit Gambar');
                                    exit();
                                }
                            }
                            $data[$file_abj] = $this->upload->data('file_name');
                        }
                    }
                    $i++;
                }
            }

            if ($this->ion_auth->is_admin()) {
                $pecah = $this->input->post('tim_soal_id', true);
                $pecah = explode(':', $pecah);
                $data['tim_soal_id'] = $pecah[0];
                $data['babak_id'] = end($pecah);
                $id = $this->ujian->getkelasid($pecah[0]);
                $data['kelas_id'] = $id->kelas_id;
            } else {
                $data['tim_soal_id'] = $this->input->post('tim_soal_id', true);
                $data['babak_id'] = $this->input->post('babak_id', true);
                $user   = $this->ion_auth->user()->row();
                $tim_soal  = $this->ujian->getIdtim_soal($user->username);
                $id = $this->ujian->getkelasid($tim_soal->id_tim_soal);
                $data['kelas_id'] = $id->kelas_id;
            }

            if ($method === 'add') {
                //push array
                $data['created_on'] = time();
                $data['updated_on'] = time();
                //insert data
                $this->master->create('tb_soal', $data);
            } elseif ($method === 'edit') {
                //push array
                $data['updated_on'] = time();
                //update data
                $id_soal = $this->input->post('id_soal', true);
                $this->master->update('tb_soal', $data, 'id_soal', $id_soal);
            } else {
                show_error('Method tidak diketahui', 404);
            }
            redirect('soal');
        }
    }

    public function delete()
    {
        $chk = $this->input->post('checked', true);

        // Delete File
        foreach ($chk as $id) {
            $abjad = ['a', 'b', 'c', 'd', 'e'];
            $path = FCPATH . 'uploads/bank_soal/';
            $soal = $this->soal->getSoalById($id);
            // Hapus File Soal
            if (!empty($soal->file)) {
                if (file_exists($path . $soal->file)) {
                    unlink($path . $soal->file);
                }
            }
            //Hapus File Opsi
            $i = 0; //index
            foreach ($abjad as $abj) {
                $file_opsi = 'file_' . $abj;
                if (!empty($soal->$file_opsi)) {
                    if (file_exists($path . $soal->$file_opsi)) {
                        unlink($path . $soal->$file_opsi);
                    }
                }
            }
        }

        if (!$chk) {
            $this->output_json(['status' => false]);
        } else {
            if ($this->master->delete('tb_soal', $chk, 'id_soal')) {
                $this->output_json(['status' => true, 'total' => count($chk)]);
            }
        }
    }
}
