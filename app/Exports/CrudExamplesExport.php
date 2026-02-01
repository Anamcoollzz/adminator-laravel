<?php

namespace App\Exports;

use App\Models\CrudExample;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CrudExamplesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CrudExample::all(['id', 'name', 'position', 'office', 'age', 'salary', 'created_at']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Position',
            'Office',
            'Age',
            'Salary',
            'Created At',
        ];
    }
}
