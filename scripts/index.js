$(document).ready(function(){
    $("#btnSeConnecter").click(function(){
        getName();
    });

    function getName() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET','../Controller/process.php?name=Ferhat');

        xhr.onload = function () {
            console.log(this.response);
        }

        xhr.send();
    }
  });