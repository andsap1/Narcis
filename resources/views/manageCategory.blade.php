@extends('admin_app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Pridėti kategoriją</div>

                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/manageCategory')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Pavadinimas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                                </div>
                            </div>
                                    <button type="submit" id="mygtukas"class="btn btn-primary" style="float: right">
                                        Pridėti
                                    </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
