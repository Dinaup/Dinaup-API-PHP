<!DOCTYPE html>
<html lang="es">
<head>
<title>Dinaup - Área de Ejemplo</title>


<!-- ********************************************************************** -->
<!--                                                                        -->
<!--     _____  __                                                          -->
<!--    |     \|__|-----.---.-.--.--.-----.      .----.-----.--------.      -->
<!--    |  --  |  |     |  _  |  |  |  _  |  __  |  __|  _  |        |      -->
<!--    |_____/|__|__|__|___._|_____|   __| |__| |____|_____|__|__|__|      -->
<!--                                |__|                                    -->
<!--                                                                        -->
<!--                    Software dinámico a su medida.                      -->
<!--                                                                        -->
<!--                  Bienvenido al Área API de ejemplo .                   -->
<!--                                                                        -->
<!--                                                                        -->
<!-- ********************************************************************** -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Metas de Formato -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />

<!-- Metas de Cache Control -->
<meta Http-Equiv="Cache-Control" Content="no-cache">
<meta Http-Equiv="Pragma" Content="no-cache">
<meta Http-Equiv="Expires" Content="0">
<meta Http-Equiv="Pragma-directive: no-cache">
<meta Http-Equiv="Cache-directive: no-cache">

<!-- Recursos -->
<script type="text/javascript" src="/recursos/jquery.js"></script>
					
<?php require_once('recursos/css.php'); ?>
<?php require_once('recursos/javascript.php'); ?>



<?php

    $Paginas = DinaupCFG::Paginas();
    $Paginas_Actual = Request("seccion");
?>

<!-- Cuerpo -->
<body>
<div class="dinaup_contenido">



<!-- ----------------------------------------- -->
<!--                CABECERA                  -->
<!-- ----------------------------------------- -->
<div class="dinaup_cabecera">
    <a href="/" ><img src="/dinaup/img/logodinaup.svg" width="300px" height="74px"></a>
</div> 




<!-- ----------------------------------------- -->
<!--                CONTENIDO                  -->
<!-- ----------------------------------------- -->

<div align="center" class="dinaup_dashboard">
<?php

    if($Paginas_Actual ==''){


        //   -----  Modo DashBoard ------
        for ($i = 0; $i <=  count($Paginas) -1; $i++) {
        
            Dinaup_Renderizador_Widget01($Paginas[$i]);
         
        }
        
        
    }else{

        //   -----  Carga de página   ------
        for ($i = 0; $i <=  count($Paginas) -1; $i++) {
            if($Paginas[$i]->KeyWord == $Paginas_Actual){

                require_once($Paginas[$i]->Archivo);
                break;

            }
        }

    }

?>
</div>






<!-- ----------------------------------------- -->
<!--                 SELECTOR                  -->
<!-- ----------------------------------------- -->
<div id="dinaup_selector" style="display:none" class="dinaup_selector" align="center">
<div style="min-height:40px"></div>
<div id="dinaup_selector_Titulo" class="dinaup_selector_titulo"></div>
<input type="text" placeholder="🔍 Buscar..." id="busqueda" name="busqueda" class="dinaup_selector_CasillaDeBusqueda">
<input type="hidden" name="desplegableid" id="desplegableid">
<input type="hidden" name="pagina" id="pagina">
<div id="dinaup_selector_resultado">
</div>
<input type="submit" value="Cancelar" onclick="Dinaup_Selector_Cerrar()">
</div>
 

<!-- ----------------------------------------- -->
<!--                   PIE                     -->
<!-- ----------------------------------------- -->
<div class="dinaup_pieespacio"></div>
</div>
<div class="dinaup_pie"><br/>Dinaup, todos los derechos reservados.<br />
<b>Zona Horaria: </b><?php echo $_SESSION['s']->Usuario_ZonaHorariaNombre; ?>
</div>



</body></html>