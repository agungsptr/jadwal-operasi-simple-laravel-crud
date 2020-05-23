<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalOperasi;
use App\ListDokter;
use App\ListTindakan;
use App\ListStatus;

class JadwalOperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jp = JadwalOperasi::all();

        $list = [];
        $ten = [];
        $length = count($jp);

        for ($i = 1; $i < $length + 1; $i++) {
            array_push($ten, $jp[$i - 1]);

            if ($i % 10 == 0) {
                array_push($list, $ten);
                $ten = [];
            }

            if ($i == $length && !empty($ten)) {
                array_push($list, $ten);
            }
        }

        return view('jadwal_operasi.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = JadwalOperasi::paginate(10);
        $listDokter = ListDokter::all();
        $listTindakan = ListTindakan::all();
        $listStatus = ListStatus::all();
        return view('jadwal_operasi.manage', [
            'data' => $data,
            'listDokter' => $listDokter,
            'listTindakan' => $listTindakan,
            'listStatus' => $listStatus
        ]);
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
