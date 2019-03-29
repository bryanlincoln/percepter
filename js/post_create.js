$(document).ready(function() {
    $("#post-preview").html($("#body").val());
});

$("#body").on('input',function(e) {
    $("#post-preview").html($("#body").val());
});