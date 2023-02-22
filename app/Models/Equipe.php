<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    protected $table='equipes';
    protected $primaryKey='id';
    protected $fillable=['Libelle_Equipe', 'responsables_id'];
}
