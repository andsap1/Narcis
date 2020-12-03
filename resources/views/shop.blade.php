@extends('app')
@section('content')

    <div class="main-content">

<div class="row">
{{--    <h1 id="antraste">{{$cate->pavadinimas}}</h1>--}}
    @if(count($members) === 0)
        <p>Šiai kategorijai priklausančių prekių nėra.</p>
    @else
    @foreach($members as $item)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="{{ action('ShopController@openItem', $item->id_Preke)}}" >

                    @foreach($photo as $ph)
                        @if ($item->id_Preke == $ph->fk_Prekeid_Preke)
                            <img class="card-img-top" src="{{ asset('/images') . '/' . $ph->pavadinimas}}" alt="">
{{--                            <img src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$ph->pavadinimas}}" >--}}
                            @break
                            {{--                        @else {{'no photo'}} @break;--}}
                        @endif

                    @endforeach
{{--               <img class="card-img-top" src="{{asset('images/rose.jpeg')}}" alt="">--}}

                {{--                        <img src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$ph->pavadinimas}}" >--}}
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ action('ShopController@openItem', $item->id_Preke)}}">{{$item->pavadinimas}}</a>
                    </h4>
                    <h5>{{$item->kaina}} Eur</h5>
                    <p class="card-text">{{$item->aprasymas}}</p>
                    <p class="card-text">{{$item->fk_Spalva}}</p>
                </div>
                </a>
                {{--                        <div class="card-footer">--}}
                {{--                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
                {{--                        </div>--}}
            </div>
        </div>
    @endforeach
    @endif

<div align="center">
{{--        {{$items->links("pagination::bootstrap-4") }}--}}
</div>
</div>
</div>
    @endsection
@section('filter')
    <h3 class="lg-3" >Filtravimas</h3>
    @endsection

@section('category')
    <div class="list-group">

        <!-- Search form -->
{{--        <input class="form-control" style=" height: 50px" type="text" placeholder="Prekės paieška" aria-label="Search">--}}
        <h5 class="list-group-item" style="margin-bottom: 0px;" >Kategorijos</h5>
        @foreach($categories as $category)
            <a href="{{ action('ShopController@getCategory', $category->id_Kategorija)}}"
               class="list-group-item">{{ $category->pavadinimas }}</a>
    @endforeach
        <br>
        <h5 class="list-group-item" style="margin-bottom: 0px;">Spalvos</h5>
        @foreach($colors as $color)
        <a href="{{ action('ShopController@getColor', $color->id_Spalva)}}"
           class="list-group-item">{{ $color->pavadinimas }}</a>
        @endforeach
    @endsection
        @section('sort')

{{--            <select name="amount" style="float: right;" id="">--}}
{{--                <option value="10">10</option>--}}
{{--                <option value="25">25</option>--}}
{{--                <option value="50">50</option>--}}
{{--            </select>--}}

{{--            <h5 class="lg-4" align="right"  >Prekių skaičius puslapyje  &nbsp; </h5>--}}

             <form style="margin-bottom: .9rem" >
                  <select id="pagination" >
                             <option value="10" @if($items == 10) selected @endif >10</option>
                             <option value="25" @if($items == 25) selected @endif >25</option>
                             <option value="50" @if($items == 50) selected @endif >50</option>
                        </select> </form>

             <script>
                     document.getElementById('pagination').onchange = function() {
                         window.location = "{!! $members->url(1) !!}&items=" + this.value;
                     };  </script>


    @endsection

