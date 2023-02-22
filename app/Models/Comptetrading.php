<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comptetrading extends Model
{
    use HasFactory;
   
    protected $table='comptetradings';
    protected $primaryKey='id';
    protected $fillable=['id','num_compte','login', 'modepass', 'serveur', 'utilisateur', 'type_compte', 'compte_id'];
}
