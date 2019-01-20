
<style type="text/css">



<?php

 
 $AltoPie = 100;

?>

*{font-family: 'Roboto','Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 12px}
td,tr,table {padding:0px;margin:0px;  border-spacing: 0px;}
body{background: #bdc3c7; margin: 0px; padding: 0px }
a {text-decoration:none}




/*    Estructura     */
.dinaup_contenido {min-height: 100vh}
.dinaup_cabecera{background:#ecf0f1;padding: 10px;border-bottom: 2px solid  #7f8c8d }
.dinaup_pieespacio{min-height:<?php echo $AltoPie; ?>px;height:<?php echo $AltoPie; ?>px}
.dinaup_pie{background: #2c3e50; color:#ffffff; height: <?php echo $AltoPie; ?>px; margin-top: -<?php echo $AltoPie; ?>px; text-align: center}


.dinaup_dashboard{margin:auto; padding:0; list-style-type:none;   width:100%;max-width:700px ;   }




/* */ 
.dinaup_menu{background-color:; min-height: 5px}

/*    LISTA     */
.dinaup_lista{ background-color: #ecf0f1; border:3px solid  #34495e}
.dinaup_lista_tr_header{}
.dinaup_lista_td_header{border-bottom: 2px solid #2c3e50; background-color: #34495e; color:  #ffffff}
.dinaup_lista_tr_item{}
.dinaup_lista_tr_item_par{}
.dinaup_lista_tr_item_impar{}
.dinaup_lista_td_item{}
.dinaup_lista_tr_item:hover{background-color: #3498db !important;cursor: pointer;color:#ffffff}
.dinaup_lista_tr_item_par{ background-color: #ecf0f1}
.dinaup_lista_tr_item_impar{ background-color: #e1e7ed}



/*    LISTA DESPLEGABLE     */
.dinaup_listadesplegable{ background-color: #ecf0f1; border:3px solid  #34495e}
.dinaup_listadesplegable_tr_header{}
.dinaup_listadesplegable_td_header{border-bottom: 2px solid #2c3e50; background-color: #34495e; color:  #ffffff}
.dinaup_listadesplegable_tr_item{}
.dinaup_listadesplegable_tr_item_par{}
.dinaup_listadesplegable_tr_item_impar{}
.dinaup_listadesplegable_td_item{}
.dinaup_listadesplegable_tr_item:hover{ }
.dinaup_listadesplegable_tr_item_par{ background-color: #ecf0f1}
.dinaup_listadesplegable_tr_item_impar{ background-color: #e1e7ed}

.desplegablefilaseleccionada td{ background-color: #3498db !important;cursor: pointer;color:#ffffff}


/*    LISTA EDITABLE     */
.dinaup_listaeditable{ background-color: #ecf0f1; border:3px solid  #34495e}
.dinaup_listaeditable_tr_header{}
.dinaup_listaeditable_td_header{border-bottom: 2px solid #2c3e50; background-color: #34495e; color:  #ffffff}
.dinaup_listaeditable_tr_item{}
.dinaup_listaeditable_tr_item_par{}
.dinaup_listaeditable_tr_item_impar{}
.dinaup_listaeditable_td_item{padding:4px}
.dinaup_listaeditable_tr_item:hover{ }
.dinaup_listaeditable_tr_item_par{ background-color: #ecf0f1}
.dinaup_listaeditable_tr_item_impar{ background-color: #e1e7ed}




/* Widgets */
    .dinaup_widget { float:left; position:relative;background: #ecf0f1;border-radius: 2px; display: inline-block; margin: 7px; position: relative; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);}
    .dinaup_widget_ancho1_alto_2{ width:200px;height:200px;min-width:200px;min-height:200px}
    .dinaup_widget_ancho1_alto_1{ width:200px;height:93px;min-width:200px;min-height:93px}

/* WidgetPrincipal */
    .dinaup_widget01_ParteSuperior{transition: all 0.3s cubic-bezier(.25,.8,.25,1);padding-top:10px;padding-bottom:10px;cursor: pointer;  }
    .dinaup_widget01_ParteSuperior:hover {box-shadow: 0 6px 6px rgba(255,255,255,0.35), 0 6px 6px rgba(255,255,255,0.30);background:#F6FAFB}
    .dinaup_widget01_Titulo{font-family:'Roboto light','Segoe UI light',  'Roboto','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;    color: #5472a3; font-size:18px}
    .dinaup_widget01_Agregar{margin-top:20px;transition: all 0.3s cubic-bezier(.25,.8,.25,1);background:#2ecc71; display:inline-block; border-radius:20px;padding:4px;cursor: pointer; padding:  4px 10px 4px 10px}
    .dinaup_widget01_Agregar:hover {box-shadow: 0 6px 6px rgba(0,0,0,0.25), 0 6px 6px rgba(0,0,0,0.22);}

    .dinaup_titulopagina_cont{  height:60px; width:100%; max-width:600px ;background: #ecf0f1;border-radius: 2px; display: inline-block;   margin: 7px; position: relative; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);}
    .dinaup_titulopagina_cont table{ height:50px; width:100%;  }
    .dinaup_titulopagina_titulo{font-family:'Roboto ','Segoe UI ',  'Roboto','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;     ; font-size:18px}
    .dinaup_titulopagina_subtitulo{color: #666666; }
    .dinaup_titulopagina_icono{width:40px;height:40px;margin:10px}


/* Detalles  */
    .dinaup_formulario_detalles{width:100%; max-width:600px ;background: #ecf0f1;border-radius: 2px; display: inline-block;   margin: 7px; position: relative; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);}
    .dinaup_formularios_ContenedorControl{ margin-top:10px }
    .dinaup_formularios_Control{  width:90%; border-radius:6px; border: none; font-size:11px;padding:4px; background:#ffffff}
    .dinaup_formularios_Control_Bloqueado{ background:#e2e6e7 ;color:#647c82}
    .dinaup_formularios_Control_Obligatorio{   }
    .dinaup_formularios_GuardarCambios{ padding: 7px 20px 7px  20px  ;font-size: 14px  ;background: #2c3e50;font-weight: bold;color: #ffffff;border-radius: 100px;-moz-border-radius: 100px;-webkit-border-radius: 100px;border: 1px solid #ffffff;cursor: pointer; }

    .dinaup_formularios_Control{border:1px solid #9f9f9f;}
    .dinaup_formularios_Control:hover{ border:1px solid #222222; }

    /* Controles */
    .dinaup_control_desplegable{box-sizing:border-box;padding: 4px 20px 4px 4px; background: url('/recursos/img/desplegablefecha.png');background-color: #ffffff;background-repeat: no-repeat; background-position: center right; white-space: nowrap;overflow: hidden;text-overflow:ellipsis;width:120px; height:23px;font-size:10px;border-radius:4px}
    .dinaup_control_desplegable:hover{cursor:pointer;}

    .dinaup_control_desplegable_bloqueado{ background: url('/recursos/img/desplegablefecha.png');background-color: #cccccc;background-repeat: no-repeat; background-position: center right;    white-space: nowrap;overflow: hidden;text-overflow:ellipsis;width:120px;padding:4px;height:12px;font-size:10px;border-radius:4px}
    .dinaup_control_desplegable_bloqueado:hover{cursor:pointer;}




/* Cuadro de error */
    .dinaup_cuadro_error{display:inline-block;width:400px;margin:auto;border:1px solid #ffaaaa;background:#fff2f2;border-radius:10px;padding:10px}
    .dinaup_cuadro_error_titulo{font-weight:bold;text-align:left}
    .dinaup_cuadro_error_descripcion{text-align:left}

/* Cuadro de Ok */
    .dinaup_cuadro_ok{display:inline-block;width:400px;margin:auto;border:1px solid #dfff99;background:#f5fce5;border-radius:10px;padding:10px}
    .dinaup_cuadro_ok_titulo{font-weight:bold;text-align:left}
    .dinaup_cuadro_ok_descripcion{text-align:left}


/* Selector */
    .dinaup_selector{ width:100%;height:100%; position:absolute;top:0px;left:0px;background:rgba(0, 0, 0, 0.8); }
    .dinaup_selector_Titulo{ color:white; font-size:16px}
    .dinaup_selector_Preloader{color: #ffffff;padding:15px; background:rgba(0, 0, 0, 0.3);border-radius:100%; display: inline-block; margin:20px}
    .dinaup_selector_CasillaDeBusqueda{ width:800%; max-width:400px; font-size:15px;padding:5px; border:none; border-radius:5px}



</style>