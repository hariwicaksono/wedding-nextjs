<?php
class Search_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function cariOrang()
	{
		$cari = $this->input->GET('keyword',TRUE);
		
		$data = $this->db->query("SELECT * from orang where id like '$cari' ");
		
		$this->insert();
		return $data->result();

	}

	public function insert()
	{

		$cari = $this->input->GET('keyword',TRUE);
		if(!empty($cari)) 

		{
		

		$insert = array(
        'id_orang' => $cari,
        'tanggal' => date('Y-m-d H:i:s',now())

		);
		$data = $this->db->insert('hadir',$insert);
		}
		

	}

	public function get_slideshow(){

	//$data = $this->db->get('orang');
	$data = $this->db->get_where('orang', array('ucapan !=' => NULL));
	return $data->result();

	}


}