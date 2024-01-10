<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterseoheader extends Model
{
    use HasFactory;

    protected $table = 'masterseoheader';
    protected $fillable = [
        'Kode', 'LinkParam', 'Nama', 'Isi', 'Grup', 'IsActive'
    ];
}
