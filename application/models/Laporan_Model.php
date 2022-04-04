<?php

class Laporan_Model extends CI_Model {
  
  function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  function pendapatan($startDate = "", $endDate = ""){
    $sql = "SELECT trx.id, trx.tanggal, trx.diskon, trx.total, SUM(makanan.harga_beli) as harga_beli, trx.nominal, (trx.total - SUM(makanan.harga_beli)) as pendapatan FROM t_transaksi trx RIGHT JOIN t_pesanan pesan ON pesan.id_transaksi = trx.id LEFT JOIN t_menu menu ON pesan.id_menu = menu.id LEFT JOIN t_makanan makanan ON menu.id_makanan = makanan.id";
    
    if($startDate != "" && $endDate != ""){
      $sql .= " WHERE trx.tanggal between '".$startDate."' and '".$endDate."'";
    }
    // die($sql);
    
    $query = $this->db->query($sql);
    return $query->result();
  }
}