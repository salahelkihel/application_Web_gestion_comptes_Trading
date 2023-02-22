<?php

namespace App\Imports;

use App\Models\Trader;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class TraderImport implements ToModel,WithHeadingRow
{

  

    public function model(array $row)
    {
        return new Trader([
         
            'Symbole'    => $row['symbole'], 
            'Position'  => $row['position'],
            'Heure' =>$row['heure'] ,
            'Type'    => $row['type'],
            'Prix'    => $row[ 'prix'], 
            'Prix_du_marche'  => $row['prix_du_marche'],
            'Action' => $row['action'],
            'num_compte' => $row['num_compte'],  
            
        ]);
    }

}
