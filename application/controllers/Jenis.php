<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Jenis_Model');
    $this->general->session_check();
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Jenis";
      $data['data_jenis'] = $this->Jenis_Model->get_jenis();
      
      $this->template->backend("jenis/index", $data);
    } else {
      redirect("login");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Jenis";

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
          $status = $this->input->post('status');
          $this->Jenis_Model->jenis_insert($jenis, $status);
          redirect("jenis");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("jenis/add_jenis", $data);
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
      $data['title'] = "Form Ubah Jenis";
      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_id($id);

      if($this->input->post("submit")){      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
          $status = $this->input->post('status');
          $this->Jenis_Model->jenis_update($id, $jenis, $status);
          redirect("jenis");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("jenis/edit_jenis", $data);
    } else {
      redirect("login");
    }
  }

  public function hapus($id)
  {
    if( $this->session->userdata('login')){
        $this->Jenis_Model->jenis_delete($id);
        redirect("jenis");
    } else {
      redirect("login");
    }
  }
}