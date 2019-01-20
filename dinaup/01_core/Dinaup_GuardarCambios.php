<?php

function Dinaup_GuardarCambios($FuncionID, $Ubicacion, $Empleado, $Usuario, $WhereCampo, $WhereValor)
{



    /** @var SolicitudC $Solicitud */
    $Solicitud = $_SESSION['s']; 
    

    
    
    $Query = array("dinaup_funcionapi" => $FuncionID ,
            "dinaup_empleado" => $Empleado ,
            "dinaup_usuario" => $Usuario ,
            "dinaup_ubicacion" => $Ubicacion ,
            "dinaup_registro_detallesdecampos" => "1",
            "dinaup_guardar" => "1" ,
            "dinaup_registro_campo" => $WhereCampo ,
            "dinaup_registro_valor" => $WhereValor );

    foreach($_REQUEST as $key => $val)
    {
        if(isset($Query->{$key})){continue;}
        if(substr($key, 0, 7 ) == 'dinaup_'){continue;}


        // Todas las fechas y horas de dinaup son UTC
        if(ComprobarFormatoFechaYHora($val,'Y-m-d\TH:i:s')){
            $val = $Solicitud->ConvertirFechaYHoraAUTC(str_replace('T','',$val))->format('Y-m-d H:i:s');
        }


        $Query[$key] = $val;
    }


    $respuesta = RealizarSolicitudHTTP($Query);

                    
      
    $RespuestaInstancia = (new DinaupRespuestaInterna($respuesta));                                

    $Retornar = new DinaupRespuestaCambiosGuardados;
    $Retornar->Estado =$RespuestaInstancia->Estado;
    $Retornar->EstadoCodigo =$RespuestaInstancia->EstadoCodigo;
    $Retornar->EstadoDescripcion =$RespuestaInstancia->EstadoDescripcion;
    $Retornar->FuncionAPI =$RespuestaInstancia->FuncionAPI;
    $Retornar->Respuesta =$RespuestaInstancia->Respuesta;
 
            
    return $Retornar;



}
 


class DinaupRespuestaCambiosGuardados
{

    public $Estado;
    public $EstadoCodigo;
    public $EstadoDescripcion;
    public $FuncionAPI;
    public $Respuesta;


}

?>