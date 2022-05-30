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

  $("#addDateDebut").datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': 'true'
  })

  $("#addDateFin").datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': 'true'
  })




  $("#rechIntitule").on("keyup", function () {
    filterFiches();
  });

  $("#rechDateDebut").on("change", function () {
    filterFiches();
  });

  $("#rechDateFin").on("change", function () {
    filterFiches();
  });

  $("#rechFicheAchevee").on("change", function () {
    filterFiches();
  });


  $("#rechDestination").on("change", function () {
    filterFiches();
  });




  function filterFiches() {
    var intitule = document.getElementById("rechIntitule").value.toUpperCase();
    var dateDebut = document.getElementById("rechDateDebut").value.toUpperCase();
    var dateFin = document.getElementById("rechDateFin").value.toUpperCase();
    var SelficheAchevee = document.getElementById("rechFicheAchevee");
    var Seldestination = document.getElementById("rechDestination");
    var ficheAchevee = SelficheAchevee.options[SelficheAchevee.selectedIndex].innerText.toUpperCase();
    var destination = Seldestination.options[Seldestination.selectedIndex].innerText.toUpperCase();
    console.log(ficheAchevee);
    if (ficheAchevee == "TOUS") { ficheAchevee = "" }
    if (destination == "TOUS") { destination = "" }

    var table = document.getElementById("tableFiches");
    var allTr = table.getElementsByTagName("tr");

    for (var i = 2; i < allTr.length; i++) {
      var intituleTd = allTr[i].getElementsByTagName("td")[0].innerText.toUpperCase();
      var dateDebutTd = allTr[i].getElementsByTagName("td")[1].innerText.toUpperCase();
      var dateFinTd = allTr[i].getElementsByTagName("td")[2].innerText.toUpperCase();
      var ficheAcheveeTd = allTr[i].getElementsByTagName("td")[3].innerText.toUpperCase();
      console.log(ficheAchevee==ficheAcheveeTd);
      var destinationTd = allTr[i].getElementsByTagName("td")[4].innerText.toUpperCase();

      if (
        intituleTd.indexOf(intitule) == 0
        && dateDebutTd.indexOf(dateDebut) > -1
        && dateFinTd.indexOf(dateFin) > -1
        && ficheAcheveeTd.indexOf(ficheAchevee) > -1
        && destinationTd.indexOf(destination) > -1
      ) {
        allTr[i].style.display = ''
      } else {
        allTr[i].style.display = 'none'
      }


    }
  }



});

