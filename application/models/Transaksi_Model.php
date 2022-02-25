<?php

class Transaksi_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  }

  function get_tramsaksi(){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id 
            order by a.id asc";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_tramsaksi_by_tanggal($tanggal){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id 
            where a.tanggal = ?
            order by a.id asc";
    $query = $this->db->query($sql, [$tanggal]);
    return $query->result();
  }

  function get_tramsaksi_by_user($id){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id
            where b.id = ?
            order by a.id asc";
    $query = $this->db->query($sql, [$id]);
    return $query->result();
  }

  function get_tramsaksi_by_user_and_tanggal($id, $tanggal){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id
            where b.id = ? and a.tanggal = ?
            order by a.id asc";
    $query = $this->db->query($sql, [$id, $tanggal]);
    return $query->result();
  }

  function get_tramsaksi_by_id($id){
    $sql = "select * from t_tramsaksi where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function tramsaksi_insert($id_user, $id_diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian){
    $sql = "insert into t_tramsaksi (id, id_user, id_diskon, atas_nama, no_meja, pajak, total, nominal, kembalian, tanggal) values (null, ?, ?, ?, ?, ?, ?, ?, ?)";
    $query = $this->db->query($sql, array($id_user, $id_diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian, date("Y-m-d H:i:s")));
    return $query;
  }

  function tramsaksi_update($id, $id_user, $id_diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian){
    $sql = "update t_tramsaksi set id_user = ?, id_diskon = ?, atas_nama = ?, no_meja = ?, pajak = ?, total = ?, nominal = ?, kembalian = ?, tanggal = ? where id = ?";
    $query = $this->db->query($sql, array($id_user, $id_diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian, date("Y-m-d H:i:s"), $id));
    return $query;
  }

  function tramsaksi_delete($id){
    $sql = "delete from t_tramsaksi where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query;
  }
}