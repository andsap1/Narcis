<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spalva extends Model
{
    use HasFactory;
    protected $table = 'spalva';
    protected $primaryKey= 'id_Spalva';
    public $timestamps = false;

    protected $fillable = ['pavadinimas'];
}
