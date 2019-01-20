<?php


function Dinaup_Renderizador_Formulario_Campo(DinaupRespuestaRegistro $Respuesta,CampoC $Campo,$Valor,$Registro,$TodosLosCampos,$ModoSimple,$NombreInput){

    
    $Campo_KeyWord = $Campo->KeyWord;
    $Multilinea = $Campo->Multilinea;
    $EsPorUbicacion = $Campo->EsPorUbicacion;
    $etiqueta = $Campo->Etiqueta;
    $formato = $Campo->Formato;
    $rol = $Campo->Rol;
    $obligatorio = $Campo->Obligatorio;
    $Decimales = $Campo->Decimales;
    $Editable = $Campo->Editable;
    $EsUTC = $Campo->EsUTC;
    $AceptaSegundos = $Campo->AceptaSegundos;
    $AceptaCeros = $Campo->AceptaCeros;
    $AceptaPositivos = $Campo->AceptaPositivos;
    $AceptaNegativos = $Campo->AceptaNegativos;
    $Predefinidos_Valores = $Campo->Predefinidos_Valores;
    $Predefinidos_Textos = $Campo->Predefinidos_Textos;
    $SoloPredefinidos = $Campo->SoloPredefinidos;
    $FuncionDesplegable = $Campo->FuncionDesplegable;
    $ValorCampoActual=$Valor;
    $NombreUbicacion = $Respuesta->Respuesta->ubicacion->nombre;    
 


    
    $EtiquetaHTML = htmlspecialchars($etiqueta);
    $HtmlExtra='';
    $ClasesExtras = '';
    
    

    if($obligatorio){ $EtiquetaHTML = $EtiquetaHTML.'<span style="color:red"> *</span>'; }
    if($EsPorUbicacion){ $EtiquetaHTML = $EtiquetaHTML.'&nbsp;<img src="/recursos/img/edu.svg" width="12px" height="12px" title="Este dato es relativo a la ubicación '.htmlspecialchars($NombreUbicacion).'">'; }
    if($formato != FormatoDeCampoE::SiNo){$ClasesExtras = 'dinaup_formularios_Control'; }


    $HTML_InicioContenedor='';
    $HTML_FinContenedor='';
    if(!$ModoSimple){
        $HTML_InicioContenedor = '<div class="dinaup_formularios_ContenedorControl"><label>'.$EtiquetaHTML.'<div style="min-height:10px"></div>';
        $HTML_FinContenedor = '</label></div>';
    }


    if($obligatorio == '1'){
        $HtmlExtra = $HtmlExtra.' required ';
        $ClasesExtras = $ClasesExtras.' dinaup_formularios_Control_Obligatorio ';
    }
    if($Editable == '0'){
        $HtmlExtra = $HtmlExtra.' readonly ';
        $ClasesExtras = $ClasesExtras.' dinaup_formularios_Control_Bloqueado ';
    }

    if( $Campo_KeyWord == 'id' ){
        echo ('<input type="hidden" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'">');
        return;
    }




    if($formato == FormatoDeCampoE::Guid){

        if(isset($TodosLosCampos->{substr($Campo_KeyWord, 0, -2)})){

            // El guid únicamente se muestra si existe texto 
            $Estilo = ($Editable == '0')? 'dinaup_control_desplegable_bloqueado' : 'dinaup_control_desplegable';
            echo $HTML_InicioContenedor;
            echo '<div class="'.htmlspecialchars($Estilo).' dinaup_formularios_Control"  id="'.htmlspecialchars($NombreInput).'__texto" data-cid="'.htmlspecialchars($NombreInput).'"  data-desplegableid="'.htmlspecialchars($FuncionDesplegable).'" data-desplegabletitulo="'.htmlspecialchars($etiqueta).'" data-desplegableseccion="'.Request('seccion').'">'.
            htmlspecialchars(($Registro->{substr($Campo_KeyWord, 0, -2)}?? '')).
            '</div>';



            echo $HTML_FinContenedor ;
        }

        echo ('<input type="hidden" name="'.htmlspecialchars($NombreInput).'" id="'.htmlspecialchars($NombreInput).'__valor"  value="'.htmlspecialchars($ValorCampoActual).'">');
        return;

    }







    $HtmlExtra = $HtmlExtra.' class="'.$ClasesExtras.'" ';

   

    if($formato == FormatoDeCampoE::SiNo){

        /*        CHECKBOX           */      
        if($ValorCampoActual=='1'){$HtmlExtra = $HtmlExtra.' checked ';}
        echo ('<div class=""><label>');
        echo ('<input type="checkbox" name="'.htmlspecialchars($NombreInput).'" '.  ($HtmlExtra) .'>');
        echo ($EtiquetaHTML);
        echo '</label></div>';


    } elseif ((isset($Predefinidos_Valores) && count($Predefinidos_Valores) > 0)){


        /*    MENU DESPLEGABLE      */
        echo $HTML_InicioContenedor;
        echo '<select name="'.htmlspecialchars($NombreInput).'" '.$HtmlExtra. '>';
        for ($i = 0; $i <=  count($Predefinidos_Valores) -1; $i++)  
        {
            $clave = $Predefinidos_Valores[$i];
            $valor = $Predefinidos_Textos[$i];
            if($clave=='0'){
                $valor='';
                if($AceptaCeros=='0'){
                    continue;
                }
            }
            $Seleccionado = ($clave == $ValorCampoActual)? ' selected ' : '';
            echo ' <option value="' .htmlspecialchars($clave) . '" '. $Seleccionado.'>' . htmlspecialchars($valor) .'</option>';
        }
        echo  '</select>' ;
        echo $HTML_FinContenedor ;



    } else {





       
        if( $formato == FormatoDeCampoE::Entero ||  $formato == FormatoDeCampoE::Doble) {
            if(!$AceptaPositivos){ $HtmlExtra = $HtmlExtra.( $AceptaCeros? 'max="0"' : 'max="-0.000001"'); }
            if(!$AceptaNegativos){ $HtmlExtra =  $HtmlExtra.($AceptaCeros? 'min="0"' : 'min="0.000001"'); }
        }


        /*    GENÉRICOS   */
        echo $HTML_InicioContenedor;
        switch (  $formato) {
            Case FormatoDeCampoE::Entero; echo '<input type="number" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'"  '. $HtmlExtra .' />'; break;
            Case FormatoDeCampoE::Doble; 
            
            if( $Decimales > 0 ){ $HtmlExtra = ($HtmlExtra.'step="0.'.str_pad('1',$Decimales,"0",STR_PAD_LEFT).'"'); }
            
            echo '<input type="number" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'"  '. $HtmlExtra .' />'; break;


            Case FormatoDeCampoE::FechaYHora;
            if($AceptaSegundos){$HtmlExtra =  $HtmlExtra.' step="1" ';}
            echo '<input type="datetime-local" name="'.htmlspecialchars($NombreInput).'" value="'.str_replace(' ', 'T',$ValorCampoActual).'"  '. $HtmlExtra .' />'; break;
            Case FormatoDeCampoE::Fecha; echo '<input type="date" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'"  '. $HtmlExtra .' />'; break;
            Case FormatoDeCampoE::Hora;
            
            if($AceptaSegundos){$HtmlExtra =  $HtmlExtra.' step="1" ';}
            echo '<input type="time" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'"  '. $HtmlExtra .' />'; break;

            Case FormatoDeCampoE::Guid; echo '<input type="text" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'"  '. $HtmlExtra .' />'; break;
            default: 
            

            if($Multilinea){
                echo '<textarea name="'.htmlspecialchars($NombreInput).'" cols="80" rows="8">'.htmlspecialchars($ValorCampoActual).'</textarea>';
            }else{
                echo '<input type="text" name="'.htmlspecialchars($NombreInput).'" value="'.htmlspecialchars($ValorCampoActual).'" '. $HtmlExtra .' />';   break;
            }
        }
        echo $HTML_FinContenedor ;


                           
    }



}


