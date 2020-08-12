<?php 
header("X-XSS-Protection: 0");
class Confirm extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('orang_model','orang');
		$this->load->model('pengaturan_model','pengaturan');
	}
 
	function index(){
		$this->load->view('confirm');
	}

	function v($id) {

		$data['hasil'] = $this->orang->getById($id);
		$data['pengaturan'] = $this->pengaturan->get_all(1);
        $this->load->view('orang/orang_view', $data);
 
    }


    function u($id) {
		$data = $this->input->post();
		unset($data['submit']);

        if($data){
            $this->orang->update($id);
             $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    			<a class="uk-alert-close" uk-close></a>
    			<p>Terima kasih anda sudah konfirmasi dan mengisi Ucapan &amp; Doa</p>
		</div>');
            
        }
		$data['hasil'] = $this->orang->getById($id);
		$data['pengaturan']    =   $this->pengaturan->get_all(1);
        $this->load->view('orang/orang_edit', $data);
 
    }
 
     function ui($id) {
		$data = $this->input->post();
		unset($data['submit']);

        if($data){
            $this->orang->update_image($id);
             $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    			<a class="uk-alert-close" uk-close></a>
    			<p>Berhasil menyimpan foto anda</p>
		</div>');
           
        }else {

		}
		$data['hasil'] = $this->orang->getById($id);
		$data['pengaturan'] = $this->pengaturan->get_all(1);
        $this->load->view('orang/orang_image', $data);
 
    }

   
 
}