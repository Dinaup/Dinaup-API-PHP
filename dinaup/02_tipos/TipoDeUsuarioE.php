<?php


class TipoDeUsuarioC {
  public $Empleado;
  public $Entidad;
  public $Visitante;
}


function DetectarTipoDeUsuario(SolicitudC $Solicitud){

    $R = new TipoDeUsuarioC();

    if(!$Solicitud->Usuario_SesionIniciada){
        $R->Visitante = true;
    }elseif($Solicitud->Usuario_EsEmpleado){
        $R->Empleado = true;
    }else{ 
        $R->Entidad = true;
    }

    return $R;
}


function ComprobarPermiso(SolicitudC $Solicitud, TipoDeUsuarioC $Permiso){

    if( $Solicitud->Usuario_Tipo->Empleado   == $Permiso->Empleado  ){ return true; }
    if( $Solicitud->Usuario_Tipo->Entidad    == $Permiso->Entidad   ){ return true; }
    if( $Solicitud->Usuario_Tipo->Visitante  == $Permiso->Visitante ){ return true; }

    return false;

}