@extends('admin_app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Redaguoti kategoriją</div>

                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/confirmEditedCategory', $selectedProduct->id_Kategorija) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Pavadinimas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pavadinimas" value="{{$selectedProduct->pavadinimas}}">
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
