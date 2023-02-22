<?php

namespace App\Exports;

use App\Models\Compte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompteExport implements FromCollection,WithHeadings
{

  public function headings():array{
   return [
    'id' ,
    'cin' ,
    'Nom'   , 
    'Prenom',
    'Email'  ,
    'Email The Cube' , 
    'Telephone', 
    'Equipe',
    'Date de creation',
    'Date de modification',

   ];

  }

    public function collection()
    {
        return Compte::all();
    }
    
}
