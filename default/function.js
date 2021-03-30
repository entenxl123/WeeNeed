function aaaa(){
    alert($('#status_v').val());
    $.getJSON('core/api/controller/controller.php',function(response){
        alert(response);
        console.log(response);
    });

}