<script>
$(document).ready(function() {
$( ".fecha" ).datepicker({
  changeMonth: true,
  changeYear: true
});
$( "#fecha_inicio" ).on("change", function(){
  var fecha_inicio=$(this).val();
  if(fecha_inicio!=''){
   $("#fecha_inicio").removeClass('error');
   $("#fecha_inicio-error").hide();
  }
});
$( "#fecha_termino" ).on("change", function(){
  var fecha_termino=$(this).val();
if(fecha_termino!=''){
 $("#fecha_termino").removeClass('error');
 $("#fecha_termino-error").hide();
}
});

$("#form_editar_fecha").validate({
rules: {
  fecha_inicio: {required: true},
  fecha_termino: {required: true}
},
messages: {
  fecha_inicio: {required:"Ingrese fecha inicio"},
  fecha_termino: {required:"Ingrese fecha término"}

},
submitHandler: function() {

var form =  $('form.form-horizontal'),action = form.attr('action');

var formData = new FormData(form[0]);
  $.ajax({
    type: 'post',
    url:  host+action,
    data: formData, //form.serialize()
    cache: false,
    contentType: false,
    processData: false,
    timeout: 20000,

    beforeSend: function () {
      $('.enviar_solicitud').prop('disabled', true);
    },
    success: function (data, status)
    {
      $("#resultado").html(data);
      $('#modal_edit_fechas').on('hidden.bs.modal', function (e) {
      location.reload();
      });
    },
    error: function(jqXHR, estado, error)
    {
      console.log(error);
      alert(error);
    },

  });
}
});


});

</script>



<div style="height:400px; margin-top:10%">
<form id="form_editar_fecha" class="form-horizontal" method="post" action="inicio/edit_fecha_progress" enctype="multipart/form-data">
  <input type="hidden" id="id_actividad" name="id_actividad" value="<?php echo $actividades[0]->P_ID_ACTIVIDAD; ?>">
<div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Título</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $actividades[0]->P_NOMBRE_ACTIVIDAD; ?>" disabled readonly></input>
		</div>
</div>


<div class="form-group form-group-sm">

       <label for="" class="col-sm-2 control-label">Fecha Inicio</label>
     <div class="rangoFecha">
       <div class="col-sm-2">
         <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control fecha fecha_inicio" placeholder="dd/mm/aaaa" value="<?php echo FormatearFechaES($actividades[0]->P_FECHA_INICIO); ?>">
       </div>
       <label for="" class="col-sm-2 control-label">Fecha Término</label>
       <div class="col-sm-2">
         <input type="text" name="fecha_termino" id="fecha_termino" class="form-control fecha fecha_termino" placeholder="dd/mm/aaaa" value="<?php echo FormatearFechaES($actividades[0]->P_FECHA_TERMINO); ?>">
       </div>

     </div>

 </div>
<div style="margin-left:10%;">
 <button type="submit" class="btn btn-primary">Editar Fechas</button>
</div>
<div id="resultado"></div>
</form>
</div>
