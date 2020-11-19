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

        $atsiliepimai->save();
        return Redirect::to('/atsiliepimai')->with('success', 'Atsiliepimas pridėtas');
    }

    public function editReview($id){
        $item = Atsiliepimas::where('id_Atsiliepimas', '=', $id)->first();

        return view('edit_review', compact('item'));
    }
}
