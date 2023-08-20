@extends('front.components.layout')

@section('front_body')
   <section class="section section-cart">
    <div class="container">
        @if(!empty($cartData['products']))
        <div class="checkout-custom-cart-wrapper">
            <div class="checkout-custom-card" style="width: 90%; position: relative; left: 10%;">
                <div class="card-header">
                    <h3>Вашата количка</h3>
                </div>

                <div class="card-body">
                    <div class="checkout-custom-cart-list">

                        @foreach($cartData['products'] as $cartProductId=>$cartProductDetailsArr)
                        <div class="checkout-custom-cart-item-wrapper" style="margin: 2%;">
                            <div class="checkout-custom-cart-item row">
                                <div class="col-xs-12 col-sm-1" style="position: relative;left: 2.5%;margin-top:1.5% ;">
                                    <div class="checkout-custom-cart-item-inner checkout-custom-cart-item-inner-remove">
                                        <a href="javascript:removeCartProduct({{$cartProductId}});">
                                            <i class="fa-solid fa-ban" aria-hidden="true" style="color:red; font-size: xx-large;"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-7">
                                    <div class="checkout-custom-cart-item-inner flex-start" style="display: flex;">
{{--                                        @if($cartProductDetailsArr['price'] > 0)--}}
{{--                                        <a href="{{route('product',$cartProductDetailsArr['slug'])}}">--}}

                                            {{--@if($cartProductDetailsArr['stamp']??'' and File::exists(public_path('themes/videnov/css/images/labels/'.locale().'/'.($cartProductDetailsArr['stamp']??'').'.png')))--}}
                                                {{--<div style="margin: 1px 0px 0px 5px;" class="prod-teaser-label prod-teaser-label-img--}}
                                                {{--{{ in_array($cartProductDetailsArr['stamp'],['premium','bg_collection']) ? 'prod-teaser-label-img-bottom-right' : '' }}--}}
                                                {{--{{ in_array($cartProductDetailsArr['stamp'],['made_in_germany','zero_interest_ucf']) ? 'prod-teaser-label-img-bottom-left' : '' }}">--}}
                                                    {{--<img style="width: 28px;" src="{{ $cartProductDetailsArr['stamp'] == \App\Constant\Catalog\ProductStampConstant::FLASH_DEALS--}}
                                                        {{--? setting_val('TYPE_FLASH_DEALS_STAMP')--}}
                                                        {{--: asset('themes/videnov/css/images/labels/'.locale().'/'.$cartProductDetailsArr['stamp'].'.png')}}" alt="">--}}
                                                {{--</div>--}}
                                            {{--@endif--}}

                                            @empty($cartProductDetailsArr['image'])
                                            <img src="{{ asset('images/no-image.png') }}"  alt="" style="width:121px;height:71px;" class="checkout-custom-product-img">
                                            @else
                                            <img src="{{ '/media_files/product_files/'.$cartProductDetailsArr['productId'].'/'.$cartProductDetailsArr['image'] }}"  alt="" style="width:121px;height:71px;" class="checkout-custom-product-img">
                                            @endempty
                                        {{--</a>--}}
                                        {{--@else--}}
                                            {{--@empty($cartProductDetailsArr['image'])--}}
                                            {{--<img src="{{ asset('images/no-image.png') }}"  alt="" style="width:121px;height:71px;" class="checkout-custom-product-img">--}}
                                            {{--@else--}}
                                            {{--<img src="{{ res_file('uploads/live/styles/product_image_only_compress/public/uc_product_images/'.$cartProductDetailsArr['image']) }}"  alt="" style="width:121px;height:71px;" class="checkout-custom-product-img">--}}
                                            {{--@endempty--}}
                                        {{--@endif--}}

                                        <div class="checkout-custom-cart-item-info" style="margin-left: 30px;">
                                            @if($cartProductDetailsArr['price'] > 0)
                                            <a href="" class="checkout-custom-cart-item-title ">{{$cartProductDetailsArr['title']}}</a>
                                            <!-- /.checkout-custom-cart-item-title -->
                                            @else
                                                <p class="checkout-custom-cart-item-title "><span style="font-weight: bold;">{{ trans('ПОДАРЪК') }}</span> {{$cartProductDetailsArr['quantity']}}х {{$cartProductDetailsArr['title']}}</p>
                                            @endif

                                            <p class="checkout-custom-cart-item-subtitle">{{trans('Срок на доставка: :num дни', ['num'=>$cartProductDetailsArr['item_delivery_time']])}}</p>
                                        </div>
                                    </div>
                                </div>

                                @if($cartProductDetailsArr['price'] > 0)
                                <div class="col-xs-6 col-sm-2">
                                    <div class="checkout-custom-cart-item-inner flex-start">
                                        <div class="checkout-custom-cart-item-qty" style="position: relative; display: block ruby;">
                                            <div style="background:#1E262D;" onclick="$('#cart_item_'{{$cartProductId}}).val(($('#cart_item_'{{$cartProductId}}).val()*1)-{{$cartProductDetailsArr['pack_size']}});changeCartProductQty({{$cartProductId}}, $('#cart_item_{{$cartProductId}}').val());" class="btn">
                                                <i class="fa fa-minus" style="color:#ffffff;" aria-hidden="true"></i>
                                            </div>

                                            <input id="cart_item_{{$cartProductId}}" style="text-align:center; width: 20%;" onkeyup="setTimeout(function(){ $('#cart_item_'{{$cartProductId}}).blur(); }, 1000);" onchange="changeCartProductQty({{$cartProductId}}, $('#cart_item_'{{$cartProductId}}).val());" type="text" class="field" value="{{$cartProductDetailsArr['quantity']}}">

                                            <div style="background:#1E262D;" onclick="$('#cart_item_'{{$cartProductId}}).val(($('#cart_item_'{{$cartProductId}}).val()*1) + {{$cartProductDetailsArr['pack_size']}});changeCartProductQty({{$cartProductId}}, $('#cart_item_'{{$cartProductId}}).val());" class="btn ">
                                                <i class="fa fa-plus" style="color:#ffffff;" aria-hidden="true"></i>
                                            </div>
                                            {{--<div class="col-xs-6 col-sm-2">--}}
                                                <div class="checkout-custom-cart-item-inner checkout-custom-cart-item-inner-price">
                                                    <p class="checkout-custom-cart-item-price">{{$cartProductDetailsArr['quantity']*$cartProductDetailsArr['price']}} bgn</p><!-- /.checkout-custom-cart-item-qty -->
                                                </div>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>


                                @endif
                            </div>
                        </div>
                        @endforeach

                        <div align="right" class="checkout-custom-cart-item checkout-custom-cart-item-total" style="display: block ruby; border-top: 1px solid #5c5c5c; width:85%; text-align: right;">
                            <div class="checkout-custom-cart-item-total-inner">
                                <img src="{{asset('themes/videnov/css/images/total.png')}}" alt="">

                                <p>{{trans('Общо:')}}</p>
                            </div>

                            <p>{{$cartData['products_total_amount']}}BGN</p>
                        </div>

                        <div class="checkout-custom-btn-wrapper">
{{--                            <a href="{{route('checkout.order_form')}}" class="btn form-btn">{{trans('Поръчай')}}</a>--}}
                        </div>
                    </div><!-- /.checkout-custom-cart-list -->
                </div>
            </div>
        </div>
        @else
        <h3>{{trans('Нямате добавени продукти.')}}</h3>
        @endif
    </div>
</section>
    @endsection