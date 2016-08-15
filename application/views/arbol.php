<div class="container">
  <h3>Proyectos</h3>
    <?php foreach ($proyectos as $data_proyectos){ ?>
  <div class="tree">
    <ul>
      <li class="tituloProyecto">
        <a href="#" ><b><?php echo $data_proyectos->P_NOMBRE_PROYECTO."</b> - <b>Avance:</b>".GetAvanceProyecto($data_proyectos->P_ID_PROYECTO)."% - <b>Fecha Inicio</b>:".FormatearFechaES($data_proyectos->P_FECHA_INICIO)." - <b>Fecha Término</b>:".FormatearFechaES($data_proyectos->P_FECHA_TERMINO);  ?></a>
        <ul>
          <?php foreach ($areas as $data_areas){ ?>
          <?php if($data_areas->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
		  <li>
            <a href="#"><?php echo $data_areas->P_NOMBRE_AREA." - Avance:".GetAvanceArea($data_areas->P_ID_PROYECTO,$data_areas->P_ID_AREA)."%"; ?></a>
            <ul>
              
			  <?php foreach ($hitos as $data_hitos){ ?>
				<?php if($data_hitos->P_ID_AREA == $data_areas->P_ID_AREA){ ?>
              <li>
                <a href="#"><?php echo $data_hitos->P_NOMBRE_HITO." - Avance:".GetAvanceHito($data_hitos->P_ID_PROYECTO,$data_hitos->P_ID_AREA,$data_hitos->P_ID_HITO)."%";  ?></a>
                <ul>
				<?php foreach ($actividades as $data_actividades){ 
					if($data_hitos->P_ID_HITO == $data_actividades->P_ID_HITO){ ?>
                  <li><a href="#"><?php echo $data_actividades->P_NOMBRE_ACTIVIDAD." - Fecha Inicio:". FormatearFechaES($data_actividades->P_FECHA_INICIO)." / Fecha Término:". FormatearFechaES($data_actividades->P_FECHA_TERMINO)." / Avance:". $data_actividades->P_PORC_AVANCE."%" ?></a><button type="button" class="btn btn-link">Editar</button></li>
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


<button type="button" id="addProject" class="btn btn-default"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto</button>
<button type="button" id="addArea" class="btn btn-default"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Área</button>
<button type="button" id="addHito" class="btn btn-default"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Hito</button>
<button type="button" id="addActividad" class="btn btn-default"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Actividad</button>
</div>