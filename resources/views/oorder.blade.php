@extends('app')
{{--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}

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
                        <td></td>

                        {{--                            <form method="POST" action="{{ Route('updatePreke',$resul->id_Preke_Krepselis) }}" >--}}
                        {{--                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        {{--                                <input type="submit" name="minus" value="-" class="minus">--}}
                        {{--                                <label >{{$resul->kiekis}} </label>--}}
                        {{--                                <input type="submit" name="plus" value="+" class="plus">--}}
                        {{--                            </form>--}}
                        {{--                        </td>--}}
                        {{--                        <td data-th="Subtotal" class="text-center" id="lyg">{{$resul->kiekis*$resul->kaina}} €</td>--}}
                        {{--                        <td id="lyg"> <a class="actions" onclick="return confirm('Do you really want to delete this?')"--}}
                        {{--                                         href="{{route('deletePreke', $resul->id_Tarpine)}}" >--}}
                        {{--                                <button class="btn btn-sm"><i class="glyphicon glyphicon-trash" style="color: red"></i></button>--}}
                        {{--                            </a>--}}
                        {{--                        </td>--}}

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


                </tr>
                </tfoot>
            </table>
            <div>Adresas:
                <input type="text"class="form-control" value="adresas">
            </div>
<h3 align="center">Apmokėjimas kortele</h3>
            <div style="text-align: center;">
            <h4 align="center">Kortelės numeris</h4>

            <input style="text-align: center;" type="text" class="card-number" placeholder="xxxx-xxxx-xxxx-xxxx">

                    <h5 align="">Vardas </h5>
                    <input align="center" type="text" class="card-number" placeholder="" >
                    <h5>Galiojimo data (mėnuo/metai)</h5>
                    <input type="text" class="month" placeholder="mm/yy">
                    <h5>CVV2/CVC2*</h5>
                    <input type="text" class="month" placeholder="xxx">

           <div>

            <button class="btn btn-dark mt-2">Mokėti</button>
           </div>
            </div>
        </div>
    </div>




@endsection
