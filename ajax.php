<?php

require_once('dinaup/dinaupapi.php');


if(!session_id()) session_start();
$_SESSION['s'] = IniciarSolicitud();





$Paginas = DinaupCFG::Paginas();
$Paginas_Actual = Request("seccion");
for ($i = 0; $i <=  count($Paginas) -1; $i++) {
    if($Paginas[$i]->KeyWord == $Paginas_Actual){

        require_once($Paginas[$i]->Archivo);
        break;

    }
}



$_SESSION = array();
session_destroy();
 

?>