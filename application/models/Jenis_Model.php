<?php

class Jenis_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_jenis(){
    $sql = "select * from t_jenis order by id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_jenis_by_status($status){
    $sql = "select * from t_jenis where status = ? order by id asc";
    $query = $this->db->query($sql, [$status]);
    return $query->result();
  }

  function get_jenis_by_id($id){
    $sql = "select * from t_jenis where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function jenis_insert($jenis, $status){
    $sql = "insert into t_jenis (id, jenis, status) values (null, ?, ?)";
    $query = $this->db->query($sql, array($jenis, $status));
  }

  function jenis_update($id, $jenis, $status){
    $sql = "update t_jenis set jenis = ?, status = ? where id = ?";
    $query = $this->db->query($sql, array($jenis, $status, $id));
  }

  function jenis_delete($id){
    $sql = "delete from t_jenis where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}