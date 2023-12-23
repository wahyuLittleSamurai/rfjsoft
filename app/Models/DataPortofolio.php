<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPortofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $fillable = [
        'Kode', 'KodeService', 'PortofolioName', 'Photo', 'Link', 'DetailPortofolio', 'IsActive'
    ];
}
