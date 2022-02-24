<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    // $this->load->model('BKPRMI_Model');
    $this->general->session_check();
  }

  function index(){
    $data = [];
    $data['title'] = "Dashboard";

    if($this->session->userdata('level')==1){
      $level = "Admin";
    } else if($this->session->userdata('level')==2){
      $level = "Kasir";
    } else {
      $level = "Menejer";
    }
    $data["level"] = $level;
    
    $this->template->backend("dashboard/index", $data);
  }
}