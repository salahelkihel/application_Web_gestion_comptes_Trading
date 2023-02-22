<?php

namespace App\Exports;

use App\Models\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ResponsableExport implements FromCollection,WithHeadings
{ 
    public function headings():array{
        return [
            'id', 
            'nom',
            'prenom',
            'Email',
            'telephone'
       
        ];
     
       }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Responsable::all();
    }
}
