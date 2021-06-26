@extends('layout.master')

@section('content')

<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top:20px;margin-bottom:20px;">
                <h2 style="font-family:Time New Roman;color:green;">@lang('lang.chitietsanpham')</h2>
            </div>
            @foreach($productID as $pro)
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{asset('images/'.$pro->image)}}" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-5">
                        <h3 style="font-family:Time New Roman;"><a href="#" style="color:lightblue !important;">{{ $pro->proName }}</h3></a>
                        <p>{{ $pro->content }}</p>
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

            </div>
            <div class="col-md-3">
                <div style="">
                    <h3 style="font-family:Time New Roman;color:pink;text-align:center;">@lang('lang.sanphamcungloai')
                    </h3>
                    @foreach($product as $pro1)
                    @if($pro1->type_id == $pro->type_id && $pro1->id != $pro->id)
                    <ul>
                        <a href="{{ URL('product/'.$pro1->id) }}" style="color:black;">
                            <li>{{ $pro1->proName }}</li>
                        </a>
                    </ul>

                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection