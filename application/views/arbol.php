	<div class="tree well">
    <ul>
       <li> 
	
	<?php
		foreach ($proyectos as $data_proyectos){
		// echo $data->P_ID_PROYECTO."<br>";
		echo "<span><i class='fa fa-folder-open'></i>".$data_proyectos->P_NOMBRE_PROYECTO."</span> <a href='' style='display:none;'>Goes somewhere</a>";
		foreach ($hitos as $data_hitos){
		echo "<ul><li>";
		echo "<span><i class='fa fa-minus'></i>".$data_hitos->P_NOMBRE_HITO."</span> <a href='' style='display:none;'>Goes somewhere</a></li>";
		
				foreach ($actividades as $data_actividades){
					if($data_hitos->P_ID_HITO == $data_actividades->P_ID_HITO){
					echo "<ul><li><span><i class='fa fa-minus'></i>".$data_actividades->P_NOMBRE_ACTIVIDAD."</span> <a href='' style='display:none;'>Goes somewhere</a></li></ul>";
					}
				}
		echo "</li></ul>";
		}
		echo "</ul>";
		
		// echo $data->P_ID_USUARIO_RESPONSABLE."<br>";
		// echo $data->P_FECHA_INICIO."<br>";
		// echo $data->P_FECHA_TERMINO."<br>";
		// echo $data->P_VALOR."<br>";
		// echo $data->P_PORC_AVANCE."<br>";
		// echo $data->P_DESCRIPCION."<br>";
		
	}
	
	?>
</li>
</ul>
</div>
	
	
	
	
	<div class="tree well">
    <ul>
        <li>
            <span><i class="fa fa-folder-open"></i> Item N°1: Construccion de Software</span> <a href="" style="display:none;">Goes somewhere</a>
            <ul>
                <li>
                	<span><i class="fa fa-minus"></i> Evaluacion de Requerimientos</span> <a href="" style="display:none;">Goes somewhere</a>
					<ul>
						<li>
						<span><i class="fa fa-minus "></i> Clasificacion de Requerimientos | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016 </span><a href="" style="display:none;">Goes somewhere</a>
						</li>
						<li>
						<span><i class="fa fa-minus "></i> Asignacion de Requerimientos | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016 </span><a href="" style="display:none;">Goes somewhere</a>
						</li>
					</ul>
                </li>
                <li>
	                <span><i class="fa fa-leaf"></i> Diseño de Solucion</span> <a href="" style="display:none;">Goes somewhere</a>
					<ul>
						<li>
						<span><i class="fa fa-minus "></i> Diseño grafico de sistema | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016 </span><a href="" style="display:none;">Goes somewhere</a>
						</li>
						<li>
						<span><i class="fa fa-minus "></i> Diseño de Funcionalidades | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016 </span><a href="" style="display:none;">Goes somewhere</a>
						</li>
					</ul>
                </li>
				<li>
                	<span><i class="fa fa-minus "></i> Desarrollo de Prototipo</span> <a href="" style="display:none;">Goes somewhere</a>
					<ul>
						<li>
						<span><i class="fa fa-minus "></i> Implantacion de grafica de sistema | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016 </span> <a href="" style="display:none;">Goes somewhere</a>
						</li>
						<li>
						<span><i class="fa fa-minus "></i> Desarrollo de Funcionalidades | <label class="control-label">Fecha Inicio:</label>10/08/2016 <label class="control-label">Fecha Termino:</label>20/08/2016  </span><a href="" style="display:none;">Goes somewhere</a>
						</li>
					</ul>
                </li>
                    
              
            </ul>
        </li>
    </ul>
</div>