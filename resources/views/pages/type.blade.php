@extends('layout.master')

@section('content')

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            @foreach($typeID as $typ)
            <div>
                <div class="row">
                    @foreach($cate as $cat)
                    @if($typ->category_id == $cat->id)
                    <div class="col-md-8 col-md-offset-2 gtco-heading text-center">
                        <a href="{{ URL('type/'.$typ->id) }}">
                            <h2 style="color:green;">{{ $cat->catName }} {{ $typ->typeName }}</h2>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-carousel">
                            @foreach($product as $pro)
                            @if($pro->type_id == $typ->id)
                            <div class="item">
                                <div class="gtco-item">
                                    <a href="{{ URL('product/'.$pro->id) }}"><img src="{{asset('images/'.$pro->image)}}"
                                            alt="" class="img-responsive"></a>
                                    <h2 style="height:60px;"><a
                                            href="{{ URL('product/'.$pro->id) }}">{{ $pro->proName }}</h2></a>
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                                        <input type="hidden" value="{{$pro->proName}}"
                                            class="cart_product_name_{{$pro->id}}">
                                        <input type="hidden" value="{{$pro->image}}"
                                            class="cart_product_image_{{$pro->id}}">
                                        <input type="hidden" value="{{$pro->price}}"
                                            class="cart_product_price_{{$pro->id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
                                        <p class="role">@lang('lang.gia') {{ number_format($pro->price) }} VND</p>
                                        <button type="button" class="btn btn-danger add-to-cart"
                                            style="  margin-top:5px; margin-left:65px;" name="add-to-cart"
                                            data-id_product="{{$pro->id}}">@lang('lang.muahang')</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection