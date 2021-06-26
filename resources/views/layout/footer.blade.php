<footer id="gtco-footer" class="gtco-section" role="contentinfo">
    <div class="gtco-container">
        <div class="row row-pb-md">
            <div class="col-md-3 gtco-widget gtco-footer-paragraph">
                <h3>ShoesShop</h3>
                <p><i>@lang('lang.gioithieu')</i></p>
            </div>
            <div class="col-md-3 gtco-footer-link">
                <h3 style="margin-bottom:15px;">@lang('lang.lienhe')</h3>
                <ul class="gtco-list-link">
                    <li>
                        <div class="row">
                            <div class="icon-box-img col-md-4" style="">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="53" height="40"
                                            src="https://dqshop.vn/wp-content/uploads/2018/08/icon-telephone.png"
                                            class="attachment-medium size-medium" alt="" loading="lazy">
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset col-md-8">
                                <p><span style="">0964029948<br>
                                        <span style=""><i>son@nguyen</i></span></span></p>

                            </div>
                        </div>
                    </li>
                    <li>
                        <p style="margin-bottom:0px;color: #52D681;">@lang('lang.diachi')</p><i>@lang('lang.70')</i>
                    </li>
                    <li>
                        <p style="margin-bottom:0px;color: #52D681;">@lang('lang.ketnoi')</p>
                        <div style="margin-top:15px;">
                            <a href=""><i class="icon-facebook" style="font-size: 30px;"></i></a>
                            <a href=""><i class="icon-instagram" style="font-size: 30px;"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 gtco-footer-link">
                <h3>@lang('lang.category')</h3>
                @foreach($cate as $cat)
                <ul class="gtco-list-link">
                    <li><a href="{{URL('/category/'.$cat->id)}}">{{ $cat->catName }}</a></li>
                </ul>
                @endforeach
            </div>
            <div class="col-md-3 gtco-footer-subscribe">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3"></label>
                        <input type="email" class="form-control" id="" placeholder="@lang('lang.email')">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('lang.send')</button>
                </form>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->