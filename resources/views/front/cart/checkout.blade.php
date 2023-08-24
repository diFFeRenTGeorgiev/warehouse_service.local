@extends('front.components.layout')

@section('front_body')
    <div class="container-fluid background" id="checkout_container">
        <div class="row padding-top-20">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 offset-md-1 offset-lg-1 offset-xl-2 padding-horizontal-40">
                <div class="row">
                    <div class="col-12 main-wrapper">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div id="template" class="row panel-wrapper">
                                    <div class="col-12 panel-header basket-header">
                                        <div class="row">
                                            <div class="col-6 basket-title">
                                                <span class="description">Общ преглед</span><br><span class="emphasized">Вашата количка</span>
                                            </div>
                                            <div class="col-2 order-number align-right" style="font-size:11px;">
                                                <span class="description">order #</span><br><span class="emphasized titleHead" style="margin-right: 25px;">Количество</span><span class="emphasized titleHead" style="margin-right: 20px;">Цена</span>
                                            </div>
                                        </div>
                                        <div class="row column-titles padding-top-10">
                                            <div class="col-2 align-left"><span>Photo</span></div>
                                            <div class="col-5 align-center"><span>Name</span></div>
                                            <div class="col-2 align-center"><span>Quantity</span></div>
                                            <div class="col-3 align-right"><span>Price</span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 panel-body basket-body">
                                        {{--{{#products}}--}}
                                        @foreach($products as $product)
                                        <div class="row product">
                                            <div class="col-2 col product-image"><img src="{{ '/media_files/product_files/'.$product['productId'].'/'. $product['image']}}"></div>
                                            <div class="col-5 col" style="width: 30%;"><br><span class="additional">{{$product['title']}}</span></div>
                                            <div class="col-2 col align-right"style="width: 20%;"><span class="sub"></span>{{$product['quantity']}}</div>
                                            <div class="col-3 col align-right" style="width: 15%;"><span class="sub"></span> {{number_format($product['price'],2)}}</div>
                                        </div>
                                        @endforeach
{{--                                        {{/products}}--}}
                                    </div>
                                    <div class="col-12 panel-footer basket-footer">
                                        <hr>
                                        <div class="row">
                                            <div class="col-8 align-right description"><div class="dive"></div></div>
                                            <div class="col-4 align-center"><span class="emphasized footerTitle">Отстъпка:</span></div>
                                            <div class="col-8 align-right description"><div class="dive"></div></div>
                                            {{--<div class="col-4 align-right"><span class="emphasized">taxes</span></div>--}}
                                            <div class="col-8 align-right description"><div class="dive"></div></div>
                                            {{--<div class="col-4 align-right"><span class="emphasized">ship</span></div>--}}
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8 align-right description"><div class="dive"></div></div>
                                            <div class="col-4 align-center"><span class="very emphasized footerTitle">Общо:</span><span class="total footerTitle" style="float: right;margin-right: 31px;
font-size: 20px;">{{number_format($cart['products_total_amount'],2)}}лв</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="row panel-wrapper">
                                    <div class="col-12 panel-header creditcard-header">
                                        <div class="row">
                                            <div class="col-12 creditcard-title">
                                                <span class="description">Въведете вашите данни</span><br><span class="emphasized">Информация за плащане с карта</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 panel-body creditcard-body">
                                        <form action="#" method="post" target="_self">
                                            <fieldset>
                                                <label for="card-name">Титуляр на картата</label><br>
                                                <i class="fa fa-user-o" aria-hidden="true"></i><input type='text' id='card-name' name='card-name' placeholder='John Doe' title='Name on the Card'>
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-number">Номер на картата</label><br>
                                                <i class="fa fa-credit-card" aria-hidden="true"></i><input type='text' id='card-number' name='card-number' placeholder='1234 5678 9123 4567' title='Card Number'>
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-expiration">Дата на валидност</label><br>
                                                <i class="fa fa-calendar" aria-hidden="true"></i><input type='text' id='card-expiration' name='card-expiration' placeholder='YY/MM' title='Expiration' class="card-expiration">
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-ccv">CVC/CCV</label>&nbsp;<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards. On your American Express branded credit or debit card it is a 4 digit numeric code."></i><br>
                                                <i class="fa fa-lock" aria-hidden="true"></i><input type='text' id='card-ccv' name='card-ccv' placeholder='123' title='CVC/CCV'>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="col-12 panel-footer creditcard-footer">
                                        <div class="row">
                                            <div class="col-12 align-right"><button class="cancel">Cancel</button>&nbsp;<button class="confirm">Confirm & Pay</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $( document ).ready ( function ()
        {
            console.log ( 'ready!' );
            $('[data-toggle="tooltip"]').tooltip();
            var template = $( '#template' ).html ();
            Mustache.parse ( template );
            var rendered = Mustache.render ( template, get_basket () );
            $( '#template' ).html ( rendered );
            if ( $('.basket-body').hasScrollBar () )
            {
                $('.column-titles').addClass('fix-overflow');
                $('.basket-body').niceScroll({autohidemode: false,cursorcolor:"#ffffff",cursorborder:"1px solid #D0D0D0",cursorborderradius: "0",background: "#ffffff"});
            }
            else
            {
                $('.column-titles').removeClass('fix-overflow');
            }

            $('.card-expiration').datepicker({
                format: "mm/yyyy",
                startView: "months",
                minViewMode: "months"
            });
        });

        function get_basket ()
        {
            var products =
                [
                    { name: "Product 1 lorem", additional: "Additional Informations", quantity: 1, unit: "pc", price: 10, thumbnail: "http://via.placeholder.com/200x200" },
                    { name: "Product 2 ipsum", additional: "Additional Informations", quantity: 1, unit: "kg", price: 20, thumbnail: "http://via.placeholder.com/640x480" },
                    { name: "Product 3 dolor sit amet", additional: "Additional Informations", quantity: 2, unit: "l", price: 30, thumbnail: "http://via.placeholder.com/1920x1080" },
                    { name: "Product 4 consectetur adipiscing elit", additional: "Additional Informations", quantity: 1, unit: "pcs", price: 25, thumbnail: "http://via.placeholder.com/800x400" },
                    { name: "Product 5 sed dapibus nibh", additional: "Additional Informations", quantity: 3, unit: "pcs", price: 9, thumbnail: "http://via.placeholder.com/400x800" },
                    { name: "Product 6 sit amet maximus ultrices", additional: "Additional Informations", quantity: 1, unit: "pcs", price: 13, thumbnail: "http://via.placeholder.com/2048x1024" },
                    { name: "Product 7 duis rutrum", additional: "Additional Informations", quantity: 5, unit: "pcs", price: 200, thumbnail: "http://via.placeholder.com/20x20" },
                    { name: "Product 8 efficitur lectus et facilisis", additional: "Additional Informations", quantity: 1, unit: "pc", price: 350, thumbnail: "http://via.placeholder.com/256x64" },
                    { name: "Product 9 nulla at ipsum nec risus vestibulum ullamcorper", additional: "Additional Informations", quantity: 10, unit: "pcs", price: 70, thumbnail: "http://via.placeholder.com/64x256" },
                    { name: "Product 10 proin facilisis magna", additional: "Additional Informations", quantity: 4, unit: "pcs", price: 1000, thumbnail: "http://via.placeholder.com/1024x768" },
                    { name: "Product 11 donec at arcu a tortor pellentesque cursus vel a quam", additional: "Additional Informations", quantity: 300, unit: "pcs", price: 6600, thumbnail: "http://via.placeholder.com/400x100" },
                    { name: "Product 12 nulla auctor libero in velit vulputate", additional: "Additional Informations", quantity: 6, unit: "pcs", price: 17.5, thumbnail: "http://via.placeholder.com/100x500" }
                ]
            return { "products": products, "order_number": "1-23-456789A", "subtotal": 13579, "taxes": 246, "shipping_cost": 810, "total": 16825, "currency": "&dollar;" };
        }

        //https://stackoverflow.com/questions/4814398/how-can-i-check-if-a-scrollbar-is-visible
        (function($) {
            $.fn.hasScrollBar = function() {
                return this.get(0).scrollHeight > this.height();
            }
        })(jQuery);
    </script>
   @endsection
@section('css')
    <style>
        .panel-footer.creditcard-footer{
            border-top: none!important;
        }
        .footerTitle{
            color:#1E262D !important;

        }
        #checkout_container{
            position: relative;
            right: -8%;
        }
        .titleHead{
            color:#1E262D !important;
        }
        .col{
            display: inline-block;
        }
        .product-image{
            width: 30%;
        }
        /*html, body*/
        /*{*/
            /*height: 100%;*/
            /*color: black;*/
            /*!* font-family: 'Barlow', sans-serif; *!*/
            /*!* font-family: 'Roboto Condensed', sans-serif; *!*/
            /*font-family: 'Open Sans', sans-serif;*/
            /*font-weight: 400;*/
        /*}*/

        body
        {
            /*font-size: 62.5%;*/
        }

        body
        {
            /*background:  url(https://images.unsplash.com/photo-1462899006636-339e08d1844e?auto=format&fit=crop&w=1950&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D) no-repeat center center fixed;*/
            background-size: cover;
        }

        .main-wrapper
        {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            border: none;
            -webkit-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
            -moz-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
            box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
        }

        .basket-header
        {
            border-radius: 15px 0 0 0;
            -moz-border-radius: 15px 0 0 0;
            -webkit-border-radius: 15px 0 0 0;
            padding-left: 25px !important;
        }

        .creditcard-header
        {
            border-radius: 0 15px 0 0;
            -moz-border-radius: 0 15px 0 0;
            -webkit-border-radius: 0 15px 0 0;
            padding-left: 35px !important;
        }

        .panel-wrapper
        {
        }

        .panel-header
        {
            background: #1E262D;
            height: 80px;
            padding: 15px 20px 0 20px;
        }

        .panel-wrapper .basket-header .column-titles
        {
            color: #A2C6DD;
            padding: 0;
            margin: 0;
            /* font-family: 'Anton', sans-serif; */
            display: none;
            visibility: hidden;
        }

        .fix-overflow
        {
            padding-right: 5px !important;
        }

        .panel-wrapper .basket-body
        {
            overflow-x: hidden;
            overflow-y: auto;
        }

        .panel-wrapper .creditcard-body
        {
            padding: 30px 40px 0 40px;
        }

        .panel-wrapper .panel-body
        {
            font-weight: 400;
            font-size: 1.2em;
            outline: none !important;
            min-height: 350px;
            max-height: 350px;
        }

        .basket-body
        {
            background: #F9F9F9;
        }

        .creditcard-body
        {
            background: white;
        }

        .basket-body .row.product
        {
            margin: 5px 0 5px 0;
            padding:  5px 0 5px 0;
            border-bottom: solid 1px #777879;
        }

        .basket-body .row.product div
        {
            color: #777879;
            padding: 0 10px 0 10px;
        }

        .basket-body .row.product .product-image
        {
        }

        .product-image img
        {
            -o-object-fit: contain;
            object-fit: contain;
            /*width: 100%;*/
            /*min-width: 100%;*/
            max-width: 100%;
            max-height: 80px;
        }

        .card-wrapper
        {
            height: 100%;
        }

        .padding-top-10
        {
            padding-top: 10px !important;
        }

        .padding-top-20
        {
            padding-top: 20px !important;
        }

        .padding-horizontal-40
        {
            padding: 0 40px 0 40px;
        }

        .align-right
        {
            text-align: right;
        }

        .align-center
        {
            text-align: center;
        }

        .emphasized
        {
            /* font-family: 'Anton', sans-serif; */
            /* font-family: 'Roboto Condensed', sans-serif; */
            /* font-family: 'Raleway', sans-serif; */
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 1.6em;
            color: white;
        }

        .description
        {
            /* font-family: 'Anton', sans-serif; */
            /* font-family: 'Roboto Condensed', sans-serif; */
            /* font-family: 'Raleway', sans-serif; */
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            font-size: 1.2em;
            color: #A2C6DD;
        }

        .panel-footer
        {
            padding-top: 10px;
            height: 150px;
        }

        .basket-footer
        {
            /*background: #1E262D;*/
            border-radius: 0 0 0 15px;
            -moz-border-radius: 0 0 0 15px;
            -webkit-border-radius: 0 0 0 15px;
        }

        .basket-footer .title, .basket-footer .subtitle
        {
        }

        .creditcard-footer
        {
            background: white;
            border-radius: 0 0 15px 0;
            -moz-border-radius: 0 0 15px 0;
            -webkit-border-radius: 0 0 15px 0;
            padding: 75px 30px 0 30px;
        }

        .basket-footer .row .subtitle, .basket-footer .row .title
        {
        }

        .panel-footer hr
        {
            margin: 3px 0 3px 0;
            display: block;
            height: 1px;
            border: 0;
            /*border-top: 1px solid #ffffff;*/
            padding: 0;
        }

        .panel-footer button
        {
            border: solid 1px #166D9A;
            background: #1E262D;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            color: white;
            font-size: 1.3em;
            text-transform: uppercase;
            padding: 10px 15px 11px 15px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        .panel-footer button:hover
        {
            cursor: pointer;
        }

        button.cancel
        {
            background: white;
            color: #1E262D;
        }

        button.cancel:hover
        {
            background: #1E262D;
            /*border-color: #ff0000;*/
            color: white;
        }

        button.confirm:hover
        {
            background: white;
            /*border-color: #00b300;*/
            color: #1E262D;
        }

        .dive
        {
            margin-top: 5px;
        }

        /*.sub*/
        /*{*/
            /*font-size: 75%;*/
            /*color: #aaaaaa;*/
        /*}*/

        .very
        {
            font-size: 1.2em;
        }

        .creditcard-body form
        {
            /*font-size: 1.3em;*/
        }

        .creditcard-body form i.fa
        {
            margin-right: 10px;
            color: #166D9A;
        }

        .creditcard-body form fieldset
        {
            border-bottom: dotted 1px #D0D0D0;
            margin-bottom: 25px;
        }

        .creditcard-body form input
        {
            border: none;
            font-weight: 600;
            color: #555555;
            width: 85%;
            outline: none;
        }

        .creditcard-body form input::placeholder
        {
            color: #D0D0D0;
        }

        .creditcard-body form label
        {
            color:  #aaaaaa;
        }

        .additional
        {
            font-weight: 300;
            font-size: 80%;
        }

        .fa-info-circle
        {
            color: #aaaaaa !important;
        }

        span.month.focused.active
        {
            background: #166D9A !important;
            background-image: none !important;
        }


        @media (max-width: 992px)
        {
        }

        @media (max-width: 767px)
        {

            .basket-header
            {
                border-radius: 15px 15px 0 0;
                -moz-border-radius: 15px 15px 0 0;
                -webkit-border-radius: 15px 15px 0 0;
            }

            .basket-footer
            {
                background: #166D9A;
                border-radius: 0;
                -moz-border-radius: 0;
                -webkit-border-radius: 0;
            }

            .creditcard-header
            {
                border-radius: 0;
                -moz-border-radius: 0;
                -webkit-border-radius: 0;
            }

            .creditcard-footer
            {
                border-radius: 0 0 15px 15px;
                -moz-border-radius: 0 0 15px 15px;
                -webkit-border-radius: 0 0 15px 15px;
            }

        }

    </style>
@endsection