<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //
    protected $table = "masterevent";
    protected $fillable = [
        'nama_event',
        'tanggal_mulai_event',
        'tanggal_akhir_event',
        'tempat_event',
        'lokasi_event',
        'gambar_event',
        'nama_panitia',
        'ttd_panitia',
        'nama_juri',
        'ttd_juri',
        'mulai_pendaftaran_online',
        'akhir_pendaftaran_online',
        'mulai_pendaftaran_offline',
        'akhir_pendaftaran_offline',
    ];
}
