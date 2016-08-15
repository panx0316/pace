<div class="container">
  <h3>Vista de Lista</h3>
 </div>
 
 
 
 <div id="table_center" style="">
<table border=1>
  <?php foreach ($proyectos as $data_proyectos){ ?>
  <tr>
  <td><?php echo $data_proyectos->P_CODIGO_PROYECTO; ?></td><td><?php echo $data_proyectos->P_NOMBRE_PROYECTO; ?></td><td><?php echo "<b>Avance</b> :".GetAvanceProyecto($data_proyectos->P_ID_PROYECTO)."%" ?></td>
  </tr>
  <?php } ?>
</table>


<table>
</table>
</div>