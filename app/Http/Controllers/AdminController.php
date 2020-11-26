<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Preke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $items = Preke::paginate(4);
        $categories = Kategorija::all();

        return view('admin_app');
    }

    public function adminSignout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login/');
    }

    public function products()
    {
        $items = Preke::all();
        $categories = Kategorija::all();

        return view('product', compact('items', 'categories'));
    }

    public function addProduct()
    {
        $allCat = Kategorija::all();
        return view('manageProduct', compact('allCat'));
    }

    public function insertProduct(Request $request)
    {
        $validator = Validator::make(
            ['pavadinimas' => $request->input('pavadinimas'),
                'fk_Kategorijaid' => $request->input('fk_Kategorijaid'),
                'aprasymas' => $request->input('aprasymas'),
                'kaina' => $request->input('kaina'),
                'ikelimo_data' => $request->input('ikelimo_data'),
            ],
            [
                'pavadinimas' => 'required|min:1|max:30',
                'fk_Kategorijaid' => 'required',
                'aprasymas' => 'required|min:3',
                'kaina' => 'required',
            ]
        );

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $allPro = new Preke();
            $allPro->pavadinimas = $request->input('pavadinimas');
            $allPro->fk_Kategorijaid = $request->input('fk_Kategorijaid');
            $allPro->aprasymas = $request->input('aprasymas');
            $allPro->kaina = $request->input('kaina');
            $allPro->ikelimo_data = $request->input('ikelimo_data');

            $allPro->save();

        }
        return Redirect::to('/product')->with('success', 'Product added');
    }
}
