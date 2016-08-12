<html>
<head>
<?php $ruta='http://localhost:8080/pace/';
//$ruta='http://localhost/pace/' 

define('RUTA', $ruta);

?>


<!-- LIBRERIAS CSS -->
	    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="<?php echo RUTA ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo RUTA ?>assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">

</head>
<body>
    <div id="header">
    <!--  <div class="container">
    <div class="perfil"></div>
	<div class="logo_ucsc"><img src="<?php //echo RUTA ?>assets/img/logo_ucsc.png"></div>
    <div class="logo_pace"><img src="<?php //echo RUTA ?>assets/img/logo_pace.jpg"></div>
    </div>
	-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>
    <script src="<?php echo RUTA ?>assets/js/general.js"></script>
    <script src="<?php echo RUTA ?>assets/js/plugin.js"></script>
    <script src="<?php echo RUTA ?>assets/js/proyectos.js"></script>


</body>


</html>