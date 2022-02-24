<?php

class User_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  }

  function get_user(){
    $sql = "select * from t_user order by id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_user_by_id($id){
    $sql = "select * from t_user where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function user_insert($name, $email, $username, $password, $jenis_kelamin, $level, $status){
    $sql = "insert into t_user (id, nama, email, username, password, jenis_kelamin, level, status) values (null, ?, ?, ?, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($name, $email, $username, md5($password), $jenis_kelamin, $level, $status));
  }

  function user_update($id, $name, $email, $username, $jenis_kelamin, $level, $status){
    $sql = "update t_user set nama = ?, email = ?, username = ?, jenis_kelamin = ?, level = ?, status = ? where id = ?";
    $query = $this->db->query($sql, array($name, $email, $username, $jenis_kelamin, $level, $status, $id));
  }

  function user_delete($id){
    $sql = "delete from t_user where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}