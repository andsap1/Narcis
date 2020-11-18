<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrekeKrepselis extends Model
{
    protected $table = 'preke_krepselis';
    protected $primaryKey= 'id_Preke_Krepselis';
    public $timestamps = false;

    protected $fillable = ['kiekis', 'fk_Preke', 'fk_Krepselis'];
}
