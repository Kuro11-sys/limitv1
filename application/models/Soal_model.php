<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{

    public function getDataSoal($id, $tim_soal)
    {
        $this->datatables->select('a.id_soal, a.soal, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_babak, c.nama_tim_soal, d.kelas_id, e.nama_kelas');
        $this->datatables->from('tb_soal a', 'pemetaan d');
        $this->datatables->join('babak b', 'b.id_babak=a.babak_id');
        $this->datatables->join('tim_soal c', 'c.id_tim_soal=a.tim_soal_id');
        $this->datatables->join('pemetaan d', 'd.tim_soal_id=a.tim_soal_id');


        $this->datatables->join('kelas e', 'e.id_kelas=d.kelas_id');
        if ($id !== null && $tim_soal === null) {
            $this->datatables->where('a.babak_id', $id);
        } else if ($id !== null && $tim_soal !== null) {
            $this->datatables->where('a.tim_soal_id', $tim_soal);
        }
        return $this->datatables->generate();
    }

    public function getSoalById($id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id])->row();
    }

    public function getbabaktim_soal($nim)
    {
        $this->db->select('babak_id, nama_babak, id_tim_soal, nama_tim_soal');
        $this->db->join('babak', 'babak_id=id_babak');
        $this->db->from('tim_soal')->where('nim', $nim);
        return $this->db->get()->row();
    }

    public function getAlltim_soal()
    {
        $this->db->select('*');
        $this->db->from('tim_soal a');
        $this->db->join('babak b', 'a.babak_id=b.id_babak');
        return $this->db->get()->result();
    }
}
