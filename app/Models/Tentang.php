<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = "tentangs";
    protected $primarykey = "id";
    protected $fillable = [
        'id' , 'foto', 'keterangan' ];
}
