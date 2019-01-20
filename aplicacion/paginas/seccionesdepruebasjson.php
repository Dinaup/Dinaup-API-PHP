<?php

    /** @var SolicitudC $Solicitud */
   

    // API´s  
    $FuncionAPI_ListaID     = '5e9457dd-cb42-4a60-adc0-4f1f39de40e9';
    $FuncionAPI_DetalleID   = 'f67edac5-c27d-4331-ac2a-50ef86a17e40';
    $FuncionAPI_AgregarID   = 'f67edac5-c27d-4331-ac2a-50ef86a17e40';
    $FuncionAPI_EditarID    = 'f67edac5-c27d-4331-ac2a-50ef86a17e40';

    // Sesión  
    $Solicitud  = $_SESSION['s']; 
    $Ubicacion  = ''; 
    $Empleado   = '';  
    $Usuario    = $Solicitud->Usuario_ID;  

    // VISUAL  
    $Icono_Cabecera_Lista     = '/aplicacion/iconos/seccionesdepruebasjson.png';
    $Icono_Cabecera_Detalles  = '/aplicacion/iconos/seccionesdepruebasjson.png';
    $Etiqueta_Singular        = 'Sección de prueba JSON';
    $Etiqueta_Plural          = 'Secciones de pruebas JSON';

    // SEGURIDAD  
    $DesplegablesAutorizados  = array('9b4dc0b0-4789-43dd-9653-9cfafb8f13f0');
    $Permisos_Listar          = new TipoDeUsuarioC();
    $Permisos_Ver             = new TipoDeUsuarioC();
    $Permisos_Editar          = new TipoDeUsuarioC();
    $Permisos_Agregar         = new TipoDeUsuarioC();
    
    //   ▪️ Visitante 
    $Permisos_Listar->Visitante  = false;
    $Permisos_Ver->Visitante     = false;
    $Permisos_Editar->Visitante  = false;
    $Permisos_Agregar->Visitante = false;
    
    //   ▪️ Entidad 
    $Permisos_Listar->Entidad    = false;
    $Permisos_Ver->Entidad       = false;
    $Permisos_Editar->Entidad    = false;
    $Permisos_Agregar->Entidad   = false;
    
    //   ▪️ Empleado 
    $Permisos_Listar->Empleado   = true;
    $Permisos_Ver->Empleado      = true;
    $Permisos_Editar->Empleado   = true;
    $Permisos_Agregar->Empleado  = true;

    // PARÁMETROS  
    $Contenido_Tipo                 = Request('tipo');
    $Contenido_DesplegableID        = Request('desp');
    $Contenido_Pagina               = Request_Int('pagina',1);
    $Contenido_ResultadosPorPagina  = 200;
    $Contenido_Busqueda             = Request('busqueda');


 




    if($Contenido_Tipo == 'lista'){

         ///   ---------------------------    LISTADO     ---------------------------  

            $PuedeListar = ComprobarPermiso($Solicitud,$Permisos_Listar);
            if(!$PuedeListar){

                Dinaup_Renderizador_CuadroError('No disponible.','El acceso a este listado está restringido.','');

            }else{

                $Datos_lista = Dinaup_ConsultarListado($FuncionAPI_ListaID, $Contenido_Pagina, $Contenido_ResultadosPorPagina, $Ubicacion, $Empleado, $Usuario,$Contenido_Busqueda);
                Dinaup_Renderizador_TituloPagina($Icono_Cabecera_Lista,$Etiqueta_Plural ,'Listado');
                Dinaup_Renderizador_ListaHTML($Datos_lista);

            }

        /// .......................................................................................


    }elseif($Contenido_Tipo == 'desplegable'){


         ///   ---------------------------    DESPLEGABLE      ---------------------------  
         $Contenido_ResultadosPorPagina  = 100;

            $PuedeDesplegar = ComprobarPermiso($Solicitud,$Permisos_Listar);

            if (!in_array($Contenido_DesplegableID, $DesplegablesAutorizados)) {

                Dinaup_Renderizador_CuadroError('No disponible.','El listado al que intenta acceder no está disponible en este contexto.','');

            }elseif($Contenido_DesplegableID == ''){

                Dinaup_Renderizador_CuadroError('No disponible.','No se ha detectado el listado al que desea acceder.','');

            }elseif(!$PuedeDesplegar){

                Dinaup_Renderizador_CuadroError('No disponible.','El acceso a este listado está restringido.','');
            
            }else{

                $Datos_lista = Dinaup_ConsultarListado($Contenido_DesplegableID, $Contenido_Pagina, $Contenido_ResultadosPorPagina, $Ubicacion, $Empleado, $Usuario,$Contenido_Busqueda);
                Dinaup_Renderizador_DesplegableHTML( $Datos_lista );

            }

       /// .......................................................................................


    }elseif($Contenido_Tipo=='detalles'){




        $PuedeVer               = ($FuncionAPI_DetalleID != '' && ComprobarPermiso($Solicitud, $Permisos_Ver));
        $PuedeEditar            = ($FuncionAPI_EditarID != '' && ComprobarPermiso($Solicitud, $Permisos_Editar));
        $PuedeAgregar           = ($FuncionAPI_AgregarID != '' && ComprobarPermiso($Solicitud, $Permisos_Agregar));
        $ContenidoEditable      = (( Request('id') == '' && $PuedeAgregar ) || ( Request('id') != '' && $PuedeEditar));



        if( !$PuedeAgregar && Request('id') == ''){
           
            Dinaup_Renderizador_CuadroError('No disponible.','El acceso a este formulario está restringido.','');
            return;
       
        }elseif( !$PuedeVer && Request('id') != ''){
          
            Dinaup_Renderizador_CuadroError('No disponible.','El acceso a este formulario está restringido.','');
            return;
       
        }


        
    
         ///   ---------------------------    DETALLES    ---------------------------  

            $Datos_Detalles = Dinaup_ConsultarDetalles($FuncionAPI_DetalleID, $Ubicacion, $Empleado, $Usuario, 'id', Request('id'));
            $Titulo = $Etiqueta_Singular;
            $SubTitulo = $Etiqueta_Singular;

            if(isset($Datos_Detalles->Respuesta->registro->nombre)){
                $Titulo = $Datos_Detalles->Respuesta->registro->nombre;
                $SubTitulo = $Etiqueta_Singular;
            }

            Dinaup_Renderizador_TituloPagina($Icono_Cabecera_Detalles ,$Titulo,$SubTitulo);

            $MostrarFormulario = true;

            if(Request('guardar')=='1'){
                

                /// 💾  GUARDAR  
                $ID = Request('id');
                $FuncionAPIGuardaID = ( $ID == '')? $FuncionAPI_AgregarID : $FuncionAPI_EditarID ; 
                $PuedeGuardar = ($ID == '')? $PuedeAgregar : $PuedeEditar ;

                if(!$PuedeGuardar){

                    Dinaup_Renderizador_CuadroError('No disponible.','No tiene permisos para realizar esta acción.','');

                }else{
                    
                    $RespuestaGuardar =  Dinaup_GuardarCambios($FuncionAPIGuardaID,$Ubicacion, $Empleado, $Usuario,'id',Request('id'));

                    if($RespuestaGuardar->EstadoCodigo != '0'){

                        Dinaup_Renderizador_CuadroError($RespuestaGuardar->Estado ,$RespuestaGuardar->EstadoDescripcion,$RespuestaGuardar->EstadoCodigo);

                    }else{

                        $EnlaceRegistro = ModificarURL(array('id' => $RespuestaGuardar->Respuesta->registro->id));
                        Dinaup_Renderizador_CuadroOk('Datos guardados','Los datos han sido guardados correctamente.<br /><a href="'.$EnlaceRegistro.'">Ver Registro</a>','Ok');
                        $MostrarFormulario = false;
                    } 

                }

            }


            if($MostrarFormulario){
                Dinaup_Renderizador_Detalles( $Datos_Detalles , $ContenidoEditable );
            }

       /// .......................................................................................




    }else{

        
        echo '¿?';

    }


?>