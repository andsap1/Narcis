<?php

namespace App\Http\Controllers;



use App\Models\Kategorija;
use App\Models\Nuotrauka;
use App\Models\Preke;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index(){
           $items = Preke::all();
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
}
