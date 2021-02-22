<?php

defined('BASEPATH') or exit('No direct script access allowed');
//Yang berkaitan dengan database perintah disimpan pada model
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
        $this->db->order_by('id_penyedia', 'asc');
        return $this->db->get()->result();
    }

    public function detail($id_penyedia)
    {
        $this->db->select('*');
        $this->db->from('tabel_maps');
        $this->db->where('id_penyedia', $id_penyedia);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_penyedia', $data['id_penyedia']);
        $this->db->update('tabel_maps', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_penyedia', $data['id_penyedia']);
        $this->db->delete('tabel_maps', $data);
    }
}
