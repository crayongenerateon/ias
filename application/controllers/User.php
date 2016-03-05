<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('i_login')) {
			redirect('auth/login');
		}
		$this->load->model(array('User_model'));
	}

	public function index($offset = null)
	{
		$params['limit'] = 10;
		$params['offset'] = $offset;
		$this->load->library('pagination');
		$config['base_url'] = site_url('user/index');
		$config['total_rows'] = count($this->User_model->get(array()));
		$this->pagination->initialize($config);

		$data['user'] = $this->User_model->get($params);
		$data['page'] = 'user/list';
		$this->load->view('templates/layout', $data);
	}

	public function add($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('inputFullName', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('inputEmail', 'Email', 'trim|required');
		//$this->form_validation->set_rules('user_phone', 'Telepon', 'required');
		//$this->form_validation->set_rules('user_born', 'Tempat Lahir', 'required');
		//$this->form_validation->set_rules('user_date_born', 'Tanggal Lahir', 'required');
		//$this->form_validation->set_rules('user_ktp', 'KTP', 'required');
		//$this->form_validation->set_rules('user_npwp', 'NPWP', 'required');
		//$this->form_validation->set_rules('user_address', 'Alamat', 'required');
		//$this->form_validation->set_rules('user_address2', 'Alamat', 'required');
		//$this->form_validation->set_rules('user_city', 'Kota', 'required');
		//$this->form_validation->set_rules('user_contract_start', 'Mulai Kontrak', 'required');
		//$this->form_validation->set_rules('user_contract_end', 'Habis Kontrak', 'required');
		//$this->form_validation->set_rules('user_reg_start', 'Mulai Tetap', 'required');
		//$this->form_validation->set_rules('user_reg_end', 'Habis Tetap', 'required');
		//$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$data['operation'] = ($id == null) ? 'Tambah' : 'Edit';

		if (!$this->input->post('inputId')) {
			$this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|is_unique[user.user_name]');
			$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('inputPasswordConfirmation', 'Password Konfirmasi', 'trim|required|matches[inputPassword]');
		}

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('inputId')) {
				$params['id'] = $id;
			}else{
				$params['username'] = $this->input->post('inputUsername');
				$params['password'] = sha1($this->input->post('inputPassword'));
			}

			$params['fullname'] = $this->input->post('inputFullName');
			$params['email'] = $this->input->post('inputEmail');
			$params['phone'] = $this->input->post('user_phone');
			$params['born'] = $this->input->post('user_born');
			$params['date_born'] = $this->input->post('user_date_born');
			$params['ktp'] = $this->input->post('user_ktp');
			$params['npwp'] = $this->input->post('user_npwp');
			$params['address'] = $this->input->post('user_address');
			$params['address2'] = $this->input->post('user_address2');
			$params['city'] = $this->input->post('user_city');
			$params['contract_start'] = $this->input->post('user_contract_start');
			$params['contract_end'] = $this->input->post('user_contract_end');
			$params['reg_start'] = $this->input->post('user_reg_start');
			$params['reg_end'] = $this->input->post('user_reg_end');
			$params['role'] = $this->input->post('inputRole');
			$params['religion'] = $this->input->post('inputReligion');
			$return = $this->User_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' pegawai berhasil');
			redirect('user');

		}

		if ($id != null) {
			$data['user'] = $this->User_model->get(array('id' => $id));
		}
		$data['title'] = $data['operation'].' User';
		$data['role'] = $this->User_model->get_role();
		$data['page'] = 'user/add';
		$this->load->view('templates/layout', $data);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */