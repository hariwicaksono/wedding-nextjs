<?php $this->load->view('orang/header');?>
<body>
<?php foreach ($pengaturan->result() as $row) {
    $judul= $row->nama_web;
    $nama= $row->nama_pengantin;
    $tempat= $row->tempat_tanggal;
    $alamat= $row->alamat;
    $foto= $row->foto;
    $background= $row->img_background;
  }?>

    <div class="uk-background-cover uk-background-top-center uk-position-relative" style="background-image: url(<?php echo base_url().'assets/images/'?><?php echo $background?>);height: 1080px"> 

    <div class="uk-container uk-container-small">
        
    <?php $this->load->view('orang/navbar');?>

    <div class="uk-container uk-background-default">

    <div class="uk-padding-small">
<?php if($this->session->flashdata('msg')): ?>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php endif; ?>
        <form class="uk-form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'confirm/u/'.$hasil->id;?>">
               <legend class="uk-legend text-grey-900">Ucapan &amp; Kehadiran</legend>
                    <div class="uk-margin">
                        <label class="uk-form-label text-grey-900" ><strong>QR Code ID:</strong></label>
                        <div class="uk-form-controls">
                            <input name="id" value="<?php echo $hasil->id;?>" class="uk-input" type="text" placeholder="" readonly>
                        </div>
                    </div>
 
                     <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>Nama Anda:</strong></label>
                       <div class="uk-form-controls">
                            <input name="nama" value="<?php echo $hasil->nama;?>" class="uk-input" type="text" placeholder="">
                        </div>
                    </div>

            <div class="uk-margin">
                    <label class="uk-form-label text-grey-900" ><strong>Konfirmasi Kehadiran:</strong></label>
                    <div class="uk-form-controls">
                    <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if($hasil->konfirmasi2=='Hadir') echo "checked='checked'"; ?> value="Hadir"/>
                <label for="konfirmasi" class="text-grey-900">Insya Allah Hadir</label><br>

                <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if($hasil->konfirmasi2=='Tidak Bisa') echo "checked='checked'"; ?> value="Tidak Bisa"/>
                <label for="konfirmasi" class="text-grey-900">Tidak Bisa Hadir</label><br>

                <input id="konfirmasi" name="konfirmasi" type="radio" class="" <?php if($hasil->konfirmasi2=='Masih Dalam Pertimbangan') echo "checked='checked'"; ?> value="Masih Dalam Pertimbangan"/>
                <label for="konfirmasi" class="text-grey-900">Masih Dalam Pertimbangan</label>
            </div>
 
                  </div>
 
                     <div class="uk-margin">
                        <label class="uk-form-label text-grey-900"><strong>Ucapan/Doa Kepada Mempelai:</strong></label>

                        <div class="uk-form-controls">
                            <textarea name="ucapan" class="uk-textarea uk-form-large" rows="2" placeholder=""><?php echo $hasil->ucapan?></textarea>
                        </div>
                    </div>
          
    </div>
            
        <div>
            
        <button type="submit" class="uk-button uk-button-primary uk-width-1-1">KIRIM <span uk-icon="icon: check"></span></button>
            
        </div>
    </form>
</div>
       

</div>

</div>
</div>

<?php $this->load->view('orang/footer');?>