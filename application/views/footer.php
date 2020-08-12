<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/uikit.min.js'?>"></script>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/uikit-icons.min.js'?>"></script>

    <script>
    $('#keyword').submit(function(){return true;});
</script>

 
<!--<script type="text/javascript" src="<?php echo base_url().'assets/js/instascan.min.js'?>"></script>
<script type="text/javascript">
	let opts = {

	  continuous: true,
	  
	  video: document.getElementById('preview'),

	  mirror: false,

	  captureImage: true,
	  
	  backgroundScan: true,
	  refractoryPeriod: 5000,
	  scanPeriod: 1
	};
      let scanner = new Instascan.Scanner(opts)
     scanner.addListener('scan', function (content) {
        $("#keyword").val(content); 
        $('#form1').submit();// Pass the scanned content value to an input field
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if(cameras[0]){ scanner.start(cameras[0]); } else { scanner.start(cameras[1]); }
      }).catch(function (e) {
        console.error(e);
      });
    </script>-->
	</body>
</html>