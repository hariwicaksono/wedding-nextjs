<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/navbar');?>
<div class="uk-container uk-container-small">
		
		<div class="uk-card uk-card-default uk-card-body">
			
			<h2>Ganti Password</h2>
			<?php if($this->session->flashdata('msg')): ?>
				<p><?php echo $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>
            <?php echo @$error; ?>
     
        <form method="post" action=''>
			<div class="uk-margin">
		<label>Password Lama</label>
		<input class="uk-input" type="password" name="old_pass" id="name" placeholder="Password Lama" required>
		</div>
		<div class="uk-margin">
		<label>Password Baru</label>
		<input class="uk-input" type="password" name="new_pass" id="password" placeholder="Password Baru" required>
		</div>
		<div class="uk-margin">
		<label>Konfirmasi Password</label>
		<input class="uk-input" type="password" name="confirm_pass" id="password" placeholder="Konfirmasi Password" required>
		</div>
		<div class="uk-margin">
		<input class="uk-button uk-button-primary" type="submit" value="Simpan" name="change_pass"/>
		</div>
		</form>
 
			
		</div>
	</div>


    <?php $this->load->view('admin/footer');?>