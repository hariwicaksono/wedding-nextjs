<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin_model','admin');
    }

	public function index()
	{
		
			if($this->admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("admin");

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="uk-alert-danger" uk-alert style="margin-top:-10px;margin-bottom:-10px"> <a class="uk-alert-close" uk-close></a>
	                <p><b>{field}</b> harus diisi</p></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = MD5($this->input->post('password', TRUE));
	            
	            //checking data via model
	            $checking = $this->admin->check_login('admin', array('username_admin' => $username), array('password_admin' => $password));
	            
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'id'   => $apps->id_admin,
	                        'username' => $apps->username_admin,
	                        'password' => $apps->password_admin,
	                        'nama' => $apps->nama_admin
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);

	                    redirect('admin/');

	                }
	            }else{

	            	$data['error'] = '<div class="uk-alert-warning" uk-alert>
					<a class="uk-alert-close" uk-close></a>
	                	<b>Perhatian</b> username atau password salah!</div>';
	            	$this->load->view('login', $data);
	            }

	        }else{

	            $this->load->view('login');
	        }

		}

	}
}
