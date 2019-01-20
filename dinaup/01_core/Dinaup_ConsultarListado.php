<?php



function  Dinaup_ConsultarListado( $FuncionID, $Pagina, $ResultadosPorPagina, $Ubicacion, $Empleado, $Usuario,$Busqueda)
{


    $respuesta = RealizarSolicitudHTTP( array("dinaup_funcionapi" => $FuncionID ,
                                 "dinaup_empleado" => $Empleado ,
                                 "dinaup_usuario" => $Usuario ,
                                 "dinaup_ubicacion" => $Ubicacion ,
                                 "dinaup_listar_detalles"=>"1" ,
                                 "dinaup_listar_modominimo"=>"0" ,
                                 "dinaup_listar_pagina" => $Pagina ,
                                 "dinaup_listar_busqueda" => $Busqueda ,
                                 "dinaup_registro_detallesdecampos" => "1",
                                 "dinaup_listar_rrpp" => $ResultadosPorPagina ));
 
 
                                    
    $RespuestaInstancia = (new DinaupRespuestaInterna($respuesta));                                

    $Retornar = new DinaupRespuestaLista;
    $Retornar->Estado =$RespuestaInstancia->Estado;
    $Retornar->EstadoCodigo =$RespuestaInstancia->EstadoCodigo;
    $Retornar->EstadoDescripcion =$RespuestaInstancia->EstadoDescripcion;
    $Retornar->FuncionAPI =$RespuestaInstancia->FuncionAPI;
    $Retornar->Respuesta =$RespuestaInstancia->Respuesta;

    if ($RespuestaInstancia->Respuesta) {


        $Detalles =$RespuestaInstancia->Respuesta->detalles;
        $Retornar->PaginaActual = $Detalles->pagina;
        $Retornar->PaginasTotales = $Detalles->totalpaginas;
        $Retornar->ResultadosPorPagina = $Detalles->rpp;
        $Retornar->CantidadDeResultadosPaginaActual = $Detalles->cantidad;
        $Retornar->CantidadTotalDeResultados = $Detalles->totalresultados;
        $Retornar->Columnas =$RespuestaInstancia->Respuesta->columnas;
        $Retornar->Datos =$RespuestaInstancia->Respuesta->lista;
        $Retornar->DetallesCampos = $RespuestaInstancia->Respuesta->campos;


    }

    return $Retornar;



}
 



class DinaupRespuestaLista
{

    public $Estado;
    public $EstadoCodigo;
    public $EstadoDescripcion;
    public $FuncionAPI;
    public $Respuesta;

    public $PaginaActual;
    public $PaginasTotales;
    public $ResultadosPorPagina;
    public $CantidadTotalDeResultados;
    public $CantidadDeResultadosPaginaActual;

    public $Columnas;
    public $Datos;
    public $DetallesCampos;

}

?>