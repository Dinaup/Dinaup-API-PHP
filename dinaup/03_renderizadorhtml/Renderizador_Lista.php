<?php


 
function Dinaup_Renderizador_ListaHTML(DinaupRespuestaLista $Obj){

    if($Obj->EstadoCodigo != '0'){
        Dinaup_Renderizador_CuadroError($Obj->Estado ,$Obj->EstadoDescripcion,$Obj->EstadoCodigo);
        return;
    }
     


    /** @var SolicitudC $Solicitud */
    $Solicitud = $_SESSION['s']; 
    

    $Estado = $Obj->Estado;
    $EstadoCodigo = $Obj->EstadoCodigo;
    $EstadoDescripcion = $Obj->EstadoDescripcion;
    $FuncionAPI = $Obj->FuncionAPI;
    $Respuesta = $Obj->Respuesta;

    $PaginaActual = $Obj->PaginaActual;
    $PaginasTotales = $Obj->PaginasTotales;
    $ResultadosPorPagina = $Obj->ResultadosPorPagina;
    $CantidadTotalDeResultados = $Obj->CantidadTotalDeResultados;
    $CantidadDeResultadosPaginaActual = $Obj->CantidadDeResultadosPaginaActual;

    $Columnas = $Obj->Columnas;
    $Datos = $Obj->Datos;


    $DetallesColumna = array();
    for ($i = 0; $i <=  count($Columnas) -1; $i++) {
        $DetallesColumna[] = new CampoC( $Obj->DetallesCampos->{$Columnas[$i]},$Columnas[$i]);
    }
  

    echo '<div class="dinaup_lista_borde">';
    echo '<table class="dinaup_lista">';



    echo '<tr class="dinaup_lista_tr_header">';
    for ($i = 0; $i <=  count($Columnas) -1; $i++) {
        if($Columnas[$i] <> 'id'){
               echo '<td class="dinaup_lista_td_header">&nbsp;&nbsp;'.htmlspecialchars($DetallesColumna[$i]->Etiqueta).'&nbsp;</td>';
        }

    }
    echo '</tr>';
        
        

    for ($FilaActual_I = 0; $FilaActual_I <=  count( $Datos) -1; $FilaActual_I++) {


        $FilaActual_Par = ($FilaActual_I%2==0) ?  "par" : "impar";
        $FilaActual_URL = ModificarURL(array('tipo' => 'detalles', 'id' => $Datos[$FilaActual_I]->id));

        echo '<tr class="dinaup_lista_tr_item dinaup_lista_tr_item_'.$FilaActual_Par.'"  onclick="window.location.href=\''.$FilaActual_URL.'\';">';
        for ($i = 0; $i <=  count($Columnas) -1; $i++) {
        if($Columnas[$i] <> 'id'){

            $ValorActualLegible = $Datos[$FilaActual_I]->{$Columnas[$i]};
            if($DetallesColumna[$i]->EsUTC){
                $ValorActualLegible = $Solicitud->ConvertirFechaYHoraALocal($ValorActualLegible);
            }
            echo '<td class="dinaup_lista_td_item dinaup_lista_td_item_'.$FilaActual_Par.'">&nbsp;&nbsp;'.htmlspecialchars($ValorActualLegible).'&nbsp;&nbsp;</td>';
        }

    }


    echo '</tr>';
    }

    
    
    echo '</table>';
    echo '</div>';
        



}

 


?>