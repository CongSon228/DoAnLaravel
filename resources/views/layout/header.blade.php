<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">

        <div class="row">
            <div class="col-md-2 col-xs-12" style="margin-top: -10px;">
                <div id="gtco-logo"><a href="{{URL('home')}}">
                        <h2>ShoesShop</h2>
                </div>
            </div>
            <div class="col-md-10  menu-1">
                <ul>
                    <li class="active"><a href="{{URL('home')}}" style="margin-left: -35px;">@lang('lang.home')</a></li>
                    @foreach($cate as $cat)
                    <li class="has-dropdown">
                        <a href="{{URL('/category/'.$cat->id)}}">{{ $cat->catName }}</a>
                        <ul class="dropdown">
                            @foreach($type as $typ)
                            @if($typ->category_id == $cat->id)
                            <li><a href="{{URL('/type/'.$typ->id)}}">{{ $typ->typeName }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    @if(!Auth::check())
                    <li class="active"><a href="{{ URL('login') }}">@lang('lang.login')</a></li>
                    @else
                    <li class="has-dropdown active">
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="dropdown">
                            <li><a href="{{ URL('/giohang') }}">Giỏ Hàng</a></li>
                            <li><a href="{{ URL('logout') }}">@lang('lang.logout')</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="has-dropdown active">
                        <a href="#">@lang('lang.ngonngu')</a>
                        <ul class="dropdown">
                            <li><a href="{{URL('lang/vi')}}">@lang('lang.vietnam')</a></li>
                            <li><a href="{{URL('lang/en')}}">@lang('lang.english')</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
<div class="s130">
    <form action="{{URL('search')}}" method="post">
        {{csrf_field()}}
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                        </path>
                    </svg>
                </div>
                <input id="search" name="keyword_submit" type="text" placeholder="@lang('lang.timkiem1')" />

                <div class="input-field second-wrap">
                    <button class="btn-search" type="submit">@lang('lang.timkiem')</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12" style="margin-bottom: 20px;">
            <div class="col-md-2">
                <div class="logo-2 logo-con">
                        <b>@lang('lang.thongbao')</b>
                </div>
            </div>
            <div class="col-md-10">
                <div class="thongbao">
                    <marquee direction="left"><i class="item-222">@lang('lang.thongbao1')</i><img src="{{asset('images/icon.png')}}" width="20px"> <img
                            src="{{asset('images/icon.png')}}" width="20px"> <img src="{{asset('images/icon.png')}}"
                            width="20px">
                    </marquee>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="gtco-container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel owl-carousel-fullwidth">
                @foreach($slide as $sli)
                <div class="item">
                    <a href="#">
                        <img src="{{asset('images/'.$sli->image)}}" alt="Free Website Template by FreeHTML5.co"
                            style="width:100%; height:500px;">
                        <div class="slider-copy">
                            <h2 style="font-family: 'Times New Roman', Times, serif;
    									font-style: italic;">{{ $sli->title }}</h2>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>