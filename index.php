<?php

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$inicio = $time;


require_once('dinaup/dinaupapi.php');


if(!session_id()) session_start();
$_SESSION['s'] = IniciarSolicitud();


require_once('contenido.php');

$_SESSION = array();
session_destroy();

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$fin = $time;
$total_time = round(($fin - $inicio), 4);
echo '<!-- Página generada en '.$total_time.' segundos. -->';

?>