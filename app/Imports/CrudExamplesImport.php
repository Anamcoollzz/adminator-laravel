<?php

namespace App\Imports;

use App\Models\CrudExample;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CrudExamplesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CrudExample([
            'name'     => $row['name'],
            'position' => $row['position'],
            'office'   => $row['office'],
            'age'      => $row['age'],
            'salary'   => $row['salary'],
        ]);
    }
}
