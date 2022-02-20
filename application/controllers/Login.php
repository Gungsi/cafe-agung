<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();

		$this->load->model('Login_Model');
    }

	public function index()
	{
		if( ! $this->session->userdata('login')){
			$pesan1 = "";
			if($this->input->post("submit")){
				$ket = "Melakukan Login";
				// die("wew");
		
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|strip_tags|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|strip_tags|required');
		
				if($this->form_validation->run()){
					$username = $this->security->sanitize_filename($this->input->post('username'));
					$password = $this->security->sanitize_filename($this->input->post('password'));
					$check = $this->Login_Model->login($username, $password);
					$get = $check->row();
					$submit = ($this->session->userdata('submitlog'))? $this->session->userdata('submitlog') : 0;
					// echo "<pre>";print_r($get);die;
					if($check->num_rows() > 0){
						$sessdata = array(
							'id' => $get->id,
							'nama' => $get->nama,
							'level' => $get->level,
							'email' => $get->email,
							'login' => TRUE,
						);
						//echo "<pre>";print_r($sess);die;
						$this->session->set_userdata($sessdata);
						redirect("dashboard");
					}else{
						$pesan1 = "Username atau Password Anda Salah";
						$this->session->sess_destroy();
					}
				}else{
					$pesan1 = "Mohon isi semua dengan benar";
					$this->session->sess_destroy();
				}
			}
		
			// Insert Log
			// $ket = "Masuk Halaman Login / Resgitrasi";
			// $this->Login_Model->log_insert($this->user_id, null, $this->ip_address, $ket);
		
			// $this->mybreadcrumb->add("Home", base_url());
			// $this->mybreadcrumb->add("Masuk / Daftar");
			// $data['breadcrumb'] = $this->mybreadcrumb->render();
			$data['title'] = "Masuk";
			$data['login_active'] = true;
			
			// $data['pesan2'] = "";
			$data['pesan1'] = $pesan1;
		
			$this->template->login('index', $data);
		}else{
			redirect("dashboard");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}
}
