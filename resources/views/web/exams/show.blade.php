@extends('web.layout')

@section('title')
  Exam {{$exam->name()}}
@endsection
@section('main')

<!-- Hero-area -->
<div class="hero-area section">

	<!-- Backgound Image -->
	<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
	<!-- /Backgound Image -->

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 text-center">
				<ul class="hero-area-tree">
					<li><a href="{{url("/")}}">@lang('web.home')</a></li>
					<li><a href="{{url("/categories/show/{$exam->skill->cat->id}")}}">{{$exam->skill->cat->name()}}</a></li>
					<li><a href="{{url("/skills/show/{$exam->skill->id}")}}">{{$exam->skill->name()}}</a></li>
					<li>{{$exam->name()}}</li>
				</ul>
				<h1 class="white-text">{{$exam->name()}}</h1>
				<ul class="blog-post-meta">
					<li>{{Carbon\Carbon::parse($exam->created_at)->format('d M, Y')}}</li>
					<li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$exam->users->count()}}</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>
<!-- /Hero-area -->

<!-- Blog -->
<div id="blog" class="section">

	<!-- container -->
	<div class="container">

		<!-- row -->
		<div class="row">

			<!-- main blog -->
			<div id="main" class="col-md-9">
			@include('web.inc.message')
				<!-- blog post -->
				<div class="blog-post mb-5">
					<p>{{$exam->desc()}} </p>       
				</div>
				<!-- /blog post -->
				
				<div>
				
					@if( $canShowStartBtn )

						<form method="POST" action="{{url("/exams/start/{$exam->id}")}}">
							@csrf
							<button type="submit" class="main-button icon-button pull-left" href="" >@lang('web.startExamBot')</button>
						</form>
					@endif	
				
				</div>
			</div>
			<!-- /main blog -->
			
			<!-- aside blog -->
			<div id="aside" class="col-md-3">

				<!-- exam details widget -->
				<ul class="list-group">
					<li class="list-group-item">Skill: {{$exam->skill->name()}}</li>
					<li class="list-group-item">Questions:{{$exam->questions_no}}</li>
					<li class="list-group-item">Duration: {{$exam->duration_minss}} mins</li>
					<li class="list-group-item">Difficulty: 
						@for($i=1 ;$i<=$exam->difficulty;$i++ )
						<i class="fa fa-star"></i>
						@endfor

						@for($i=1 ;$i <= 5- $exam->difficulty;$i++ )
						<i class="fa fa-star-o"></i>
						@endfor
						
					</li>
				</ul>
				<!-- /exam details widget -->

				

			</div>
			<!-- /aside blog -->

		</div>
		<!-- row -->

	</div>
	<!-- container -->

</div>
<!-- /Blog -->

@endsection