<?php

namespace App\Imports;

use App\Models\Comptetrading;
use Maatwebsite\Excel\Concerns\ToModel;

class ComptetradingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comptetrading([
 
            'login'    => $row['login'],
            'modepass'    => $row[ 'nom'], 
            'serveur' => $row['serveur'],
            'utilisateur'  => $row['utilisateur'],
            'type_compte' => $row['type_compte'], 
            'compte_id' => $row['compte_id'],
        ]);
    }
}
