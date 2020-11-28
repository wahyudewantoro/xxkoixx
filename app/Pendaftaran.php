<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pendaftaran extends Model
{
    protected $table = "pendaftaran";
    protected $fillable = [
        'id',
        'code',
        'nama_handling',
        'kota_handling',
        'no_telepon',
        'branch',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'bayar_at',
        'bayar_by'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    use AutoNumberTrait;

    public function ikan()
    {
        return $this->hasMany('App\PendaftaranIkan', 'pendaftaran_id', 'id')->whereNull('deleted_at')->orderbyraw("(SELECT id FROM ikan_register WHERE ikan_register.pendaftaran_ikan_id=pendaftaran_ikan.id ) ASC");
    }

    public function scopeSemua($query)
    {
        $query->whereNull('pendaftaran.deleted_at');
    }

    public function scopeTagihan($query)
    {
        
        $query->whereIn('pendaftaran.id', function ($query) {
            $query->select('pendaftaran_id')
            ->from('pendaftaran_ikan')
            ->whereraw("pendaftaran_ikan.deleted_at IS NULL AND pendaftaran_ikan.status_bayar=0");
        });
    }
    
    public function scopePayletter($query)
    {
        
        $query->whereIn('pendaftaran.id', function ($query) {
            $query->select('pendaftaran_id')
            ->from('pendaftaran_ikan')
            ->whereraw("pendaftaran_ikan.deleted_at IS NULL AND pendaftaran_ikan.status_bayar=2");
        });
    }
    
    public function scopeLunas($query)
    {
        
        $query->whereIn('pendaftaran.id', function ($query) {
            $query->select('pendaftaran_id')
            ->from('pendaftaran_ikan')
            ->whereraw("pendaftaran_ikan.deleted_at IS NULL AND pendaftaran_ikan.status_bayar=1");
        });
    }
    

    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => function () {
                    return 'SK/' . date('Y.m.d') . '/?';
                },
                'length' => 5,
            ]
        ];
    }
}
