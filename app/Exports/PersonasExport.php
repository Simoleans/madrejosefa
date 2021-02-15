<?php

namespace App\Exports;

use App\Models\Personas;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Personas::all();
    }
}
