$(document).ready(function(){
    $("#btnSeConnecter").click(function(){
        $('#email').html()
         if ($('#email').html()=="" && $('#password').html()=="") {
            $("#errorMsg").html(($('#email').is(':empty')));
         } else if ($('#email').is(':empty')) {
            $("#errorMsg").html("1");
         } else if ($('#password').is(':empty')) {
            $("#errorMsg").html("2");
         } else {
            $.post("../Controller/loginControl.php", $("#postFormLogin").serializeArray(),
            function (data) {
                 if(data=="admin") {
                     $(location).attr('href','dashboard');
                 } else if (data=="etd"){
                  $(location).attr('href','mafiche');
                 } else {
                     $("#errorMsg").html(data);
                 }
            }
        );
         }
        
        $("#postFormLogin").submit(function (e) { 
            e.preventDefault();
            
        });
    });

    
  });