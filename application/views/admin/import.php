<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/navbar');?>

<div class="uk-container uk-container-large">

<div class="uk-card uk-card-default uk-card-body">

    <h2>Import Excel <a href="./excel/Format_Excel_Import.xlsx" class="uk-button uk-button-default" alt="Import Excel" title="Import Excel" uk-tooltip="Import Excel" style="background-color: #32D296;color: #f2f2f2"><span uk-icon="file-text"></span> Download Format</a></h2>
            <?php echo $this->session->flashdata('notif') ?>
            <div class="js-upload uk-placeholder">
            <form method="POST" action="<?php echo base_url() ?>admin/excel_simpan" enctype="multipart/form-data">
                <div class="uk-margin">
                <label>Pilih File Excel</label><br/>
                <input type="file" name="userfile">
              </div>

              <button type="submit" class="uk-button uk-button-primary">UPLOAD</button>
            </form>
            </div>

    </div>
</div>

<?php $this->load->view('admin/footer');?>