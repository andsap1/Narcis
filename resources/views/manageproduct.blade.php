@extends('admin_app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Add product</div>

                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('manageProduct')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Category</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="fk_Kategorijaid" >
                                        <option value="{{ old('fk_Kategorijaid') }}"></option>
                                        @foreach($allCat as $ct)
                                            <option value="{{$ct->id_Kategorija}}">{{$ct->pavadinimas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Description</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="aprasymas" value="{{ old('aprasymas') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Price</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kaina" value="{{ old('kaina') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Date</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="ikelimo_data" value="{{ old('ikelimo_data') }}">
                                </div>
                            </div>


{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-10 offset-md-4" style="margin-left: -35px">--}}
                                    <button type="submit" class="btn btn-primary" style="float: right">
                                        Add
                                    </button>
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
