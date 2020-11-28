<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\JenisIkan;
use App\Pendaftaran;
use App\PendaftaranIkan;
use DataTables;
use Carbon\Carbon;

use File;
use DB;
use PDF;

class PendaftaranController extends Controller
{

    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = 'app/public/images';
        $this->dimensions = ['245', '300', '500'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::join('pendaftaran_ikan', 'pendaftaran_ikan.pendaftaran_id', '=', 'pendaftaran.id')
                ->select(DB::raw('distinct pendaftaran.*'))
                ->semua();
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
                        $data[] = $ikan->jenis_ikan_nama . ' (' . $ikan->ukuran . ' cm)';
                    }
                    return implode('<br>', $data);
                })
                ->addColumn('action', function ($row) {
                    $sb = 0;
                    foreach ($row->ikan as $ikan) {
                        $sb += $ikan->status_bayar;
                    }
                    $action = "<a href='" . route('pendaftaran.show', $row->id) . "' class='edit btn btn-info btn-xs'><i class='fas fa-binoculars'></i></a>";
                    if ($sb == 0) {
                        $action .= " <a href='" . url('/pendaftaran/' . $row->id . '/edit') . "' class=\"edit btn btn-warning btn-xs\"><i class=\"fas fa-edit\"></i></a> ";

                        $action .= "<form style='position: fixed;' id='form-hapus' method='POST' action='" . route('pendaftaran.destroy', [$row->id]) . "'>
                        " . csrf_field() . "
                        " . method_field('DELETE') . "
                                </form><button data-reg='" . $row->code . "' class='btn btn-xs btn-danger tombol-hapus' type='button'><i class='fas fa-trash'></i></button>";
                    }
                    return $action;
                })
                ->rawColumns(['action', 'pemilik', 'ikan'])
                ->make(true);
        }

        return view('Pendaftaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jenis = JenisIkan::pluck('nama', 'id')->toArray();
        $optionjenis = "";
        foreach ($jenis as $key => $jenis) {
            $optionjenis .= '<option value="' . $key . '">' . $jenis . '</option>';
        }

        $data = [
            'title' => 'Pendaftaran Ikan',
            'method' => 'POST',
            'action' => route('pendaftaran.store'),
        ];
        return view('pendaftaran.form', \compact('data', 'optionjenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // transaction
        DB::beginTransaction();
        try {
            $datapendaftaran = [
                'id' => uuid(),
                'nama_handling' => $request->nama_handling,
                'kota_handling' => $request->kota_handling,
                'no_telepon' => $request->no_telepon,
                'status' => $request->status,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,
                // 'branch' => 'OF'
            ];
            // data pendaftaran
            $daftar = Pendaftaran::create($datapendaftaran);

            // cek direktori
            if (!File::isDirectory(storage_path($this->path))) {
                //MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory(storage_path($this->path));
            }


            // looping data ikan
            for ($i = 0; $i < count($request->gambar_ikan); $i++) {
                //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
                $file = $request->file('gambar_ikan')[$i];
                $file_name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
                $fullpath = $this->path . '/' . $file_name;
                // Image::make($file)->save($fullpath);

                $file->move(storage_path($this->path), $file_name);

                $ji = JenisIkan::find($request->jenis_ikan_id[$i]);

                $detail = [
                    'id' => uuid(),
                    'pendaftaran_id' => $daftar->id,
                    'nama_handling' => $daftar->nama_handling,
                    'kota_handling' => $daftar->kota_handling,
                    'no_telepon' => $daftar->no_telepon,
                    'nama_pemilik' => $request->nama_pemilik,
                    'kota_pemilik' => $request->kota_pemilik,
                    'jenis_ikan_id' => $ji->id,
                    'jenis_ikan_nama' => $ji->nama,
                    'path_image' => $fullpath,
                    'file_name' => $file_name,
                    'ukuran' => $request->ukuran[$i],
                    'breeder' => $request->breeder[$i],
                    'gender' => $request->gender[$i],
                    'biaya' => biayaUkuran($request->ukuran[$i]),
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id,
                ];

                $pi = PendaftaranIkan::create($detail);
                DB::table('ikan_register')->insert(['pendaftaran_ikan_id' => $pi->id]);
            }


            DB::commit();
            // all good
            $pesan = "Ikan berhasil di daftar";
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            $pesan = 'Message: ' . $e->getMessage();
        }
        // redirect(url('/pendaftaran/create'));
        return redirect()->route('pendaftaran.create')->with(['status' => $pesan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['ikan', 'ikan.register'])->find($id);
        $cekbayar = cekBayar($id);
        return view('Pendaftaran.detail', \compact('pendaftaran', 'id', 'cekbayar'));
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
        $jenis = JenisIkan::pluck('nama', 'id')->toArray();
        $optionjenis = "";
        foreach ($jenis as $key => $rj) {
            $optionjenis .= '<option value="' . $key . '">' . $rj . '</option>';
        }

        // cek handling or not
        $data = [
            'title' => 'Edit Pendaftaran Ikan',
            'method' => 'PATCH',
            'action' => route('pendaftaran.update', $id),
            'pendaftaran' => Pendaftaran::find($id),
            'jenis' => $jenis
        ];
        return view('pendaftaran.form', \compact('data', 'optionjenis'));
        // dd($data['jenis']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $daftar = Pendaftaran::find($id);
            $datapendaftaran = [
                'nama_handling' => $request->nama_handling,
                'kota_handling' => $request->kota_handling,
                'no_telepon' => $request->no_telepon,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id,
            ];

            // data pendaftaran
            $daftar->update($datapendaftaran);

            $a = [];
            foreach ($daftar->ikan as $ri) {
                $a[] = $ri->id;
            }

            // jika ada ikan yang di hapus
            if (($a == $request->ikan_id_edit) == false) {
                $delta = array_diff($a, $request->ikan_id_edit);
                foreach ($delta  as $rdel) {
                    $ikandelta = PendaftaranIkan::find($rdel);
                    $ui = [
                        'deleted_at' => Carbon::now(),
                        'deleted_by' => Auth::user()->id,
                    ];
                    $ikandelta->update($ui);
                }
            }
            // update data ikan 
            // data ikan edit
            foreach ($request->ikan_id_edit as $i => $rui) {
                $ji = JenisIkan::find($request->jenis_ikan_id_edit[$i]);
                // cek data lama
                if (!empty($rui)) {
                    // update data tanpa gambar
                    $ikanupdate = PendaftaranIkan::find($rui);
                    $ui = [
                        'nama_handling' => $daftar->nama_handling,
                        'kota_handling' => $daftar->kota_handling,
                        'no_telepon' => $daftar->no_telepon,
                        'nama_pemilik' => $request->nama_pemilik,
                        'kota_pemilik' => $request->kota_pemilik,
                        'jenis_ikan_id' => $ji->id,
                        'jenis_ikan_nama' => $ji->nama,
                        'ukuran' => $request->ukuran_edit[$i],
                        'biaya' => biayaUkuran($request->ukuran_edit[$i]),
                        'breeder' => $request->breeder_edit[$i],
                        'gender' => $request->gender_edit[$i],
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->id,
                    ];
                    if (!empty($request->file('gambar_ikan_' . $i))) {
                        $file = $request->file('gambar_ikan_' . $i);
                        $file_name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $fullpath = $this->path . '/' . $file_name;
                        $file->move(storage_path($this->path), $file_name);
                        $ui['path_image'] = $fullpath;
                        $ui['file_name'] = $file_name;
                    }
                    $ikanupdate->update($ui);
                }
            }

            // tambahan data ikan
            if (!empty($request->gambar_ikan)) {
                for ($ia = 0; $ia < count($request->gambar_ikan); $ia++) {
                    $ji = JenisIkan::find($request->jenis_ikan_id[$ia]);
                    $file = $request->file('gambar_ikan')[$ia];
                    $file_name = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $fullpath = $this->path . '/' . $file_name;
                    $file->move(storage_path($this->path), $file_name);
                    $detail = [
                        'id' => uuid(),
                        'pendaftaran_id' => $daftar->id,
                        'nama_handling' => $daftar->nama_handling,
                        'kota_handling' => $daftar->kota_handling,
                        'no_telepon' => $daftar->no_telepon,
                        'nama_pemilik' => $request->nama_pemilik,
                        'kota_pemilik' => $request->kota_pemilik,
                        'jenis_ikan_id' => $ji->id,
                        'jenis_ikan_nama' => $ji->nama,
                        'path_image' => $fullpath,
                        'file_name' => $file_name,
                        'ukuran' => $request->ukuran[$ia],
                        'biaya' => biayaUkuran($request->ukuran[$ia]),
                        'breeder' => $request->breeder[$ia],
                        'gender' => $request->gender[$ia],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->id,
                    ];
                    PendaftaranIkan::create($detail);
                }
            }


            DB::commit();
            // all good
            $pesan = "Ikan berhasil di edit";
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            $pesan = 'Message: ' . $e->getMessage();
        }
        return redirect()->route('pendaftaran.index')->with(['status' => $pesan]);
        // return $pesan;


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
        // dd($id);
        DB::beginTransaction();
        try {
            $delete = [
                'deleted_at' => Carbon::now(),
                'deleted_by' => Auth::user()->id,
            ];
            $daftar = Pendaftaran::find($id);
            $daftar->update($delete);

            $ikan = PendaftaranIkan::where('pendaftaran_id', $id);
            $ikan->update($delete);

            DB::commit();
            // all good
            $pesan = "Data berhasil di hapus";
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            $pesan = 'Message: ' . $e->getMessage();
        }
        return redirect()->route('pendaftaran.index')->with(['status' => $pesan]);
    }

    function kartuIkan($id)
    {
        // dd($id);
        if (!empty($id)) {
            $pendaftaran = Pendaftaran::semua()->wherein('id', explode(',', $id))->first();
            $pdf = PDF::loadview('pendaftaran.cetak_kartu', \compact('pendaftaran'));
            return $pdf->stream($pendaftaran->code . '.pdf');
        } else {
            $url = url()->previous();
            return redirect($url)->with('status', 'Data tidak di temukan!');
        }
    }

    function stikerIkan(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $ikan = PendaftaranIkan::semua()->where('pendaftaran_id', $id);
        if (isset($request->ikan)) {
            $ikan->where('id', $request->ikan);
        }
        $ikan = $ikan->get();
        $pdf = PDF::loadview('pendaftaran.stiker', \compact('ikan'))->setPaper([0, 0, 198.425, 637.795], 'potrait');
        return $pdf->stream($pendaftaran->code . '.pdf');
    }
}
