@extends('app')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <div class="card card-outline-secondary my-4">

        <div class="card-body">
            <div class="container">
                <h2 class="text-center">Atsiliepimai</h2>
                <div class="card">
                    <div class="card-body">

            @foreach($items as $item)


                            <div class="row">
                                <div class="col-md-2">
                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                    <p class="text-secondary text-center">{{$item->data}}</p>
                                </div>
                                <p>
                                <div class="col-md-10">
                                    <h3 class="float-left"><strong>{{$item->naudotojo_vardas}}</strong></h3>
                                </p>
                                <div class="clearfix"></div>
                                <p>{{$item->tekstas}}</p>


                </div>
                        </div>
                    <hr>

            @endforeach

                            
            <a href="#" class="btn btn-dark">Leave a Review</a>
        </div>
    </div>
    </div>
