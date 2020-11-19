<?php

namespace App\Http\Controllers;

use App\Models\Atsiliepimas;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews(){
        $items = Atsiliepimas::all();

        return view('review', compact('items'));
    }
    public function newReview(){
        return view('new_review');
    }
    public function editReview($id){
        $item = Atsiliepimas::where('id_Atsiliepimas', '=', $id)->first();

        return view('edit_review', compact('item'));
    }
}
