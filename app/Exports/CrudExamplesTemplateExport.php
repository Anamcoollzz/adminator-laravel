<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class CrudExamplesTemplateExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new Collection([
            [
                'name' => 'John Doe',
                'position' => 'Software Engineer',
                'office' => 'New York',
                'age' => 30,
                'salary' => 80000,
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Position',
            'Office',
            'Age',
            'Salary',
        ];
    }
}
