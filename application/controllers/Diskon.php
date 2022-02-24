<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Diskon_Model');
    $this->general->session_check();
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Diskon";
      $data['data_diskon'] = $this->Diskon_Model->get_diskon();

      if($this->session->userdata('level')==1){
        $level = "Admin";
      } else if($this->session->userdata('level')==2){
        $level = "Kasir";
      } else {
        $level = "Menejer";
      }
      $data['level'] = $level;
      
      $this->template->backend("diskon/index", $data);
    } else {
      redirect("login");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Diskon";

      if($this->session->userdata('level')==1){
        $level = "Admin";
      } else if($this->session->userdata('level')==2){
        $level = "Kasir";
      } else {
        $level = "Menejer";
      }
      $data['level'] = $level;

      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_status(1);

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('diskon', 'diskon', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $diskon = $this->security->sanitize_filename($this->input->post('diskon'));
          $status = $this->input->post('status');
          $this->Diskon_Model->diskon_insert($diskon, $status);
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

      if($this->session->userdata('level')==1){
        $level = "Admin";
      } else if($this->session->userdata('level')==2){
        $level = "Kasir";
      } else {
        $level = "Menejer";
      }
      $data['level'] = $level;

      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_status(1);

      if($this->input->post("submit")){      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('diskon', 'diskon', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $diskon = $this->security->sanitize_filename($this->input->post('diskon'));
          $status = $this->input->post('status');
          $this->Diskon_Model->diskon_update($id, $diskon, $status);
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
        redirect("diskon");
    } else {
      redirect("login");
    }
  }
}