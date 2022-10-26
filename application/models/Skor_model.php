<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor_model extends CI_Model
{
    public function get($no)
    {
        return $this->db->get_where('skor', ["no" => $no])->row();
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
