<?php
include_once '../../Controller/checkConnexion.php';
$titrePage = "Supression de fiche de voeux";
include_once '../../View/header.php';
include_once '../../queries/fiches.php';
$id = $_GET['id'];
deleteFiche($id);
header("location: ../fiches");
?>

<?php
include_once '../../View/footer.php';
?>