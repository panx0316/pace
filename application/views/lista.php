<div class="container" style="width:40%; margin:0 auto;">
  <h3>Módulo de Seguimiento</h3>
 <h4 style="margin-left: 14%;">Vista de Lista</h4>
 </div>
 <br>
 <br>
 
 
 <div id="table_center">
  <?php foreach ($proyectos as $data_proyectos){ ?>
<table border=1 style="width:100%">
  <tr>
  <td><?php echo "<b>Código</b>: ". $data_proyectos->P_CODIGO_PROYECTO; ?></td><td><?php echo "<b>Proyecto</b>: ".$data_proyectos->P_NOMBRE_PROYECTO; ?></td><td><?php echo "<b>Avance</b> :".GetAvanceProyecto($data_proyectos->P_ID_PROYECTO)."%" ?></td>
  </tr>
 
</table>
<br><br>

<table border=1 style="width:100%">
<tr>
<td><b>Abreviacion</b></td><td><b>Estrategia</b></td><td><b>Avance</b></td><td><b>Atraso</b></td>
<?php foreach ($areas as $data_areas){ ?>
<?php if($data_areas->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
<tr>
<td><?php echo $data_areas->P_ABREVIACION_AREA ?></td><td><?php echo $data_areas->P_NOMBRE_AREA ?></td><td><?php echo GetAvanceArea($data_areas->P_ID_PROYECTO,$data_areas->P_ID_AREA)."%"; ?></td><td></td>
</tr>
<?php } ?>
<?php } ?>
</tr>
</table>
 <br>
 <br>
 <?php } ?>
</div>

<a href="<?php echo base_url() ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista de Árbol</a>
<a href="<?php echo base_url().'financiero' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Finanzas</a>