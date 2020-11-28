<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranIkan extends Model
{
    protected $table = "pendaftaran_ikan";
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    public function daftar()
    {
        return $this->belongsTo('App\Pendaftaran', 'id');
    }

    public function scopeSemua($query)
    {
        $query->whereNull('pendaftaran_ikan.deleted_at');
    }

    public function Register()
    {
        return $this->hasOne('App\IkanRegister', 'pendaftaran_ikan_id', 'id')->orderby('id');
    }

    public function Terbayar()
    {
        return $this->hasMany('App\Pembayaran', 'pendaftaran_ikan_id', 'id')->orderby('id');
    }
}
