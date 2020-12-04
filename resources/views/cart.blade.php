@extends('app')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('content')

    <div class="container" id="cart_sonas">
        <div class="col-lg-12">
            <table id="cart" class="table table-hover table-condensed" >
                <thead>
                <tr style="border-bottom: 0px">
                    <th style="width:45%;border-bottom: 10px;">Prekė</th>
                    <th style="width:10%;border-bottom: 10px;">Vnt kaina</th>
                    <th style="width:15%;border-bottom: 10px;">Kiekis</th>
                    <th style="width:22%;border-bottom: 10px;"class="text-center">Kaina</th>
                    <th style="width:10%;border-bottom: 10px;"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($result as $resul)
                        <td data-th="Product">
                            {{--                            <div class="row">--}}
                            <div class="col-sm-8">
                                <h4 style="padding-left: 15px" id="countas"> &nbsp {{$resul->pavadinimas}} </h4>
                            </div>
                            {{--                            </div>--}}
                        </td>
                        <td data-th="Price" id="lyg">{{$resul->kaina}} €</td>
                        <td data-th="Quantity" id="lyg" >{{$resul->kiekis}}</td>
                        <td data-th="Subtotal" class="text-center" id="lyg">{{$resul->kiekis*$resul->kaina}} €</td>


{{--                            <form method="POST" action="{{ Route('updatePreke',$resul->id_Preke_Krepselis) }}" >--}}
{{--                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                <input type="submit" name="minus" value="-" class="minus">--}}
{{--                                <label >{{$resul->kiekis}} </label>--}}
{{--                                <input type="submit" name="plus" value="+" class="plus">--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                        <td data-th="Subtotal" class="text-center" id="lyg">{{$resul->kiekis*$resul->kaina}} €</td>--}}
                        <td id="lyg"> <a class="actions" onclick="return confirm('Tikrai pašalinti?')"
                                         href="{{route('deletePreke', $resul->id_Preke_Krepselis)}}" >
                                <button class="button-red"><svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2zm9.854 4.854a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                                    </svg></button>
{{--                                <button class="button red" type="delete"></button--}}
                            </a>
                        </td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>

                <tr>
                    <td colspan="3" class="hidden-xs"></td>

                    @foreach($result as $resul)


                        <td class="hidden-xs text-center"><strong>{{$resul->kr_kaina}} €</strong>
                            @break
                        </td> @endforeach
                    <td>
                        <a href="{{ asset('/order') }}" class="btn btn-block" style="background-color: black; color: white">Užsakyti</a>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>




@endsection
