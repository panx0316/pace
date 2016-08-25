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
<td><b>Abreviacion</b></td><td><b>Estrategia</b></td><td><b>Avance</b></td><td><b>Avance Real</b></td><td><b>Estado</b></td><td><b>Atraso</b></td>
<?php foreach ($estrategias as $data_estrategias){ ?>
<?php if($data_estrategias->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
<tr>
<?php
$avance=GetAvanceEstrategia($data_estrategias->P_ID_PROYECTO,$data_estrategias->P_ID_ESTRATEGIA);
$avance_real=GetAvanceEstrategiaReal($data_estrategias->P_ID_PROYECTO,$data_estrategias->P_ID_ESTRATEGIA);
$atraso=$avance_real-$avance;
if($atraso<0){
	$texto_atraso='Adelanto';
}
if($atraso>0){
	$texto_atraso='Atraso';
}
if($atraso==0){
	$texto_atraso='Al día';
}
?>
<td><?php echo $data_estrategias->P_ABREVIACION_ESTRATEGIA ?></td><td><?php echo $data_estrategias->P_NOMBRE_ESTRATEGIA ?></td><td><?php echo $avance."%"; ?></td><td><?php echo $avance_real."%"; ?></td><td><?php echo $texto_atraso; ?></td><td><?php echo $atraso."%"; ?></td>
</tr>
<?php } ?>
<?php } ?>
</tr>
</table>
 <br>
 <br>
 <?php } ?>
</div>
