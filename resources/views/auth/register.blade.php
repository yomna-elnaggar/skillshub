@extends('web.layout')

@section('title')
 Sign UP
@endsection
@section('main')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/page-background.jpg')}})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">@lang('web.home')</a></li>
                        <li>Sign Up</li>
                    </ul>
                    <h1 class="white-text">Sign Up and estimate your skills</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>Sign Up</h4>
                       
                        @include('web.inc.message')
                        <form method="POST" action="{{ url('/register')}}">
                            @csrf
                            <input class="input" type="text" name="name" placeholder="Name">
                            <input class="input" type="email" name="email" placeholder="Email">
                            <input class="input" type="password" name="password" placeholder="Password">
                            <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password">
                            <button type="submit" class="main-button icon-button pull-right">Sign Up</button>
                         </form>
                    </div>
                </div>
                <!-- /login form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection