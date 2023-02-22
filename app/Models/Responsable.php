<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $table='responsables';
    protected $primaryKey='id';
    protected $fillable=[ 'id','nom', 'prenom', 'Email', 'telephone'];
}
