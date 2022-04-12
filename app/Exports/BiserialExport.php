<?php

namespace App\Exports;

use App\Models\Biserial;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiserialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Biserial::all();
    }
}