checks = document.getElementById("ordre4");
console.log('nombre d\'elements: '+checks.length);

nbrElem = checks.length;
for (i=0;i<nbrElem;i++) {
  checks[i].addEventListener("click", function(){
    document.body.style.backgroundColor = "red";
  });
}
