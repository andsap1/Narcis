@extends('app')
@section('content')
    <div class="main-content">
    <h1 class="align">Naujas atsiliepimas </h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('kurejas/pridetiKureja/') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group">

                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="content"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-dark">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                    Pridėti atsiliepimą
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
