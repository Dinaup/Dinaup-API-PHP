<?php

class CampoC
{
    public $Etiqueta;
    public $Formato;
    public $Rol;
    public $Obligatorio;
    public $Editable;
    public $MotivoBloqueo;
    public $EsUTC;
    public $AceptaSegundos;
    public $AceptaCeros;
    public $AceptaPositivos;
    public $AceptaNegativos;
    public $KeyWord;
    public $Multilinea;

    

    public $Predefinidos_Valores;
    public $Predefinidos_Textos;
    public $SoloPredefinidos;

    public $FuncionDesplegable;
    public $Decimales;
    public $EsPorUbicacion;

    function __construct($Obj,$_KeyWord) {
        $this->KeyWord = $_KeyWord;
        $this->Multilinea = $Obj->multilinea;
        $this->Etiqueta = $Obj->etiqueta;
        $this->Formato = $Obj->formato;
        $this->Rol = $Obj->rol;
        $this->Obligatorio = $Obj->obligatorio;
        $this->Editable = ($Obj->motivobloqueo != '')? '0':'1';
        $this->MotivoBloqueo = $Obj->motivobloqueo;
        $this->EsUTC = $Obj->esutc;
        $this->AceptaSegundos = $Obj->aceptasegundos;
        $this->AceptaCeros = $Obj->aceptacero;
        $this->AceptaPositivos = $Obj->aceptapositivos;
        $this->AceptaNegativos = $Obj->aceptanegativos;
        $this->Decimales = $Obj->decimales;
        $this->EsPorUbicacion = $Obj->porubicacion;
        $this->FuncionDesplegable = $Obj->funciondesplegableid;
        $this->Predefinidos_Valores = $Obj->predefinidos_valores;
        $this->Predefinidos_Textos = $Obj->predefinidos_textos;
        $this->SoloPredefinidos = $Obj->solovalorespredefinidos;
   }


}

?>