<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Menu_Model');
    $this->load->model('Makanan_Model');
    $this->load->model('Jenis_Model');
    $this->load->model('Aktivitas_Model');
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Menu";
      $data['data_menu'] = $this->Menu_Model->get_menu();
      
      $this->template->backend("menu/index", $data);
    } else {
      redirect("login");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Menu";

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
          
          $keterangan = "input data menu dengan id menu $makanan";
          $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
          redirect("Menu");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("menu/add_Menu", $data);
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
      $data['title'] = "Form Ubah Menu";
      $data['data_menu'] = $this->Menu_Model->get_Menu_by_id($id);

      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_status(1);
      $data['data_makanan'] = $this->Makanan_Model->get_makanan_by_jenis($data['data_menu']->id_jenis);

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
            $this->Menu_Model->menu_update($id, $jenis, $makanan, $harga, $stok);
            
            $keterangan = "edit data menu menjadi id menu $makanan";
            $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
            redirect("Menu");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("menu/edit_Menu", $data);
    } else {
      redirect("login");
    }
  }

  public function hapus($id)
  {
    if( $this->session->userdata('login')){
        $this->Menu_Model->menu_delete($id);
        
        $keterangan = "delete data menu menjadi id menu $id";
        $this->Aktivitas_Model->aktivitas_insert($this->session->userdata('id'), null, $keterangan);
        redirect("Menu");
    } else {
      redirect("login");
    }
  }
}