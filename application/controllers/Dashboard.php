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
    
    $this->template->backend("dashboard/index", $data);
  }
}