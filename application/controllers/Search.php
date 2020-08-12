<?php
class Search extends CI_Controller {
  
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('search_model','search');
		$this->load->model('pengaturan_model','pengaturan');
	}
  
	public function index() 
	{
		$id    =   $this->input->post('keyword');
	  	$this->data['results']    =   $this->search->cariOrang();
	  	$this->data['pengaturan']    =   $this->pengaturan->get_all(1);
	  	$this->load->view('search',$this->data);
	}

	//public function slideshow(){
		//$data['results'] = $this->search->get_slideshow();
		//$this->load->view('slideshow',$data);
	//}


}