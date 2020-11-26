<?php

namespace App\Http\Controllers;

use App\Models\Atsiliepimas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function reviews(){
        $items = Atsiliepimas::all();



        return view('review', compact('items'));
    }
    public function newReview(){
        return view('new_review');
    }

    public function addReview(Request $request){

        $user = auth()->user();

        $atsiliepimai = new Atsiliepimas();
        $atsiliepimai -> naudotojo_vardas = $user->name;
        $atsiliepimai -> tekstas = $request->input('content');
        $atsiliepimai -> fk_naudotojasid_Naudotojas = $user->id;

        $atsiliepimai->save();
        return Redirect::to('/atsiliepimai')->with('success', 'Atsiliepimas pridėtas!');
    }

    public function editReview($id){
        $item = Atsiliepimas::where('id_Atsiliepimas', '=', $id)->first();

        return view('edit_review', compact('item'));
    }

    public function editedReview(Request $request, $id)
    {
        $atsiliepimai= Atsiliepimas::where('id_atsiliepimas', '=', $id)->first();
        $atsiliepimai -> tekstas = $request->input('content');
        $atsiliepimai->save();

        //$atsiliepimas = Atsiliepimas::where('id_atsiliepimas', '=', $id)->first()->update($request);

        return Redirect::to('/atsiliepimai')->with('success', 'Atsiliepimas redaguotas!');
    }
}
