<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refjuara extends Model
{
    //
    protected $table = "refjuara";
    protected $fillable = ['id','nama','id_up'];
    // protected $guarded=[];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

}
