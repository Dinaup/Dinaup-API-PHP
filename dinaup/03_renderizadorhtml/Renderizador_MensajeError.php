<?php


function Dinaup_Renderizador_CuadroError($Titulo,$Descripcion,$Codigo){

    echo '<div class="dinaup_cuadro_error"><div class="dinaup_cuadro_error_titulo">'.htmlspecialchars($Titulo).' ('.htmlspecialchars($Codigo).')</div><div  class="dinaup_cuadro_error_descripcion">'.htmlspecialchars($Descripcion).'</div></div>';

}
?>
