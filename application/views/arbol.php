<div class="container">
  <h3>Proyectos</h3>
    <?php foreach ($proyectos as $data_proyectos){ ?>
  <div class="tree">
    <ul>
      <li class="tituloProyecto">
        <a href="#" ><b><?php echo $data_proyectos->P_NOMBRE_PROYECTO."</b> - <b>Avance:</b>".GetAvanceProyecto($data_proyectos->P_ID_PROYECTO)."% - <b>Fecha Inicio</b>:".FormatearFechaES($data_proyectos->P_FECHA_INICIO)." - <b>Fecha Término</b>:".FormatearFechaES($data_proyectos->P_FECHA_TERMINO);  ?></a>
        <ul>
          <?php foreach ($estrategias as $data_estrategia){ ?>
          <?php if($data_estrategia->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
		  <li>
            <a href="#"><?php echo "<b>".$data_estrategia->P_NOMBRE_ESTRATEGIA."</b> - Avance:".GetAvanceEstrategia($data_estrategia->P_ID_PROYECTO,$data_estrategia->P_ID_ESTRATEGIA)."%"; ?></a>
            <ul>
              
			  <?php foreach ($componentes as $data_componentes){ ?>
				<?php if($data_componentes->P_ID_ESTRATEGIA == $data_estrategia->P_ID_ESTRATEGIA){ ?>
              <li>
                <a href="#"><?php echo "<b>".$data_componentes->P_NOMBRE_COMPONENTE."</b> - Avance:".GetAvanceComponente($data_componentes->P_ID_PROYECTO,$data_componentes->P_ID_ESTRATEGIA,$data_componentes->P_ID_COMPONENTE)."%";  ?></a>
                <ul>
				<?php foreach ($actividades as $data_actividades){ 
					if($data_componentes->P_ID_COMPONENTE == $data_actividades->P_ID_COMPONENTE){ ?>
                  <li><a href="#"><?php echo "<b>".$data_actividades->P_NOMBRE_ACTIVIDAD."</b> - Fecha Inicio:". FormatearFechaES($data_actividades->P_FECHA_INICIO)." / Fecha Término:". FormatearFechaES($data_actividades->P_FECHA_TERMINO)." / Avance:". $data_actividades->P_PORC_AVANCE."%" ?></a><button type="button" class="btn btn-link editar_actividad" data-id="<?php echo $data_actividades->P_ID_ACTIVIDAD; ?>">Editar</button></li>
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


<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle"
          data-toggle="dropdown">
   Agregar <span class="caret"></span>
  </button>
 
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" id="addProject"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto</a></li>
    <li><a href="#" id="addArea"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Área</a></li>
    <li><a href="#" id="addHito"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Hito</a></li>
    <li><a href="#" id="addActividad"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Actividad</a></li>
  </ul>
</div>

<a href="<?php echo base_url().'lista' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista de Lista</a>
<a href="<?php echo base_url().'financiero' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Finanzas</a>
