<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
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
        $users = User::paginate(10);
        return view('user.index', ['users' => $users]);
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
                'username' => "required|unique:users|max:191",
                'password' => "required|min:6|max:190",
                'password_confirmation' => "required|same:password",
                'role' => "required",
            ],
            [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah terdaftar',
                'username.max' => 'Username tidak boleh melebihi 191 karakter',
                'password.required' => 'Password harus diisi',
                'password.max' => 'Password maksimal 190 karakter',
                'password.min' => 'Password minimal 6 karakter',
                'password_confirmation.required' => 'Konfirmasi password harus diisi',
                'password_confirmation.same' => 'Password dan Konfirmasi Password harus sama',
                'role.required' => 'Role harus diisi', 'role' => "required",
            ]
        );

        $user = new User;
        $user->username = $request->get('username');
        $user->password = \Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->save();

        return redirect()->route('user.index')->with('status', "Berhasil menambahkan user $user->username");
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
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
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
                'username' => "required|max:191",
                'password' => "required|min:6|max:190",
                'password_confirmation' => "required|same:password",
                'role' => "required",
            ],
            [
                'username.required' => 'Username harus diisi',
                'username.max' => 'Username tidak boleh melebihi 191 karakter',
                'password.required' => 'Password harus diisi',
                'password.max' => 'Password maksimal 190 karakter',
                'password.min' => 'Password minimal 6 karakter',
                'password_confirmation.required' => 'Konfirmasi password harus diisi',
                'password_confirmation.same' => 'Password dan Konfirmasi Password harus sama',
                'role.required' => 'Role harus diisi', 'role' => "required",
            ]
        );

        $user = User::findOrFail($id);

        if ($user->username != $request->get('username')) {
            $request->validate(
                [
                    'username' => "unique:users"
                ],
                [
                    'username.unique' => 'Username sudah terdaftar',
                ]
            );
        }

        $user->username = $request->get('username');

        $user->password = \Hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->save();

        return redirect()->route('user.index')->with('status', "Berhasil mengedit user $user->username");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $username = $user->username;

        if ($username != "root") {
            $user->delete();
        } else {
            return redirect()->route('user.index')->with('status', "User $username tidak dapat dihapus");
        }

        return redirect()->route('user.index')->with('status', "Berhasil menghapus user $username");
    }
}
