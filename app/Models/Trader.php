<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $table='traders';
    protected $primaryKey='id';

    protected $fillable=['id','Symbole', 'Position', 'Heure', 'Type', 'Prix', 'Prix_du_marche', 'Action', 'num_compte'];
}
