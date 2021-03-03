<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="<?php echo base_url()?>">
        <meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" type="image/x-icon"><!-- X -->
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/uikit.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/notyf.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/datatables.min.css'?>">
<style>
.uk-navbar-nav li a{font-size:1rem}
</style>
</head>
<body>
<div uk-sticky="media: 960" class="uk-navbar-container tm-navbar-container uk-sticky uk-active" style="position: fixed; top: 0px; width: 1903px;">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar>
                    <div class="uk-navbar-left">
                        <a href="#" class="uk-navbar-item uk-logo">
                           Wedding
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-background">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                   <strong>Masuk Administrator</strong>
                                </div>
                                <div class="uk-card-body">
    
                                    <?php if(isset($error)) { echo $error; }; ?>
                                    <form method="POST" action="<?php echo base_url() ?>index.php/login">
                                        <fieldset class="uk-fieldset">

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                                    <input type="text" class="uk-input" name="username" placeholder="Username Anda" autofocus>
                    
                                                </div>
                                                <?php echo form_error('username'); ?>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                                    <input type="password" name="password" class="uk-input" placeholder="Password Anda">
                    
                                                </div>
                                                <?php echo form_error('password'); ?>
                                            </div>


                                            <div class="uk-margin">
                                                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">
                                                <span uk-icon="icon: sign-in"></span>&nbsp; Masuk
                                                </button>
                                            </div>

                                            <hr />

                                            <center>
                                            <a href="./" class="text-center new-account">Kembali </a>
                                            <div id="error" style="margin-top: 5px"></div>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>

        
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/uikit.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/uikit-icons.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/script.js'?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>