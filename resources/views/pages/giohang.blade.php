@extends('layout.master')

@section('content')

<div class="container" style="margin-top:50px;">
@if(Session::get('cart')==true)
    <h3 style="text-align:center;font-family:Time;font-size:35px;"><b>Giỏ hàng</b></h3>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr style="font-weight:bold;font-size: 20px;">
                <th><b>Tên sản phẩm</b></th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th class="text-center">Thành tiền</th>
                <th> </th>
            </tr>
        </thead>
        <tbody style="margin-bottom:20px;">
            @php
            $total = 0;
            @endphp
            @foreach(Session::get('cart') as $key =>$cart)
            @php
            $subtotal = $cart['price']*$cart['product_qty'];

            $total+=$subtotal;
            @endphp
            <tr>
                <td>
                    <p>{{$cart['proName']}}</p>
                </td>
                <td data-th="Product">
                    <img src="{{asset('images/'.$cart['image'])}}" alt="Sản phẩm 1" class="img-responsive"
                        style="height:70px;width:100px;">
                </td>
                <td data-th="Price">{{number_format($cart['price'],0,',','.')}}đ</td>
                <td data-th="Quantity">
                    <form action="{{URL('giohang/update-cart')}}" method="post">
                        @csrf
                        <input class="text-center" value="{{$cart['product_qty']}}" type="number" min="1"
                            style="width:70px;" name="cart_qty[{{$cart['session_id']}}]">
                        <button class="btn btn-info btn-sm">Cập nhật
                        </button>
                    </form>
                </td>
                <td data-th="Subtotal" class="text-center">{{number_format($subtotal,0,',','.')}}đ</td>
                <td class="actions" data-th="">
                    <a href="{{URL('giohang/del-cart/'.$cart['session_id'])}}">
                        <button class="btn btn-danger btn-sm">Xoá
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="text-center" style="margin-left:100px;"><b>Tổng số tiền</b></td>
                <td colspan="3" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>{{number_format($total,0,',','.')}}đ</strong>
                </td>
                <td class="hidden-xs">
                    <a href="{{URL('giohang/del-all-cart')}}">
                        <button class="btn btn-danger btn-sm">Xoá tất cả
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td><a href="{{URL('home')}}" class="btn btn-warning" style="margin-top:50px;"><i
                            class="fa fa-angle-left"></i> Tiếp tục
                        mua hàng</a>
                </td>
                <td colspan="4" class="hidden-xs"></td>
                <td><a href="http://hocwebgiare.com/" class="btn btn-success btn-block" style="margin-top:50px;">Thanh
                        toán <i class="fa fa-angle-right"></i></a>
                </td>
            </tr>
        </tfoot>
    </table>
@else
    <h3 style="text-align:center;font-family:Time;font-size:35px; margin-bottom:50px;"><b>@lang('lang.thongbaogiohang')</b></h3>
@endif
</div>
<style type="text/css">
    .table&amp;
    amp;
    gt;
    tbody&amp;
    amp;
    gt;
    tr&amp;
    amp;
    gt;
    td,
    .table&amp;
    amp;
    gt;
    tfoot&amp;
    amp;
    gt;
    tr&amp;
    amp;
    gt;

    td {
        vertical-align: middle;
    }

    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control {
            width: 20%;
            display: inline !important;
        }

        .actions .btn {
            width: 36%;
            margin: 1.5em 0;
        }

        .actions .btn-info {
            float: left;
        }

        .actions .btn-danger {
            float: right;
        }

        table#cart thead {
            display: none;
        }

        table#cart tbody td {
            display: block;
            padding: .6rem;
            min-width: 320px;
        }

        table#cart tbody tr td:first-child {
            background: #333;
            color: #fff;
        }

        table#cart tbody td:before {
            content: attr(data-th);
            font-weight: bold;
            display: inline-block;
            width: 8rem;
        }

        table#cart tfoot td {
            display: block;
        }

        table#cart tfoot td .btn {
            display: block;
        }
    }
</style>
@endsection