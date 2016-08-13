<div class="container">
  <h3>Proyectos</h3>
    <?php foreach ($proyectos as $data_proyectos){ ?>
  <div class="tree">
    <ul>
      <li class="tituloProyecto">
        <a href="#" ><?php echo $data_proyectos->P_NOMBRE_PROYECTO; ?></a>
        <ul>
          <?php foreach ($areas as $data_areas){ ?>
          <?php if($data_areas->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
		  <li>
            <a href="#"><?php echo $data_areas->P_NOMBRE_AREA; ?></a>
            <ul>
              
			  <?php foreach ($hitos as $data_hitos){ ?>
				<?php if($data_hitos->P_ID_AREA == $data_areas->P_ID_AREA){ ?>
              <li>
                <a href="#"><?php echo $data_hitos->P_NOMBRE_HITO; ?></a>
                <ul>
				<?php foreach ($actividades as $data_actividades){ 
					if($data_hitos->P_ID_HITO == $data_actividades->P_ID_HITO){ ?>
                  <li><a href="#"><?php echo $data_actividades->P_NOMBRE_ACTIVIDAD." - Fecha Inicio:". $data_actividades->P_FECHA_INICIO." / Fecha Término:". $data_actividades->P_FECHA_TERMINO." / Valor Asignado:". $data_actividades->P_VALOR ." / Avance:". $data_actividades->P_PORC_AVANCE."%" ?></a></li>
				  <?php } }  ?>
                </ul>
              </li>
				  <?php } }  ?>
              
            </ul>
          </li>
		  <?php } }  ?>
        </ul>
      </li>
    </ul>
  </div>
  <?php	}  ?>
</div>


<button type="button" id="addProject" class="btn btn-default"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto</button>