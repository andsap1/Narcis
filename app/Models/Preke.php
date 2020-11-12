<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preke extends Model
{
    protected $table = 'preke';
    protected $primaryKey= 'id_Preke';
    public $timestamps = false;

    protected $fillable = ['pavadinimas','aprasymas','kaina','ikelimo_data','fk_prekes_kategorija'];
}
