<?php

class Aktivitas_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_aktivitas(){
    $sql = "select * from t_aktivitas order by id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_aktivitas_by_id($id){
    $sql = "select * from t_aktivitas where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function get_aktivitas_by_kode($id){
    $sql = "select * from t_aktivitas where kode = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function aktivitas_insert($id_user, $id_transaksi, $keterangan){
    $sql = "insert into t_aktivitas (id, id_user, id_transaksi, keterangan) values (null, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_user, $id_transaksi??"", $keterangan));
  }

  function aktivitas_update($id, $id_user, $id_transaksi, $keterangan){
    $sql = "update t_aktivitas set id_user = ?, id_transaksi = ?, keterangan = ? where id = ?";
    $query = $this->db->query($sql, array($id_user, $id_transaksi, $keterangan, $id));
  }

  function aktivitas_delete($id){
    $sql = "delete from t_aktivitas where id = ?";
    $query = $this->db->query($sql, array($id));
  }
}