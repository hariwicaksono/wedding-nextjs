<!DOCTYPE html>
<html>
<head>
	<title>Data Orang</title>
    <meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
</head>
<body>
	<div class="container">
		<div class="row my-3">
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add New</button>


</div>
</div>

	<div class="container">
		
		<div class="row my-3">
			
			<h2>Data <small>Orang</small></h2>

     
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/updatedata/'.$hasil->id;?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $hasil->id;?>" class="form-control" type="text" placeholder="" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-8">
                            <input name="nama" value="<?php echo $hasil->nama;?>" class="form-control" type="text" placeholder="">
                        </div>
                    </div>
 
                  
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ucapan</label>
                        <div class="col-xs-8">
                            <textarea name="ucapan" class="form-control" placeholder=""><?php echo $hasil->ucapan?></textarea>
                        </div>
                    </div>
 
                </div>
 
                <div>
                    
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan"/>
                </div>
            </form>
 
			
		</div>
	</div>


	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js'?>"></script>
</body>
</html>