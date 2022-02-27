<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    $this->load->model('Transaksi_Model');
    $this->load->model('Pesanan_Model');
    $this->load->model('Menu_Model');
    $this->load->model('Makanan_Model');
    $this->load->model('Jenis_Model');
    $this->load->model('Aktivitas_Model');
    $this->general->session_check();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index(){
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Transaksi";

      if($this->session->userdata('level')==2){
        $transaksi = $this->Transaksi_Model->get_transaksi_by_user_and_tanggal($this->session->userdata('id'), date('Y-m-d'));
      } else {
        $transaksi = $this->Transaksi_Model->get_transaksi_by_tanggal(date('Y-m-d'));
      }
      // print_r($transaksi);die;

      $data['data_transaksi'] = $transaksi;
      
      $this->template->backend("transaksi/index", $data);
    } else {
      redirect("login");
    }
  }

  public function detail($id)
  {
    if( $this->session->userdata('login')){
      $data = [];
      $data['title'] = "Detail Transaksi";

      $transaksi = $this->Transaksi_Model->get_transaksi_by_id($id);
      $pesanan = $this->Pesanan_Model->get_pesanan_by_id_transaksi($id);

      $data['data_transaksi'] = $transaksi;
      $data['data_pesanan'] = $pesanan;
      
      $this->template->backend("transaksi/detail_transaksi", $data);
    } else {
      redirect("login");
    }
  }

  public function tambah()
  {
    if( $this->session->userdata('login')){
      $pesan = "";
      $data = [];
      $data['title'] = "Form Tambah Transaksi";

      $data['data_jenis'] = $this->Jenis_Model->get_jenis_by_status(1);
      $data['data_menu'] = $this->Menu_Model->get_menu();

      if($this->input->post("submit")){
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pelanggan', 'Pelanggal', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('no_meja', 'Nomor Meja', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('pajak', 'Pajak', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|xss_clean|strip_tags|required');
        $this->form_validation->set_rules('kembalian', 'Kembalian', 'trim|xss_clean|strip_tags|required');
    
        if($this->form_validation->run()){
          $id_kasir = $this->input->post('id_kasir');
          $pelanggan = $this->input->post('pelanggan');
          $no_meja = $this->input->post('no_meja');
          $id_diskon = $this->input->post('id_diskon');
          
          $pajak = $this->input->post('pajak');
          $pajak = str_replace(".","",$pajak);
          
          $total = $this->input->post('total');
          $total = str_replace(".","",$total);

          $diskon = $this->input->post('diskon');
          $diskon = str_replace(".","",$diskon);
          
          $nominal = $this->input->post('nominal');
          $nominal = str_replace(".","",$nominal);

          $kembalian = $this->input->post('kembalian');
          $kembalian = str_replace(".","",$kembalian);
          
          $id_transaksi = $this->Transaksi_Model->transaksi_insert($id_kasir, $id_diskon, $diskon, $pelanggan, $no_meja, $pajak, $total, $nominal, $kembalian);

          $id_menu = $this->input->post('id_menu');
          $jumlah = $this->input->post('jumlah');
          $catatan = $this->input->post('catatan');
          $total = $this->input->post('total');

          // print_r($id_menu);die;
          
          for ($i=0; $i < count($id_menu) ; $i++) { 
            $menu = $id_menu[$i];
            $jml = $jumlah[$i];
            $note = $catatan[$i];
            $ttl = $total[$i];
            $ttl = str_replace(".","",$ttl);

            $this->Pesanan_Model->pesanan_insert($id_transaksi, $menu, $jml, $ttl, $note);
          }

          $$keterangan = "Melakukan input pemesanan atas nama $pelanggan";

          $this->Aktivitas_Model->aktivitas_insert($id_kasir, $id_transaksi, $keterangan);

          redirect("transaksi");
        }else{
          $pesan = "Mohon isi semua dengan benar";
        }
      }

      $data["pesan"] = $pesan;
      $this->template->backend("transaksi/add_transaksi", $data);
    } else {
      redirect("login");
    }
  }
}