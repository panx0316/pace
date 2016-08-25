<div class="container" style="width:40%; margin:0 auto;">
  <h3>Módulo de Seguimiento</h3>
  <div id="datos_usuario" style="position: absolute; right: 0px; top: 10%; margin-right: 37px;">
  <h4><?php echo $username; ?><a href="<?php echo base_url().'logout' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Salir</a></h4>
  </div>
 <h4 style="margin-left: 14%;">Vista de Lista</h4>

 <br>
 <br>
 <div class="form-group form-group-sm">
   <label for="" class="col-sm-2 control-label">Proyecto</label>
   <div class="col-sm-8">
     <select class="form-control" id="select_proyecto" name="select_proyecto">
     <option value="">--Seleccione un Proyecto--</option>
     <?php foreach ($proyectos as $data_proyectos){
     echo "<option value=".$data_proyectos->P_ID_PROYECTO.">".$data_proyectos->P_NOMBRE_PROYECTO."</option>";
     } ?>
     <select>
   </div>
</div>
<br>
<br>
<div id="respuesta">
<br>
<br>
</div>
<a href="<?php echo base_url().'inicio' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista de Árbol</a>
<a href="<?php echo base_url().'financiero' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Finanzas</a>
