<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{
   function get_all($id){
		$hasil=$this->db->get_where('pengaturan',['id'=>$id]);
		return $hasil;
	} 

	function getById($id) {
        return $this->db->get_where('pengaturan', array('id' => $id))->row();
    } 

	function simpan($id,$nama_web,$nama_pengantin,$tempat_tanggal,$alamat,$smtp_host,$smtp_port,$smtp_user,$smtp_pass){
		//$hasil=$this->db->query("UPDATE orang SET nama='$nama',ucapan='$ucapan' WHERE id='$id'");
		$hasil=$this->db->query("UPDATE pengaturan SET nama_web='$nama_web', nama_pengantin='$nama_pengantin',tempat_tanggal='$tempat_tanggal', tempat_tanggal='$tempat_tanggal',alamat='$alamat', smtp_host='$smtp_host', smtp_port='$smtp_port', smtp_user='$smtp_user', smtp_pass='$smtp_pass' WHERE id='$id'");
		return $hasil;
	}

	function simpan_foto($id,$foto) {
        
        //upload photo
        $config['upload_path']='./assets/images/';
		$config['max_size']=10240;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['encrypt_name']  = TRUE;	
		
		$this->load->library('upload');

		$this->upload->initialize($config);

		//if (!empty($_FILES["foto"]["name"])) {
		if(strlen($_FILES["foto"]["name"])>0){
		    if ($this->upload->do_upload('foto')) {
				$config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$filename = $_FILES['foto']['tmp_name'];
				$imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');
                //$config['width'] = '400';
				//$config['height'] = '400';
				list($width, $height) = getimagesize($filename);
			   if ($width >= $height){
				   $config['width'] = 800;
			   }
			   else{
				   $config['height'] = 800;
			   }
				//$config['maintain_ratio'] = FALSE;
				$config['master_dim'] = 'auto';
                $this->load->library('image_lib',$config); 

                if (!$this->image_lib->resize()){  
                echo "error";
          		}else{
          			//$data_image=$this->upload->data('file_name');
          			//$pict = $data_image;
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
					$pict = $data_image;
					
          		}
			}

		} else {
			$pict = $this->input->post('old_foto');
			
		}
		  
        $data = array (
            'id' => $id,
			'foto'=> $pict
	
        );
        $this->db->where('id', $id);
        $this->db->update('pengaturan', $data);
	}

	function simpan_background($id,$background) {
        
        //upload photo
        $config['upload_path']='./assets/images/';
		$config['max_size']=10240;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['encrypt_name']  = TRUE;	
		
		$this->load->library('upload');

		$this->upload->initialize($config);

		//if (!empty($_FILES["foto"]["name"])) {
		if(strlen($_FILES["background"]["name"])>0){
		    if ($this->upload->do_upload('background')) {
				$config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
				$filename = $_FILES['background']['tmp_name'];
				$imgdata=exif_read_data($this->upload->upload_path.$this->upload->file_name, 'IFD0');
                //$config['width'] = '400';
				//$config['height'] = '400';
				list($width, $height) = getimagesize($filename);
			   if ($width >= $height){
				   $config['width'] = 1920;
			   }
			   else{
				   $config['height'] = 1080;
			   }
				//$config['maintain_ratio'] = FALSE;
				$config['master_dim'] = 'auto';
                $this->load->library('image_lib',$config); 

                if (!$this->image_lib->resize()){  
                echo "error";
          		}else{
          			//$data_image=$this->upload->data('file_name');
          			//$pict = $data_image;
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
					$pict = $data_image;
					
          		}
			}

		} else {
			$pict = $this->input->post('old_background');
			
		}
		  
        $data = array (
            'id' => $id,
			'img_background'=> $pict,
	
        );
        $this->db->where('id', $id);
        $this->db->update('pengaturan', $data);
	}
	
 
}
