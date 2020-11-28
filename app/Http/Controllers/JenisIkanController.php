<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisIkan;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Carbon\Carbon;

class JenisIkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!userCan('jenisikan.list')){
            \abort(401,'Tidak memilki hak akses');
        }

        if ($request->ajax()) {
            $data = JenisIkan::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $edit = url('/jenisikan/' . $row->id . '/edit');
                    $action='';
                    if(userCan('jenisikan.edit')){
                        $action .= '<a href="' . $edit . '" class="edit btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                    }
                    if(userCan('jenisikan.delete')){
                    $action.="<form style='display: contents;' method='POST' action='" . route('jenisikan.destroy', [$row->id]) . "'>
                        " . csrf_field() . "
                        " . method_field('DELETE') . "
                        
                        <button class='btn btn-xs btn-danger' type='submit'><i class='fas fa-trash'></i></button>
                    </form>";
                    }
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('JenisIkan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!userCan('jenisikan.create')){
            \abort(401,'Tidak memilki hak akses');
        }
        $title = "Tambah Jenis Ikan";
        $action = route('jenisikan.store');
        $method = "POST";
        $data = [];
        return view('JenisIkan.form', compact('title', 'action', 'method', 'data'));
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
        if(!userCan('jenisikan.create')){
            \abort(401,'Tidak memilki hak akses');
        }
        $ikan = $request->except('_token', '_method', 'id');
        JenisIkan::create($ikan);
        return redirect('/jenisikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!userCan('jenisikan.edit')){
            \abort(401,'Tidak memilki hak akses');
        }
        $title = "Edit Jenis Ikan";
        $action = route('jenisikan.update', $id);
        $method = "PATCH";
        $data['JenisIkan'] = JenisIkan::find($id);

        return view('JenisIkan.form', compact('title', 'action', 'method', 'data'));
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
        //
        if(!userCan('jenisikan.edit')){
            \abort(401,'Tidak memilki hak akses');
        }
        $ikan = $request->except('_token', '_method');
        $jenisikan = JenisIkan::find($id);
        $jenisikan->update($ikan);

        return redirect('/jenisikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!userCan('jenisikan.delete')){
            \abort(401,'Tidak memilki hak akses');
        }
        $data = JenisIkan::find($id);
        $data->delete();
        return redirect('/jenisikan');
    }
}
