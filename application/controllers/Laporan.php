<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Transaksi_Model');
    $this->load->model('Pesanan_Model');
    $this->load->model('Menu_Model');
    $this->load->model('Makanan_Model');
    $this->load->model('Jenis_Model');
    $this->load->model('User_Model');
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function transaksi(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Laporan Transaksi";
      $data['karyawan'] = "";
      $data['date'] = "";

      if($this->session->userdata('level')==2){
        $transaksi = $this->Transaksi_Model->get_transaksi_by_user_and_tanggal($this->session->userdata('id'), date('Y-m-d'));
      } else {
        $transaksi = $this->Transaksi_Model->get_transaksi_by_tanggal(date('Y-m-d'));
      }
      // print_r($transaksi);die;

      $data['data_transaksi'] = $transaksi;
      $data['data_karyawan'] = $this->User_Model->get_user_by_level(2);
      
      $this->template->backend("laporan/transaksi", $data);
    } else {
      redirect("login");
    }
  }

  public function search_transaksi()
  {
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Laporan Transaksi";

      $karyawan = $this->input->post('karyawan');
      $date = $this->input->post('dates');
      // die($date);

      $data['karyawan'] = $karyawan;
      $data['date'] = $date;
      // die($date == ""? "true" : "false");
      if($karyawan == "" && $date == ""){
        $transaksi = $this->Transaksi_Model->get_transaksi();
      } else if($karyawan != "" && $date == "") {
        $transaksi = $this->Transaksi_Model->get_transaksi_search_by_user($karyawan);
      } else if($karyawan == "" && $date != "") {
        $dates = explode(" - ", $date);
        // print_r($dates);die;
        $start = $dates[0];
        $end = $dates[1];

        // $date_start = date_format($start, "Y-m-d");
        // $date_end = date_format($end, "Y-m-d");

        $transaksi = $this->Transaksi_Model->get_transaksi_search_by_tanggal($start, $end);
      } else {

        $dates = explode(" - ", $date);
        $start = $dates[0];
        $end = $dates[1];

        // $date_start = date_format($start, "Y-m-d");
        // $date_end = date_format($end, "Y-m-d");
        $transaksi = $this->Transaksi_Model->get_transaksi_search_by_user_and_tanggal($karyawan, $start, $end);
      }
      // print_r($transaksi);die;

      $data['data_transaksi'] = $transaksi;
      $data['data_karyawan'] = $this->User_Model->get_user_by_level(2);
      
      $this->template->backend("laporan/transaksi", $data);
    } else {
      redirect("login");
    }
  }

  public function keuangan()
  {
    if( $this->session->userdata('login')){
        $data = [];
        $data['title'] = "Laporan Keuangan";
        
        $this->template->backend("laporan/keuangan", $data);
      } else {
        redirect("login");
      }
  }
}