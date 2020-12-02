@extends('admin_app')
@section('content')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" id="antraste">Redaguoti užsakymą</div>

                        <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/confirmEditedOrder', $selectedOrder->id_Uzsakymas) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Adress</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="adresas" value="{{$selectedOrder->adresas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">First name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vardas" value="{{$selectedOrder->vardas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Last name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pavarde" value="{{$selectedOrder->pavarde}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Order state</label>
                            <div class="col-md-6">
                                <select class="form-control" name="busena">
                                    <option value="{{$state->pavadinimas}}">{{$state->pavadinimas}}</option>
                                    @if($selectedOrder->busena != "Pateiktas")
                                    <option>pateiktas</option>
                                    @endif
                                    @if($selectedOrder->busena != "Atšauktas")
                                    <option>atšauktas</option>
                                    @endif
                                    @if($selectedOrder->busena != "Įvykdytas")
                                    <option>įvykdytas</option>
                                    @endif
                                    @if($selectedOrder->busena != "Patvirtintas")
                                    <option>patvirtintas</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                                        <button type="submit" class="btn btn-primary" style="float: right">
                                            Patvirtinti
                                        </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
