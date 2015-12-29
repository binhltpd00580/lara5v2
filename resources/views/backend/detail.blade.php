@extends('layouts.default')

@foreach($articles as $article)

@section('title')
	{{ 'LTB - Blog | '.$article->title }}
@endsection

@section('content')
	<div class="content">

		<h1>{{ $article->title }}</h1>

		<p>{{ $article->content }}</p>
		
	</div>
	

@endsection

@endforeach