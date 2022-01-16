@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="catalog_table">
                    @foreach($result['autos'] as $auto)
                        <div class="row mb-4">
                            <div class="col-4 catalog-img">
                                <img src="{{ asset('/storage/'.$auto->image) }}" alt=""/>
                            </div>
                            <div class="col-8 catalog_desc">
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
                                    {{ $result['autos']->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <form class="custom-form" method="post" action="/auto/check" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-selects">
                        <div class="select-name mb-1">Бренд:</div>
                        <input name="brand" class="select-result" onclick="customDropDown(this)" autocomplete="off"></input>
                        <div class="custom-inner">
                            @foreach($result['brands'] as $brand)
                                <div class="custom-option" value="{{$brand->brand}}">{{$brand->brand}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="select-name mb-1 mt-2">Модель:</div>
                    <input name="name" type="text" class="input-result" autocomplete="off"></input>
                    <div class="select-name mb-1 mt-2">VIN:</div>
                    <input name="vin" type="text" class="input-result" autocomplete="off"></input>
                    <div class="select-name mb-1 mt-2">Цвет:</div>
                    <input name="color" type="text" class="input-result" autocomplete="off"></input>
                    <div class="select-name mt-2">
                        <span>Загрузить фото:</span>
                        <input name="image" type="file" class="form-file" autocomplete="off"></input>
                        <div class="btn-form btn-file" value="добавить">+</div>
                    </div>

                    <input type="submit" class="btn-form mt-5" value="добавить авто">
                </form>
            </div>
        </div>
    </div>
@endsection


