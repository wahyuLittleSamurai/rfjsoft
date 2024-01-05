<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTopMenu extends Model
{
    use HasFactory;

    protected $table = 'mastertopbar';
    protected $fillable = [
        'Kode', 'Menu', 'Link', 'Icon', 'Isi', 'IsActive'
    ];
}
