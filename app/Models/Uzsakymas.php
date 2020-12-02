<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsakymas extends Model
{
    protected $table = 'uzsakymas';
    protected $primaryKey= 'id_Uzsakymas';
    public $timestamps = false;

    protected $fillable = ['busena','suma','vardas','pavarde','adresas','data',
        'fk_Krepselisid', 'fk_Naudotojasid'];
}
