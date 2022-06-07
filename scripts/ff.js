
champ = document.getElementById('grp-changelist-search-dossier');

btn=document.getElementsByClassName('grp-search-button')[1];

var jour='31';
var mois='05';
var annee='22';
var dateDpt = jour+mois+annee;
var nbrDossier =38;




listDossier = [];

for (let i=1;i<nbrDossier;i++) {
    champ.value=dateDpt+'/'+String(i).padStart(4,'0')+'/01';
    btn.click()
    if (document.getElementsByClassName('controls')[2].firstElementChild.style.display!='none') {
        dateF = document.getElementsByClassName('status_date')[0].textContent.replaceAll('/','-');
        var dossier = {numDossier:champ.value, dateFin:dateFin} 
    } else if (document.getElementsByClassName('controls')[2].lastElementChild.style.display!='none') {
        var dossier = {numDossier:champ.value, dateFin:'traitement'} 
    } else {
        var dossier = {numDossier:'inexistant', dateFin:'null'} 
    }
    listDossier.push(dossier);
}