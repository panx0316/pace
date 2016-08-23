	(function(a){a.createModal=function(b){defaults={title:"Proyecto Pace",message:"",closeButton:true,closeIdButton:"closeButton",scrollable:false,size:"lg",labelButton:"Cancelar",confirmButton:false,confirmIdButton:"#confirmButton",labelconfirmButton:"Confirmar",idModal : "myModal", backdrop: false,  };var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 484px;overflow-y: auto;"':"";html='<div class="modal fade" id="'+b.idModal+'">';html+='<div class="modal-dialog modal-'+b.size+'">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";if(b.closeButton===true || b.confirmButton===true){html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-default" id="'+b.closeIdButton+'" data-dismiss="modal">'+b.labelButton+'</button>'}if(b.confirmButton===true){html+='<button type="button" class="btn btn-primary" id="'+b.confirmIdButton+'">'+b.labelconfirmButton+'</button>'}html+="</div>";}html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html); if(b.backdrop == 'static'){        a("#" + b.idModal).modal( {backdrop: 'static',		keyboard: false}).on("show.bs.modal", function() {});}a("#"+b.idModal).modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);
	
	
	
$(document).ready(function() {

	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
	$.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
	$( ".fecha" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	
	
});





$(".form-signin").validate({
		ignore: [],
		rules: {
			email: {required: true},
			password: {required: true}
		},
		messages: {
			email: {required:"Ingrese email"},
			password: {required:"Ingrese password "}
		}
	});