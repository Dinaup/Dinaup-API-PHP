<?php

class ContenidoC
{

    public $Titulo;
    public $Icono;
    public $KeyWord;
    public $Archivo;

    public $BotonAgregar;

 
    function __construct($_Titulo,$_KeyWord,$_BotonAgregar) {
         $this->Titulo = $_Titulo;
         $this->KeyWord = $_KeyWord;
         $this->BotonAgregar = $_BotonAgregar;
         $this->Icono = '/aplicacion/iconos/'.$_KeyWord.'.png';
         $this->Archivo = 'aplicacion/paginas/'.$_KeyWord.'.php';

    }

}

?>