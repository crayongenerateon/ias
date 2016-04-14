<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('User_model'));
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('i_login')) {
			redirect('base');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$this->doLogin();
		} else {
			$this->load->view('auth/login');
		}
	}

	function doLogin()
	{
		if ($this->session->userdata('i_login')) {
			redirect('base');
		}
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$return = $this->User_model->get(array('username' => $username, 'password' => $password));
		if (count($return) == 1 ) {
			
			$array = array(
					'i_login' => TRUE,
					'i_id' => $return[0]['user_id'],
					'i_name' => $return[0]['username'],
					'i_full_name' => $return[0]['user_full_name'],
					'i_role' => $return[0]['user_role_id']
				);

			$this->session->set_userdata( $array );
			redirect('base');
		}else{
			$this->session->set_flashdata('arrorLogin', 'Incorrect Username or Password');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		if (!$this->session->userdata('i_login')) {
			redirect('auth/login');
		}

		$this->session->unset_userdata('i_login');
		$this->session->unset_userdata('i_id');
		$this->session->unset_userdata('i_name');
		$this->session->unset_userdata('i_full_name');
		$this->session->unset_userdata('i_role');
		
		redirect('auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */