<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Diskon_Model');
    $this->load->model('Aktivitas_Model');
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Diskon";
      $data['data_diskon'] = $this->Diskon_Model->get_diskon();
      
      $this->template->backend("diskon/index", $data);
    } else {
      redirect("login");
    }
  }

  public function get_by_kode()
  {
    $kode_diskon = $this->input->post('kode_diskon');
    $diskon = $this->Diskon_Model->get_diskon_by_kode($kode_diskon);
    echo json_encode($diskon);
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Diskon";

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'Kode', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('diskon_persen', 'Diskon %', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('diskon_harga', 'Diskon Harga', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $kode = $this->security->sanitize_filename($this->input->post('kode'));
          $diskon_persen = $this->security->sanitize_filename($this->input->post('diskon_persen'));
          $diskon_harga = $this->security->sanitize_filename($this->input->post('diskon_harga'));
          $diskon_harga = str_replace(".","",$diskon_harga);

          $status = $this->input->post('status');
          $this->Diskon_Model->diskon_insert($kode, $diskon_persen, $diskon_harga, $status);

          $keterangan = "input data diskon dengan kode $kode";
          $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
          redirect("diskon");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("diskon/add_diskon", $data);
    } else {
      redirect("login");
    }
  }

  public function ubah($id)
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['id'] = $id;
      $data['title'] = "Form Ubah Diskon";
      $data['data_diskon'] = $this->Diskon_Model->get_diskon_by_id($id);

      if($this->input->post("submit")){      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'Kode', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('diskon_persen', 'Diskon %', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('diskon_harga', 'Diskon Harga', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $kode = $this->security->sanitize_filename($this->input->post('kode'));
          $diskon_persen = $this->security->sanitize_filename($this->input->post('diskon_persen'));
          $diskon_harga = $this->security->sanitize_filename($this->input->post('diskon_harga'));
          $diskon_harga = str_replace(".","",$diskon_harga);
          
          $status = $this->input->post('status');
          $this->Diskon_Model->diskon_update($id, $kode, $diskon_persen, $diskon_harga, $status);

          $keterangan = "edit data diskon ke kode $kode";
          $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
          redirect("diskon");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("diskon/edit_diskon", $data);
    } else {
      redirect("login");
    }
  }

  public function hapus($id)
  {
    if( $this->session->userdata('login')){
        $this->Diskon_Model->diskon_delete($id);

        $keterangan = "delete data diskon dengan id $id";
        $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
        redirect("diskon");
    } else {
      redirect("login");
    }
  }
}