<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrdenItem extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'purchase_orden_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'purchase_order_id',
        'item',
        'number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');

    }
}
