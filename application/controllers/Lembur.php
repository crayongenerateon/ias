<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('i_login') == FALSE) {
			redirect('auth/login');
		}
		$this->load->model(array('Lembur_model', 'User_model'));
	}

	public function index($offset = NULL)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('lembur/index');
		$config['uri_segment'] = 4;
		
		if ($this->session->userdata('i_role') == 4) {
			$data['lembur'] = $this->Lembur_model->get(array('limit' => 10, 'offset' => $offset, 'user' => $this->session->userdata('i_id')));
			$config['total_rows'] = count($this->Lembur_model->get(array('user_id' => $this->session->userdata('i_id'))));
		} else {
			$data['lembur'] = $this->Lembur_model->get(array('limit' => 10, 'offset' => $offset));
			$config['total_rows'] = $this->db->count_all('lembur');
		}
		
		$this->pagination->initialize($config);

		$data['title'] = 'Lembur';
		$data['page'] = 'lembur/list';
		$this->load->view('templates/layout', $data);
	}

	public function add($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('lembur_date', 'Tanggal lembur', 'trim|required');
		$this->form_validation->set_rules('lembur_desc', 'Kegiatan', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$data['operation'] = ($id == null) ? 'Tambah' : 'Edit';

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('lembur_id')) {
				$params['lembur_id'] = $this->input->post('lembur_id');
			}

			$params['date'] = $this->input->post('lembur_date');
			$params['desc'] = $this->input->post('lembur_desc');
			$params['user'] = $this->session->userdata('i_id');
			$params['approved'] = $this->input->post('lembur_is_approved');
			$return = $this->Lembur_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' Pengajuan lembur berhasil');
			redirect('lembur');
		}

		if ($id != null) {
			$data['lembur'] = $this->Lembur_model->get(array('id' => $id));
		}

		$data['title'] = $data['operation'].' Lembur';
		$data['user'] = $this->User_model->get();
		$data['page'] = 'lembur/add';
		$this->load->view('templates/layout', $data);
	}

	public function view($id = null)
	{
		$data['lembur'] = $this->Lembur_model->get(array('id' => $id));	
		$data['title'] = 'View Cuti';
		$data['page'] = 'lembur/confrim';
		$this->load->view('templates/layout', $data);
	}

	public function confirm($id = null)
	{
		$this->Lembur_model->add(array('id' =>$id, 'approved' => TRUE));
		$this->session->set_flashdata('success', ' Berhasil konfirmasi lembur');
		redirect('lembur');

		redirect('lembur/view/'. $id);
	}


}

/* End of file Lembur.php */
/* Location: ./application/controllers/manage/Lembur.php */