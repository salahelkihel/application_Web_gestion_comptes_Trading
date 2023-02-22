<?php

namespace App\Imports;

use App\Models\Formation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class FormationImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Formation([

            'Nom_Formation'    => $row['nom_formation'],
            'Type_Formation'    => $row['type_formation'], 
        ]);
    }
}
