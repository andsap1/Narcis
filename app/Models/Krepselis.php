<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krepselis extends Model
{
    protected $table = 'krepselis';
    protected $primaryKey= 'id_Krepselis';
    public $timestamps = false;

    protected $fillable = ['suma'];
}
