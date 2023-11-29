<?php

namespace App\Models\Facade;

use App\Models\Entity\DadosClinicos;


class DadosClinicosDB {
    public static function editarDadoClinico($id)
    {
        return DadosClinicos::find($id);
    }
}
