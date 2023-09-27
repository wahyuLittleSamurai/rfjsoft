<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStaff extends Model
{
    use HasFactory;

    protected $table = 'masterstaff';
    protected $fillable = [
        'Kode', 'StaffName', 'password', 'Phone', 'Email', 'Address', 'Position', 'IsActive'
    ];
    protected $hidden = [
        'Password'
    ];
}
