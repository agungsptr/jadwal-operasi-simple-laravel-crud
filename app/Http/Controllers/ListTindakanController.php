<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListTindakan;


class ListTindakanController extends Controller
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
        $list = ListTindakan::paginate(10);
        return view('list_tindakan.index', ['datas' => $list]);
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
                'tindakan' => "required|unique:list_tindakan",
            ],
            [
                'tindakan.required' => 'Tindakan harus diisi',
                'tindakan.unique' => 'Tindakan sudah diisi',
            ],
        );
        
        ListTindakan::create($request->all());
        return redirect()->route('tindakan.index')->with('status', 'Berhasil menambah tindakan');
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
        $tindakan = ListTindakan::findOrFail($id);
        return view('list_tindakan.edit', ['tindakan' => $tindakan]);
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
                'tindakan' => "required|unique:list_tindakan",
            ],
            [
                'tindakan.required' => 'Tindakan harus diisi',
                'tindakan.unique' => 'Tindakan sudah diisi',
            ],
        );

        $tindakan = ListTindakan::findOrFail($id);
        $tindakan->tindakan = $request->get('tindakan');
        $tindakan->save();

        return redirect()->route('tindakan.index')->with('status', "Berhasil mengedit tindakan $tindakan->tindakan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tindakan = ListTindakan::findOrFail($id);
        $val = $tindakan->tindakan;
        $tindakan->delete();

        return redirect()->route('tindakan.index')->with('status', "Berhasil menghapus tindakan $val");
    }
}
