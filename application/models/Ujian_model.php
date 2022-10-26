<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Ujian_model extends CI_Model
{
 
    public function getDataUjian($id)
    {
        $this->datatables->select('a.id_ujian, a.token, a.nama_ujian, b.nama_babak, a.jumlah_soal, CONCAT(a.tgl_mulai, " <br/> (", a.waktu, " Menit)") as waktu, a.jenis');
        $this->datatables->from('m_ujian a');
        $this->datatables->join('babak b', 'a.babak_id = b.id_babak');
        if ($id !== null) {
            $this->datatables->where('tim_soal_id', $id);
        }
        return $this->datatables->generate();
    }

    public function getListUjian($id, $kelas)
    {
        $this->datatables->select("a.id_ujian, e.nama_tim_soal, d.nama_kelas, a.nama_ujian, b.nama_babak, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.peserta_id = {$id} AND h.ujian_id = a.id_ujian) AS ada, (SELECT h.status FROM h_ujian h WHERE h.peserta_id = $id AND h.ujian_id = a.id_ujian ) AS stat");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('babak b', 'a.babak_id = b.id_babak');
        $this->datatables->join('pemetaan c', "a.tim_soal_id = c.tim_soal_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('tim_soal e', 'e.id_tim_soal = c.tim_soal_id');

        $this->datatables->where('d.id_kelas', $kelas);

        return $this->datatables->generate();
    }

    public function getstat($id, $kelas)
    {
        $this->datatables->select("(SELECT h.status FROM h_ujian h WHERE h.peserta_id = {$id}) AS stat");
        return $this->datatables->generate();
    }

    public function getUjianById($id)
    {
        $this->db->select('*');
        $this->db->from('m_ujian a');
        $this->db->join('tim_soal b', 'a.tim_soal_id=b.id_tim_soal');
        $this->db->join('babak c', 'a.babak_id=c.id_babak');
        $this->db->join('pemetaan d', 'a.tim_soal_id=d.tim_soal_id');
        $this->db->where('id_ujian', $id);
        return $this->db->get()->row();
    }

    public function getIdtim_soal($nim)
    {
        $this->db->select('id_tim_soal, nama_tim_soal')->from('tim_soal')->where('nim', $nim);
        return $this->db->get()->row();
    }

    public function getJumlahSoal($tim_soal, $tim_soal1)
    {
        $this->db->select('COUNT(id_soal) as jml_soal');
        $this->db->from('tb_soal');
        $this->db->where('kelas_id', $tim_soal);
        $this->db->where('babak_id', $tim_soal1);
        return $this->db->get()->row();
    }

    public function getkelasid($tim_soal)
    {
        $this->db->select('*');
        $this->db->where('id_tim_soal', $tim_soal);
        $this->db->from('tim_soal');
        $this->db->join('pemetaan', 'tim_soal_id=id_tim_soal');
        return $this->db->get()->row();
    }
    public function getIdpeserta($no_p)
    {
        $this->db->select('*');
        $this->db->from('peserta a');
        $this->db->join('kelas b', 'a.kelas_id=b.id_kelas');
        $this->db->join('tahun c', 'b.tahun_id=c.id_tahun');
        $this->db->where('no_p', $no_p);
        return $this->db->get()->row();
    }

    public function HslUjian($id, $mhs)
    {
        $this->db->select('*, UNIX_TIMESTAMP(tgl_selesai) as waktu_habis');
        $this->db->from('h_ujian');
        $this->db->where('ujian_id', $id);
        $this->db->where('peserta_id', $mhs);
        return $this->db->get();
    }

    public function getSoal($id)
    {
        $ujian = $this->getUjianById($id);
        $order = $ujian->jenis === "Acak" ? 'rand()' : 'id_soal';

        $this->db->select('id_soal, soal, file, tipe_file, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, jawaban, babak_id');
        $this->db->from('tb_soal');
        $this->db->where('kelas_id', $ujian->kelas_id);
        $this->db->where('babak_id', $ujian->babak_id);
        $this->db->order_by($order);
        $this->db->limit($ujian->jumlah_soal);
        return $this->db->get()->result();
    }

    public function ambilSoal($pc_urut_soal1, $pc_urut_soal_arr)
    {
        $this->db->select("*, {$pc_urut_soal1} AS jawaban");
        $this->db->from('tb_soal');
        $this->db->where('id_soal', $pc_urut_soal_arr);
        return $this->db->get()->row();
    }

    public function getJawaban($id_tes)
    {
        $this->db->select('list_jawaban, ujian_id, peserta_id, key_jwb');
        $this->db->from('h_ujian');
        $this->db->where('id', $id_tes);
        return $this->db->get()->row();
    }

    public function getgetan($id)
    {
        $this->db->select('nama, no_p');
        $this->db->from('peserta');
        $this->db->where('id_peserta', $id);
        return $this->db->get()->row();
    }

    public function getHasilUjian($nim = null)
    {
        $this->datatables->select('b.id_ujian, e.no_p, f.nama_kelas, b.nama_ujian, b.jumlah_soal, CONCAT(b.waktu, " Menit") as waktu, b.tgl_mulai');
        $this->datatables->select('c.nama_babak, d.nama_tim_soal');
        $this->datatables->from('h_ujian a');
        $this->datatables->join('m_ujian b', 'a.ujian_id = b.id_ujian');
        $this->datatables->join('babak c', 'b.babak_id = c.id_babak');
        $this->datatables->join('tim_soal d', 'b.tim_soal_id = d.id_tim_soal');
        $this->datatables->join('peserta e', 'a.peserta_id=e.id_peserta');
        $this->datatables->join('kelas f', 'e.kelas_id=f.id_kelas');
        $this->datatables->group_by('b.id_ujian');
        if ($nim !== null) {
            $this->datatables->where('d.nim', $nim);
        }
        return $this->datatables->generate();
    }

    public function HslUjianById($id, $dt = false)
    {
        if ($dt === false) {
            $db = "db";
            $get = "get";
        } else {
            $db = "datatables";
            $get = "generate";
        }

        $this->$db->select('d.id, a.nama, b.nama_kelas, c.nama_tahun, d.jml_benar, d.nilai, a.no_p, d.jml_salah, d.jml_kosong, d.list_jawaban');
        $this->$db->from('peserta a');
        $this->$db->join('kelas b', 'a.kelas_id=b.id_kelas');
        $this->$db->join('tahun c', 'b.tahun_id=c.id_tahun');
        $this->$db->join('h_ujian d', 'a.id_peserta=d.peserta_id');
        $this->$db->where(['d.ujian_id' => $id]);
        return $this->$db->$get();
    }

    public function bandingNilai($id)
    {
        $this->db->select_min('nilai', 'min_nilai');
        $this->db->select_max('nilai', 'max_nilai');
        $this->db->select_avg('FORMAT(FLOOR(nilai),0)', 'avg_nilai');
        $this->db->where('ujian_id', $id);
        return $this->db->get('h_ujian')->row();
    }

    public function getkkunci($id, $idd)
    {
        $this->datatables->select('id_soal, jawaban');
        $this->datatables->from('tb_soal');
        $this->datatables->where('babak_id', $id);
        $this->datatables->where('kelas_id', $idd);
        return $this->datatables->generate();
    }
}
