<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Maps_model extends CI_Model
{

    public function simpan($data)
    {
        $this->db->insert('tabel_maps', $data);
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tabel_maps');
        $this->db->order_by('id_penyedia', 'desc');
        return $this->db->get()->result();
    }
}
