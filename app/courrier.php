<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courrier extends Model
{
    use HasFactory;
    protected $fillable =['id','client','gate','statut', 'fileUrl', 'departement_affecte', 'agent_affecte'];
}
