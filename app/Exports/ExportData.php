<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportData implements FromCollection
{

    protected $data;

    public function __construct($datad)
    {
        $this->data = collect($datad);
    }

    public function collection()
    {
        return $this->data;
    }
}
