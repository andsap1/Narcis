<?php

namespace App\Http\Controllers;



use App\Models\Krepselis;
use App\Models\Atsiliepimas;
use App\Models\Kategorija;
use App\Models\Nuotrauka;
use App\Models\Preke;

use App\Models\PrekeKrepselis;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{

    public function index(){
           $items = Preke::paginate(10);
           $categories=Kategorija::all();

        return view('shop', compact('items','categories'));
        }

    public function openItem($id){
        $item = Preke::where('id_Preke', '=', $id)->first();
        $categoryname= Kategorija::where('id_Kategorija', '=', $item->fk_KategorijaId)->first();
        $categories = Kategorija::all();
        $mainphoto=Nuotrauka::where('fk_Prekeid_Preke','=',$id)->first();
//        if($mainphoto==null){
//            $mainphoto=new Nuotrauka();
//            $mainphoto->pavadinimas='no photo';
//        }
//        $kiekft=Nuotrauka::where('fk_preke','=',$id)->count();
//        $allphotos=Nuotrauka::where('fk_preke','=',$id)->offset(1)->take($kiekft)->get();
//        $comments=Komentaras::where('fk_preke','=',$id)->get();
        return view('item', compact('item','categories', 'categoryname','mainphoto'));

    }

    public function signout(){
        Auth::logout();
        return Redirect::to('/')->with('success', 'Jūs atsijungėte.');
    }




    //ADD ITEM TO THE CART
    public function insertPrekeKrepselis(Request $request)
    {
        $validator = Validator::make(
            ['kiekis' => $request->input('kiekis'),
            ],
            ['kiekis' => 'required|numeric'
            ]
        );
        if ($request->session()->has('krepselis')) {

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $preke = Preke::where('id_Preke', $request->input('preke'))->first();
            $krepsys = Krepselis::where('id_krepselis', session('krepselis'))->first();
            $naujakaina = (($preke->kaina) * $request->input('kiekis')) + $krepsys->suma;

            Krepselis::where('id_Krepselis', session('krepselis'))->update(
                [
                    'suma' => $naujakaina,
                ]);
            //prekes kiekio padidinimas jei tokia jau yra
            $vs=PrekeKrepselis::where('fk_Krepselis', session('krepselis'))->get();
            $skaicius=PrekeKrepselis::where('fk_Krepselis', session('krepselis'))->count();
            $index=-1;
            for($i=0; $i<$skaicius; $i++)
                if($vs[$i]->fk_Preke == $request->input('preke')) {
                    $index = $i;
                    break;
                }

            if ($index == - 1){
                $tarpine = new PrekeKrepselis();
                $tarpine->kiekis = $request->input('kiekis');
                $tarpine->fk_Preke = $request->input('preke');
                $tarpine->fk_Krepselis = session('krepselis');
                $tarpine->save();}
            else {
                PrekeKrepselis::where('id_Preke_Krepselis', $vs[$i]->id_Preke_Krepselis)->update([
                    'kiekis' => $request->input('kiekis')+$vs[$i]->kiekis]);
            }

            $kr=session('krepselis');
            $visosp = DB::table('preke_krepselis')->where('preke_krepselis.fk_Krepselis','=',$kr)->get();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);

            return Redirect::back()->with('success', 'Item(s) added to cart');
        }


        else {
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $kaina = Preke::where('id_Preke', $request->input('preke'))->first();

            $krepselis = new Krepselis();
            $krepselis->suma = ($kaina->kaina) * $request->input('kiekis');
            $krepselis->save();

            $tarpine = new PrekeKrepselis();
            $tarpine->kiekis = $request->input('kiekis');
            $tarpine->fk_Preke = $request->input('preke');
            $tarpine->fk_Krepselis = $krepselis->id_Krepselis;
            $tarpine->save();
            session(['krepselis' => $krepselis->id_Krepselis]);


            $kr=session('krepselis');
            $visosp = DB::table('preke_krepselis')->where('preke_krepselis.fk_Krepselis','=',$kr)->get();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);

            return Redirect::back()->with('success', 'Item(s) added to cart');
        }
    }

}
