<?php

use Illuminate\Support\Facades\DB;
use app\User;
use App\Biaya;
use App\PendaftaranIkan;
use Ramsey\Uuid\Uuid;



if (!function_exists('uuid')) {

    function uuid()
    {
        return Uuid::uuid4()->getHex();
    }
}

function userCan($permission)
{

    $iduser = auth()->user()->id;
    $user = User::find($iduser);
    $can = $user->can($permission);
    return $can;
    // return true;
}


function userRole($role)
{
    $iduser = auth()->user()->id;
    $user = User::find($iduser);
    $can = $user->hasAnyRole($role);
    return $can;
}

// $user->hasAnyRole('writer', 'reader');


function active_menu($menu = array())
{
    // return Request::is('permission','permission/*') ? 'active' : '' ;
    return Request::is($menu) ? 'active' : '';
}
function open_menu($menu = array())
{
    // return Request::is('permission','permission/*') ? 'active' : '' ;
    return Request::is($menu) ? 'menu-open' : '';
}


function biayaUkuran($ukuran)
{
    // select max ukuran
    $ux = Biaya::select(DB::raw("MAX(ukuran_max) ukuran"))->first();
    $umx = $ux->ukuran;

    if ($umx < $ukuran) {
        $ukuran = $umx;
    }

    // get biaya ukuran
    $bb = Biaya::whereRaw("ukuran_min<=$ukuran AND ukuran_max>=$ukuran")->first();

    if ($bb) {
        $biaya = $bb->biaya;
    } else {
        $biaya = 0;
    }

    return $biaya;
}

function statusBayar($status = 0)
{
    switch ($status) {
        case 1:
            $res = 'Lunas';
            break;
        case 2;
            $res = 'Payletter';
            break;
        default:
            $res = 'Belum bayar';
    }

    return $res;
}


function cekBayar($pendaftaran_id){
    $cek=PendaftaranIkan::wherenull('deleted_at')->distinct('status_bayar');
    return $cek;
}

function formatAngka($angka)
{
    return number_format($angka,0,",",".");
    /* $res=PendaftaranIkan::find($id);
    return $res->nama_owner.' / '.$res->kota_owner; */
}
