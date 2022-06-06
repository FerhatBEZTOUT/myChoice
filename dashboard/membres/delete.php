<?php
include_once '../../Controller/checkConnexion.php';
$titrePage = "Supression de fiche de voeux";
include_once '../../View/header.php';
include_once '../../queries/utilisateurs.php';
$id = $_GET['id'];
deleteUser($id);
header("location: ../membres");
?>


<?php
include_once '../../View/footer.php';
?>