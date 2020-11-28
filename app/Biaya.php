<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = "refbiaya";
    protected $fillable = [
        'id',
        'ukuran_min',
        'ukuran_max',
        'biaya',
        'keterangan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
    protected $primaryKey = 'id';
    // public $timestamps = false;
    public $incrementing = false;


}
