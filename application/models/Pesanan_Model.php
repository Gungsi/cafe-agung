<?php

class Pesanan_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_pesanan(){
    $sql = "select a.id, c.jenis, d.nama as makanan, b.harga, a.jumlah, a.total 
            from t_pesanan a 
            left join t_menu b on a.id_menu=b.id
            left join t_jenis c on b.id_jenis=c.id 
            left join t_makanan d on b.id_makanan=d.id 
            order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_pesanan_by_id_transaksi($id){
    $sql = "select a.id, c.jenis, d.nama as makanan, b.harga, a.jumlah, a.total, a.catatan 
            from t_pesanan a 
            left join t_menu b on a.id_menu=b.id
            left join t_jenis c on b.id_jenis=c.id 
            left join t_makanan d on b.id_makanan=d.id 
            where a.id_transaksi = ?
            order by a.id asc";
    $query = $this->db->query($sql, [$id]);
    return $query->result();
  }

  function get_pesanan_by_id($id){
    $sql = "select * from t_pesanan where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function pesanan_insert($id_transaksi, $id_menu, $jumlah, $total, $catatan){
    $sql = "insert into t_pesanan (id, id_transaksi, id_menu, jumlah, total, catatan) values (null, ?, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_transaksi, $id_menu, $jumlah, $total, $catatan));
    return $query;
  }

  function pesanan_update($id, $id_transaksi, $id_menu, $jumlah, $total, $catatan){
    $sql = "update t_pesanan set id_transaksi = ?, id_menu = ?, jumlah = ?, total = ?, catatan = ? where id = ?";
    $query = $this->db->query($sql, array($id_transaksi, $id_menu, $jumlah, $total, $catatan, $id));
    return $query;
  }

  function pesanan_delete($id){
    $sql = "delete from t_pesanan where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query;
  }
}