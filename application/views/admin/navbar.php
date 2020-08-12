
	<div class="uk-background-secondary">
	<div class="uk-container uk-container-large">
	<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <a class="uk-navbar-item uk-logo" href="<?php echo base_url();?>">The Wedding</a>
    <div class="uk-navbar-left uk-light">

        <ul class="uk-navbar-nav">
            <li><a href="<?php echo base_url().'admin'?>">Home</a></li>
            <li><a href="<?php echo base_url().'admin/konfirmasi'?>">Data Konfirmasi</a></li>
            <li><a href="<?php echo base_url().'admin/kehadiran'?>">Rekap Kehadiran</a></li>
            
            <li>
                <a href="#"><span uk-icon="icon: user"></span>&nbsp; <?=$this->session->userdata('username');?> <span uk-icon="chevron-down"></span></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="<?php echo base_url().'admin/pengaturan_foto'?>"><span uk-icon="image"></span> Foto</a></li>
                    <li><a href="<?php echo base_url().'admin/pengaturan_background'?>"><span uk-icon="image"></span> Image Background</a></li>
                        <li><a href="<?php echo base_url().'admin/pengaturan'?>"><span uk-icon="settings"></span> Pengaturan Sistem</a></li>
                        <li><a href="<?php echo base_url().'admin/ganti_password'?>"><span uk-icon="settings"></span> Ganti Password</a></li>
                        <li><a href="<?php echo base_url().'admin/logout'?>"><span uk-icon="sign-out"></span> Logout</a></li>
                    </ul>
                </div>
            </li>

        </ul>
        </div>

 <div class="uk-navbar-right">
        <div class="uk-navbar-item">

        </div>
    </div>

    
</nav>

</div>
</div>