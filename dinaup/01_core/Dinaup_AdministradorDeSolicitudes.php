<?php

class SolicitudC
{

    /** @var TipoDeUsuarioC $Usuario_Tipo */

    public $Conexion_Estado;
    public $Conexion_EstadoCodigo;
    public $Conexion_EstadoDescripcion;
    public $Conexion_HoraDeServidor;

    public $Usuario_SesionIniciada;
    public $Usuario_Nombre;
    public $Usuario_ID;
    public $Usuario_ImagenID;
    public $Usuario_ZonaHoraria;
    public $Usuario_ZonaHorariaNombre;
    public $Usuario_EsEmpleado;

    
    public $Usuario_Tipo;




    public function ConvertirFechaYHoraALocal($FechaYHora) {

        if($FechaYHora==''){return '';} 
        $Retornar= new DateTime($FechaYHora);
        $Retornar->setTimeZone($this->Usuario_ZonaHoraria);
        return $Retornar->format(DinaupCFG::FechaYHora_Formato);
        
    }
    


    public function ConvertirFechaYHoraAUTC($FechaYHora) {
        if($FechaYHora==''){return '';} 
        $Retornar= new DateTime($FechaYHora);
        $Retornar->setTimeZone(new DateTimeZone('UTC'));
        return $Retornar;
    }
    
  


}

//function IniciarSesion(){
    
   // setcookie("dinaup_sesionid", $value);
   // setcookie("dinaup_sesionip", $value);


// }


// function CerrarSesion(){
    // unset($_COOKIE["dinaup_sesionid"]);
    // unset($_COOKIE["dinaup_sesionip"]);
// }



function IniciarSolicitud(){


    if(!DinaupCFG::Sesiones_ActivarSistemaDeIdentificacion){

         $Retornar = new SolicitudC;
         $Retornar->Usuario_ZonaHorariaNombre = (DinaupCFG::FechaYHora_ZonaHorariaLocal);
         $Retornar->Usuario_ZonaHoraria = new DateTimeZone(DinaupCFG::FechaYHora_ZonaHorariaLocal);
         $Retornar->Usuario_EsEmpleado = true;
         $Retornar->Usuario_Tipo = DetectarTipoDeUsuario($Retornar);
         return $Retornar;

    }else{

        $IP = $_SERVER['REMOTE_ADDR']; 
        $Dinaup_SessionID = $_COOKIE["dinaup_sesionid"];
        $Dinaup_SessionIP = $_COOKIE["dinaup_sesionip"];

        if($IP != $Dinaup_SessionIP ){
            // Dinaup no permite el acceso a una misma sesión desde distintas direcciones IP. 
            unset($_COOKIE["dinaup_sesionid"]);
            unset($_COOKIE["dinaup_sesionip"]);
            $Dinaup_SessionID = '';
            $Dinaup_SessionIP = ''; 
        } 


        $Retornar = new SolicitudC;
        $Retornar->Usuario_ZonaHorariaNombre = (DinaupCFG::FechaYHora_ZonaHorariaLocal);
        $Retornar->Usuario_ZonaHoraria = new DateTimeZone(DinaupCFG::FechaYHora_ZonaHorariaLocal);
         $Retornar->Usuario_Tipo = DetectarTipoDeUsuario($Retornar);
         return $Retornar;
    }   

}







function Dinaup_IniciarSesion($Dinaup_Usuario,  $Dinaup_Pass)
{

}
 

function Dinaup_DetectarSolicitud($Dinaup_SessionID,  $Dinaup_SessionIP)
{



        $respuesta = RealizarSolicitudHTTP( array(
            "dinaup_funcionapi" => 'solicitud' ,
            "dinaup_funciondetalles" => DinaupCFG::FuncionAPI_DetallesSesion,
            "dinaup_sesionid" => $Dinaup_SessionID,
            "dinaup_sesionip" => $Dinaup_SessionIP ));


        if( $respuesta==null){

            $RespuestaInstancia = new DinaupRespuestaInterna($respuesta);
            $Retornar = new DinaupRespuestaRegistro;
            $Retornar->Estado = 'Fuera de servicio.';
            $Retornar->EstadoCodigo = '-1';
            $Retornar->EstadoDescripcion ='No disponible en este momento.';

        }else{
            $RespuestaInstancia = new DinaupRespuestaInterna($respuesta);
            $Retornar = new DinaupRespuestaRegistro;
            $Retornar->Estado = $RespuestaInstancia->Estado;
            $Retornar->EstadoCodigo = $RespuestaInstancia->EstadoCodigo;
            $Retornar->EstadoDescripcion = $RespuestaInstancia->EstadoDescripcion;
            $Retornar->FuncionAPI = $RespuestaInstancia->FuncionAPI;
            $Retornar->Respuesta = $RespuestaInstancia->Respuesta;
        }
        
        return $Retornar;
    
}


?>