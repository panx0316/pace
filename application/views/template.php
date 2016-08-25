<html>
<head>

<!-- LIBRERIAS CSS -->
	    <!-- Bootstrap -->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">


</head>
<body>


<div id="header">
    <div class="container">
    <div class="perfil"></div>
	<div class="logo_ucsc"><img src="<?php echo base_url(); ?>assets/img/logo_ucsc.png"></div>
    <div class="logo_pace"><img src="<?php echo base_url(); ?>assets/img/logo_pace.jpg"></div>
    </div>
	</div>

	<div id="contents"><?= $contents ?></div>

	<!--
	<div id="footer">


	<div class="footercont">

		<img src="<?php //echo base_url(); ?>assets/img/logo_pace.jpg">
		<h6>Programa de Acompañamiento y Acceso Efectivo</h6>
		contacto.pace@ucsc.cl<br>
		(56) 41 234 5337
		<div class="clear"></div>

	</div>

	<div class="footer-center">
	   <b>"Acreditada por la CNA por 4 años</b>, desde 12 noviembre de 2012<br>
		hasta el 12 de noviembre de 2016, en las áreas de Gestión<br>
		Institucional y Docencia"
   </div>
	-->

	</div>
	<script>
	var host = "<?php echo base_url(); ?>";
	</script>
	<!-- LIBRERIAS JS-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/general.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/proyectos.js"></script>


</body>


</html>
