<?php

class Diskon_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  }

  function get_diskon(){
    $sql = "select * from t_diskon order by id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_diskon_by_id($id){
    $sql = "select * from t_diskon where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function get_diskon_by_kode($id){
    $sql = "select * from t_diskon where kode = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function diskon_insert($kode, $diskon_persen, $diskon_harga, $status){
    $sql = "insert into t_diskon (id, kode, diskon_persen, diskon_harga, status) values (null, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($kode, $diskon_persen, $diskon_harga, $status));
  }

  function diskon_update($id, $kode, $diskon_persen, $diskon_harga, $status){
    $sql = "update t_diskon set kode = ?, diskon_persen = ?, diskon_harga = ?, status = ? where id = ?";
    $query = $this->db->query($sql, array($kode, $diskon_persen, $diskon_harga, $status, $id));
  }

  function diskon_delete($id){
    $sql = "delete from t_diskon where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}