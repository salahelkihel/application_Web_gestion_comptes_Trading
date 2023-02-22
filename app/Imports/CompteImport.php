<?php

namespace App\Imports;

use App\Models\Compte;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class CompteImport implements ToModel,WithHeadingRow

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        return new Compte([
          
            'cin'    => $row['cin'],
            'nom'    => $row[ 'nom'], 
            'prenom' => $row['prenom'],
            'Email'  => $row['email'],
            'Email_theCube' => $row['email_thecube'], 
            'address' => $row['address'],
            'telephone' => $row['telephone'],
            'equipes_id' => $row['equipes_id'],
          
        ]);
    }

}
