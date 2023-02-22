<?php

namespace App\Exports;

use App\Models\Formation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class FormationExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
     
            'id', 
            'Nom_Formation',
            'Type_Formation'
        ];
     
       }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Formation::all();
    }
}
