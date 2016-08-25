$(function () {
    $(document).on('click','.tree li', function (e) {
        var children = $(this).find('> ul > li');
        if (children.is(":visible")) children.hide('fast');
        else children.show('fast');
        e.stopPropagation();
    });


	$( document ).ready(function() {
    $('.tree li').css("display","none");
    $('.tituloProyecto').css("display","block");
	});

});
