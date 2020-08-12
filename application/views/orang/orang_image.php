<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
    <title>Ucapan dan Konfirmasi - The Wedding</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/uikit.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dropify.min.css'?>">

    <style>
.text-grey-900 {
  color: #212121 !important;
}
a.text-grey-900:hover,
a.text-grey-900:focus {
  color: #080808;
}
</style>
</head>
<body>
<?php foreach ($pengaturan->result() as $row) {
    $judul= $row->nama_web;
    $nama= $row->nama_pengantin;
    $tempat= $row->tempat_tanggal;
    $alamat= $row->alamat;
    $foto= $row->foto;
    $background= $row->img_background;
  }?>
    <div class="uk-background-cover uk-background-top-center uk-position-relative bg-blue-700" style="background-image: url(<?php echo base_url().'assets/images/'?><?php echo $background?>);height: 1080px"> 

    <div class="uk-container uk-container-small">

    <?php $this->load->view('orang/navbar');?>

        <div class="uk-container uk-background-default">
        

<div class="uk-padding-small">
<?php if($this->session->flashdata('msg')): ?>
    <?php echo $this->session->flashdata('msg'); ?>
    <?php endif; ?>
    <form class="uk-form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'confirm/ui/'.$hasil->id;?>">
            <legend class="uk-legend text-grey-900">Ganti Foto</legend>
                    
            <div class="uk-form-controls">
                <input name="id" value="<?php echo $hasil->id;?>" type="hidden">
            </div>

            <div class="uk-width-4-5@m" id="uploadFoto">
            <label class="uk-form-label text-grey-900" ><strong>Pilih foto:</strong></label>
            <div class="uk-form-controls">
            <input type="hidden" name="old_foto" value="<?=$hasil->foto?>">
            <input class="dropify" data-height="100" type="file" id="foto" name="foto">
            </div>
            </div>
        
          
    </div>
            
        <div>
            
        <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN <span uk-icon="icon: check"></span></button>
            
        </div>
    </form>
</div>
       

</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/uikit.min.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/js/uikit-icons.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>


  <script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
    });
     
</script>
  </body>
</html>