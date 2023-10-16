<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    use HasFactory;

    protected $table = 'masterservice';
    protected $fillable = [
        'Kode', 'ServiceName', 'DetailService', 'Icon', 'LinkDetail', 'IsActive'
    ];
}
