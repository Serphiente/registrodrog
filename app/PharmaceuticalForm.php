<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmaceuticalForm extends Model
{
    use SoftDeletes;

    public $table = 'pharmaceutical_forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'long_name',
        'short_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
