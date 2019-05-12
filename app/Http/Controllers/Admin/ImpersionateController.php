<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ImpersionateController extends Controller
{
    public function index($id)
    {
    	$user = User::where('id', $id)->first();

    	if ($user) {
    		session()->put('Impersionate', $user->id);
        	return redirect('/home')->with('success', 'Akses berhasil!');
    	}

    	return redirect('/home')->with('danger', 'Gagal mengakses!');
    }

    public function destroy()
    {
    	session()->forget('Impersionate');

        return redirect('/home')->with('danger', 'Akses diakhiri!');
    }
}
