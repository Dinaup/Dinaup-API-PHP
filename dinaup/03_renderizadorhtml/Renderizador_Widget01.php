<?php


function Dinaup_Renderizador_Widget01(ContenidoC $Obj){




    


    $UrlListado = '/?tipo=lista&seccion='.htmlspecialchars($Obj->KeyWord);
    $UrlAgregar = '/?tipo=detalles&seccion='.htmlspecialchars($Obj->KeyWord);



    if ( $Obj->BotonAgregar == '1'){

        echo '<div class="dinaup_widget dinaup_widget_ancho1_alto_2" align="center">';
        echo '<div class="dinaup_widget01_ParteSuperior">';
        
        // Icono & Titulo
        echo '<a href="'.$UrlListado.'">';
        echo' <table width="85%"><tr>
        <td width="48px" ><img src="'.$Obj->Icono.'" width="48px" height="48px"/></td>
        <td class="dinaup_widget01_Titulo">&nbsp;&nbsp;'.htmlspecialchars($Obj->Titulo).'</td>
        </tr></table>';
        echo '</a>';

        echo '</div>';

        // Botón Agregar
        echo '<a href="'.$UrlAgregar.'"><div class="dinaup_widget01_Agregar">Agregar</div></a>';

        echo '</div>';

    }else{

        echo '<div class="dinaup_widget dinaup_widget_ancho1_alto_1" align="center">';
        echo '<div class="dinaup_widget01_ParteSuperior">';
        // Icono & Titulo
        echo '<a href="'.$UrlListado.'">';
        echo' <table width="85%"><tr>
        <td width="48px" ><img src="'.$Obj->Icono.'" width="48px" height="48px"/></td>
        <td class="dinaup_widget01_Titulo">&nbsp;&nbsp;'.htmlspecialchars($Obj->Titulo).'</td>
        </tr></table>';
        echo '</a>';
        echo '</div>';
        echo '</div>';

    }
} 

?>