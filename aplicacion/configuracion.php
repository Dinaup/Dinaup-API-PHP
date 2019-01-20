<?php

// ------------------------------------- 
//        Configuración de Dinaup      
// ------------------------------------- 

class DinaupCFG
{




    // ACCESO API  
    // Se recomienda configurar una lista blanca de direcciones IP desde Dinaup
    // en la sección "Áreas de acceso web".
    const DinaupURLAPI = "http://localhost:4444/";
    const DinaupApiKey = "INTRODUZCA_AQUI_SU_CLAVE_API";


    // REGIONAL  
    //  formato predeterminado 
    const FechaYHora_ZonaHorariaLocal = ('Europe/Madrid');
    const FechaYHora_Formato = ('Y-m-d H:i:s');

    
    // SESIONES  
    //  Puede activar el sistema de Sesiones administradas por Dinaup.
    //  Dinaup administrará automáticamente las distintas sesiones.
    //  También llevará un control de los intentos fallidos de inicio de sesión.
    //  Y permitirá invalidar sesiones remotamente. 
    const Sesiones_ActivarSistemaDeIdentificacion = false;   

    // Esta función es opcional, puede ser configurada para recibir información que necesitemos de un Usuario (Entidad/Empleado)
    // por ejemplo, determinar si el usuario con la sesión activa es Cliente/Proveedor/Empleado....
    const Sesiones_DetallesSesion = '';  




    public static function Paginas(){

        $R ;
        $R[] = new ContenidoC('Pruebas JSON', 'seccionesdepruebasjson', true);
        //  $R[] = new ContenidoC(INDIQUE_AQUI_EL_TITULO, INDIQUE_AQUI_LA_KEYWORD, INDIQUE_AQUI_SI_SE_PUEDE_AGREGAR);

        return $R;
    }



} 





?>