<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('User_Model');
    $this->general->session_check();
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "User";
      $data['data_user'] = $this->User_Model->get_user();
      
      $this->template->backend("user/index", $data);
    } else {
      redirect("login/logout");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah User";

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $nama = $this->security->sanitize_filename($this->input->post('name'));
          $email = $this->security->sanitize_filename($this->input->post('email'));
          $username = $this->security->sanitize_filename($this->input->post('username'));
          $password = $this->security->sanitize_filename($this->input->post('password'));
          $jenis_kelamin = $this->security->sanitize_filename($this->input->post('jenis_kelamin'));
          $level = $this->security->sanitize_filename($this->input->post('level'));
          $status = $this->input->post('status');

          $this->User_Model->user_insert($nama, $email, $username, $password, $jenis_kelamin, $level, $status);
          redirect("user");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("user/add_user", $data);
    } else {
      redirect("login/logout");
    }
  }

  public function ubah($id)
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['id'] = $id;
      $data['title'] = "Form Ubah User";
      $data['data_user'] = $this->User_Model->get_user_by_id($id);

      if($this->input->post("submit")){      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
            $nama = $this->security->sanitize_filename($this->input->post('name'));
            $email = $this->security->sanitize_filename($this->input->post('email'));
            $username = $this->security->sanitize_filename($this->input->post('username'));
            $jenis_kelamin = $this->security->sanitize_filename($this->input->post('jenis_kelamin'));
            $level = $this->security->sanitize_filename($this->input->post('level'));
            $status = $this->input->post('status');

          $this->User_Model->user_update($id, $nama, $email, $username, $password, $jenis_kelamin, $level, $status);
          redirect("user");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("user/edit_user", $data);
    } else {
      redirect("login/logout");
    }
  }

  public function hapus($id)
  {
    if( $this->session->userdata('login')){
        $this->User_Model->user_delete($id);
        redirect("user");
    } else {
      redirect("login/logout");
    }
  }
}