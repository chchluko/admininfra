<?php

namespace App\Exports;

use App\AssignedMovil;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssignedMovilsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AssignedMovil::all();
    }

    public function map($registros) : array {
        return [
            $registros->imei->imei,
            $registros->imei->lineatelefonica->lineatelefonica,
            $registros->nomina,
            $registros->nombre,
            $registros->area,
            $registros->depto,
            $registros->puesto,
            Carbon::parse($registros->updated_at)->format('d/m/Y H:i:s'),
            Carbon::parse($registros->created_at)->format('d/m/Y H:i:s'),
        ] ;
    }

    public function headings(): array
    {
        return [
            'IMEI',
            'LINEA',
            'NOMINA',
            'NOMBRE',
            'AREA',
            'DEPTO',
            'PUESTO',
            'ACTUALIZADO',
            'CREADO'
        ];
    }
}
