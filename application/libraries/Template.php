<?php
class Template{
  protected $_ci;
  
  function __construct(){
    $this->_ci = &get_instance();
    $this->_ci->load->model("Login_Model");
  }

  // function frontend($content, $data = NULL){
  //   $data['header'] = $this->_ci->load->view('frontend/template/header', $data, TRUE);
  //   $data['slider'] = $this->_ci->load->view('frontend/template/slider', $data, TRUE);
  //   $data['content'] = $this->_ci->load->view('frontend/'.$content, $data, TRUE);
  //   $data['sidebar_popoler'] = $this->_ci->BKPRMI_Model->get_content_by_popular();
  //   $data['sidebar_terbaru'] = $this->_ci->BKPRMI_Model->get_content_by_page_type(1);
  //   $data['sidebar_artikel_terbaru'] = $this->_ci->BKPRMI_Model->get_content_by_page_type(2);
  //   $data['sidebar_tag_populer'] = $this->_ci->BKPRMI_Model->get_tag_popular();
  //   $data['sidebar_banner'] = $this->_ci->BKPRMI_Model->get_banner_by_status(1);
  //   $data['settings'] = $this->_ci->BKPRMI_Model->get_setting_by_id(1);
  //   $this->_ci->load->view('frontend/template/index', $data);
  // }
	
  function backend($content, $data = NULL, $sidebar=true){
    $data['header'] = $this->_ci->load->view('backend/template/header', $data, TRUE);  
    $data['sidebar'] = $this->_ci->load->view('backend/template/sidebar', $data, TRUE);
    $data['content'] = $this->_ci->load->view('backend/'.$content, $data, TRUE);
    $this->_ci->load->view('backend/template/index', $data);
  }
	
  function login($content, $data = NULL){
    $data['content'] = $this->_ci->load->view('login/'.$content, $data, TRUE);
    $this->_ci->load->view('login/index', $data);
  }
}

