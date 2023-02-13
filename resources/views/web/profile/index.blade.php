@extends('web.layout')

@section('title')
    profile
@endsection

@section('main')

<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset("web/img/page-background.jpg")}})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{url("/")}}">@lang('web.home')</a></li>
                    <li>@lang('web.profile')</li>
                </ul>
                

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
               <table class= "table">
                 <thead>
                    <tr>
                        <th>Exam name</th>
                        <th>Score</th>
                        <th>Time(min)</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach(Auth::user()->exams as $exam)
                    <tr>
                        <td>{{$exam->name()}}</td>
                        <td>{{$exam->pivot->score}}</td>
                        <td>{{$exam->pivot->time_mins}}</td>
                    </tr>
                    @endforeach
                 </tbody>
               </table>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection
