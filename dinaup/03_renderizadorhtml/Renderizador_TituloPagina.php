<?php


function Dinaup_Renderizador_TituloPagina($IconoURL,$Titulo,$SubTitulo){


    echo '<div class="dinaup_titulopagina_cont">';
    echo '<table><td width="1px"><img src="'.htmlspecialchars($IconoURL).'" class="dinaup_titulopagina_icono"></td><td><span class="dinaup_titulopagina_titulo"> '.htmlspecialchars($Titulo).'</span><br><span class="dinaup_titulopagina_subtitulo">'.htmlspecialchars($SubTitulo).'</span></td></table>';
    echo '</div>';


 
}





?>