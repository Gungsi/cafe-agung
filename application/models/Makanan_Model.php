<?php

class Makanan_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  }

  function get_makanan(){
    $sql = "select a.id, b.jenis, a.nama, a.status from t_makanan a left join t_jenis b on a.id_jenis=b.id order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_makanan_by_id($id){
    $sql = "select * from t_makanan where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function manakan_insert($id_jenis, $manakan, $status){
    $sql = "insert into t_makanan (id, id_jenis, nama, status) values (null, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_jenis, $manakan, $status));
  }

  function manakan_update($id, $id_jenis, $manakan, $status){
    $sql = "update t_makanan set id_jenis = ?, manakan = ?, status = ? where id = ?";
    $query = $this->db->query($sql, array($id_jenis, $manakan, $status, $id));
  }

  function manakan_delete($id){
    $sql = "delete from t_makanan where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}