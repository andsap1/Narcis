<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Preke;
use App\Models\PrekeKrepselis;
use Carbon\Carbon;
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
    public function categories()
    {
        $items = Kategorija::all();
        return view('categories', compact('items'));
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
                'spalva' => $request->input('spalva'),
            ],
            [
                'pavadinimas' => 'required|min:1|max:30',
                'fk_Kategorijaid' => 'required',
                'aprasymas' => 'required|min:3',
                'kaina' => 'required',
                'spalva' => 'required'
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
            $allPro->spalva = $request->input('spalva');
            $allPro->ikelimo_data = Carbon::now();

            $allPro->save();

        }
        return Redirect::to('admin/products')->with('success', 'Product added');
    }

    public function confirmEditedProduct(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'pavadinimas'=> $request->input('pavadinimas'),
                'aprasymas'=> $request->input('aprasymas'),
                'kaina' => $request->input('kaina'),
                'ikelimo_data' => $request->input('ikelimo_data'),
                'spalva' => $request->input('spalva'),
                'fk_Kategorijaid' => $request->input('fk_Kategorijaid')

            ],
            [
                'pavadinimas'=> 'required|max:30',
                'aprasymas'=> 'required',
                'kaina' => 'required',
                'ikelimo_data' => 'required',
                'spalva' => 'required',
                'fk_Kategorijaid' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data = Preke::where('id_Preke', '=', $id)->update(
                [
                    'pavadinimas'=> $request->input('pavadinimas'),
                    'aprasymas'=> $request->input('aprasymas'),
                    'kaina' => $request->input('kaina'),
                    'ikelimo_data' => $request->input('ikelimo_data'),
                    'spalva' => $request->input('spalva'),
                    'fk_Kategorijaid' => $request->input('fk_Kategorijaid')

                ]
            );
        }
        return Redirect::to('admin/products')->with('success', 'Prekė pakoreguota');
    }

    public function editProduct($id)
    {
        $selectedProduct = Preke::where('id_Preke','=',$id)
            ->select('preke.*')
            ->first();

        $allCat = Kategorija::all();
        return view('productedit', compact('selectedProduct', 'allCat'));
    }

    public function deleteProduct($id)
    {
//        $koment=Komentaras::where('fk_preke','=',$id)->get();
//        foreach ($koment as $kom) {
//            Komentaras::where('id_komentaras','=',$kom->id_komentaras)->delete();
//        }
//        $nuot=Nuotrauka::where('fk_preke','=',$id)->get();
//        foreach ($nuot as $nuo) {
//            Nuotrauka::where('id_nuotrauka','=',$nuo->id_nuotrauka)->delete();
//        }
        $prekkrep=PrekeKrepselis::where('fk_Preke','=',$id)->get();
        foreach ($prekkrep as $pk) {
            PrekeKrepselis::where('id_Preke_Krepselis','=',$pk->id_Preke_Krepselis)->delete();
        }
        Preke::where('id_Preke','=',$id)->delete();
        return Redirect::to('admin/products')->with('Prekė ištrinta');
    }

///KATEGORIJA
    public function insertCategory(Request $request)
    {
        $validator = Validator::make(
            [   'pavadinimas' =>$request->input('pavadinimas')
            ],
            [
                'pavadinimas' => 'required|min:1|max:30'
            ]
        );

        if ($validator->fails())
        {

            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $allCat = new Kategorija();
            $allCat->pavadinimas = $request->input('pavadinimas');

            $allCat->save();

        }
        return Redirect::to('admin/categories')->with('success', 'Kategorija pridėta');
    }

    public function addCategory()
    {
        return view('manageCategory');
    }

    public function confirmEditedCategory(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'pavadinimas'=> $request->input('pavadinimas')
            ],
            [
                'pavadinimas'=> 'required|max:30'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $data = Kategorija::where('id_Kategorija', '=', $id)->update(
                [
                    'pavadinimas'=> $request->input('pavadinimas')
                ]
            );
        }
        return Redirect::to('admin/categories')->with('success', 'Kategorija pakoreguota');
    }

    public function editCategory($id)
    {
        $selectedProduct = Kategorija::where('id_Kategorija','=',$id)->first();
        return view('categoryEdit', compact('selectedProduct'));
    }

}
