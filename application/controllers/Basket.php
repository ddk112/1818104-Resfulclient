<?php

class Basket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Basket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['basket'] = $this->Basket_model->getAllBasket();
        if( $this->input->post('keyword') ) {
            $data['basket'] = $this->Basket_model->cariDataBasket();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('crud_basket/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Basket';

        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alasan_bergabung', 'Alasan Bergabung', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('crud_basket/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Basket_model->tambahDataBasket();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('basket');
        }
    }

    public function hapus($id)
    {
        $this->Basket_model->hapusDataBasket($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('basket');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['basket'] = $this->Basket_model->getBasketById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('crud_basket/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['basket'] = $this->Basket_model->getBasketById($id);
        
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alasan_bergabung', 'Alasan Bergabung', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('crud_basket/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Basket_model->ubahDataBasket();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('basket');
        }
    }

}
