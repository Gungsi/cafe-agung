<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  function index(){
    $data = [];
    $data['title'] = "Dashboard";
    
    $this->template->backend("dashboard/index", $data);
  }
}