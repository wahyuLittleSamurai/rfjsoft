<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageFromCust extends Model
{
    use HasFactory;

    protected $table = 'MessageFromCust';
    protected $fillable = [
        'Kode', 'CustName', 'EmailCust', 'SubjectCust', 'Message', 'CreateDate'
    ];
}
