@extends('admin_app')
@section('content')

    <a href="{{action('AdminController@addCategory')}}" id="green_btn" class="btn btn-primary" style="width: 120px; margin-left: 30px">
        Pridėti kategoriją</a>
    <ul class="col-md-12">

        <div class="container">
            <div class="col-lg-12 offset-lg-1" style="padding-top: 10px; margin-left: -15px">
                <table class="table table-hover table-condensed" >
                    <thead>
                    <tr style="border-bottom: 1px">
                        <th style="width:50%;border-bottom: 10px;">ID</th>
                        <th style="width:50%;border-bottom: 10px;">Pavadinimas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id_Kategorija }}</td>
                            <td>{{ $item->pavadinimas }}</td>
                            <td ><a href="{{route('adminRoutes.categoryEdit', $item->id_Kategorija)}}"><button class="button" type="edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                                        </svg></button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </ul>

@endsection
