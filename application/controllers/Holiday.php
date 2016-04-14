<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('i_login') == FALSE){
			redirect('auth/login');
		}
		$this->load->model(array('Holiday_model'));
	}

	 public function index($offset = NULL) {
        $this->load->library('form_validation');
        if ($this->input->post('add', TRUE)) {
            $this->form_validation->set_rules('date', 'Tanggal', 'required');
            $this->form_validation->set_rules('info', 'Info', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));

                $params['year'] = $tahun;
                $params['date'] = $this->input->post('date');
                $params['info'] = $this->input->post('info');

                $ret = $this->Holiday_model->add($params);

                $this->session->set_flashdata('success', 'Tambah hari libur berhasil');
                redirect('holiday');
            }
        }elseif ($this->input->post('del', TRUE)) {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($_POST AND $this->form_validation->run() == TRUE) {
                $id = $this->input->post('id', TRUE);
                $this->Holiday_model->delete($id);

                $this->session->set_flashdata('success', 'Hapus hari libur berhasil');
                redirect('holiday');
            }
        }
        $this->load->library('pagination');
        $data['title'] = 'Hari Libur';
        $data['page'] = 'holiday/holiday_list';
        $this->load->view('templates/layout', $data);
    }


    public function listview($year = 'all', $offset = NULL) {

        if ($_POST) {
            $filter = array(
                ($this->input->post('filter_year') == '') ? 'all' : $this->input->post('filter_year')
                );
            $url = implode('/', $filter);
            redirect('holiday/listview/' . $url);
        }
        $params = array();
        if ($year != 'all')
            $params['year'] = $year;
        $params_total = $params;
        $params['limit'] = 10;
        $params['offset'] = $offset;
        $this->load->library('pagination');
        $data['holiday'] = $this->Holiday_model->get($params);
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
        $config['base_url'] = site_url('holiday/listview/'.$year);
        $config['total_rows'] = count($this->Holiday_model->get($params_total));
        $this->pagination->initialize($config);
        $data['title'] = 'Hari Libur';
        $data['page'] = 'holiday/holiday_listview';
        $this->load->view('templates/layout', $data);
    }


    public function add($id = NULL) {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('info', 'Info', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('id')) {
                $params['id'] = $this->input->post('id');
            }

            list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));
            $params['year'] = $tahun;
            $params['date'] = $this->input->post('date');
            $params['info'] = $this->input->post('info');
            $ret = $this->Holiday_model->add($params);

            $this->session->set_flashdata('success', $data['operation'] . ' hari libur berhasil');
            redirect('holiday');
        } else {

            if (!is_null($id)) {
                $data['holiday'] = $this->Holiday_model->get(array('id' => $id));
            }
            $this->load->helper('url');
            $data['title'] = $data['operation'] . ' Hari libur';
            $data['page'] = 'holiday/holiday_add';
            $this->load->view('templates/layout', $data);
        }
    }


    public function delete($id = NULL) {
        $this->Holiday_model->delete($id);

        $this->session->set_flashdata('success', 'Hapus hari libur berhasil');
        redirect('holiday/listview');
    }

    public function get() {
        $events = $this->Holiday_model->get();
        foreach ($events as $i => $row) {
            $data[$i] = array(
                'id' => $row['id'],
                'title' => strip_tags($row['info']),
                'start' => $row['date'],
                'end' => $row['date'],
                'year' => $row['year'],
                    //'url' => event_url($row)
                );
        }
        echo json_encode($data, TRUE);
    }

}

/* End of file Libur.php */
/* Location: ./application/controllers/manage/Holiday.php */