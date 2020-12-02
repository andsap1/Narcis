<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apmokejimas extends Model
{
    use HasFactory;
    protected $table = 'apmokejimas';
    protected $primaryKey= 'id_Apmokejimas';
    public $timestamps = false;

    protected $fillable = ['fk_Uzsakymas'];
}
