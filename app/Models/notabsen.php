<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notabsen extends Model
{
    use HasFactory;

    protected $table = 'notabsen';
    protected $fillable = ['nis','nama', 'rombel', 'keterangan', 'foto'];
}
