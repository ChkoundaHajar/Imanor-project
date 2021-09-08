<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $fillable =['Code','Departement','Sigle','Chef de departement','Id','Entite parent'];
}
