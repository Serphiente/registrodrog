<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'purchase_orders';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'client_contact_id',
        'date',
        'invoice_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');

    }

    public function client_contact()
    {
        return $this->belongsTo(ClientContact::class, 'client_contact_id');

    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;

    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;

    }
}
