<?php


function Dinaup_Renderizador_Detalles(DinaupRespuestaRegistro $Respuesta, $Editable ){


    

    if($Respuesta->EstadoCodigo != '0'){
        Dinaup_Renderizador_CuadroError($Respuesta->Estado ,$Respuesta->EstadoDescripcion,$Respuesta->EstadoCodigo);
        return;
    }
    
 
    /** @var SolicitudC $Solicitud */
    $Solicitud = $_SESSION['s'];
    

    echo '<form action="#" method="post"><div class="dinaup_formulario_detalles">';

    $Registro = $Respuesta->Respuesta->registro;
    $Campos = $Respuesta->Respuesta->campos;
    
    
    Dinaup_Renderizador_Detalles_Listador( $Respuesta,$Registro, $Campos, $Solicitud, $Editable);



    if(isset( $Respuesta->Respuesta->listado)){
        Dinaup_Renderizador_Detalles_lista($Respuesta,$Respuesta->Respuesta->listado->lista,$Respuesta->Respuesta->listado->campos,$Solicitud, $Editable);
    }

    echo '<input type="hidden" name="guardar" value="1">';
    if($Editable){echo '<input type="submit" value="Guardar" class="dinaup_formularios_GuardarCambios"/>';}

    echo '<div style="min-height:20px"></div>';
    echo '</div></form>';

 


}


function Dinaup_Renderizador_Detalles_Listador(DinaupRespuestaRegistro $Respuesta,$Registro, $Campos,SolicitudC $Solicitud, $Editable){


    echo '<div style="padding:20px" align="left">';



 
    foreach ($CamposDetalles = $Campos  as $clave=>$valor)
    {

        $CampoActual = new CampoC($valor,$clave);
        $ValorActual = $Registro ->{$clave};
        if(!$Editable){ $CampoActual->Editable=false;}
        if($CampoActual->EsUTC){  $ValorActual = $Solicitud->ConvertirFechaYHoraALocal($ValorActual);   }
        if(isset($Registro->{$clave.'id'})){ continue;}


        Dinaup_Renderizador_Formulario_Campo( $Respuesta,$CampoActual,$ValorActual,$Registro,$Campos,false,$clave);



    }   




    echo '</div>';

}

function Dinaup_Renderizador_Detalles_Lista(DinaupRespuestaRegistro $Respuesta,$Datos, $Campos,SolicitudC $Solicitud, $Editable){


    echo '<div class="dinaup_listaeditable_borde">';
    echo '<table class="dinaup_listaeditable">';


    // CABECERA 
    echo '<tr class="dinaup_listaeditable_tr_header">';
    foreach ($CamposDetalles = $Campos  as $clave=>$valor)
    {
        if(isset($Campos->{$clave.'id'})){ continue;}
        $CampoActual = new CampoC($valor,$clave);
        echo '<td class="dinaup_listaeditable_td_header">&nbsp;&nbsp;'.htmlspecialchars($CampoActual->Etiqueta).'&nbsp;</td>';
    }
    echo '</tr>';
        

    $ContadorDeFilas=0;
        
    // FILAS 
    for ($FilaActual_I = 0; $FilaActual_I <=  count( $Datos) -1; $FilaActual_I++) {
        
        $ContadorDeFilas++;

        $Registro = $Datos[$FilaActual_I];
        $FilaActual_Par = ($FilaActual_I%2==0) ?  "par" : "impar";
        $FilaActual_URL = ModificarURL(array('tipo' => 'detalles', 'id' => $Registro->id));

        echo '<tr class="dinaup_listaeditable_tr_item dinaup_listaeditable_tr_item_'.$FilaActual_Par.'">';
       
       
        foreach ($CamposDetalles = $Campos as $clave=>$valor)
        {
            if(isset($Campos->{$clave.'id'})){ continue;}



            $CampoActual = new CampoC($valor,$clave);
            if(!$Editable){ $CampoActual->Editable=false;}

            $ValorActualLegible = $Registro->{$clave};
            if($CampoActual->EsUTC){$ValorActualLegible = $Solicitud->ConvertirFechaYHoraALocal($ValorActualLegible);}


            if($clave == 'id'){
                echo '<td class="dinaup_listaeditable_td_item dinaup_listaeditable_td_item_'.$FilaActual_Par.'" valign="center">';
                echo ($ContadorDeFilas);
                Dinaup_Renderizador_Formulario_Campo($Respuesta,$CampoActual,$ValorActualLegible,$Registro,$Campos,true,$clave.'_'.$ContadorDeFilas);
                echo '</td>';
            }else{
                echo '<td class="dinaup_listaeditable_td_item dinaup_listaeditable_td_item_'.$FilaActual_Par.'" valign="center">';
                Dinaup_Renderizador_Formulario_Campo($Respuesta,$CampoActual,$ValorActualLegible,$Registro,$Campos,true,$clave.'_'.$ContadorDeFilas);
                echo '</td>';
            }
            
        }
        echo '</tr>';
 
    }


    if($Editable){
        // FILA NUEVA 
        for ($i = 0; $i <=  8; $i++) {

            $ContadorDeFilas++;
            $FilaActual_Par = ($i%2==0) ?  "par" : "impar";

            foreach ($CamposDetalles = $Campos as $clave=>$valor)
            {
                if(isset($Campos->{$clave.'id'})){ continue;}

                $CampoActual = new CampoC($valor,$clave);
                if($clave == 'id'){
                    echo '<td class="dinaup_listaeditable_td_item dinaup_listaeditable_td_item_'.$FilaActual_Par.'" valign="center">';
                    echo ($ContadorDeFilas);
                    Dinaup_Renderizador_Formulario_Campo($Respuesta,$CampoActual,'',null,$Campos,true,$clave.'_'.$ContadorDeFilas.'');
                    echo '</td>';
                }else{
                    echo '<td class="dinaup_listaeditable_td_item dinaup_listaeditable_td_item_'.$FilaActual_Par.'" valign="center">';
                    Dinaup_Renderizador_Formulario_Campo($Respuesta,$CampoActual,'',null,$Campos,true,$clave.'_'.$ContadorDeFilas.'');
                    echo '</td>';
                }
                
            }
            
            echo '</tr>';

        }
    }


    echo '</table>';
    echo '</div>';
        





}





?>