<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekapkonfirmasi_model extends CI_Model
{
   function get_all(){
		$hasil=$this->db->get('v_rekapkonfirmasi');
		return $hasil;
	}

}
