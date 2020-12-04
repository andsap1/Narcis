<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Krepselis;
use App\Models\Preke;
use App\Models\PrekeKrepselis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $kr=session('krepselis');
        if(session()->has('krepselis')) {
            $result=DB::table('krepselis')->where('krepselis.id_Krepselis','=',$kr)->leftJoin('preke_krepselis', 'id_Krepselis','=','preke_krepselis.fk_Krepselis')
                ->leftJoin('preke','preke_krepselis.fk_Preke','=','id_Preke')
                ->select('preke_krepselis.*','preke.kaina','preke.pavadinimas','preke.aprasymas',DB::raw('krepselis.suma as kr_kaina'))->get();

            $visosp = DB::table('preke_krepselis')->where('preke_krepselis.fk_Krepselis','=',$kr)->get();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);
        }
        else {
            return Redirect::back();
        }

        return view('cart', compact('allcategories','result', 'kr'));
    }

    public function order(){
        $allcategories=Kategorija::all();
        $kr=session('krepselis');
        if(session()->has('krepselis')) {
            $result=DB::table('krepselis')->where('krepselis.id_Krepselis','=',$kr)->leftJoin('preke_krepselis', 'id_Krepselis','=','preke_krepselis.fk_Krepselis')
                ->leftJoin('preke','preke_krepselis.fk_Preke','=','id_Preke')
                ->select('preke_krepselis.*','preke.kaina','preke.pavadinimas','preke.aprasymas',DB::raw('krepselis.suma as kr_kaina'))->get();

            $visosp = DB::table('preke_krepselis')->where('preke_krepselis.fk_Krepselis','=',$kr)->get();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);
        }
        else {
            return Redirect::back();
        }

        return view('oorder', compact('allcategories','result', 'kr'));


    }

    public function completed(){

        return view('completed');
    }
//    public function updatePreke($id, Request $request){
//        $kr=session('krepselis');
//        $preke= PrekeKrepselis::where('id_Preke_Krepselis','=',$id)->first();
//        $plus=$request->input('plus');
//        $minus=$request->input('minus');
//        if($plus!=null){
//            $preke->update(
//                [
//                    'kiekis' => $preke->kiekis+1,
//                ]);
//            $naujakaina=0;
//            $visoskp=PrekeKrepselis::where('fk_krepselis','=',$kr)->get();
//            foreach ($visoskp as $vp){
//                $preke=Preke::where('id_preke',$vp->fk_preke)->first();
//                $naujakaina=$naujakaina+($preke->kaina*$vp->kiekis);
//            }
//            Krepselis::where('id_krepselis', $kr)->update(
//                [
//                    'kaina' => $naujakaina,
//                ]);
//            return Redirect::back()->with('success', 'Quantity changed');
//        }
//        elseif($minus!=null && $preke->kiekis>1){
//            $preke->update(
//                [
//                    'kiekis' => $preke->kiekis-1,
//                ]);
//            $naujakaina=0;
//            $visoskp=PrekeKrepselis::where('fk_krepselis','=',$kr)->get();
//            foreach ($visoskp as $vp){
//                $preke=Preke::where('id_preke',$vp->fk_preke)->first();
//                $naujakaina=$naujakaina+($preke->kaina*$vp->kiekis);
//            }
//            Krepselis::where('id_krepselis', $kr)->update(
//                [
//                    'kaina' => $naujakaina,
//                ]);
//            return Redirect::back()->with('success', 'Quantity changed');
//        }
//        else {
//            return Redirect::back()->withErrors('Quantity can not be less than 1');
//        }
//
//
//    }
//
    public function deletePreke($id)
    {
        $kr=session('krepselis');
        if( PrekeKrepselis::where('fk_Krepselis','=',$kr)->count()>1)
        {
            PrekeKrepselis::where('id_Preke_Krepselis','=',$id)->delete();

            //update krepselio suma
            $naujakaina=0;
            $visoskp=PrekeKrepselis::where('fk_Krepselis','=',$kr)->get();
            foreach ($visoskp as $vp){
                $preke=Preke::where('id_Preke',$vp->fk_Preke)->first();
                $naujakaina=$naujakaina+($preke->kaina*$vp->kiekis);
            }
            Krepselis::where('id_Krepselis', $kr)->update(
                [
                    'suma' => $naujakaina,
                ]);
            return Redirect::back()->with('success', 'Pašalinta');
        }

        else{
            PrekeKrepselis::where('id_Preke_Krepselis','=',$id)->delete();
            $visosp=PrekeKrepselis::where('fk_Krepselis','=',$kr)->get();
            Krepselis::where('id_Krepselis','=',$kr)->delete();

            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);
            session()->forget('krepselis');

            return Redirect::to('/')->with('success', 'Pašalinta');
        }

    }

}
