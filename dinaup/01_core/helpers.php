<?php



function ComprobarFormatoFechaYHora($date, $format )
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function Request($Key){
    return (isset($_REQUEST[$Key])) ? $_REQUEST[$Key] : "";
}

function Request_Int($Key,int $predeterminado){
    return  (is_int(Request($Key))) ? Request($predeterminado) : $predeterminado;
}

function ModificarURL($Datos){
    $query = $_GET;
    foreach ($Datos as $clave=>$valor){$query[$clave] = $valor;}   
    $query_result = http_build_query($query);
    return  $_SERVER['PHP_SELF'].'?'.$query_result;
}

 
