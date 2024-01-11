<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterslideshow extends Model
{
    use HasFactory;
    protected $table = 'masterslideshow';
    protected $fillable = [
        'Kode', 'Nama', 'Link', 'Description', 'IsActive'
    ];
}
