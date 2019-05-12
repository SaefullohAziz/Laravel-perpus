<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if (Auth::user()->id == $id) {
        	return redirect()->route('admin.users.index')->with('warning', 'Anda tidak boleh mengubah diri sendiri!');
        }
        return view('admin.users.edit')->with(
        	['user' => User::find($id),
        	 'roles' => Role::all()
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
        if (Auth::user()->id == $id) {
        	return redirect()->route('admin.users.index')->with('danger', 'Anda tidak boleh mengubah akun anda sendiri!');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'Level user diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
        	return redirect()->route('admin.users.index')->with('danger', 'Anda tidak boleh menghapus akun anda sendiri!');
        }

        $user = User::find($id);

        if ($user) {
        	$user->roles()->detach();
        	$user->delete();
        	return redirect()->route('admin.users.index')->with('success', 'user dihapus!');
        }

        return redirect()->route('admin.users.index')->with('danger', 'user gagal dihapus!');
    }
}
