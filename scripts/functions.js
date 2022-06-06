$(document).ready(function () {
  $("#addUserType1").click(function (e) { 
    $("#addUserAnneeDiv").show();
    $("#addUserSpeciaDiv").show();
  });

  $("#addUserType2").click(function (e) { 
    $("#addUserAnneeDiv").hide();
    $("#addUserSpeciaDiv").hide();
    
  });


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

  $("#addUserDate").datepicker({
    'format': 'yyyy-mm-dd',
    'autoclose': 'true'
  })

 // filtre Fiche =======================================


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
    if (ficheAchevee == "TOUS") { ficheAchevee = "" }
    if (destination == "TOUS") { destination = "" }

    var table = document.getElementById("tableFiches");
    var allTr = table.getElementsByTagName("tr");

    for (var i = 2; i < allTr.length; i++) {
      var intituleTd = allTr[i].getElementsByTagName("td")[0].innerText.toUpperCase();
      var dateDebutTd = allTr[i].getElementsByTagName("td")[1].innerText.toUpperCase();
      var dateFinTd = allTr[i].getElementsByTagName("td")[2].innerText.toUpperCase();
      var ficheAcheveeTd = allTr[i].getElementsByTagName("td")[3].innerText.toUpperCase();
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


  // filtre Specialité =======================================

  $("#rechNomSpecia").on("keyup", function () {
    filterSpecia();
  });

  $("#rechCycleSpecia").on("change", function () {
    filterSpecia();
  });

  $("#rechAnneeSpecia").on("change", function () {
    filterSpecia();
  });


  function filterSpecia() {
    var nomSpecia = document.getElementById("rechNomSpecia").value.toUpperCase();
    var selectCycleSpecia = document.getElementById("rechCycleSpecia");
    var selectAnneeSpecia = document.getElementById("rechAnneeSpecia");

    var cycleSpecia = selectCycleSpecia.options[selectCycleSpecia.selectedIndex].innerText.toUpperCase();
    var anneeSpecia = selectAnneeSpecia.options[selectAnneeSpecia.selectedIndex].innerText.toUpperCase();
    
    if (cycleSpecia == "TOUS") { cycleSpecia = "" }
    if (anneeSpecia == "TOUS") { anneeSpecia = "" }

    var table = document.getElementById("tableSpecia");
    var allTr = table.getElementsByTagName("tr");

    for (var i = 2; i < allTr.length; i++) {
      var nomSpeciaTd = allTr[i].getElementsByTagName("td")[0].innerText.toUpperCase();
      var cycleSpeciaTd = allTr[i].getElementsByTagName("td")[1].innerText.toUpperCase();
      var anneeSpeciaTd = allTr[i].getElementsByTagName("td")[2].innerText.toUpperCase();
     

      if (
        nomSpeciaTd.indexOf(nomSpecia) == 0
        && cycleSpeciaTd.indexOf(cycleSpecia) > -1
        && anneeSpeciaTd.indexOf(anneeSpecia) > -1
      ) {
        allTr[i].style.display = ''
      } else {
        allTr[i].style.display = 'none'
      }


    }
  }

// filtre Membres =======================================


$("#rechNomUser").on("keyup", function () {
  filterMembres();
});

$("#rechPrenomUser").on("keyup", function () {
  filterMembres();
});

$("#rechUserType").on("change", function () {
  filterMembres();
});

$("#rechUserAnnee").on("change", function () {
  filterMembres();
});


$("#rechUserSpecia").on("change", function () {
  filterMembres();
});



function filterMembres() {
  var nom = document.getElementById("rechNomUser").value.toUpperCase();
  var prenom = document.getElementById("rechPrenomUser").value.toUpperCase();
  var selUserType = document.getElementById("rechUserType");
  var selUserAnnee = document.getElementById("rechUserAnnee");
  var selUserSpecia = document.getElementById("rechUserSpecia");
  var UserType = selUserType.options[selUserType.selectedIndex].innerText.toUpperCase();
  var UserAnnee = selUserAnnee.options[selUserAnnee.selectedIndex].innerText.toUpperCase();
  var UserSpecia = selUserSpecia.options[selUserSpecia.selectedIndex].innerText.toUpperCase();

  if (UserType == "TOUS") { UserType = "" }
  if (UserAnnee == "TOUS") { UserAnnee = "" }
  if (UserSpecia == "TOUS") { UserSpecia = "" }

  var table = document.getElementById("tableMembres");
  var allTr = table.getElementsByTagName("tr");

  for (var i = 2; i < allTr.length; i++) {
    var nomTd = allTr[i].getElementsByTagName("td")[0].innerText.toUpperCase();
    var prenomTd = allTr[i].getElementsByTagName("td")[1].innerText.toUpperCase();
    var UserTypeTd = allTr[i].getElementsByTagName("td")[2].innerText.toUpperCase();
    var UserAnneeTd = allTr[i].getElementsByTagName("td")[3].innerText.toUpperCase();
    var UserSpeciaTd = allTr[i].getElementsByTagName("td")[4].innerText.toUpperCase();

    if (
      nomTd.indexOf(nom) == 0
      && prenomTd.indexOf(prenom) == 0
      && UserTypeTd.indexOf(UserType) > -1
      && UserAnneeTd.indexOf(UserAnnee) > -1
      && UserSpeciaTd.indexOf(UserSpecia) > -1
    ) {
      allTr[i].style.display = ''
    } else {
      allTr[i].style.display = 'none'
    }


  }
}

});

