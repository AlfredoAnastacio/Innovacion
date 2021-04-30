<?php

namespace App;

use App\Models\AlertsPays;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaysExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AlertsPays::all();
    }

    public function headings() : array
    {
        return ['id','Código Usuario','Nivel Pago','Nombre','Pago','Estado','Rango','Fecha'];
        // return ['id','Tipo','Líder Inovador','Código Usuario','Nombre','Estructura','Nivel Completado','Pago','Estado','Canal de Pago'];
    }
}
