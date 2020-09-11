<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekapkonfirmasi_model extends CI_Model
{
   function get_all(){
		$hasil=$this->db->get('v_rekapkonfirmasi');
		return $hasil;
	}

	function query_all(){
		$hasil=$this->db->query("select (select count(0) from `orang` where `orang`.`konfirmasi2` = 'Hadir') AS `Hadir`,(select count(0) from `orang` where `orang`.`konfirmasi2` = 'Tidak Bisa') AS `Tidak_Bisa`,(select count(0) from `orang` where `orang`.`konfirmasi2` = 'Masih Dalam Pertimbangan') AS `Masih_Pertimbangan`");
		return $hasil;
	}

}
