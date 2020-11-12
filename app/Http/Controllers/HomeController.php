<?php

namespace App\Http\Controllers;



use App\Models\Kategorija;
use App\Models\Preke;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
           $items = Preke::all();
           $categories=Kategorija::all();

        return view('app', compact('items','categories'));
        }
}
