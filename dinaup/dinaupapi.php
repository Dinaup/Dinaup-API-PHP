<?php


    foreach (glob("aplicacion/*.php") as $filename){require_once($filename);}
    foreach (glob("dinaup/01_core/*.php") as $filename){require_once($filename);}
    foreach (glob("dinaup/02_tipos/*.php") as $filename){require_once($filename);}
    foreach (glob("dinaup/03_renderizadorhtml/*.php") as $filename){require_once($filename);}


?>