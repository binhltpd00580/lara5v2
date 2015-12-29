@extends('layouts.default')

@section('title', 'Laravel Tutorial')

@section('content')

<div class="wbad__content">

	<div class="wb-container">

	<div class="pure-g">
		
		<div class="pure-u-4-5">
			
			<form method="post" action="/search">
				
				<input type="search" class="wbad__btn-search" name="search" placeholder="Search">
				
			</form>

		</div>

		<div class="pure-u-1-5">
			
			<a class="wbad__btn btn-yellow" href="{{ URL('admin/create') }}"><i class="mdi mdi-plus"></i>New article</a>
			
		</div>

	</div>

	<h2>All articles</h2>

	
	
	@foreach($articles as $article)
	<div class="wbad__article">
		<div class="pure-g">		
			<div class="wbad__article__id pure-u-1-24">
				<form action="">
					{{ csrf_field() }}
					<input type="checkbox" name="id_article" value="{{ $article->id }}">
				</form>
			</div>

			<div class="wbad__article__title pure-u-12-24">
				<a href="">{{ $article->title }}</a>
			</div>

			<div class="wbad__article__status pure-u-4-24">
				<form action="">
					@if($article->active == 1)
						<form action="">
							{{ csrf_field() }}
							<input type="radio" name="active" value="1" checked="true"> Publish
							<input type="radio" name="active" value="0"> Disables
						</form>
					@else
						<form action="">
							{{ csrf_field() }}
							<input type="radio" name="active" value="1"> Publish
							<input type="radio" name="active" value="0" checked="true"> Disables
						</form>
					@endif
				</form>
			</div>

			<div class="wbad__article__edit pure-u-1-24">
				<a class="wbad__btn wbad__green" href="{{ URL('/admin/edit/'.$article->id) }}"><i class="mdi mdi-pencil"></i></a>
			</div>
			<div class="wbad__article__delete pure-u-1-24">
				<form action="{{ URL('admin/delete/'. $article->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="wbad__btn wbad__red"><i class="mdi mdi-close"></i></button>
				</form>
			</div>
		</div>
	</div>
	

	@endforeach

	

	{!! $articles->render() !!}


	</div>


</div>


	

@endsection