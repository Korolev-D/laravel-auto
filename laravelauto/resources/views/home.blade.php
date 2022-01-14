@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header text-center">Добавить авто</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="post" action="/auto/check" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="name" id="name" placeholder="Введите name" class="form-control"><br>
                                <input type="text" name="vin" id="vin" placeholder="Введите vin" class="form-control"><br>
                                <input type="text" name="color" id="color" placeholder="Введите color" class="form-control"><br>
                                <input type="file" name="image"><br>
                                <button type="submit" class="btn btn-success mt-3">Добавить авто</button>
                            </form>
                        <ul class="catalog_table">
                            @foreach($autos as $auto)
                                <li>
                                    <a href="#" class="thumb"><img src="{{ asset('/storage/'.$auto->image) }}" alt=""/></a>
                                    <div class="catalog_desc">
                                        <div class="location">Location: Berlin, Germany</div>
                                        <div class="title_box">
                                            <h4><a href="#">{{$auto->name}}</a></h4>
                                            <div class="price">54980 EURO</div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="grey_area">
                                            <span>VIN {{$auto->vin}}</span>
                                            <span>цвет {{$auto->color}}</span>
                                            <span>230 HP</span>
                                            <span>Body Coupe</span>
                                            <span>80 000 Miles</span>
                                        </div>
{{--                                        <a href="#" class="more markered">View details</a>--}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{--                    {{ __('You are logged in!') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


