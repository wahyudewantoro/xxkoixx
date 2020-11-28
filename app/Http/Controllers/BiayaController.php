<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biaya;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Carbon\Carbon;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!userCan('biaya.list')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        if ($request->ajax()) {
            $data = Biaya::query();
            return Datatables::of($data)
                ->order(function ($query) {
                        $query->orderBy('ukuran_max', 'asc');
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = url('/biaya/' . $row->id . '/edit');
                    $action = "";
                    if (userCan('biaya.edit')) {
                        $action .= '<a href="' . $edit . '" class="edit btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                    }
                    if (userCan('biaya.delete')) {
                        $action .= "<form style='display: contents;' method='POST' action='" . route('biaya.destroy', [$row->id]) . "'>
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

        return view('Biaya.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!userCan('biaya.create')) {
            \abort(401, 'Tidak memilki hak akses');
        }

        $data = array(
            'title' => 'Tambah Biaya',
            'method' => 'POST',
            'action' => route('biaya.store')
        );
        return view('Biaya.form', \compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!userCan('biaya.create')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        //
        $biaya = $request->except('_token', '_method', 'id');
        $biaya['id'] = uuid();
        $biaya['created_by'] = Auth::user()->id;
        $biaya['created_at'] = Carbon::now();
        Biaya::create($biaya);
        return redirect('/biaya');
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
        if (!userCan('biaya.edit')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        $data = array(
            'title' => 'Edit Biaya',
            'method' => 'PATCH',
            'action' => route('biaya.update', $id),
            'biaya' => Biaya::find($id)
        );
        return view('Biaya.form', \compact('data'));
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
        if (!userCan('biaya.edit')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        $rb = Biaya::find($id);
        $biaya = $request->except('_token', '_method', 'id');
        $biaya['updated_by'] = Auth::user()->id;
        $biaya['updated_at'] = Carbon::now();
        $rb->update($biaya);
        return redirect('/biaya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!userCan('biaya.delete')) {
            \abort(401, 'Tidak memilki hak akses');
        }
        $data = Biaya::find($id);
        $data->delete();
        return redirect('/biaya');
    }
}
