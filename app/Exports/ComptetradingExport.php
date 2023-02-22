<?php

namespace App\Exports;

use App\Models\Comptetrading;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComptetradingExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
         'ID',
         'Num compte'   ,
         'Login'   ,
         'Modepass' ,
         'Serveur',
         'Utilisateur'  ,
         'Type_compte' ,
         'Compte_id',
         'Date de Creation ',
        ];
     
       }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comptetrading::all();
    }
}
