<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Makanan_Model');
    $this->load->model('Jenis_Model');
    $this->load->model('Aktivitas_Model');
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "makanan";
      $data['data_makanan'] = $this->Makanan_Model->get_makanan();

      if($this->session->userdata('level')==1){
        $level = "Admin";
      } else if($this->session->userdata('level')==2){
        $level = "Kasir";
      } else {
        $level = "Menejer";
      }
      $data['level'] = $level;
      
      $this->template->backend("makanan/index", $data);
    } else {
      redirect("login");
    }
  }

  public function get_by_jenis()
  {
    $id_jenis = $this->input->post('id_jenis');
    $jenis = $this->Makanan_Model->get_makanan_by_jenis($id_jenis);
    echo json_encode($jenis);
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah makanan";

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
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
          $nama = $this->security->sanitize_filename($this->input->post('nama'));
          $harga = $this->security->sanitize_filename($this->input->post('harga'));
          $status = $this->input->post('status');
          $this->Makanan_Model->makanan_insert($jenis, $nama, $harga, $status);
          
          $keterangan = "insert data makanan $nama";
          $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
          redirect("makanan");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("makanan/add_makanan", $data);
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
      $data['title'] = "Form Ubah makanan";
      $data['data_makanan'] = $this->Makanan_Model->get_makanan_by_id($id);

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
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
          $nama = $this->security->sanitize_filename($this->input->post('nama'));
          $harga = $this->security->sanitize_filename($this->input->post('harga'));
          $status = $this->input->post('status');
          $this->Makanan_Model->makanan_update($id, $jenis, $nama, $harga, $status);

          $keterangan = "edit data makanan $nama";
          $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
          redirect("makanan");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("makanan/edit_makanan", $data);
    } else {
      redirect("login");
    }
  }

  public function hapus($id)
  {
    if( $this->session->userdata('login')){
        $this->Makanan_Model->makanan_delete($id);

        $keterangan = "delete data makanan id $id";
        $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
        redirect("makanan");
    } else {
      redirect("login");
    }
  }
}