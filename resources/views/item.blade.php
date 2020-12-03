@extends('app')
@section('content')

    <div class="main-content">
        <div class="card mt-4 justify-content-center p-5 border-dark">
            <div class="row">
                <div class="col-sm">
                    <h3 class="card-title">{{$item->pavadinimas}}</h3>
                    <img class="item" src="../images/{{$mainphoto->pavadinimas}}" alt="paveiksliukas {{$mainphoto->pavadinimas}}" >
{{--                    <div ><img class="img-responsive" src="../images/{{$mainphoto->pavadinimas}}.jpg"} alt="paveiksliukas {{$mainphoto->pavadinimas}}"></div>--}}

                    <div class="row">
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview" src="{{asset('images/rose.jpeg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview" src="{{asset('images/rose.jpeg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview" src="{{asset('images/rose.jpeg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview" src="{{asset('images/rose.jpeg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <p class="card-text pt-5">{{$item->aprasymas}}</p>
                    <h4 class="price">{{$item->kaina}} Eur</h4>
                    <form method="POST" action="{{Route('insertItem')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div style="display:flex; align-items: center; justify-content: flex-end">
                            <span>Kiekis:</span>
                            <input type="number" id="kiekis" name="kiekis" min="1" max="10" value="1"
                                   style="width: 50px;margin: 0 10px">
                            @guest
                                <span id="cart-button"><button type="button" disabled class="btn btn-dark"
                                                               style="float: right;">Užsakyti *
                            </button>
                            </span>
                            @else
                                <span id="cart-button"><button type="submit" class="btn btn-dark" style="float: right;">Užsakyti</button></span>
                            @endguest
                        </div>
                        @guest
                            <p style="float: right">*Pirkti galima tik prisijungus</p>
                        @endguest
                        <br>
                        <select name="preke" style="visibility: hidden">
                            <option value="{{$item->id_Preke}}">
                            </option>
                        </select>
                        <div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>

            <h5 align="center">Įvertinkite prekę</h5>
            <div class="row justify-content-center pt-5" style="padding-top: 10px!important;">
                <div class="justify-content-center flex-row d-flex">
                    <div class="column" align="center">
                        <img src="{{asset('images/banana.png')}}" alt="Snow" width="75" height="75">
                        <div align="center">0</div>
                    </div>
                    <div class="column">
                        <img src="{{asset('images/alien.png')}}" alt="Forest" width="75" height="75">
                        <div align="center">0</div>
                    </div>
                    <div class="column">
                        <img src="{{asset('images/red-heart.png')}}" alt="Forest" width="75" height="75">
                        <div align="center">0</div>
                    </div>
                    <div class="column">
                        <img src="{{asset('images/thumbs-up.png')}}" alt="Forest" width="75" height="75">
                        <div align="center">0</div>
                    </div>
                    <div class="column">
                        <img src="{{asset('images/tree.png')}}" alt="Forest" width="75" height="75">
                        <div align="center">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
