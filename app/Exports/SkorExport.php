<?php

namespace App\Exports;

use App\Models\Skor;
use Maatwebsite\Excel\Concerns\FromCollection;

class SkorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Skor::all();
    }
}