<?php

namespace App\Models\Facade;

use App\Models\Entity\Consultas;


class ConsultasDB {
    public static function editarConsulta($id) {
        
        return Consultas::find($id);
    }
}
