<?php
class Orang_model extends CI_Model{

	function get_all_orang(){
		$hasil=$this->db->get('orang');
		return $hasil;
	}
	
	function simpan_orang($id,$nama,$nohp,$email,$alamat,$image_name){
		$data = array(
			'id' 		=> $id,
			'nama' 		=> $nama,
			'nohp' 		=> $nohp,
			'email'     => $email,
			'alamat' 	=> $alamat, 
			'qr_code' 	=> $image_name
		);
		$this->db->insert('orang',$data);
	}
	
	function edit_orang($id,$nama,$nohp,$email,$alamat){
		$hasil=$this->db->query("UPDATE orang SET nama='$nama', nohp='$nohp', email='$email',alamat='$alamat' WHERE id='$id'");
		return $hasil;
	}

	function update($id) {
        $id = $this->input->post('id');
        $nama  = $this->input->post('nama');
        $ucapan = $this->input->post('ucapan');
        $konfirmasi = $this->input->post('konfirmasi');
	  
        $data = array (
            'id' => $id,
            'nama'  => $nama,
            'ucapan'=> $ucapan,
            'konfirmasi2'=> $konfirmasi
        );
        $this->db->where('id', $id);
        $this->db->update('orang', $data);
    }


    function update_image($id) {
		$id = $this->input->post('id');
		
		$config['upload_path']='./assets/images/photos/';
		$config['max_size']=10240;
		$config['allowed_types']="JPEG|JPG|png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['encrypt_name']  = TRUE;

		$this->load->library('upload', $config);
		//check if a file is being uploaded
		if(strlen($_FILES["foto"]["name"])>0){

		if ( !$this->upload->do_upload("foto"))//Check if upload is unsuccessful
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$filename = $_FILES['foto']['tmp_name'];

			$imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');

			list($width, $height) = getimagesize($filename);
			if ($width >= $height){
				$config['width'] = 400;
			}
			else{
				$config['height'] = 400;
			}
			$config['master_dim'] = 'auto';

			$this->load->library('image_lib',$config);

			if (!$this->image_lib->resize()){  
				echo "error";
			}else{
				$this->image_lib->clear();
				$config=array();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				switch($imgdata['Orientation']) {
					case 3:
						$config['rotation_angle']='180';
						break;
					case 6:
						$config['rotation_angle']='270';
						break;
					case 8:
						$config['rotation_angle']='90';
						break;
				}

				$this->image_lib->initialize($config);
				$this->image_lib->rotate();
				$data_image=$this->upload->data('file_name');
				$picture = $data_image;

			}
		}   
		} else {
			$picture = $this->input->post('old_foto');
		}   

		$data = array (
			'id' => $id,
			'foto'=> $picture
		);
		$this->db->where('id', $id);
		$this->db->update('orang', $data);
      
    }

 
    function getById($id) {
        return $this->db->get_where('orang', array('id' => $id))->row();
	} 
	
	function hapus($id) {
        return $this->db->delete('orang', array('id' => $id)); ;
    } 

	function json($select,$table,$where) {    
        $this->datatables->select($select);
        $this->datatables->from($table);
		$this->datatables->where($where);
		$this->datatables->add_column('opsi', '<a class="uk-button uk-button-default uk-button-small" uk-toggle="target: #modal_edit$1" alt="Edit" title="Edit" uk-tooltip="Edit"> Edit</a><a class="uk-button uk-button-primary uk-button-small" href="admin/lihat/$1" target="_blank" alt="Lihat QR" title="Lihat QR" uk-tooltip="Lihat QR">QR</a><a class="uk-button uk-button-secondary uk-button-small" href="admin/kirim_email/$1" alt="Kirim Email" title="Kirim Email" uk-tooltip="Kirim Email"><span uk-icon="mail"></span></a><a class="uk-button uk-button-danger uk-button-small" id="confirm" href="admin/hapus/$1" alt="Hapus" title="Hapus" uk-tooltip="Hapus"><span uk-icon="trash"></span></a>','id');
		return $this->datatables->generate();
    }


}