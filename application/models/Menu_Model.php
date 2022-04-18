<?php

class Menu_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_menu(){
    $sql = "select a.id, b.jenis, c.nama as makanan, a.harga, a.stok, a.keterangan from t_menu a left join t_jenis b on a.id_jenis=b.id left join t_makanan c on a.id_makanan=c.id order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_menu_transaksi(){
    $sql = "select a.id, b.jenis, c.nama as makanan, a.harga, a.stok, a.keterangan from t_menu a left join t_jenis b on a.id_jenis=b.id left join t_makanan c on a.id_makanan=c.id where a.stok > 0 order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_menu_by_id($id){
    $sql = "select * from t_menu where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function menu_insert($id_jenis, $id_makanan, $harga, $stok, $keterangan){
    $sql = "insert into t_menu (id, id_jenis, id_makanan, harga, stok, keterangan) values (null, ?, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_jenis, $id_makanan, $harga, $stok, $keterangan));
    return $query;
  }

  function menu_update($id, $id_jenis, $id_makanan, $harga, $stok, $keterangan){
    $sql = "update t_menu set id_jenis = ?, id_makanan = ?, harga = ?, stok = ?, keterangan = ? where id = ?";
    $query = $this->db->query($sql, array($id_jenis, $id_makanan, $harga, $stok, $keterangan, $id));
    return $query;
  }

  function kurang_stok($id, $stok)
  {
    $sql = "update t_menu set stok = ? where id = ?";
    $query = $this->db->query($sql, array($stok, $id));
    return $query;
  }

  function menu_delete($id){
    $sql = "delete from t_menu where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query;
  }
}