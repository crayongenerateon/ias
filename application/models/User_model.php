<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get($params = array())
	{
		if (isset($params['id'])) {
			$this->db->where('user.user_id', $params['id']);
		}
		if (isset($params['username'])) {
			$this->db->where('user_name', $params['username']);
		}
		if (isset($params['password'])) {
			$this->db->where('user_password', $params['password']);
		}
		if (isset($params['role'])) {
			$this->db->where('user.role_role_id', $params['role']);
		}
		if (isset($params['religion'])) {
			$this->db->where('user.religion_religion_id', $params['religion']);
		}
		if(isset($params['limit']))
		{
			if(!isset($params['offset']))
			{
				$params['offset'] = NULL;
			}

			$this->db->limit($params['limit'], $params['offset']);
		}

		$this->db->select('user.user_id, user.role_role_id, user.user_name, user.user_password, user.user_full_name, user.user_email, user.user_phone, user.user_born, user.user_date_born, user.user_ktp, user.user_npwp, user.user_address, user.user_address2, user.user_city, user.user_contract_start, user.user_contract_end, user.user_reg_start, user.user_reg_end');
		$this->db->select('role.role_id, role.role_name');
		$this->db->select('religion.religion_id, religion.religion_name');
		//$this->db->select('sum(cuti.cuti_count) as sudah');

		//$this->db->join('cuti', 'cuti.user_id = user.user_id', 'left');
		$this->db->join('role', 'role.role_id = user.role_role_id', 'left');
		$this->db->join('religion', 'religion.religion_id = user.religion_religion_id', 'left');

		$this->db->group_by('user_id');

		$ret = $this->db->get('user');

		if (isset($params['id'])) {
			return $ret->row_array();
		}else{
			return $ret->result_array();
		}
	}	

	public function add($params)
	{
		if (isset($params['id'])) {
			$this->db->where('user_id', $params['id']);
		}
		if (isset($params['role'])) {
			$this->db->set('role_role_id', $params['role']);
		}
		if (isset($params['religion'])) {
			$this->db->set('religion_religion_id', $params['religion']);
		}
		if (isset($params['username'])) {
			$this->db->set('user_name', $params['username']);
		}
		if (isset($params['password'])) {
			$this->db->set('user_password', $params['password']);
		}
		if (isset($params['fullname'])) {
			$this->db->set('user_full_name', $params['fullname']);
		}
		if (isset($params['email'])) {
			$this->db->set('user_email', $params['email']);
		}
		if (isset($params['phone'])) {
			$this->db->set('user_phone', $params['phone']);
		}
		if (isset($params['born'])) {
			$this->db->set('user_born', $params['born']);
		}
		if (isset($params['date_born'])) {
			$this->db->set('user_date_born', $params['date_born']);
		}
		if (isset($params['ktp'])) {
			$this->db->set('user_ktp', $params['ktp']);
		}
		if (isset($params['npwp'])) {
			$this->db->set('user_npwp', $params['npwp']);
		}
		if (isset($params['address'])) {
			$this->db->set('user_address', $params['address']);
		}
		if (isset($params['address2'])) {
			$this->db->set('user_address2', $params['address2']);
		}
		if (isset($params['city'])) {
			$this->db->set('user_city', $params['city']);
		}
		if (isset($params['contract_start'])) {
			$this->db->set('user_contract_start', $params['contract_start']);
		}
		if (isset($params['contract_end'])) {
			$this->db->set('user_contrack_end', $params['contract_end']);
		}
		if (isset($params['reg_start'])) {
			$this->db->set('user_reg_start', $params['reg_start']);
		}
		if (isset($params['reg_end'])) {
			$this->db->set('user_reg_end', $params['reg_end']);
		}

		if (isset($params['id'])) {
			$this->db->update('user');
			return $params['id'];
		}else{
			$this->db->insert('user');
			return $this->db->insert_id();
		}

	}

	public function delete($id)
	{
		if (isset($id)) {
			$this->db->where('user_id', $id);
			$this->db->delete('user');
		}
	}

	public function get_role()
	{
		return $this->db->get('role')->result_array();
	}

	public function get_religion()
	{
		return $this->db->get('religion')->result_array();
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */