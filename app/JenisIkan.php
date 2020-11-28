<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisIkan extends Model
{
    
    protected $table = "jenis_ikan";
    protected $fillable = ['nama','kelas','kelas_alias','sort'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
