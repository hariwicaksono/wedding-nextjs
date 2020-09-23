<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/navbar');?>
	<div class="uk-container uk-container-large">

		<div class="uk-card uk-card-default uk-card-body">
		
			<h2>Daftar Tamu Undangan <button type="button" class="uk-button uk-button-primary" uk-toggle="target: #modal-example" alt="Tambah Data Tamu" title="Tambah Data Tamu" uk-tooltip="Tambah Data Tamu"><span uk-icon="plus"></span> Tambah</button></h2>
			
			<?php if($this->session->flashdata('msg')): ?>
				<p><?php echo $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>

			<div class="uk-overflow-auto">
			<table id="myTable" class="table table-striped table-sm">
				
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NAMA</th>
						<th>NO.HP</th>
						<th>LINK UNTUK TAMU</th>
						<th>QR CODE</th>
						<th>OPSI</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			</div>
		</div>
	</div>

	<!-- Modal add new Orang-->
	<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Tambah Data Tamu</h2>
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <form action="<?php echo base_url().'admin/simpan'?>" method="post">

		          <div class="uk-margin">
		            <label for="nama" class="control-label">NAMA:</label>
		            <input type="text" name="nama" class="uk-input" id="nama" required="">
		          </div>
				  <div class="uk-margin">
		            <label for="nohp" class="control-label">NO HP (Format 62):</label>
		            <input type="text" name="nohp" class="uk-input" id="nohp" required="">
		          </div>
				  <div class="uk-margin">
		            <label for="email" class="control-label">EMAIL:</label>
					<input type="text" name="email" class="uk-input" id="email" required="">
		          </div>
				  <div class="uk-margin">
		            <label for="alamat" class="control-label">ALAMAT:</label>
		            <textarea name="alamat" class="uk-input" id="alamat"></textarea>
		          </div>
	     

		          <p class="uk-text-right">
		        <button class="uk-button uk-button-default uk-modal-close" type="button">Tutup</button>
		         <button type="submit" class="uk-button uk-button-primary">Simpan</button>
		          </p>
		</form>
        
		</div>
	</div>
	
	<!-- ============ MODAL EDIT BARANG =============== -->
    <?php
        foreach($data->result_array() as $i):
            $id=$i['id'];
			$nama=$i['nama'];
			$nohp=$i['nohp'];
			$email=$i['email'];
			$alamat=$i['alamat'];
  
        ?>

        <div id="modal_edit<?php echo $id;?>" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
<h2 class="uk-modal-title">Edit Data</h2>
        <button class="uk-modal-close-default" type="button" uk-close></button>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/edit_orang'?>">
           
 
                    <div class="uk-margin">
                        <label class="control-label col-xs-3" >QR ID</label>
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $id;?>" class="uk-input" type="text" placeholder="" readonly>
                        </div>
                    </div>
 
                    <div class="uk-margin">
                        <label class="control-label col-xs-3" >NAMA</label>
                        <div class="col-xs-8">
                            <input name="nama" value="<?php echo $nama;?>" class="uk-input" type="text" placeholder="" required>
                        </div>
                    </div>
 
					<div class="uk-margin">
                        <label class="control-label col-xs-3" >NO. HP (FORMAT 62)</label>
                        <div class="col-xs-8">
                            <input name="nohp" value="<?php echo $nohp;?>" class="uk-input" type="text" placeholder="" required>
                        </div>
                    </div>

					<div class="uk-margin">
                        <label class="control-label col-xs-3" >EMAIL</label>
                        <div class="col-xs-8">
                            <input name="email" value="<?php echo $email;?>" class="uk-input" type="text" placeholder="" required>
                        </div>
                    </div>

					<div class="uk-margin">
                        <label class="control-label col-xs-3" >ALAMAT</label>
                        <div class="col-xs-8">
                            <textarea name="alamat" class="uk-input" type="text"><?php echo $alamat;?></textarea>
                        </div>
                    </div>
 
              
               <p class="uk-text-right">
                     <button class="uk-button uk-button-default uk-modal-close" type="button">Tutup</button>
                    <button class="uk-button uk-button-primary">Update</button>
               </p>
            </form>
        </div>
    </div>
            
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->
	
	<?php $this->load->view('admin/footer');?>