<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('i_login')) {
			redirect('auth/login');
		}
		$this->load->model(array('Religion_model'));
	}

	public function index()
	{
		$params['limit'] = 10;
		$params['offset'] = $offset;
		$this->load->library('pagination');
		$config['base_url'] = site_url('raligion/index');
		$config['total_rows'] = count($this->Religion_model->get(array()));
		$this->pagination->initialize($config);

		$data['religion'] = $this->Religion_model->get($params);
		$data['page'] = 'user/list';
		$this->load->view('templates/layout', $data);
	}

}

/* End of file Religion.php */
/* Location: ./application/controllers/Religion.php */