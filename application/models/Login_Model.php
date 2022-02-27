<?php

class Login_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  // Login
  function login($user, $pass){
    // $mpass = $this->user_pass($pass);
    $mpass = md5($pass);
    // die($mpass);
    $sql = "select id, nama, email, level, status from t_user 
      where username = ? and password = ? and status = 1";
    $query = $this->db->query($sql,array($user,$mpass));
    return $query;
  }

  // Password Login
  function user_pass($pass) {
    return md5("p35T4$$".$pass."##w1R4u5^#4");
  }
}