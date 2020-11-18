<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>

<body>
<style>
    /* Modify the background color */

    .navbar-custom {
        background-color: #413348;
    }
    /* Modify brand and text color */

    .navbar-custom .navbar-brand


</style>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{!! \Session::get('success') !!}</p>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>There is an error in the data you are entering:</p>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<nav class="navbar navbar-custom navbar-expand-lg navbar-dark  fixed-top ">
    <div class="container col-11">
{{--        <a class="navbar-brand" href="#">Start Bootstrap</a>--}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
           <div class="col-lg-3">
               <img class="logo" src="{{asset('images/final1.png')}}"  class="rounded float-left" alt="...">
           </div>
<div class="col-lg-9">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{action('ShopController@index')}}">Gėlės
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Susikūrk puokštę!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Susisiek su mumis!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontaktai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('ShopController@reviews')}}">Atsiliepimai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('ShopController@login')}}">Prisijungti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registruotis</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <div class="col-1">
{{--        <div class="cart-item">--}}
            <a href="{{asset('cart')}}">
                <img class="cart" src="{{asset('images/shopping-cart.png')}}"  />
            </a>
            {{--                <div class="cart_count"><span>--}}
            {{--                    @if(session()->has('kiekis'))--}}
            {{--                            {{session('kiekis')}}--}}
            {{--                        @else--}}
            {{--                            0--}}
            {{--                        @endif--}}
            {{--                </span></div>--}}
        </div>
{{--    </div>--}}
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            @yield('filter') {{--   <h3 class="lg-3">Filtravimas</h3>--}}


            @yield('category'){{--   <div class="list-group">
                   <h4 class="list-group-item">Kategorijos</h4>
                     @foreach($categories as $category)
                     <a href="#" class="list-group-item">{{ $category->pavadinimas }}</a>
     {{--
     {{--                    --}}{{--                <li><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>--}}


{{--                    </div>--}}
{{-- @endforeach--}}
</div>

</div>
<!-- /.col-lg-3 -->

<div class="col-lg-9">
@yield('sort')
@yield('content')


</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" >
<div class="container">
<p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
