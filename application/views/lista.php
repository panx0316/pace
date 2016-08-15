<div class="container" style="width:40%; margin:0 auto;">
  <h3>Módulo de Seguimiento</h3>
 </div>
 <br>
 <br>
 
 
 <div id="table_center">
  <?php foreach ($proyectos as $data_proyectos){ ?>
<table border=1 style="width:400px">
  <tr>
  <td><?php echo "<b>Código</b>: ". $data_proyectos->P_CODIGO_PROYECTO; ?></td><td><?php echo $data_proyectos->P_NOMBRE_PROYECTO; ?></td><td><?php echo "<b>Avance</b> :".GetAvanceProyecto($data_proyectos->P_ID_PROYECTO)."%" ?></td>
  </tr>
 
</table>
<br><br>

<table border=1 style="width:400px">
<tr>
<td>Abreviacion</td><td>Estrategia</td><td>Avance</td><td>Atraso</td>
<?php foreach ($areas as $data_areas){ ?>
<?php if($data_areas->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
<tr>
<td><?php echo $data_areas->P_ABREVIACION_AREA ?></td><td><?php echo $data_areas->P_NOMBRE_AREA ?></td><td><?php echo GetAvanceArea($data_areas->P_ID_PROYECTO,$data_areas->P_ID_AREA)."%"; ?></td><td></td>
</tr>
<?php } ?>
<?php } ?>
</tr>
</table>
 <?php } ?>
</div>