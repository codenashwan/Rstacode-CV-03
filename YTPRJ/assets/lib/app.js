
$(document).ready(function(){
    $(".userbtn").on("click" ,function(){
    $(".user").removeClass('d-none');
    $(".company").addClass('d-none');
    })

    $(".companybtn").on("click" ,function(){
    $(".company").removeClass('d-none');
    $(".user").addClass('d-none');
    })
})