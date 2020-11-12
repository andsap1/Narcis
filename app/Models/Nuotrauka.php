<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuotrauka extends Model
{
    protected $table = 'prekes_nuotrauka';
    protected $primaryKey= 'id_Prekes_nuotrauka';
    public $timestamps = false;

    protected $fillable = ['pavadinimas'];
}
