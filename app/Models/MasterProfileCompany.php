<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProfileCompany extends Model
{
    use HasFactory;

    protected $table = 'masterprofilecompany';
    protected $fillable = [
        'Kode', 'CompanyName', 'Owner', 'TagLine', 'Icon', 'AboutUs', 'IsActive'
    ];
}
