<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsiliepimas extends Model
{
    protected $table = 'atsiliepimas';
    protected $primaryKey= 'id_Atsiliepimas';
    public $timestamps = false;
    protected $fillable = ['naudotojo vardas','tekstas','data','naudotojo_nuotraukos_pavadinimas','fk_Naudotojasid_Naudotojas'];
}
