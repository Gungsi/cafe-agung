<?php

class Transaksi_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function get_transaksi(){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
            order by a.id asc";
    // die($sql);
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_transaksi_by_tanggal($tanggal){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
            where a.tanggal like ?
            order by a.id asc";
            // die($sql);
    $query = $this->db->query($sql, ["%".$tanggal."%"]);
    return $query->result();
  }

  function get_transaksi_search_by_user_and_tanggal($user, $tanggal_mulai, $tanggal_akhir)
  {
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
            where b.id = ? or a.tanggal between ? and ?
            order by a.id asc";
            // die($sql);
    $query = $this->db->query($sql, [$user, $tanggal_mulai, $tanggal_akhir]);
    return $query->result();
  }

  function get_transaksi_search_by_user($user)
  {
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
            where b.id = ?
            order by a.id asc";
            // die($sql);
    $query = $this->db->query($sql, [$user]);
    return $query->result();
  }

  function get_transaksi_search_by_tanggal($mulai, $akhir)
  {
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
            where a.tanggal between ? and ?
            order by a.id asc";
            // die($sql);
    $query = $this->db->query($sql, [$mulai, $akhir]);
    return $query->result();
  }

  function get_transaksi_by_user($id){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date 
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id
            where b.id = ?
            order by a.id asc";
    $query = $this->db->query($sql, [$id]);
    return $query->result();
  }

  function get_transaksi_by_user_and_tanggal($id, $tanggal){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, c.kode, c.diskon_persen, c.diskon_harga, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date
            from t_transaksi a 
                left join t_user b on a.id_user=b.id 
                left join t_diskon c on a.id_diskon=c.id
            where b.id = ? and a.tanggal like ?
            order by a.id asc";
    $query = $this->db->query($sql, [$id, "%".$tanggal."%"]);
    return $query->result();
  }

  function get_transaksi_by_id($id){
    $sql = "select a.id, a.atas_nama, b.nama as kasir, a.diskon, a.no_meja, a.pajak, a.total, a.nominal, a.kembalian, a.tanggal, a.create_date
            from t_transaksi a 
                left join t_user b on a.id_user=b.id
            where a.id = ?";
    $query = $this->db->query($sql, array($id));
    return $query->row();
  }

  function transaksi_insert($id_user, $id_diskon, $diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian){
    // $sql = "insert into t_transaksi (id, id_user, id_diskon, atas_nama, no_meja, pajak, total, nominal, kembalian, tanggal) values (null, ?, ?, ?, ?, ?, ?, ?, ?)";
    // $query = $this->db->query($sql, array($id_user, $id_diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian, date("Y-m-d H:i:s")));
    // return $query;
    $data = [
      'id_user' => $id_user,
      'id_diskon' => $id_diskon,
      'diskon' => $diskon,
      'atas_nama' => $atas_nama,
      'no_meja' => $no_meja,
      'pajak' => $pajak,
      'total' => $total,
      'nominal' => $nominal,
      'kembalian' => $kembalian,
      'tanggal' => date("Y-m-d H:i:s")
    ];
    $this->db->insert('t_transaksi', $data);
    $insertId = $this->db->insert_id();
    return  $insertId;
  }

  function transaksi_update($id, $id_user, $id_diskon, $diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian){
    $sql = "update t_transaksi set id_user = ?, id_diskon = ?, diskon = ?, atas_nama = ?, no_meja = ?, pajak = ?, total = ?, nominal = ?, kembalian = ?, tanggal = ? where id = ?";
    $query = $this->db->query($sql, array($id_user, $id_diskon, $diskon, $atas_nama, $no_meja, $pajak, $total, $nominal, $kembalian, date("Y-m-d H:i:s"), $id));
    return $query;
  }

  function transaksi_delete($id){
    $sql = "delete from t_transaksi where id = ?";
    $query = $this->db->query($sql, array($id));
    return $query;
  }
}