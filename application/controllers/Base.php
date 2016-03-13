<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('i_login')) {
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'dashboard';
		$this->load->view('templates/layout', $data);
	}

}

/* End of file Base.php */
/* Location: ./application/controllers/Base.php */