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
                                <img class="img-preview img-responsive" id="zoom" src="../images/{{$mainphoto->pavadinimas}}" alt="paveiksliukas {{$mainphoto->pavadinimas}}">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview img-responsive" id="zoom" src="../images/{{$mainphoto->pavadinimas}}" alt="paveiksliukas {{$mainphoto->pavadinimas}}">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview img-responsive" id="zoom" src="../images/{{$mainphoto->pavadinimas}}" alt="paveiksliukas {{$mainphoto->pavadinimas}}">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="img-thumbnail">
                                <img class="img-preview img-responsive" id="zoom" src="../images/{{$mainphoto->pavadinimas}}" alt="paveiksliukas {{$mainphoto->pavadinimas}}">
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
                        <div id="poke"><input type="image" src="{{asset('images/banana.png')}}" width="75" height="75" /></div>
                        <div id="counter">7</div>


                        <script type='text/javascript'>
                            var poke = document.getElementById('poke');
                            var cmp = document.getElementById('counter');
                            poke.addEventListener('click', myfonction)
                            poke.addEventListener('dblclick',myfonction1)

                            //===========================================================
                            function myfonction() {

                                cmp.innerHTML = 8;

                            }

                            function myfonction1() {

                                cmp.innerHTML = 7;


                            }
                        </script>

                    </div>
                    <div class="column">
                        <div id="poke1"><input type="image" src="{{asset('images/alien.png')}}" width="75" height="75" /></div>
                        <div id="counter1" align="center">15</div>


                        <script type='text/javascript'>
                            var poke1 = document.getElementById('poke1');
                            var cmp1 = document.getElementById('counter1');
                            poke1.addEventListener('click', myfonction2)
                            poke1.addEventListener('dblclick',myfonction3)

                            //===========================================================
                            function myfonction2() {

                                cmp1.innerHTML = 16;

                            }

                            function myfonction3() {

                                cmp1.innerHTML = 15;


                            }
                        </script>
                    </div>
                    <div class="column">
                        <div id="poke2"><input type="image" src="{{asset('images/red-heart.png')}}" width="75" height="75" /></div>
                        <div id="counter2" align="center">30</div>


                        <script type='text/javascript'>
                            var poke2 = document.getElementById('poke2');
                            var cmp2 = document.getElementById('counter2');
                            poke2.addEventListener('click', myfonction2)
                            poke2.addEventListener('dblclick',myfonction3)

                            //===========================================================
                            function myfonction2() {

                                cmp2.innerHTML = 31;

                            }

                            function myfonction3() {

                                cmp2.innerHTML = 30;


                            }
                        </script>
                    </div>
                    <div class="column">
                        <div id="poke3"><input type="image" src="{{asset('images/thumbs-up.png')}}" width="75" height="75" /></div>
                        <div id="counter3" align="center">2</div>


                        <script type='text/javascript'>
                            var poke3 = document.getElementById('poke3');
                            var cmp3 = document.getElementById('counter3');
                            poke3.addEventListener('click', myfonction2)
                            poke3.addEventListener('dblclick',myfonction3)

                            //===========================================================
                            function myfonction2() {

                                cmp3.innerHTML = 3;

                            }

                            function myfonction3() {

                                cmp3.innerHTML = 2;


                            }
                        </script>
                    </div>
                    <div class="column">
                        <div id="poke4"><input type="image" src="{{asset('images/tree.png')}}" width="75" height="75" /></div>
                        <div id="counter4" align="center">17</div>


                        <script type='text/javascript'>
                            var poke4 = document.getElementById('poke4');
                            var cmp4 = document.getElementById('counter4');
                            poke4.addEventListener('click', myfonction2)
                            poke4.addEventListener('dblclick',myfonction3)

                            //===========================================================
                            function myfonction2() {

                                cmp4.innerHTML = 18;

                            }

                            function myfonction3() {

                                cmp4.innerHTML = 17;


                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
