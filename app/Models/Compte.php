<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table='comptes';
    protected $primaryKey='id';
    protected $fillable=['id','cin', 'nom', 'prenom', 'Email', 'Email_theCube', 'telephone', 'equipes_id', 'created_at', 'updated_at'];
    
}
