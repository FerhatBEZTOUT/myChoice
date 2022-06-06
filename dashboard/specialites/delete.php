<?php
include_once '../../Controller/checkConnexion.php';
$titrePage = "Supression de spécialité";
include_once '../../View/header.php';
include_once '../../queries/specialite.php';
$id = $_GET['id'];
deleteSpecia($id);
header("location: ../specialites");
?>


<?php
include_once '../../View/footer.php';
?>