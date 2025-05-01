<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendars';

    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'cor',
        'inicio_data',
        'inicio_hora',
        'termino_data',
        'termino_hora',
        'status',
        'notification',
        'id_usuario',
        'id_category'
    ];

    protected $casts = [
        'begin' => 'date:hh:mm'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}
