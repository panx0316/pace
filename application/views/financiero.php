<div class="container" style="width:40%; margin:0 auto;">
  <h3>Módulo Financiero</h3>
 </div>
 <br>
 <br>
 
 
 <div id="table_center">
  <?php foreach ($proyectos as $data_proyectos){ ?>
<table border=1 style="width:400px">
  <tr>
  <td><?php echo "<b>Código</b>: ". $data_proyectos->P_CODIGO_PROYECTO; ?></td><td><?php echo "<b>Proyecto</b>: " .$data_proyectos->P_NOMBRE_PROYECTO; ?></td>
  </tr>
 
</table>
<br><br>

<table border=1 style="width:800px">
<?php foreach ($areas as $data_areas){ ?>
<?php if($data_areas->P_ID_PROYECTO == $data_proyectos->P_ID_PROYECTO){ ?>
    <tr>
        <th scope="colgroup" colspan="12"><?php echo $data_areas->P_NOMBRE_CLASIFICACION_ITEM ?></th>
    </tr>
    <tr>
        <th>Estrategia</th>
        <th>Componente</th>
        <th>Resultado</th>
        <th>Detalle gasto</th>
        <th>Monto programado</th>
        <th>Monto gastado</th>
        <th>Saldo</th>
        <th>estado</th>
    </tr>
    
    <tr>
        <th><?php echo $data_areas->P_ABREVIACION_AREA ?></th>
        <td>CeldaA</td>
        <td>CeldaB</td>
        <td>CeldaA</td>
        <td>CeldaB</td>
        <td>CeldaA</td>
        <td>CeldaB</td>
        <td>CeldaA</td>
    </tr>
    <tr>
<?php } ?>
<?php } ?>
    </tr>
 </table>


 <?php } ?>
</div>