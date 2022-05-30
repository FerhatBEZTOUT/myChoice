<?php 

include_once __DIR__.'/../queries/specialite.php';
function remplirOptionsSpecialite() {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
    }
}


function remplirSpeciaWithValue($id) {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        if ($idSpec==$id) {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'" selected>'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        } else {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        }
        
    }
}



?>
