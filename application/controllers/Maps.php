<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('maps_model');
    }


    public function index()
    {
        $data['title'] = 'Penyewaan Reklame';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('maps/index', $data);
        $this->load->view('templates/footer');
    }

    public function data()
    {
        $data = array(
            'title' => 'Data Penyedia Reklame',
            'maps' => $this->maps_model->tampil(),
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'isi' => 'datapenyedia'
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('maps/datapenyedia', $data);
        $this->load->view('templates/footer');

        // $data['title'] = 'Data Penyedia Reklame';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('maps/datapenyedia', $data);

        // $this->load->view('templates/footer');
        // $this->model_maps->tampil();
    }


    public function input()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('nama_penyedia', 'Nama Penyedia', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Input Penyedia Reklame';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('maps/input', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'alamat' => $this->input->post('alamat'),
                'nama_penyedia' => $this->input->post('nama_penyedia'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'ket' => $this->input->post('ket'),
            );
            $this->maps_model->simpan($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambah</div>');
            redirect('maps/input');
        }
    }
}
