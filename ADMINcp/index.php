
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMINCP</title>
    <link rel="stylesheet" type="text/css" href="css/styleadm.css">
    <style type="text/css">
    	body{
    		background: #fff ;
    	}
    </style>
</head>
<body>
	<div class="bgad">
		<img src="img/bgad.jpg" style="display: block; margin: 0 auto;">
	</div>
	<div class="Wrapper">
	<?php
		include("Config/config.php");
		include("model/header.php");
		include("model/menu.php");	
		include("model/main.php");	
		include("model/footer.php");	
	?>		
	</div>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script>
        CKEDITOR.replace( 'mota' );
        CKEDITOR.replace( 'thongtinlienhe' );
    </script>
</body>
</html>	

