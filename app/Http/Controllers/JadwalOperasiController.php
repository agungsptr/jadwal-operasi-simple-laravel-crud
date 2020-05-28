<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalOperasi;
use App\ListDokter;
use App\ListTindakan;
use App\ListStatus;

class JadwalOperasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = JadwalOperasi::orderBy('jam_masuk', 'ASC')->paginate(10);
        $listDokter = ListDokter::all();
        $listTindakan = ListTindakan::all();
        $listStatus = ListStatus::all();
        return view('jadwal_operasi.manage', [
            'data' => $data,
            'listDokter' => $listDokter,
            'listTindakan' => $listTindakan,
            'listStatus' => $listStatus,
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
        $request->validate(
            [
                'pasien => "required',
                'dokter => "required',
                'tindakan' => "required",
                'status' => "required",
                'jam_masuk' => "required",
            ],
            [
                'pasien.required' => 'Tindakan harus diisi',
                'dokter.required' => 'Tindakan harus diisi',
                'tindakan.required' => 'Tindakan harus diisi',
                'status.required' => 'Tindakan harus diisi',
                'jam_masuk.required' => 'Tindakan harus diisi',
            ],
        );
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
        $listDokter = ListDokter::all();
        $listTindakan = ListTindakan::all();
        $listStatus = ListStatus::all();
        $jo = JadwalOperasi::findOrFail($id);
        return view('jadwal_operasi.manage_edit', [
            'data' => $jo,
            'listDokter' => $listDokter,
            'listTindakan' => $listTindakan,
            'listStatus' => $listStatus,
        ]);
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
                'pasien => "required',
                'dokter => "required',
                'tindakan' => "required",
                'status' => "required",
                'jam_masuk' => "required",
            ],
            [
                'pasien.required' => 'Tindakan harus diisi',
                'dokter.required' => 'Tindakan harus diisi',
                'tindakan.required' => 'Tindakan harus diisi',
                'status.required' => 'Tindakan harus diisi',
                'jam_masuk.required' => 'Tindakan harus diisi',
            ],
        );
        $jo = JadwalOperasi::findOrFail($id);
        $jo->pasien = $request->get('pasien');
        $jo->dokter = $request->get('dokter');
        $jo->tindakan = $request->get('tindakan');
        $jo->status = $request->get('status');
        $jo->jam_masuk = $request->get('jam_masuk');
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
