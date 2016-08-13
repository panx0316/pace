<html>
<head>
<?php $ruta='http://localhost/pace/';
//$ruta='http://localhost/pace/' 

define('RUTA', $ruta);

?>


<!-- LIBRERIAS CSS -->
	    <!-- Bootstrap -->
    
    <link href="<?php echo RUTA ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo RUTA ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo RUTA ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo RUTA ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo RUTA ?>assets/css/jquery-ui.css" rel="stylesheet">


</head>
<body>
    <div id="header">
    <div class="container">
    <div class="perfil"></div>
	<div class="logo_ucsc"><img src="<?php echo RUTA ?>assets/img/logo_ucsc.png"></div>
    <div class="logo_pace"><img src="<?php echo RUTA ?>assets/img/logo_pace.jpg"></div>
    </div>
	</div>
	<div id="contents"><?= $contents ?></div>
    <div id="footer">

	<div >Footer</div>
	
	</div>
	<script>
	var host = "<?php echo RUTA ?>";
	</script>
	<!-- LIBRERIAS JS-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo RUTA ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo RUTA ?>assets/js/jquery.validate.js"></script>
	

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo RUTA ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo RUTA ?>assets/js/jquery-ui.js"></script>
    <script src="<?php echo RUTA ?>assets/js/general.js"></script>
    <script src="<?php echo RUTA ?>assets/js/plugin.js"></script>
    <script src="<?php echo RUTA ?>assets/js/proyectos.js"></script>


</body>


</html>