<?php

namespace App\Imports;

use App\Models\Equipe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        return new Equipe([
        
        
            'Libelle_Equipe'    => $row['libelle_equipe'],
            'responsables_id'    => $row[ 'responsables_id'], 
   
        ]);
    }
}
