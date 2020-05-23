<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListDokter;


class ListDokterController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ListDokter::paginate(10);
        return view('list_dokter.index', ['datas' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => "required|unique:list_dokter",
            ],
            [
                'nama.required' => 'Nama dokter harus diisi',
                'nama.unique' => 'Nama dokter sudah diisi',
            ],
        );

        ListDokter::create($request->all());
        return redirect()->route('dokter.index')->with('status', 'Berhasil menambah dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = ListDokter::findOrFail($id);
        return view('list_dokter.edit', ['dokter' => $dokter]);
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
        $request->validate(
            [
                'nama' => "required|unique:list_dokter",
            ],
            [
                'nama.required' => 'Nama dokter harus diisi',
                'nama.unique' => 'Nama dokter sudah diisi',
            ],
        );

        $dokter = ListDokter::findOrFail($id);
        $dokter->nama = $request->get('nama');
        $dokter->save();

        return redirect()->route('dokter.index')->with('status', "Berhasil mengedit dokter $dokter->nama");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = ListDokter::findOrFail($id);
        $nama = $dokter->nama;
        $dokter->delete();

        return redirect()->route('dokter.index')->with('status', "Berhasil menghapus dokter $nama");
    }
}
