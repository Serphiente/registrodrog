<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingreso extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'ingresos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lote',
        'bill',
        'quantity',
        'product_id',
        'unit_price',
        'created_at',
        'updated_at',
        'deleted_at',
        'supplier_id',
        'unit_per_box',
        'expiration_day',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');

    }

    public function product()
    {
        return $this->belongsTo(Baseproduct::class, 'product_id');

    }
}
