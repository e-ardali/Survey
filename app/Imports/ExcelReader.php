<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelReader implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            dd($row);
        }
    }
}
