<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('i_login') == FALSE) {
			redirect('auth/login');
		}
		$this->load->model(array('Cuti_model', 'User_model', 'Holiday_model'));
	}

	public function index($offset = NULL) 
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('cuti/index');
		$config['uri_segment'] = 4;

		if ($this->session->userdata('i_role') == 4) {
			$data['cuti'] = $this->Cuti_model->get(array('limit' => 10, 'offset' => $offset, 'user' => $this->session->userdata('i_id')));	
			$config['total_rows'] = count($this->Cuti_model->get(array('user_id' => $this->session->userdata('i_id'))));
		}else{
			$data['cuti'] = $this->Cuti_model->get(array('limit' => 10, 'offset' => $offset));	
			$config['total_rows'] = $this->db->count_all('cuti');
		}

		$this->pagination->initialize($config);

		$data['title'] = 'Cuti';
		$data['page'] = 'cuti/list';
		$this->load->view('templates/layout', $data);
	}

	public function add($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cuti_start', 'Dari Tanggal', 'trim|required');
		$this->form_validation->set_rules('cuti_end', 'Sampai Tanggal', 'trim|required');
		$this->form_validation->set_rules('cuti_desc', 'Alamat', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$data['operation'] = ($id == null) ? 'Tambah' : 'Edit';

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('cuti_id')) {
				$params['cuti_id'] = $this->input->post('cuti_id');
			}

			$params['start'] = $this->input->post('cuti_start');
			$params['user'] = $this->session->userdata('i_id');
			$params['end'] = $this->input->post('cuti_end');

			//perhitungan cuti
			$satu_hari = 60 * 60 * 24;
			$tanggal_mulai = strtotime($this->input->post('cuti_start'));
			$tanggal_akhir = strtotime($this->input->post('cuti_end'));

			$hari_libur = $this->Holiday_model->get_holiday();

			$no = 0;
			for ($i = $tanggal_mulai; $i <= $tanggal_akhir ; $i = $i + $satu_hari) { 
				$tanggal = date("Y-m-d", $i);
				
				if (in_array($tanggal, $hari_libur)) {
				} else {
					$no++;
				}
			}

			$params['count'] = $no;
			//end perhitungan cuti
			$params['desc'] = $this->input->post('cuti_desc');
			$return = $this->Cuti_model->add($params);

			$this->session->set_flashdata('success', $data['operation'] . ' Pengajuan cuti berhasil');
			redirect('cuti');

		}

		if ($id != null) {
			$data['cuti'] = $this->Cuti_model->get(array('id' => $id));
		}

		$data['title'] = $data['operation'].' Cuti';
		$data['user'] = $this->User_model->get();
		$data['page'] = 'cuti/add';
		$this->load->view('templates/layout', $data);
	}

	public function view($id = null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cuti_desc_approved', 'Deskripsi', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('cuti_id')) {
				$params['cuti_id'] = $this->input->post('cuti_id');
			}

			$params['id'] = $id;
			$params['desc_approved'] = $this->input->post('cuti_desc_approved');
			$ret = $this->Cuti_model->add($params);

			$this->session->set_flashdata('success', ' Berhasil edit deskripsi Silahkan proses');
			redirect('cuti/view/'.$id);

		}

		if ($id != null) {
			$data['cuti'] = $this->Cuti_model->get(array('id' => $id));	
		}

		$data['title'] = 'View Cuti';
		$data['page'] = 'cuti/confrim';
		$this->load->view('templates/layout', $data);
	}

	public function confirm($id = null)
	{
		$this->Cuti_model->add(array('id' =>$id, 'approved' => TRUE));
		$this->session->set_flashdata('success', ' Berhasil konfirmasi cuti');
		redirect('cuti');

		redirect('cuti/view/'. $id);
	}

	public function holiday()
	{
		$libur = $this->Holiday_model->get_holiday();
	}

	public function del($id = null)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('inputId', 'Cuti Id', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$data['operation'] = 'Delete';

		if($_POST AND $this->form_validation->run() == TRUE)
		{
			$this->Cuti_model->delete($this->input->post('inputId'));
			redirect('cuti');
		}else{
			$data['cuti'] = $this->Cuti_model->get(array('id' => $id));
			if (count($data['cuti']) == 0) {
				redirect('cuti');
			}
			$data['title'] = 'Delete Cuti';
			$data['page'] = 'cuti/del';

			$this->load->view('templates/layout', $data);
		}
	}

}

/* End of file Cuti.php */
/* Location: ./application/controllers/manage/Cuti.php */