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

}