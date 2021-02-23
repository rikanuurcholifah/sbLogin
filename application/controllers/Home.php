<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('maps_model');
    }


    public function index()
    {
        $data = array(
            'title' => 'Data Penyedia Reklame',
            'maps' => $this->maps_model->tampil(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'isi' => 'index'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('maps/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_penyedia)
    {
        $data = array(
            'title' => 'Detail Penyedia Reklame',
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'isi' => 'detailpenyedia'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('maps/detailpenyedia', $data);
        $this->load->view('templates/footer');
    }
}
