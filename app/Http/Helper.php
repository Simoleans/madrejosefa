<?php 

use App\Models\Configuracion;

function nombreFundacion()
{
    $conf = Configuracion::latest()->first();

    return $conf->nombre_fundacion ?? 'Organización';
}

?>