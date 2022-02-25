<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Transaksi_Model');
    $this->load->model('Pesanan_Model');
    $this->load->model('Menu_Model');
    $this->load->model('Makanan_Model');
    $this->load->model('Jenis_Model');
    $this->general->session_check();
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Transaksi";

      if($this->session->userdata('level')==2){
        $transaksi = $this->Transaksi_Model->get_tramsaksi_by_user_and_tanggal($this->session->userdata('id'), date('Y-m-d'));
      } else {
        $transaksi = $this->Transaksi_Model->get_tramsaksi_by_tanggal(date('Y-m-d'));
      }

      $data['data_transaksi'] = $transaksi;
      
      $this->template->backend("transaksi/index", $data);
    } else {
      redirect("login");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Transaksi";

      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_status(1);

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('makanan', 'Makanan', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $jenis = $this->security->sanitize_filename($this->input->post('jenis'));
          $makanan = $this->security->sanitize_filename($this->input->post('makanan'));
          $harga = $this->security->sanitize_filename($this->input->post('harga'));
          $harga = str_replace(".","",$harga);
          $stok = $this->input->post('stok');
          
          $this->Menu_Model->menu_insert($jenis, $makanan, $harga, $stok);
          redirect("transaksi");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("transaksi/add_transaksi", $data);
    } else {
      redirect("login");
    }
  }
}