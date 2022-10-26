<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{

    public function create($table, $data, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->insert($table, $data);
        } else {
            $insert = $this->db->insert_batch($table, $data);
        }
        return $insert;
    }

    public function update($table, $data, $pk, $id = null, $batch = false)
    {
        if ($batch === false) {
            $insert = $this->db->update($table, $data, array($pk => $id));
        } else {
            $insert = $this->db->update_batch($table, $data, $pk);
        }
        return $insert;
    }

    public function delete($table, $data, $pk)
    {
        $this->db->where_in($pk, $data);
        return $this->db->delete($table);
    }

    /**
     * Data Kelas
     */

    public function getDataKelas()
    {
        $this->datatables->select('id_kelas, nama_kelas, id_tahun, nama_tahun');
        $this->datatables->from('kelas');
        $this->datatables->join('tahun', 'tahun_id=id_tahun');
        $this->datatables->add_column('bulk_select', '<div class="text-center"><input type="checkbox" class="check" name="checked[]" value="$1"/></div>', 'id_kelas, nama_kelas, id_tahun, nama_tahun');
        return $this->datatables->generate();
    }

    public function getKelasById($id)
    {
        $this->db->where_in('id_kelas', $id);
        $this->db->order_by('nama_kelas');
        $query = $this->db->get('kelas')->result();
        return $query;
    }

    /**
     * Data tahun
     */

    public function getDatatahun()
    {
        $this->datatables->select('id_tahun, nama_tahun');
        $this->datatables->from('tahun');
        $this->datatables->add_column('bulk_select', '<div class="text-center"><input type="checkbox" class="check" name="checked[]" value="$1"/></div>', 'id_tahun, nama_tahun');
        return $this->datatables->generate();
    }

    public function gettahunById($id)
    {
        $this->db->where_in('id_tahun', $id);
        $this->db->order_by('nama_tahun');
        $query = $this->db->get('tahun')->result();
        return $query;
    }

    /**
     * Data peserta
     */

    public function getDatapeserta()
    {
        $this->datatables->select('a.id_peserta, a.nama, a.no_p, a.email, a.regional, b.nama_kelas, c.nama_tahun');
        $this->datatables->select('(SELECT COUNT(id) FROM users WHERE username = a.no_p) AS ada');
        $this->datatables->from('peserta a');
        $this->datatables->join('kelas b', 'a.kelas_id=b.id_kelas');
        $this->datatables->join('tahun c', 'b.tahun_id=c.id_tahun');
        return $this->datatables->generate();
    }

    public function getpesertaById($id)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('kelas', 'kelas_id=id_kelas');
        $this->db->join('tahun', 'tahun_id=id_tahun');
        $this->db->where(['id_peserta' => $id]);
        return $this->db->get()->row();
    }

    public function gettahun()
    {
        $this->db->select('id_tahun, nama_tahun');
        $this->db->from('kelas');
        $this->db->join('tahun', 'tahun_id=id_tahun');
        $this->db->order_by('nama_tahun', 'ASC');
        $this->db->group_by('id_tahun');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAlltahun($id = null)
    {
        if ($id === null) {
            $this->db->order_by('nama_tahun', 'ASC');
            return $this->db->get('tahun')->result();
        } else {
            $this->db->select('tahun_id');
            $this->db->from('tahun_babak');
            $this->db->where('babak_id', $id);
            $tahun = $this->db->get()->result();
            $id_tahun = [];
            foreach ($tahun as $j) {
                $id_tahun[] = $j->tahun_id;
            }
            if ($id_tahun === []) {
                $id_tahun = null;
            }

            $this->db->select('*');
            $this->db->from('tahun');
            $this->db->where_not_in('id_tahun', $id_tahun);
            $babak = $this->db->get()->result();
            return $babak;
        }
    }

    public function getKelasBytahun($id)
    {
        $query = $this->db->get_where('kelas', array('tahun_id' => $id));
        return $query->result();
    }

    /**
     * Data tim_soal
     */

    public function getDatatim_soal()
    {
        $this->datatables->select('a.id_tim_soal,a.nim, a.nama_tim_soal, a.email, a.babak_id, b.nama_babak, (SELECT COUNT(id) FROM users WHERE username = a.nim OR email = a.email) AS ada');
        $this->datatables->from('tim_soal a');
        $this->datatables->join('babak b', 'a.babak_id=b.id_babak');
        return $this->datatables->generate();
    }

    public function gettim_soalById($id)
    {
        $query = $this->db->get_where('tim_soal', array('id_tim_soal' => $id));
        return $query->row();
    }

    /**
     * Data babak
     */

    public function getDatababak()
    {
        $this->datatables->select('id_babak, nama_babak');
        $this->datatables->from('babak');
        return $this->datatables->generate();
    }

    public function getAllbabak()
    {
        return $this->db->get('babak')->result();
    }

    public function getbabakById($id, $single = false)
    {
        if ($single === false) {
            $this->db->where_in('id_babak', $id);
            $this->db->order_by('nama_babak');
            $query = $this->db->get('babak')->result();
        } else {
            $query = $this->db->get_where('babak', array('id_babak' => $id))->row();
        }
        return $query;
    }

    /**
     * Data Kelas tim_soal
     */

    public function getKelastim_soal()
    {
        $this->datatables->select('pemetaan.id, tim_soal.id_tim_soal, tim_soal.nim, tim_soal.nama_tim_soal, GROUP_CONCAT(kelas.nama_kelas) as kelas');
        $this->datatables->from('pemetaan');
        $this->datatables->join('kelas', 'kelas_id=id_kelas');
        $this->datatables->join('tim_soal', 'tim_soal_id=id_tim_soal');
        $this->datatables->group_by('tim_soal.nama_tim_soal');
        return $this->datatables->generate();
    }

    public function getAlltim_soal($id = null)
    {
        $this->db->select('tim_soal_id');
        $this->db->from('pemetaan');
        if ($id !== null) {
            $this->db->where_not_in('tim_soal_id', [$id]);
        }
        $tim_soal = $this->db->get()->result();
        $id_tim_soal = [];
        foreach ($tim_soal as $d) {
            $id_tim_soal[] = $d->tim_soal_id;
        }
        if ($id_tim_soal === []) {
            $id_tim_soal = null;
        }

        $this->db->select('id_tim_soal, nim, nama_tim_soal');
        $this->db->from('tim_soal');
        $this->db->where_not_in('id_tim_soal', $id_tim_soal);
        return $this->db->get()->result();
    }


    public function getAllKelas()
    {
        $this->db->select('id_kelas, nama_kelas, nama_tahun');
        $this->db->from('kelas');
        $this->db->join('tahun', 'tahun_id=id_tahun');
        $this->db->order_by('nama_kelas');
        return $this->db->get()->result();
    }

    public function getKelasBytim_soal($id)
    {
        $this->db->select('kelas.id_kelas');
        $this->db->from('pemetaan');
        $this->db->join('kelas', 'pemetaan.kelas_id=kelas.id_kelas');
        $this->db->where('tim_soal_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }
    /**
     * Data tahun babak
     */

    public function gettahunbabak()
    {
        $this->datatables->select('tahun_babak.id, babak.id_babak, babak.nama_babak, tahun.id_tahun, GROUP_CONCAT(tahun.nama_tahun) as nama_tahun');
        $this->datatables->from('tahun_babak');
        $this->datatables->join('babak', 'babak_id=id_babak');
        $this->datatables->join('tahun', 'tahun_id=id_tahun');
        $this->datatables->group_by('babak.nama_babak');
        return $this->datatables->generate();
    }

    public function getbabak($id = null)
    {
        $this->db->select('babak_id');
        $this->db->from('tahun_babak');
        if ($id !== null) {
            $this->db->where_not_in('babak_id', [$id]);
        }
        $babak = $this->db->get()->result();
        $id_babak = [];
        foreach ($babak as $d) {
            $id_babak[] = $d->babak_id;
        }
        if ($id_babak === []) {
            $id_babak = null;
        }

        $this->db->select('id_babak, nama_babak');
        $this->db->from('babak');
        $this->db->where_not_in('id_babak', $id_babak);
        return $this->db->get()->result();
    }

    public function gettahunByIdbabak($id)
    {
        $this->db->select('tahun.id_tahun');
        $this->db->from('tahun_babak');
        $this->db->join('tahun', 'tahun_babak.tahun_id=tahun.id_tahun');
        $this->db->where('babak_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }
}
