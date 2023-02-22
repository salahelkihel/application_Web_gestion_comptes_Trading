<?php

namespace App\Imports;

use App\Models\Competition;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompetitionImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Competition([
           
            'statut_formation' => $row[ 'statut_formation'], 
            'Duree'    =>  $row['duree'],
            'decision'=> $row['decision'],
            'num_compte'    => $row['num_compte'],
                       ]);
    }
}
