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
		$data['page'] = 'user/user_list';
		$this->load->view('templates/layout', $data);
	}

	public function add($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('inputFullName', 'Nama Lengkap', 'required');
		//$this->form_validation->set_rules('inputEmail', 'Email', 'trim|required');
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
		$data['page'] = 'user/user_add';
		$this->load->view('templates/layout', $data);
	}

	public function del($id = null)
	{
		if ($_POST) {
			$this->User_model->del(array('id' => $id));

			$this->session->set_flashdata('success', 'Hapus pengguna berhasil');
			redirect('user');
		}else{
			if (isset($id)) {
				$data['user'] = $this->User_model->get(array('id' => $id));
				if (count($data['user']) == 0) {
					redirect('user');
				}
			}
			$data['title'] = 'Hapus Pengguna';
			$data['page'] = 'user/user_del';
			$this->load->view('templates/layout', $data);
		}
	}

	public function rpw($id = null)
	{
		if ($id == null) {
			redirect('user');
		}

		$this->load->library('form_validation');

		if ($_POST) {
			$this->form_validation->set_rules('inputPassword', 'Password Baru', 'trim|required|xss_clean');
			$this->form_validation->set_rules('inputPasswordConf', 'Password Konfirmasi', 'trim|required|xss_clean|matches[inputPassword]');

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			if ($this->form_validation->run()) {
				$params['id'] = $id;
				$params['password'] = sha1($this->input->post('inputPassword', TRUE));
				$ret = $this->User_model->add($params);

				$this->session->set_flashdata('success', 'Berhasil reset password');
				redirect('user');
			}
		}

		if (isset($id)) {
			$data['user'] = $this->User_model->get(array('id' => $id));
			if (count($data['user']) == 0) {
				redirect('user');
			}
		}
		$data['title'] = 'Reset Password';
		$data['page'] = 'user/reset_password';
		$this->load->view('templates/layout', $data);
	}

	public function role($offset = null)
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('user/role');
		$config['total_rows'] = count($this->User_model->get_role());
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$params['limit'] = 10;
		$params['offset'] = $offset;
		$data['role'] = $this->User_model->get_role($params);
		$data['title'] = 'Role List';
		$data['page'] = 'user/role_list';
		$this->load->view('templates/layout', $data);
	}

	public function add_role($id = null)
	{
		$data['operation'] = isset($id) ? 'Edit' : 'Tambah';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('inputRole', 'Jabatan', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run()) {
			if ($this->input->post('inputId', TRUE)) {
				$params['id'] = $this->input->post('inputId', TRUE);
			}
			$params['role'] = $this->input->post('inputRole', TRUE);
			$this->User_model->add_role($params);

			$this->session->set_flashdata('success', $data['operation'] . ' jabatan berhasil');
			redirect('user/role');
		}
		if (isset($id)) {
			$data['role'] = $this->User_model->get_role(array('id' => $id));
			if (count($data['role']) == 0) {
				redirect('user/role');
			}
		}
		$data['title'] = $data['operation'] . ' Role';
		$data['page'] = 'user/role_add';
		$this->load->view('templates/layout', $data);
	}

	public function del_role($id = null)
	{
		if ($_POST) {
			$this->User_model->del_role(array('id' => $id));

			$this->session->set_flashdata('success', 'Hapus jabatan berhasil');
			redirect('user/role');
		}else{
			if (isset($id)) {
				$data['role'] = $this->User_model->get_role(array('id' => $id));
				if (count($data['role']) == 0) {
					redirect('user/role');
				}
			}
			$data['title'] = 'Hapus Role';
			$data['page'] = 'user/role_del';
			$this->load->view('templates/layout', $data);
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */