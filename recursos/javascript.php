<script type="text/javascript">

/************************************************************/
/*****************    Dinaup - Selector     ****************/
/***********************************************************/
var busqueda_timer;
var busqueda_valoranterior;
var busqueda_control;

function Dinaup_Selector_Cerrar(){
    $("#dinaup_selector").fadeOut(100);
}

function Dinaup_Selector_Mostrar(Titulo,FuncionID,Pagina,ControlX){

    $("#desplegableid").val(FuncionID);
    $("#pagina").val(Pagina);
    $("#busqueda").val('');
    $("#dinaup_selector").fadeIn(100);
    $("#dinaup_selector_resultado").html('');
    busqueda_valoranterior='';
    DesplegableControlActual=0;
    busqueda_control =ControlX;
    Dinaup_Selector_Buscar('');
    $("#busqueda").focus();
}

function Dinaup_Selector_Buscar($Contenido){
    
    $html_prelader = '<div class="dinaup_selector_Preloader"><img src="/recursos/img/preloader_blanco.gif" widh="30px" height="30px" /><br>Cargando...</div>';
    $("#dinaup_selector_resultado").html($html_prelader);

    var request = $.ajax({
                        url: "ajax.php",
                        method: "POST",
                        data: {
                                busqueda : $("#busqueda").val(),
                                tipo : 'desplegable',
                                seccion: $("#pagina").val() ,
                                desp: $("#desplegableid").val() 
                            },
                        dataType: "html"});




    request.done(function( msg ) { 

        $("#dinaup_selector_resultado").html(msg); 
        Desplegable_Bajar_Fila();
        $(".dinaup_listadesplegable_tr_item").click(function(){Desplegable_Seleccionar_Fila();})
        $(".dinaup_listadesplegable_tr_item").mouseenter(function(){Desplegable_Resaltar_Fila(this);})

        });

    request.fail(function( jqXHR, textStatus ) { alert( "Request failed: " + textStatus );   });


}








var DesplegableIFila = 0;
var DesplegableControlActual;

function Desplegable_FilaActual(){
    return  $('.desplegablefilaseleccionada').index();
}

function Desplegable_Resaltar_Fila(fila){

    $("tr").removeClass("desplegablefilaseleccionada");
    $(fila).addClass('desplegablefilaseleccionada');  

}

function Desplegable_Subir_Fila(){
    
    
    if( Desplegable_FilaActual() > 1 ){ 
        var tabladesplegable = document.getElementById('dinaup_listadesplegable');
        Desplegable_Resaltar_Fila($(tabladesplegable.rows[ Desplegable_FilaActual() -1]));
    }
    
}

function Desplegable_Bajar_Fila(){
    
    var tabladesplegable = document.getElementById('dinaup_listadesplegable');
    
    if( Desplegable_FilaActual()  < tabladesplegable.rows.length ){
        Desplegable_Resaltar_Fila($(tabladesplegable.rows[Desplegable_FilaActual() + 1]));
    }

}


function Desplegable_Seleccionar_Fila(){
    
    $FilaID =$(".desplegablefilaseleccionada").data('filaid');
    $FilaEtiqueta =$(".desplegablefilaseleccionada").data('filaetiqueta');
     $("#" + busqueda_control + "__valor").val($FilaID);
     $("#" + busqueda_control + "__texto").html($FilaEtiqueta);;
     $("#" + busqueda_control + "__texto").attr('title',$FilaEtiqueta);;
    Dinaup_Selector_Cerrar();

}



// EVENTOS 
$(document).keyup(function(e) {
        
        if (e.keyCode == 38) {
            Desplegable_Subir_Fila();
            
        }else if(e.keyCode == 40) {
            
            Desplegable_Bajar_Fila();

        }else if(e.keyCode == 13) {

            Desplegable_Seleccionar_Fila()
            Dinaup_Selector_Cerrar();

        }else if(e.key === "Escape") { 
            
            Dinaup_Selector_Cerrar();

        }
    
    });


function Dinaup_Evento_BusquedaCambiada(value){
    if (busqueda_valoranterior != value) {
        busqueda_valoranterior = value;
        clearTimeout(busqueda_timer);
        busqueda_timer = setTimeout(function() {Dinaup_Selector_Buscar(value);}, 500);
    };
}



$(function(){
        
        $("#busqueda").on("input", function(e) {Dinaup_Evento_BusquedaCambiada($(this).val())});
        
        $( ".dinaup_control_desplegable" ).click(function() {

            var Titulo = $(this).data('desplegabletitulo');
            var DesplegableID = $(this).data('desplegableid');
            var DesplegableSeccion = $(this).data('desplegableseccion');
            var CampoID = $(this).data('cid');
            Dinaup_Selector_Mostrar(Titulo,DesplegableID,DesplegableSeccion,CampoID);   

        });



})




</script>