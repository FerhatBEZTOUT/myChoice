myChecks = document.getElementsByClassName("mySpeciaCheck");

nbrElem = myChecks.length;
compteur = 1;
for (i=0;i<nbrElem;i++) {
  myChecks[i].addEventListener("click", function(){
    let r = this.id;
    r = r.replace('spec','ordre');
    i = document.getElementById(r);
    if (this.checked) {
      i.value = compteur.toString();
      compteur++;
      
    } else {
      currentVal = i.value;
      i.value = '';
      compteur--;
      for (j=0;j<nbrElem;j++) { 
          if(myChecks[j].checked) {
            let r2 = myChecks[j].id;
            r2 = r2.replace('spec','ordre');
            
            i2 = document.getElementById(r2);
            val = i2.value;
            if (val>currentVal) {
              i2.value = (val-1).toString();
            }
            
          }
      }
      
    }
   
  });
}
