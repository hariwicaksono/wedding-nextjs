<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hadir_model extends CI_Model
{
   function get_all(){
		$hasil=$this->db->get('v_hadir');
		return $hasil;
	}

}
