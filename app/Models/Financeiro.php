<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Financeiro extends Model
{
    use HasFactory;
    protected $table = 'financeiros';

    protected $fillable = [
        'titulo',
        'descricao',
        'cor',
        'pagamento_data',
        'pagamento_hora',
        'notification_data',
        'notification_hora',
        'status',
        'recorrencia',
        'id_usuario',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $casts = [
        'pagamento_data' => 'date:d/m/y',
        'notification_data' => 'date:d/m/y',
        'pagamento_hora' => 'date:h:m',
        'notification_hora' => 'date:h:m',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

//        static::addGlobalScope('status', function (Builder $builder) {
//            $builder->where('status', '=', 1);
//        });
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query, $status = 1)
    {
        return $query->where('status', '=', $status);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMonth($query, $initialDate, $finalDate)
    {
        return $query->whereBetween('pagamento_data', [$initialDate, $finalDate]);
    }
}
