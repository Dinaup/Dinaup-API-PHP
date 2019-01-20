<?php


 
function Dinaup_Renderizador_DesplegableHTML(DinaupRespuestaLista $Obj){

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
  

    echo '<div class="dinaup_listadesplegable_borde">';
    echo '<table class="dinaup_listadesplegable" id="dinaup_listadesplegable">';



    echo '<tr class="dinaup_listadesplegable_tr_header" >';
    for ($i = 0; $i <=  count($Columnas) -1; $i++) {
        if($Columnas[$i] <> 'id'){
               echo '<td class="dinaup_listadesplegable_td_header">&nbsp;&nbsp;'.htmlspecialchars($DetallesColumna[$i]->Etiqueta).'&nbsp;</td>';
        }

    }
    echo '</tr>';
        
    
        

    for ($FilaActual_I = 0; $FilaActual_I <=  count($Datos) -1; $FilaActual_I++) {


        $FilaActual_Par = ($FilaActual_I%2==0) ?  "par" : "impar";
        $FilaActual_URL = ModificarURL(array('tipo' => 'detalles', 'id' => $Datos[$FilaActual_I]->id));
        $FilaEtiqueta = '';

        if(isset($Datos[$FilaActual_I]->nombre)){
            $FilaEtiqueta=$Datos[$FilaActual_I]->nombre;
        }else if(isset( $Datos[$FilaActual_I]->textoprincipal)){
            $FilaEtiqueta=$Datos[$FilaActual_I]->textoprincipal;
        }

         

        $Data_ID = htmlspecialchars($Datos[$FilaActual_I]->id);
        $Data_Etiqueta = htmlspecialchars($FilaEtiqueta);
        $Data_Class = 'dinaup_listadesplegable_tr_item dinaup_listadesplegable_tr_item_'.$FilaActual_Par.' '.(($FilaActual_I==0)? 'desplegablefilaseleccionada' : '');
        


        echo '<tr data-filaid="'.$Data_ID.'" data-filaetiqueta="'.$Data_Etiqueta.'"  class="'.$Data_Class.'" >';
        for ($i = 0; $i <=  count($Columnas) -1; $i++) {
        if($Columnas[$i] <> 'id'){


            $ValorActualLegible = $Datos[$FilaActual_I]->{$Columnas[$i]};
            if($DetallesColumna[$i]->EsUTC){
                $ValorActualLegible = $Solicitud->ConvertirFechaYHoraALocal($ValorActualLegible);
            }
            
            if($FilaEtiqueta == ''){ $FilaEtiqueta = $ValorActualLegible;}

            echo '<td class="dinaup_listadesplegable_td_item dinaup_listadesplegable_td_item_'.$FilaActual_Par.'">&nbsp;&nbsp;'.htmlspecialchars($ValorActualLegible).'&nbsp;&nbsp;</td>';
        }

    }


    echo '</tr>';
    }

    
    
    echo '</table>';
    echo '</div>';
        



}

 


?>