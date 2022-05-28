$(document).ready(function () {


  //============= date picker ================
  $("#rechDateDebut").datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': 'true'
  })

  $("#rechDateFin").datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': 'true'
  })




  $("#rechIntitule").keyup(function (e) { 
    filterFiches()
  });

  $("#rechDateDebut").keyup(function (e) { 
    filterFiches()
  });

  $("#rechDateFin").keyup(function (e) { 
    filterFiches()
  });

  $("#rechFicheAchevee").keyup(function (e) { 
    filterFiches()
  });

  $("#rechDestination").keyup(function (e) { 
    filterFiches()
  });

  
function filterFiches() {
  var intitule = $("rechIntitule").val();
  var dateDeb = $("#rechDateDebut").val();
  var dateFin = $("#rechDateFin").val();
  var acheve = $("#rechFicheAchevee").val();
  if (acheve=="TOUS") {
    acheve="";
  }
  var destination = $("#rechDestination").val();
  if (destination =="TOUS") {
    destination = "";
  }


  var table = $("#tableFiches");
  var tr = table.$("tr");
  var tds = tr.$("td");

  for (var i = 0; i < tr.length; i++) {
    var colIntitule = tds[1].textContent.toUpperCase();
    var colDateDeb = tds[2].textContent.toUpperCase();
    var colDateFin = tds[3].textContent.toUpperCase();
    var colAcheve = tds[4].textContent.toUpperCase();
    var colDestin = tds[5].textContent.toUpperCase();

    if (colIntitule.indexOf(intitule) > -1
      || colDateDeb.indexOf(dateDeb) > -1
      || colDateFin.indexOf(dateFin) > -1
      || colAcheve.indexOf(acheve) > -1
      || colDestin.indexOf(destination) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}



});

