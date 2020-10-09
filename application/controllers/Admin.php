<?php 
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->library('Excel'); 
		$this->load->model('admin_model','admin');

		if(!$this->admin->logged_id())
        { 
            redirect('login');
        }
		$this->load->model('orang_model','orang'); //pemanggilan model mahasiswa
	}

	function index(){
		$this->load->model('rekapkonfirmasi_model','rekapkonfirmasi');
		$data['data']=$this->orang->get_all_orang();
		$data['jumlah']=$this->orang->count_all_orang();
		$data['konfirmasi']=$this->rekapkonfirmasi->query_all();
		$this->load->view('admin/home',$data);	
		 
	}

	function daftartamu(){
		
		$data['data']=$this->orang->get_all_orang();
		$this->load->view('admin/admin',$data);	
		 
	}

	function kirim_email($id){
		$query = $this->orang->getById($id);
		$url = $query->qr_code;
		$receiver = $query->email;

		$this->load->model('pengaturan_model','pengaturan');
		$row = $this->pengaturan->getById(1);
		$host = $row->smtp_host;
		$port = $row->smtp_port;
		$user = $row->smtp_user;
		$pass = $row->smtp_pass;
		
		$from = $user; 
		$subject = 'QR Code Anda - The Wedding';  
		$message = 'QR Code Anda, Terima Kasih';
		$attachment= base_url().'assets/images/qrcode/'.$url ;

		$config['protocol'] = 'smtp';
        $config['smtp_host'] = $host;
        $config['smtp_port'] = $port;
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = $pass; 
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
		$this->email->message($message);
		$this->email->attach($attachment); 
        
        if($this->email->send()){
            echo "sent to: ".$receiver."<br>";
            echo "from: ".$from. "<br>";
            echo "protocol: ". $config['protocol']."<br>";
			echo "message: ".$message;
			//return true;
			redirect('admin');
        }else{
			echo "email send failed";
			
			//echo $this->email->print_debugger();

            return false;
		}  
		
		
		 
	}

	function simpan(){
		$query = $this->db->query("select max(id) as last from orang");
		$data=$query->row_array();
		$last = $data['last'];
		$nextNoUrut = $last + 1;

		$id = sprintf('%04s', $nextNoUrut);
		$nama=$this->input->post('nama');
		$nohp=$this->input->post('nohp');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		//$config['cachedir']		= './assets/'; //string, the default is application/cache/
		//$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/qrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $id; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 25;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->orang->simpan_orang($id,$nama,$nohp,$email,$alamat,$image_name); //simpan ke database
		redirect('admin/daftartamu');
	}
	
	function edit_orang(){
        $id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$nohp=$this->input->post('nohp');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
        //$ucapan=$this->input->post('ucapan');
        
        $this->orang->edit_orang($id,$nama,$nohp,$email,$alamat);
        redirect('admin');
	}
	
	function hapus($id = null){
		$result=$this->orang->hapus($id);
		if($result){
            $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Data Tamu berhasil dihapus</p>
			</div>');  
        }
        redirect('admin');
    }

    function updatedata($id) {
        if($this->input->post('submit')){
            $this->orang->update($id);
            redirect('admin');
        }
        $data['hasil'] = $this->orang->getById($id);
        $this->load->view('admin_edit', $data);
 
    }
	
	function lihat($id) {
        $data['hasil'] = $this->orang->getById($id);
        $this->load->view('admin/admin_lihat', $data);
 
    }

	public function konfirmasi()
	{
		$this->load->model('konfirmasi_model','konfirmasi');
		$data['data']=$this->konfirmasi->get_all();
		$this->load->view('admin/konfirmasi',$data);	
    
	}
	 
	public function kehadiran()
	{
		$this->load->model('hadir_model','hadir');
		$data['data']=$this->hadir->get_all();
		$this->load->view('admin/hadir',$data);	
    
	}

	public function pengaturan()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$data['data']=$this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan',$data);	
    
	}

	public function pengaturan_simpan()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$id=$this->input->post('id');
		$nama_web=$this->input->post('nama_web');
		$nama_pengantin=$this->input->post('nama_pengantin');
		$tempat_tanggal=$this->input->post('tempat_tanggal');
		$alamat=$this->input->post('alamat');
		$smtp_host=$this->input->post('smtp_host');
		$smtp_port=$this->input->post('smtp_port');
		$smtp_user=$this->input->post('smtp_user');
		$smtp_pass=$this->input->post('smtp_pass');
		
		$result = $this->pengaturan->simpan($id,$nama_web,$nama_pengantin,$tempat_tanggal,$alamat,$smtp_host,$smtp_port,$smtp_user,$smtp_pass);
		if($result){
            $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Pengaturan sistem berhasil disimpan</p>
			</div>');  
        }
		redirect('admin/pengaturan');


	}

	public function pengaturan_foto()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$data['data']=$this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan_foto',$data);	

	}

	public function pengaturan_background()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$data['data']=$this->pengaturan->get_all(1);
		$this->load->view('admin/pengaturan_background',$data);	

	}

	public function foto_simpan()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$id=$this->input->post('id');
		$foto=$this->input->post('foto');

		
		$result = $this->pengaturan->simpan_foto($id,$foto);
		if($result){
            $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Pengaturan sistem berhasil disimpan</p>
			</div>');  
        }
		redirect('admin/pengaturan_foto');


	}

	public function background_simpan()
	{
		$this->load->model('pengaturan_model','pengaturan');
		$id=$this->input->post('id');
		$background=$this->input->post('background');

		$result = $this->pengaturan->simpan_background($id,$background);
		if($result){
            $this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
    		<a class="uk-alert-close" uk-close></a>
    			<p>Gambar Background berhasil disimpan</p>
			</div>');  
        }
		redirect('admin/pengaturan_background');


	}

	function get_produk_json() { 
		$this->load->model('konfirmasi_model','konfirmasi');
		header('Content-Type: application/json');
		echo $this->konfirmasi->get_all();
	}

	function json() {
			
		header('Content-Type: application/json');

		echo $this->orang->json('orang.id,orang.nama,orang.nohp,orang.email,orang.alamat,orang.qr_code','orang',  array());
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function ganti_password()
	{
		if($this->input->post('change_pass'))
		{
			$old_pass=$this->input->post('old_pass');
			$new_pass=$this->input->post('new_pass');
			$confirm_pass=$this->input->post('confirm_pass');
			$session_id=$this->session->userdata('id');
			$que=$this->db->query("select * from admin where id_admin='$session_id'");
			$row=$que->row();
			$pass=$row->password_admin;
			if((!strcmp(md5($old_pass), $pass)) && (!strcmp($new_pass, $confirm_pass))){
				$this->admin->change_pass($session_id,$new_pass);
					$this->session->set_flashdata('msg', '<div class="uk-alert-success" uk-alert>
					<a class="uk-alert-close" uk-close></a>
						<p>Password baru berhasil disimpan</p>
					</div>'); 
				}
			    else{
					$this->session->set_flashdata('msg', '<div class="uk-alert-danger" uk-alert>
					<a class="uk-alert-close" uk-close></a>
						<p>Gagal</p>
					</div>'); 
				}
		}
		$this->load->view('admin/ganti_password');	
	}

	public function excel_import()
    {
        $this->load->view('admin/import');
    }

	function excel_simpan()
    {
        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
		$config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><h3>PROSES IMPORT GAGAL!</h3><p>'.$this->upload->display_errors().'</p></div>');
            //redirect halaman
            redirect('admin/excel_import');

        } else {

            $data_upload = $this->upload->data();

			
			$inputFileName = realpath('excel/'.$data_upload['file_name']);
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
         
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
			for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array   
				$query = $this->db->query("select max(id) as last from orang");
			$data=$query->row_array();
			$last = $data['last'];
			$nextNoUrut = $last + 1;
			$id = sprintf('%04s', $nextNoUrut);

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
			$config['cacheable']	= true; //boolean, the default is true
			//$config['cachedir']		= './assets/'; //string, the default is application/cache/
			//$config['errorlog']		= './assets/'; //string, the default is application/logs/
			$config['imagedir']		= './assets/images/qrcode/'; //direktori penyimpanan qr code
			$config['quality']		= true; //boolean, the default is true
			$config['size']			= '1024'; //interger, the default is 1024
			$config['black']		= array(224,255,255); // array, default is array(255,255,255)
			$config['white']		= array(70,130,180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim
			$params['data'] = $id; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 25;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE              
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
 
                 // Sesuaikan key array dengan nama kolom di database                                                         
                 $data = array(
					 "id"=> $id,
                    "nama"=> $rowData[0][0],
					"nohp"=> $rowData[0][1],
					"alamat"=> $rowData[0][2],
					"email"=> $rowData[0][3],
					"qr_code"=> $image_name
                );
				$insert = $this->db->insert('orang', $data);
            //delete file from server
			unlink(realpath('excel/'.$data_upload['file_name']));
			}

            //upload success
            $this->session->set_flashdata('notif', '<div class="uk-alert-warning"  uk-alert><a class="uk-alert-close" uk-close></a><h3>PROSES IMPORT BERHASIL!</h3><p>Data berhasil diimport!</p></div>');
            //redirect halaman
            redirect('admin/excel_import');
		}
    }
	
    
}