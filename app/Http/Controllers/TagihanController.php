<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pendaftaran;
use App\PendaftaranIkan;
use App\Pembayaran;
use DataTables;
use Carbon\Carbon;
// use File;
use DB;
use PDF;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!userCan('tagihan.list')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        if ($request->ajax()) {
            $data = Pendaftaran::with('ikan')->semua()->tagihan()
                ->join('pendaftaran_ikan', 'pendaftaran_ikan.pendaftaran_id', '=', 'pendaftaran.id')
                ->select(DB::raw('distinct pendaftaran.*'));
            if (userRole('Handling')) {
                $data->where('pendaftaran.created_by', Auth::User()->id);
            }
            return Datatables::of($data)
                ->filterColumn('pemilik', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.nama_pemilik  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('ikan', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.jenis_ikan_nama  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->order(function ($query) {
                    $query->orderBy('created_at', 'asc');
                })
                ->addColumn('pemilik', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {
                        $data[] = $ikan->nama_pemilik . "<br><code>" . $ikan->kota_pemilik . "</code>";
                    }

                    $a = array_unique($data);
                    return implode(',', $a);
                })
                ->addColumn('ikan', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {

                        $data[] = $ikan->jenis_ikan_nama . ' (' . $ikan->ukuran . ' cm) / <code>' . statusBayar($ikan->status_bayar) . '</code>';
                    }
                    return implode('<br>', $data);
                })
                ->addColumn('checkbox', function ($row) {
                    return "<input value='" . $row->id . "' name='id[]' class='checkbox' type='checkbox'>";
                })
                ->rawColumns(['pemilik', 'ikan', 'checkbox'])
                ->make(true);
        }

        return view('tagihan.index');
    }

    function payletter(Request $request)
    {
        if (!userCan('tagihan.payletter')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        if ($request->ajax()) {
            $data = Pendaftaran::with('ikan')->semua()->Payletter()
                ->join('pendaftaran_ikan', 'pendaftaran_ikan.pendaftaran_id', '=', 'pendaftaran.id')
                ->select(DB::raw('distinct pendaftaran.*'));
            if (userRole('Handling')) {
                $data->where('pendaftaran.created_by', Auth::User()->id);
            }
            return Datatables::of($data)
                ->filterColumn('pemilik', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.nama_pemilik  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('ikan', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.jenis_ikan_nama  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->order(function ($query) {
                    $query->orderBy('created_at', 'asc');
                })
                ->addColumn('pemilik', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {
                        $data[] = $ikan->nama_pemilik . "<br><code>" . $ikan->kota_pemilik . "</code>";
                    }

                    $a = array_unique($data);
                    return implode(',', $a);
                })
                ->addColumn('ikan', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {

                        $data[] = $ikan->jenis_ikan_nama . ' (' . $ikan->ukuran . ' cm) / <code>' . statusBayar($ikan->status_bayar) . '</code>';
                    }
                    return implode('<br>', $data);
                })
                ->addColumn('checkbox', function ($row) {
                    return "<input value='" . $row->id . "' name='id[]' class='checkbox' type='checkbox'>";
                })
                ->rawColumns(['pemilik', 'ikan', 'checkbox'])
                ->make(true);
        }

        return view('tagihan.payletter');
    }


    function lunas(Request $request)
    {
        if (!userCan('tagihan.lunas')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        if ($request->ajax()) {
            $data = Pendaftaran::with('ikan')->semua()->Lunas()
                ->join('pendaftaran_ikan', 'pendaftaran_ikan.pendaftaran_id', '=', 'pendaftaran.id')
                ->select(DB::raw('distinct pendaftaran.*'));
            if (userRole('Handling')) {
                $data->where('pendaftaran.created_by', Auth::User()->id);
            }
            return Datatables::of($data)
                ->filterColumn('pemilik', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.nama_pemilik  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('ikan', function ($query, $keyword) {
                    $sql = "pendaftaran_ikan.jenis_ikan_nama  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->order(function ($query) {
                    $query->orderBy('created_at', 'asc');
                })
                ->addColumn('pemilik', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {
                        $data[] = $ikan->nama_pemilik . "<br><code>" . $ikan->kota_pemilik . "</code>";
                    }

                    $a = array_unique($data);
                    return implode(',', $a);
                })
                ->addColumn('ikan', function ($row) {
                    $data = [];
                    foreach ($row->ikan as $ikan) {

                        $data[] = $ikan->jenis_ikan_nama . ' (' . $ikan->ukuran . ' cm) / <code>' . statusBayar($ikan->status_bayar) . '</code>';
                    }
                    return implode('<br>', $data);
                })
                ->addColumn('checkbox', function ($row) {
                    return "<input value='" . $row->id . "' name='id[]' class='checkbox' type='checkbox'>";
                })
                ->rawColumns(['pemilik', 'ikan', 'checkbox'])
                ->make(true);
        }

        return view('tagihan.lunas');
    }

    function cetakInvoice(Request $request)
    {
        if (!empty($request->id)) {
            $id = explode(',', $request->id);
            $jenis = $request->jenis ?? 'tagihan';
            $header = Pendaftaran::semua()->whereIn('id', $id)->get();
            $pdf = PDF::loadview('tagihan.cetak_invoice', \compact('header', 'jenis'));
            return $pdf->stream("filename.pdf", array("Attachment" => false));
        }
    }

    function bayarTagihan(Request $request)
    {
        if (!userCan('tagihan.lunas')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        $all = $request->id;
        if (!empty($all)) {
            $exp = explode(',', $all);
            DB::beginTransaction();
            try {

                // bayar ikan
                $ikan = PendaftaranIkan::semua()->wherein('pendaftaran_id', $exp)->get();
                $bayar = [];
                foreach ($ikan as $rikan) {
                    $bayar[] = array(
                        'pendaftaran_ikan_id' => $rikan->id,
                        'nominal' => $rikan->biaya,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->id,
                    );
                }

                Pembayaran::insert($bayar);

                PendaftaranIkan::semua()->wherein('pendaftaran_id', $exp)->update([
                    'status_bayar' => 1,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
                ]);
                $pesan = "berhasil di proses";
                $type = "success";
                $id = $all;
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $pesan = $e->getMessage();
                $type = "warning";
                $id = '';
            }
        } else {
            $pesan = "Data kosong";
            $type = "warning";
            $id = '';
        }
        $response = [
            'type' => $type,
            'pesan' => $pesan,
            'id' => $id
        ];

        return response()->json($response);
    }

    function payLetterPproses(Request $request)
    {
        if (!userCan('tagihan.payletter')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        $all = $request->id;
        if (!empty($all)) {
            $exp = explode(',', $all);
            DB::beginTransaction();
            try {
                PendaftaranIkan::semua()->wherein('pendaftaran_id', $exp)->update([
                    'status_bayar' => 2,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->id,
                ]);

                $pesan = "berhasil di proses";
                $type = "success";
                $id = $all;
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $pesan = $e->getMessage();
                $type = "warning";
            }
        } else {
            $pesan = "Data kosong";
            $type = "warning";
            $id = '';
        }
        $response = [
            'type' => $type,
            'pesan' => $pesan,
            'id' => $id
        ];

        return response()->json($response);
    }

    function surplusDefisitPath(Request $request)
    {
        if (!userCan('tagihan.surplus.defisit')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        if ($request->ajax()) {
            // $data = PendaftaranIkan::with('terbayar')->semua();

            $data = db::select("select a.id,c.id no_ikan,nama_handling,kota_handling,nama_pemilik,kota_pemilik,
            jenis_ikan_nama,breeder,gender,ukuran,biaya,sum(nominal) terbayar,biaya - sum(nominal) surplus_defisit
            from pendaftaran_ikan  a
            join pembayaran b on a.id=b.pendaftaran_ikan_id
            join ikan_register c on c.pendaftaran_ikan_id=a.id
            where a.deleted_at is null 
            group by a.id,nama_handling,kota_handling,nama_pemilik,kota_pemilik,jenis_ikan_nama,breeder,gender,ukuran,biaya,no_ikan
            having surplus_defisit <> 0");
            return Datatables::of($data)
                ->addColumn('handling', function ($ikan) {
                    $data = $ikan->nama_handling . "<br><code>" . $ikan->kota_handling . "</code>";
                    return $data;
                })
                ->addColumn('pemilik', function ($ikan) {
                    $data = $ikan->nama_pemilik . "<br><code>" . $ikan->kota_pemilik . "</code>";
                    return $data;
                })
                ->addColumn('action', function ($row) {
                    return "<button data-url='" . url('tagihan/surplusdefisit', $row->id) . "'  class='btn btn-xs btn-success surplus' type='button'><i class='fas fa-check'></i></button>";
                })
                ->rawColumns(['pemilik', 'handling', 'action'])
                ->make(true);
        }

        return view('tagihan.surplus_defisit');
    }

    public function surplusDefisitproses($id)
    {
        if (!userCan('tagihan.surplus.defisit')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        $data = db::select("select a.id,nama_handling,kota_handling,nama_pemilik,kota_pemilik,
                jenis_ikan_nama,breeder,gender,ukuran,biaya,sum(nominal) terbayar,biaya - sum(nominal) surplus_defisit
                from pendaftaran_ikan  a
                join pembayaran b on a.id=b.pendaftaran_ikan_id
                where a.deleted_at is null AND a.id='$id'
                group by a.id,nama_handling,kota_handling,nama_pemilik,kota_pemilik,jenis_ikan_nama,breeder,gender,ukuran,biaya");
        if ($data) {
            // dd($data[0]->surplus_defisit);
            DB::beginTransaction();
            try {

                Pembayaran::create(['pendaftaran_ikan_id' => $id, 'nominal' => $data[0]->surplus_defisit]);
                $pesan = "berhasil di proses";
                $type = "success";
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $pesan = $e->getMessage();
                $type = "warning";
            }
            return redirect()->route('tagihan.surplus.defisit')->with(['status' => $pesan, 'type' => $type]);
        } else {

            \abort(404);
        }
    }
}
