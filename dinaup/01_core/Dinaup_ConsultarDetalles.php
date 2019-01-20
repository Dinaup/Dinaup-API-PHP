<?php

function Dinaup_ConsultarDetalles($FuncionID, $Ubicacion, $Empleado, $Usuario, $WhereCampo, $WhereValor)
{



        $respuesta = RealizarSolicitudHTTP(array("dinaup_funcionapi" => $FuncionID ,
        "dinaup_empleado" => $Empleado ,
        "dinaup_usuario" => $Usuario ,
        "dinaup_ubicacion" => $Ubicacion ,
        "dinaup_registro_detallesdecampos" => "1",
        "dinaup_registro_campo" => $WhereCampo ,
        "dinaup_registro_valor" => $WhereValor ));


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

class DinaupRespuestaRegistro
{

    public $Estado;
    public $EstadoCodigo;
    public $EstadoDescripcion;
    public $FuncionAPI;
    public $Respuesta;
    public $DetallesCampos;

}




?>