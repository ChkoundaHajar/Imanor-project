<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    use HasFactory;
    protected $fillable =['Id','Nom','Prenom','E-mail','Mot de passe', 'Code', 'Profil'];
}
