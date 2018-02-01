<?php 

class login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');

		$this->load->helper('form');
		$this->load->helper('url');

	}

	function index(){
		$this->load->view('V_login');
	}

	function do_login(){
		if(isset($_POST['login']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);

			$cek = $this->M_login->cek_login("users",$where)->num_rows();
			if($cek > 0){

				$data_session = array(
					'nama' => $username,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('hasil','Login sukses!');
				redirect('user');
			} else {				
				$this->session->set_flashdata('hasil','Salah username dan password!');
				$this->load->view('V_login');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}