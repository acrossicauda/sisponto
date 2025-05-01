<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    protected $table = 'whatsapp';

    protected $fillable = [
        'id',
        'phone',
        'message',
        'send_status',
        'json_whatsapp',
        'is_send',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

}
