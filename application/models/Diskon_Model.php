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

  function manakan_insert($kode, $diskon_persen, $diskon_harga){
    $sql = "insert into t_diskon (id, kode, diskon_persen, diskon_harga) values (null, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_jenis, $manakan, $status));
  }

  function manakan_update($id, $kode, $diskon_persen, $diskon_harga){
    $sql = "update t_diskon set kode = ?, diskon_persen = ?, diskon_harga = ? where id = ?";
    $query = $this->db->query($sql, array($kode, $diskon_persen, $diskon_harga, $id));
  }

  function manakan_delete($id){
    $sql = "delete from t_diskon where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}