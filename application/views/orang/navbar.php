<nav class="uk-navbar-container uk-navbar-transparent uk-background-secondary uk-light" uk-navbar>
		 <div class="uk-navbar-left">
		
		<ul class="uk-navbar-nav">
			<li><a href="<?php echo base_url().'confirm/u/'.$hasil->id;?>">Ubah Data</a></li>
            <li><a href="<?php echo base_url().'confirm/v/'.$hasil->id;?>">Profil Saya</a></li>
            <li><a href="<?php echo base_url().'confirm/ui/'.$hasil->id;?>">Ganti Foto</a></li>
            
        </ul>
		</div>
    <div class="uk-navbar-right">
 <div class="uk-navbar-item">
<?php if (isset($hasil->foto) && ! empty($hasil->foto)) { ?>
            <a href="<?php echo base_url().'confirm/ui/'.$hasil->id;?>"><img class="uk-border-rounded" src="<?=base_url()?>assets/images/photos/<?=$hasil->foto?>" width="50"></a>
            <?php } else { ?>
            <a href="<?php echo base_url().'confirm/ui/'.$hasil->id;?>"><img class="uk-border-rounded" src="<?=base_url()?>assets/images/ava.jpg" width="60"></a>
            <?php } ?>
        </div>

    </div>
</nav>