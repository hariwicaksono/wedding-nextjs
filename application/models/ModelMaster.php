<?php  

class ModelMaster extends CI_Model {

	public function cari_orang($id='')
	{
		if ($id === '') {
			return $this->db->get('orang')->result_array();
		} else {
			return $this->db->get_where('orang',['id'=>$id])->result_array();
		}
	}

	public function get_setting($id)
	{ 
		
		return $this->db->get_where('pengaturan',['id'=>$id])->result_array();
		
	} 
	
	public function post_hadir($data)
	{
		$this->db->insert('hadir',$data);
		return $this->db->affected_rows();
	}

	public function cek_login_user($user,$password)
	{
		return $this->db->get_where('user',['email_user' => $user , 'password_user'=>$password ])->result_array();
		//return $this->db->result_array();
	}
 
	public function cek_login_admin($user,$password)
	{
		return $this->db->get_where('admin',['username_admin' => $user , 'password_admin'=>$password ])->result_array();
		//return $this->db->result_array();
	}

	public function get_user($id = null)
	{
		if ($id == null) {
			return $this->db->get('user')->result_array();
		} else {
			return $this->db->get_where('user',['id_user'=>$id])->result_array();
		}
	}

	public function post_user($data)
	{
		$this->db->insert('user',$data);
		return $this->db->affected_rows();
	}

	public function delete_user($id = null)
	{
		$this->db->delete('user',['id_user' => $id]);
		return $this->db->affected_rows();
	}

	public function put_user($id,$data)
	{
		$this->db->update('user',$data,['id_user'=>$id]);
		return $this->db->affected_rows();
	}

}