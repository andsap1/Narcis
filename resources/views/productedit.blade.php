@extends('admin_app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Redaguoti prekę</div>

                    <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedProduct', $selectedProduct->id_Preke) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Pavadinimas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pavadinimas" value="{{$selectedProduct->pavadinimas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kategorija</label>
                            <div class="col-md-6">
                                <select class="form-control" name="fk_Kategorijaid">
                                    @foreach($allCat as $ct)
                                    @if($selectedProduct->fk_Kategorijaid === $ct->id_Kategorija)
                                    <option value="{{$selectedProduct->fk_Kategorijaid}}">{{$ct->pavadinimas}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($allCat as $ct)
                                    @if($selectedProduct->fk_Kategorijaid != $ct->id_Kategorija)
                                        <option value="{{$ct->id_Kategorija}}">{{$ct->pavadinimas}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Aprašymas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="aprasymas" value="{{$selectedProduct->aprasymas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kaina</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kaina" value="{{ $selectedProduct->kaina }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Data</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="ikelimo_data" value="{{ $selectedProduct->ikelimo_data }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Spalva</label>
                            <div class="col-md-6">
                                <select class="form-control" name="fk_Spalva">
                                    @foreach($colors as $cl)
                                        @if($selectedProduct->fk_Spalva === $cl->id_Spalva)
                                            <option value="{{$selectedProduct->fk_Spalva}}">{{$cl->pavadinimas}}</option>
                                        @endif
                                    @endforeach
                                    @foreach($colors as $cl)
                                        @if($selectedProduct->fk_Spalva != $cl->id_Spalva)
                                            <option value="{{$cl->id_Spalva}}">{{$cl->pavadinimas}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="float: right">
                                    Išsaugoti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
