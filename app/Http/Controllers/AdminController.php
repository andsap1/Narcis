<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Preke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $items = Preke::paginate(4);
        $categories=Kategorija::all();

        return view('admin_app', compact('items','categories'));
    }

    public function adminSignout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login/');
    }
}
