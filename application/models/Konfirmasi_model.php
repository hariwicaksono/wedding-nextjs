<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi_model extends CI_Model
{
   function get_all(){
		$hasil=$this->db->get('v_konfirmasi');
		return $hasil;
	}
  function get_all_konfirmasi() { //ambil data barang dari table barang yang akan di generate ke datatable
        $this->datatables->select('*');
        $this->datatables->from('v_konfirmasi');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','nama,konfirmasi');
        return $this->datatables->generate();
  }

}
