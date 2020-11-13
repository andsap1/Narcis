@extends('app')
@section('content')


<div class="main-content">

    <div class="card mt-4" style="margin-top: 0px!important;">

    <img class="card-img-top img-fluid foto" src="{{asset('images/rose.jpeg')}}" alt="">
{{--        <div ><img class="img-responsive" src="../images/{{$mainphoto->pavadinimas}}.jpg"} alt="paveiksliukas {{$mainphoto->pavadinimas}}"></div>--}}

        <div class="card-body">
        <h3 class="card-title">{{$item->pavadinimas}}</h3>
{{-- <img class=" img-fluid foto" align="right" src="{{asset('images/shopping-cart_1f6d2.png')}}" alt="">--}}
            <a href="#" class="btn btn-dark"  style="float: right;" >Užsakyti</a>
<h4>{{$item->kaina}} Eur</h4>

<p class="card-text">{{$item->aprasymas}}</p>

<span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
4.0 stars
</div>
</div>
<!-- /.card -->


@endsection
