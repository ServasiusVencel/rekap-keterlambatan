<?php

namespace App\Exports;

use App\Models\lates;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class latesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return lates::with('student')->get();
    }
    
    public function headings(): array
    {
        return [
            "Nis", "Nama", "Rombel", "Rayon"
        ];
    }

    public function map($item): array
    {
        return [
            $item->student->nis,
            $item->student->name,
            $item->student->rombel->rombel,
            $item->student->rayon->rayon,
        ];
    }
}
