<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalOperasi;

class JadwalOperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal_operasi.index', ['data' => JadwalOperasi::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal_operasi.manage', ['data' => JadwalOperasi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JadwalOperasi::create($request->all());
        return redirect()->route('op.manage')->with('status', 'Berhasil menambah antrian');
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
        $jo = JadwalOperasi::findOrFail($id);
        return view('jadwal_operasi.manage_edit', ['data' => $jo]);
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
        $jo = JadwalOperasi::findOrFail($id);
        $jo->pasien = $request->get('pasien');
        $jo->dokter = $request->get('dokter');
        $jo->tindakan = $request->get('tindakan');
        $jo->status = $request->get('status');
        $jo->jam_keluar = $request->get('jam_keluar');
        $jo->save();

        return redirect()->route('op.manage.edit', ['id' => $jo->id])->with('status', "Berhasil mengedit antrian pasien $jo->pasien");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jo = JadwalOperasi::findOrFail($id);
        $pasien = $jo->pasien;
        $jo->delete();
        return redirect()->route('op.manage')->with('status', "Berhasil menghapus antrian pasien $pasien");
    }
}
