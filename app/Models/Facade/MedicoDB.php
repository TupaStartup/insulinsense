<?php

namespace App\Models\Facade;

use App\Models\Entity\Medicos;


class MedicoDB {
    
    public static function editarConsulta($id)
    {
        return Consultas::find($id);
    }
    
    public static function montarGrid()
    {
        return Medicos::all();
    }
    
}
