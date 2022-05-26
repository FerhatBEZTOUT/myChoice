<?php
session_start();
if (!isset($_SESSION['connecté'])) {
    include_once '../Controller/deconnexion.php';
    exit();
}

?>