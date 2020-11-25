@extends('app')
@section('content')


<div class="main-content">

    <div class="card mt-4 justify-content-center" style="margin-top: 0px!important;">

    <img class="card-img-top img-fluid foto" src="{{asset('images/rose.jpeg')}}" alt="">
{{--        <div ><img class="img-responsive" src="../images/{{$mainphoto->pavadinimas}}.jpg"} alt="paveiksliukas {{$mainphoto->pavadinimas}}"></div>--}}

        <div class="card-body">
        <h3 class="card-title">{{$item->pavadinimas}}</h3>
{{-- <img class=" img-fluid foto" align="right" src="{{asset('images/shopping-cart_1f6d2.png')}}" alt="">--}}


            <h4>{{$item->kaina}} Eur</h4>

            <p class="card-text">{{$item->aprasymas}}</p>
            <div>
            <form method="POST" action="{{Route('insertItem')}}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div style="float: right">
                    <span for="kiekis">Kiekis:</span>
                    <input type="number" id="kiekis" name="kiekis" min="1" max="10" value="1">
                </div>
                <br>

                <select name="preke" style="visibility: hidden">
                    <option value="{{$item->id_Preke}}">
                    </option>
                </select>

                <div>
                    <span id="cart-button"><button type="submit" class="btn btn-dark"  style="float: right;" >Užsakyti</button></span>
                </div>
            </form>
            </div>


{{--            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>--}}
        </div>
        <h3 align="center">Įvertinkite prekę!</h3>
        <div id="banner" align="center" ">
        <img  src="{{asset('images/banana.png')}}" alt="" width="75" height="75">
        <img  src="{{asset('images/alien.png')}}" alt="" width="75" height="75">
        <img  src="{{asset('images/red-heart.png')}}" alt="" width="75" height="75">
        <img  src="{{asset('images/thumbs-up.png')}}" alt="" width="75" height="75">
        <img  src="{{asset('images/tree.png')}}" alt="" width="75" height="75">
        </div>
</div>
<!-- /.card -->
</div>

@endsection
