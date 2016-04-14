<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_model extends CI_Model {

	public function get($params = array())
	{
		if (isset($params['id'])) {
			$this->db->where('lembur_id', $params['id']);
		}
		if (isset($params['user'])) {
			$this->db->where('lembur.user_id', $params['user']);
		}
		if (isset($params['approved'])) {
			$this->db->where('lembur.lembur_is_approved', $params['approved']);
		}

		if(isset($params['limit']))
		{
			if(!isset($params['offset']))
			{
				$params['offset'] = NULL;
			}

			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->db->select('lembur.lembur_id, lembur.user_id, lembur.lembur_date, lembur.lembur_desc, lembur.lembur_is_approved');
		$this->db->select('user.user_full_name');
		$this->db->join('user', 'user.user_id = lembur.user_id', 'left');

		$this->db->order_by('lembur.lembur_id', 'desc');
		$ret = $this->db->get('lembur');

		if (isset($params['id'])) {
			return $ret->row_array();
		}else{
			return $ret->result_array();
		}
	}	

	public function add($params)
	{
		if (isset($params['id'])) {
			$this->db->set('lembur_id', $params['id']);
		}
		if (isset($params['user'])) {
			$this->db->set('user_id', $params['user']);
		}
		if (isset($params['date'])) {
			$this->db->set('lembur_date', $params['date']);
		}
		if (isset($params['desc'])) {
			$this->db->set('lembur_desc', $params['desc']);
		}
		if (isset($params['approved'])) {
			$this->db->set('lembur_is_approved', $params['approved']);
		}
		
		if (isset($params['id'])) {	
			$this->db->where('lembur_id', $params['id']);
			$this->db->update('lembur');
			return $params['id'];
		}else{
			$this->db->insert('lembur');
			return $this->db->insert_id();
		}

	}

	public function delete($id)
	{
		if (isset($id)) {
			$this->db->where('lembur_id', $id);
			$this->db->delete('lembur');
		}
	}
	

}

/* End of file Lembur_model.php */
/* Location: ./application/models/Lembur_model.php */