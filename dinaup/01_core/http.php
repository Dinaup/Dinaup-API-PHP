<?php


function RealizarSolicitudHTTP($DatosSolicitud)
{

    $DatosSolicitud = array_merge(array('dinaup_area' => 'json','dinaup_apikey' =>DinaupCFG::DinaupApiKey),$DatosSolicitud);

    $DatosSolicitudquery = http_build_query($DatosSolicitud);

    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, DinaupCFG::DinaupURLAPI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $DatosSolicitudquery );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    } catch (Exception $e) {
        return null;
    }


}



function DinaupEstadoServidor(){return RealizarSolicitudHTTP( array('dinaup_ping' => '1'));}
function Dinaup_Ping(){ return RealizarSolicitudHTTP( array('dinaup_ping' => '1'));}








class DinaupRespuestaInterna
{

    public $Estado;
    public $EstadoCodigo;
    public $EstadoDescripcion;
    public $FuncionAPI;
    public $Respuesta;

    public function __construct($RespuestaJSON)
    {


        $objx = json_decode($RespuestaJSON);

        if (!$objx) {

            $this->Estado = 'Conexión no disponible';
            $this->EstadoCodigo = '-1';
            $this->EstadoDescripcion = 'No se ha podido establecer la conexión con el servidor';
            $this->FuncionAPI = '';

        } else {

            $this->Estado = $objx->{'estado'}->{'estado'};
            $this->EstadoCodigo = $objx->{'estado'}->{'codigo'};
            $this->EstadoDescripcion = $objx->{'estado'}->{'descripcion'};
            $this->FuncionAPI = $objx->{'estado'}->{'funcionapi'};
            $this->Respuesta = isset( $objx->{'respuesta'})? $objx->{'respuesta'} : null; 
        }

    }

 


}



?>
