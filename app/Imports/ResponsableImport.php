<?php

namespace App\Imports;

use App\Models\Responsable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ResponsableImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Responsable([
           
            'nom'    => $row['nom'],
            'prenom'    => $row[ 'prenom'], 
            'Email'  => $row['email'],
            'telephone' => $row['telephone'],
           
          
        ]);
    }
}
