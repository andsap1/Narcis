<?php

namespace App\Http\Controllers;



use App\Models\Krepselis;
use App\Models\Atsiliepimas;
use App\Models\Kategorija;
use App\Models\Nuotrauka;
use App\Models\Preke;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrekeKrepselis;
use App\Models\Spalva;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{

//    public function index(){
//           $items = Preke::paginate(30);
//           $categories=Kategorija::all();
//        $colors=Spalva::all();
//        $photo=Nuotrauka::all();
//
//
//
//        return view('shop', compact('items','categories','colors','photo'));
//        }
    public function index(Request $request){
//        $items = Preke::paginate(30);
        $categories=Kategorija::all();
        $colors=Spalva::all();
        $photo=Nuotrauka::all();

        $items = $request->items ?? 10;      // get the pagination number or a default


        $members = Preke::paginate($items);

        return view('shop', compact('members','categories','colors','photo','items'));
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

    public function getCategory($category,Request $request)
    {
        $items = $request->items ?? 10;
        if ($category) {
            $members = Preke::where('fk_Kategorijaid', '=', $category)->paginate($items);
            $prekiusk = Preke::where('fk_Kategorijaid', '=', $category)->get();
            $cate=Kategorija::where('id_Kategorija','=',$category)->first();
            $photo=Nuotrauka::all();

        } else {
            $members = Preke::paginate($items);
//            $members = Preke::all();
            $prekiusk = $members;
            $cate='null';
        }
        $categories = Kategorija::all();
        $colors=Spalva::all();

        return view('shop', compact( 'categories','members','cate','photo','colors','items'));
    }


    public function getColor($color, Request $request)
    {
        $items = $request->items ?? 10;
        if ($color) {
            $members = Preke::where('fk_Spalva', '=', $color)->paginate($items);
            $prekiusk = Preke::where('fk_Spalva', '=', $color)->get();
//            $cate=Kategorija::where('id_Kategorija','=',$color)->first();
            $photo=Nuotrauka::all();

        } else {
            $members = Preke::paginate($items);
//            $members = Preke::all();
            $prekiusk = $members;

        }
        $cate='null';
        $categories = Kategorija::all();
        $colors=Spalva::all();

        return view('shop', compact( 'categories','members','cate','photo','colors','items'));
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

            return Redirect::back()->with('success', 'Prekė pridėta į krepšelį');
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

            return Redirect::back()->with('success', 'Prekė pridėta į krepšelį');
        }
    }

}
