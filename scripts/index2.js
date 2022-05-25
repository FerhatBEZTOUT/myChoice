document.getElementById('postFormLogin').addEventListener('submit',postLogin);

function postLogin(e) {
    e.preventDefault();

    var email = document.getElementById('email').value;
    var mdp = document.getElementById('password').value;
    var params = "email="+email+"&"+"password="+mdp;
    var xhr = new XMLHttpRequest();
    xhr.open('POST','../Controller/loginControl.php',true); // on lui dit d'aller sur process avec les variables de POST
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = function () {
        var arr = new Array();
        console.log(this.response);
        // var arr = JSON.parse(this.response);
        
        // if (arr[0].userType=='admin') {
        //     window.location='../dashboard'
        // }  
        // else if (arr[0].userType=="etd") {
        //     window.location='../mafiche'
        // }
        // else {
        //     document.getElementById('errorMsg').innerHTML='Email ou mot de passe incorrect';
                  
        // }
 }
    xhr.send(params);
    
}