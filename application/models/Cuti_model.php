<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model {

	public function get($params = array())
	{
		if (isset($params['id'])) {
			$this->db->where('cuti_id', $params['id']);
		}
		if (isset($params['user'])) {
			$this->db->where('cuti.user_id', $params['user']);
		}
		if (isset($params['approved'])) {
			$this->db->where('cuti_is_approved', $params['approved']);
		}
		if (isset($params['desc_approved'])) {
			$this->db->where('cuti_desc_approved', $params['desc_approved']);
		}

		if(isset($params['limit']))
		{
			if(!isset($params['offset']))
			{
				$params['offset'] = NULL;
			}

			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->db->select('cuti.cuti_id, cuti.cuti_is_approved, cuti.user_id, cuti.cuti_start, cuti.cuti_end, cuti.cuti_desc, 
			cuti.cuti_desc_approved, cuti.cuti_count');
		$this->db->select('user.user_full_name');
		$this->db->join('user', 'user.user_id = cuti.user_id', 'left');

		$this->db->order_by('cuti.cuti_id', 'desc');
		$ret = $this->db->get('cuti');

		if (isset($params['id'])) {
			return $ret->row_array();
		}else{
			return $ret->result_array();
		}
	}	

	public function add($params)
	{
		if (isset($params['id'])) {
			$this->db->set('cuti_id', $params['id']);
		}
		if (isset($params['user'])) {
			$this->db->set('user_id', $params['user']);
		}
		if (isset($params['start'])) {
			$this->db->set('cuti_start', $params['start']);
		}
		if (isset($params['end'])) {
			$this->db->set('cuti_end', $params['end']);
		}
		if (isset($params['desc'])) {
			$this->db->set('cuti_desc', $params['desc']);
		}
		if (isset($params['approved'])) {
			$this->db->set('cuti_is_approved', $params['approved']);
		}
		if (isset($params['desc_approved'])) {
			$this->db->set('cuti_desc_approved', $params['desc_approved']);
		}
		if (isset($params['count'])) {
			$this->db->set('cuti_count', $params['count']);
		}

		if (isset($params['id'])) {	
			$this->db->where('cuti_id', $params['id']);
			$this->db->update('cuti');
			return $params['id'];
		}else{
			$this->db->insert('cuti');
			return $this->db->insert_id();
		}

	}

	public function delete($id)
	{
		if (isset($id)) {
			$this->db->where('cuti_id', $id);
			$this->db->delete('cuti');
		}
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */