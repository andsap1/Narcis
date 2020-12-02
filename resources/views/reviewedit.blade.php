@extends('admin_app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Redaguoti atsiliepimą</div>

                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/confirmEditedReview', $selected->id_Atsiliepimas) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Naudotojo_vardas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="naudotojo_vardas" value="{{$selected->naudotojo_vardas}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Tekstas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tekstas" value="{{$selected->tekstas}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Nuotrauka</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="naudotojo_nuotraukos_pavadinimas" value="{{ $selected->naudotojo_nuotraukos_pavadinimas }}">
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
