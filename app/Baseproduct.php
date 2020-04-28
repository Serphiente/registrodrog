<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Baseproduct extends Model
{
    use SoftDeletes;

    public $table = 'baseproducts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'medida',
        'laboratory_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function raw_materials()
    {
        return $this->belongsToMany(RawMaterial::class);

    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');

    }
}
