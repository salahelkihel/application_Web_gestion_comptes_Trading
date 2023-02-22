<?php

namespace App\Exports;

use App\Models\Competition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CompetitionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
         'id' ,
         'statut_formation' ,
         'Duree'   , 
         'decision',
         'numcompte',
     
        ];
     
       }
    public function collection()
    {
        return Competition::all();
    }
}
