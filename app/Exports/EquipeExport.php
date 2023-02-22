<?php

namespace App\Exports;

use App\Models\Equipe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquipeExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
        'id',
        'Libelle_Equipe',
        'responsables_id' 
       
        ];
     
       }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Equipe::all();
    }
}
