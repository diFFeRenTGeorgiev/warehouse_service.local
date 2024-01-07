@extends('front.components.layout')
@section('front_body')
<section class="about-section">
    <div class="container">
        <div class="row clearfix">

            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <div class="title">About Us</div>
                        <h2>We Are The Leader In <br> The Interiores</h2>
                    </div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</div>
                    <div class="email">Request Quote: <span class="theme_color">freequote@gmail.com</span></div>
                    <a href="about.html" class="theme-btn btn-style-three" style="color: black!important;">Read More</a>
                </div>
            </div>

            <!--Image Column-->
            <div class="image-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <img src="https://i.ibb.co/vQbkKj7/about.jpg" alt="">
                        <div class="overlay-box">
                            <div class="year-box"><span class="number">5</span>Years <br> Experience <br> Working</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
    @endsection
@section('css')
    <style>

        .about-section{
            position:relative;
            padding:120px 0px;
        }

        .about-section .content-column{
            position:relative;
            margin-bottom:40px;
        }

        .about-section .content-column .inner-column{
            position:relative;
            padding-top:50px;
            padding-right:100px;
        }

        .about-section .content-column .text{
            position:relative;
            color:#777777;
            font-size:15px;
            line-height:2em;
            margin-bottom:40px;
        }

        .about-section .content-column .email{
            position:relative;
            color:#252525;
            font-weight:700;
            margin-bottom:50px;
        }

        .about-section .image-column{
            position:relative;
            margin-bottom:50px;
        }

        .about-section .image-column .inner-column{
            position:relative;
            padding:40px 40px 0px 0px;
            margin-left:50px;
        }

        .about-section .image-column .inner-column:after{
            position:absolute;
            content:'';
            right:0px;
            top:0px;
            left:40px;
            bottom:100px;
            z-index:-1;
            border:2px solid #d7a449;
        }

        .about-section .image-column .inner-column .image{
            position:relative;
        }

        .about-section .image-column .inner-column .image:before{
            position:absolute;
            content:'';
            left:-50px;
            bottom:-50px;
            width:299px;
            height:299px;
            background:url(img/pattern-2.png) no-repeat;
        }

        .about-section .image-column .inner-column .image img{
            position:relative;
            width:100%;
            display:block;
        }

        .about-section .image-column .inner-column .image .overlay-box{
            position:absolute;
            left:40px;
            bottom:48px;
        }

        .about-section .image-column .inner-column .image .overlay-box .year-box{
            position:relative;
            color:#252525;
            font-size:24px;
            font-weight:700;
            line-height:1.4em;
            padding-left:125px;
        }

        .about-section .image-column .inner-column .image .overlay-box .year-box .number{
            position:absolute;
            left:0px;
            top:0px;
            width:110px;
            height:110px;
            color:#d7a449;
            font-size:68px;
            font-weight:700;
            line-height:105px;
            text-align:center;
            background-color:#ffffff;
            border:1px solid #000000;
        }
        .about-section .btn-style-three:before {
            position: absolute;
            content: '';
            left: 10px;
            top: 10px;
            z-index: -1;
            right: -10px;
            bottom: -10px;
            background: url(https://i.ibb.co/DKn55Qz/pattern-1.jpg) repeat;
        }
        .about-section .btn-style-three:hover {
            color: #ffffff;
            background: #d7a449;
        }
        .about-section .btn-style-three {
            position: relative;
            line-height: 24px;
            color: #252525;!important;
            font-size: 15px;
            font-weight: 700;
            background: none;
            display: inline-block;
            padding: 11px 40px;
            background-color: #ffffff;
            text-transform: capitalize;
            border: 2px solid #d7a449;
            font-family: 'Arimo', sans-serif;
        }
        .sec-title2{
            color:#fff;
        }
        .sec-title {
            position: relative;
            padding-bottom: 40px;
        }
        .sec-title .title {
            position: relative;
            color: #d7a449;
            font-size: 18px;
            font-weight: 700;
            padding-right: 50px;
            margin-bottom: 15px;
            display: inline-block;
            text-transform: capitalize;
        }
        .sec-title .title:before {
            position: absolute;
            content: '';
            right: 0px;
            bottom: 7px;
            width: 40px;
            height: 1px;
            background-color: #bbbbbb;
        }
    </style>
    @endsection