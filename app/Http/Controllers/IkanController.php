<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IkanRequest;
use App\JenisIkan;
use App\Pendaftaran;
use App\PendaftaranIkan;
use DataTables;
use Carbon\Carbon;

use File;
use DB;
use PDF;

class IkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PendaftaranIkan::semua()->with(['register'])->get();
            return Datatables::of($data)
                ->addColumn('no_ikan', function ($row) {
                    return $row->register->id;
                })
                ->addColumn('action', function ($row) {
                    $action = "<a href='" . route('ikan.show', $row->id) . "' class='btn btn-info btn-xs'><i class='fas fa-binoculars'></i></a>";
                    return $action;
                })
                ->rawColumns(['action', 'no_ikan'])
                ->make(true);
        }

        return view('ikan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ikan = PendaftaranIkan::find($id);
        $pendaftaran = Pendaftaran::find($ikan->pendaftaran_id);
        $cekbayar = cekBayar($ikan->pendaftaran_id);
        $jenis = JenisIkan::pluck('nama', 'id')->toArray();
        return view('ikan.detail', \compact('ikan', 'pendaftaran', 'cekbayar', 'jenis'));
        // dd($ikan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IkanRequest $request, $id)
    {
        //
        // dd($request->all());
        DB::beginTransaction();
        try {
            $ji = JenisIkan::find($request->jenis_ikan_id_edit);
            $ikanupdate = PendaftaranIkan::find($id);
            $ui = [
                'nama_handling' => $request->nama_handling,
                'kota_handling' => $request->kota_handling,
                'nama_pemilik' => $request->nama_pemilik,
                'kota_pemilik' => $request->kota_pemilik,
                'jenis_ikan_id' => $ji->id,
                'jenis_ikan_nama' => $ji->nama,
                'ukuran' => $request->ukuran_edit,
                'biaya' => biayaUkuran($request->ukuran_edit),
                'breeder' => $request->breeder_edit,
                'gender' => $request->gender_edit,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id,
            ];

            if (!empty($request->file('gambar_ikan_'))) {
                $file = $request->file('gambar_ikan_');
                $file_name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $fullpath = $this->path . '/' . $file_name;
                $file->move(storage_path($this->path), $file_name);
                $ui['path_image'] = $fullpath;
                $ui['file_name'] = $file_name;
            }

            $ikanupdate->update($ui);
            DB::commit();
            // all good
            $pesan = "Ikan berhasil di edit";
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            $pesan = 'Message: ' . $e->getMessage();
        }
        return redirect()->route('ikan.show', $id)->with(['status', $pesan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
