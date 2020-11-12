<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $table = 'kategorija';
    protected $primaryKey= 'id_Kategorija';
    public $timestamps = false;

    protected $fillable = ['pavadinimas'];

}
