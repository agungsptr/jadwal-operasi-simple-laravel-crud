<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\ListStatus;

class ListStatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ListStatus::paginate(10);
        return view('list_status.index', ['datas' => $list]);
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
                'status' => "required|unique:list_status",
            ],
            [
                'status.required' => 'Status harus diisi',
                'status.unique' => 'Status sudah diisi',
            ],
        );

        ListStatus::create($request->all());
        return redirect()->route('status.index')->with('status', 'Berhasil menambah status');
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
        $status = ListStatus::findOrFail($id);
        return view('list_status.edit', ['status' => $status]);
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
                'status' => "required|unique:list_status",
            ],
            [
                'status.required' => 'Status harus diisi',
                'status.unique' => 'Status sudah diisi',
            ],
        );
        $status = ListStatus::findOrFail($id);
        $status->status = $request->get('status');
        $status->save();

        return redirect()->route('status.index')->with('status', "Berhasil mengedit status $status->status");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = ListStatus::findOrFail($id);
        $val = $status->status;
        $status->delete();

        return redirect()->route('status.index')->with('status', "Berhasil menghapus status $val");
    }
}
