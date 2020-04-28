<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientContact extends Model
{
    use SoftDeletes;

    public $table = 'client_contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'name',
        'email',
        'phone',
        'department',
        'another_info',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');

    }
}
