$(function () {
$('.accordion').on('shown.bs.collapse', function () {
    $("#package i.indicator").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
});
$('.accordion').on('hidden.bs.collapse', function () {
    $("#package i.indicator").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
});

});