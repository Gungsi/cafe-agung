<?php

class Makanan_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_makanan(){
    $sql = "select a.id, b.jenis, a.nama, a.harga_beli, a.status from t_makanan a left join t_jenis b on a.id_jenis=b.id order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_makanan_by_status($id){
    $sql = "select * from t_makanan where status = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function get_makanan_by_jenis($id){
    $sql = "select * from t_makanan where id_jenis = ?";
    $query = $this->db->query($sql, array($id));
    return $query->result();
  }

  function get_makanan_by_id($id){
    $sql = "select * from t_makanan where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function makanan_insert($id_jenis, $makanan, $harga, $status){
    $sql = "insert into t_makanan (id, id_jenis, nama, harga_beli, status) values (null, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_jenis, $makanan, $harga, $status));
  }

  function makanan_update($id, $id_jenis, $makanan, $status){
    $sql = "update t_makanan set id_jenis = ?, nama = ?, harga_beli = ?, status = ? where id = ?";
    $query = $this->db->query($sql, array($id_jenis, $makanan, $harga, $status, $id));
  }

  function makanan_delete($id){
    $sql = "delete from t_makanan where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}