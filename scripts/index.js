$(document).ready(function () {
    $("#btnSeConnecter").click(function () {

        $("#postFormLogin").submit(function (e) {
            e.preventDefault();

        });
            var email_a = document.getElementById("email").value.trim();
            var mdp_a = document.getElementById("password").value.trim();
            
        $.post("../Controller/loginControl.php", $("#postFormLogin").serializeArray(),
            function (data) {
                if (email_a == "" && mdp_a=="") {
                    $("#errorMsg").html("Les champs sont vides");
                    $("#email").addClass("border-red");
                    $("#password").addClass("border-red");
                } else if (email_a == "") {
                    $("#errorMsg").html("Champ email vide");
                    $("#password").removeClass("border-red");
                } else if (mdp_a=="") {
                    $("#errorMsg").html("Champ mot de passe vide");
                    $("#email").removeClass("border-red");
                } else if (data == "admin") {
                    $(location).attr('href', 'dashboard');
                } else if (data == "etd") {
                    $(location).attr('href', 'mafiche');
                } else {
                    $("#password").removeClass("border-red");
                    $("#email").removeClass("border-red");
                    $("#errorMsg").html("Email ou mot de passe incorrect");
                }
            }
        );

        
    });


});