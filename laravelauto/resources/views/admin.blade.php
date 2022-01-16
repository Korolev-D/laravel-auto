@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form class="custom-form" action="/brand">
                    <div class="select-name mb-2 mt-2">Не используемые бренды:</div>
                    <ul>
                        @foreach($result['no_brands'] as $no_brand)
                            <li>{{$no_brand}}</li>
                        @endforeach
                    </ul>
                    <div class="select-name mb-2 mt-5">Добавить бренд:</div>
                    <input type="text" name="brand" class="input-result" autocomplete="off"></input>
                    <input type="submit"class="btn-form mt-2" value="добавить бренд">
                    <div class="select-name mb-2 mt-5">Пользователи:</div>
                    <ul>
                        @foreach($result['users'] as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="col-8">
                <div class="catalog_table row">
                    @foreach($result['autos'] as $auto)
                        <div class="col-6 row mb-4">
                            <div class="col-6 catalog-img">
                                <img src="{{ asset('/storage/'.$auto->image) }}" alt=""/>
                            </div>
                            <div class="col-6 catalog_desc">
                                <div>{{$auto->brand}}</div>
                                <div class="title_box">
                                    <h4>{{$auto->name}}</h4>
                                </div>
                                <div class="clear"></div>
                                <div class="grey_area">
                                    <div>VIN {{$auto->vin}}</div>
                                    <div>цвет {{$auto->color}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $result['autos']->links() }}
            </div>
        </div>
    </div>

@endsection


