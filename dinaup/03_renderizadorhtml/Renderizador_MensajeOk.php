<?php


function Dinaup_Renderizador_CuadroOk($Titulo,$Descripcion,$Codigo){

    echo '<div class="dinaup_cuadro_ok"><div class="dinaup_cuadro_ok_titulo">'.htmlspecialchars($Titulo).' ('.htmlspecialchars($Codigo).')</div><div  class="dinaup_cuadro_ok_descripcion">'.($Descripcion).'</div></div>';

}
?>
