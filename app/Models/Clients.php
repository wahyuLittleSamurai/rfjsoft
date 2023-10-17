<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'masterclient';
    protected $fillable = [
        'Kode', 'ClientName', 'Address', 'Phone', 'NPWP', 'Email', 'Logo', 'IsActive'
    ];
}
