@extends('layout.master')

@section('content')

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top:20px;margin-bottom:20px;">
                <h2 style="font-family:Time New Roman;color:green;">@lang('lang.ketquatimkiem')</h2>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-carousel-carousel">
                    @foreach($search_product as $pro)
                    <div class="item">
                        <div class="gtco-item">
                            <a href="{{ URL('product/'.$pro->id) }}"><img src="{{asset('images/'.$pro->image)}}" alt=""
                                    class="img-responsive"></a>
                            <h2 style="height:60px;"><a href="{{ URL('product/'.$pro->id) }}">{{ $pro->proName }}</h2>
                            </a>
                            <form>
                             @csrf
                            <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->proName}}" class="cart_product_name_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->image}}" class="cart_product_image_{{$pro->id}}">
                            <input type="hidden" value="{{$pro->price}}" class="cart_product_price_{{$pro->id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$pro->id}}">
                            <p class="role">@lang('lang.gia') {{ number_format($pro->price) }} VND</p>
                                <button type="button" class="btn btn-danger add-to-cart" style="  margin-top:5px;" name="add-to-cart" data-id_product="{{$pro->id}}">@lang('lang.muahang')</button>
                        </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection