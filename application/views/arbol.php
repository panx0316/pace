	
	<!-- <div class="tree well">
    <ul>
       <li> 
	
	<?php /*
		foreach ($proyectos as $data_proyectos){ ?>
		<span><i class='fa fa-folder-open'></i><?php echo $data_proyectos->P_NOMBRE_PROYECTO; ?></span> <a href='' style='display:none;'>Goes somewhere</a>
		<ul>
		<li>
				<?php foreach ($hitos as $data_hitos){ ?>
						<span><i class='fa fa-minus'></i><?php echo $data_hitos->P_NOMBRE_HITO; ?></span> <a href='' style='display:none;'>Goes somewhere</a>
						<ul>
							<?php foreach ($actividades as $data_actividades){
								if($data_hitos->P_ID_HITO == $data_actividades->P_ID_HITO){ ?>
						       <li><span><i class='fa fa-minus'></i><?php echo $data_actividades->P_NOMBRE_ACTIVIDAD; ?></span> <a href='' style='display:none;'>Goes somewhere</a></li>
								<?php } 
								}
								?>
							
							</ul>
			<?php	} ?>
		
			</li>
		</ul>
<?php		
		// echo $data->P_ID_USUARIO_RESPONSABLE."<br>";
		// echo $data->P_FECHA_INICIO."<br>";
		// echo $data->P_FECHA_TERMINO."<br>";
		// echo $data->P_VALOR."<br>";
		// echo $data->P_PORC_AVANCE."<br>";
		// echo $data->P_DESCRIPCION."<br>";
		
	}
	
	*/ ?>
</li>
</ul>
</div>
-->

<div class="container">
  <h1>Proyecto</h1>
  <?php foreach ($proyectos as $data_proyectos){ ?>
  <div class="tree">
    <ul>
      <li>
        <a href="#"><?php echo $data_proyectos->P_NOMBRE_PROYECTO; ?></a>
        <ul>
		
		<li>
		<?php foreach ($areas as $data_areas){ ?>
		
                <a href="#"><?php echo $data_areas->P_NOMBRE_AREA; ?></a>
				<ul>
					  <?php foreach ($hitos as $data_hitos){ ?>
					  <?php if($data_hitos->P_ID_AREA == $data_areas->P_ID_AREA){ ?>
						<li>
								<a href="#"><?php echo $data_hitos->P_NOMBRE_HITO; ?></a>
								<ul>
									<?php foreach ($actividades as $data_actividades){ 
										if($data_hitos->P_ID_HITO == $data_actividades->P_ID_HITO){ ?>
										  <li>	
										  <a href="#"><?php echo $data_actividades->P_NOMBRE_ACTIVIDAD." - Fecha Inicio:". $data_actividades->P_FECHA_INICIO." / Fecha Término:". $data_actividades->P_FECHA_TERMINO." / Valor Asignado:". $data_actividades->P_VALOR ." / Avance:". $data_actividades->P_PORC_AVANCE."%" ?></a>
										  </li>
									<?php  }	} ?>
								</ul>
					  </li>
					  <?php }	} ?>
                </ul>
		<?php	} ?>
        </li>

      
  
 
  <?php	}  ?>

  
  </ul>

	</li>
    </ul>
	</div>
</div>
