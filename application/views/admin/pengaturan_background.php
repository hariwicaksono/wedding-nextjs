<?php $this->load->view('admin/header');?>


<body>
<?php $this->load->view('admin/navbar');?>


	<div class="uk-container uk-container-large uk-margin">
		
		<div class="uk-margin">
			
			<h2>Pengaturan Image Background</h2>
			<?php if($this->session->flashdata('msg')): ?>
				<p><?php echo $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>
		
			<?php 
			foreach($data->result_array() as $i)
			$id=$i['id'];
			$background=$i['img_background'];
			
			?>


			<form class="uk-form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/background_simpan'?>">
        
		  
			<input name="id" value="<?php echo $id;?>" type="hidden">

		<div class="uk-margin">
		   <label class="uk-form-label">BACKGROUND</label>
		   <div class="uk-form-controls">
		   <input type="hidden" name="old_background" value="<?=$background?>">
            <?php if (isset($background) && ! empty($background)) { ?>
            <img src="<?=base_url()?>assets/images/<?=$background?>" width="150">
            <?php } else { ?>
            <img src="<?=base_url()?>assets/images/ava.jpg" width="150">
            <?php } ?>
       		<br/>
            Upload background anda:<br/>
            <input type="file" name="background"><br/>
            <small>Ukuran Background maksimal 10 MB. Format: jpg, jpeg, png</small>
        </div>

		<div class="uk-margin">
			
		   <button class="uk-button uk-button-primary">Update</button>

		</div>

   </form>
		</div>
	</div>

<?php $this->load->view('admin/footer');?>



