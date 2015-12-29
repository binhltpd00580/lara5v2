@extends('layouts.default')

@section('title','Add new article')

@section('content')

	@if (session('status_upload'))
       <p>{{ session('status_upload') }}</p>
	@endif

	@if(!empty($articles))

	<div class="content">
		
		<form action="{{ URL('/admin/edit/'.$articles["id"]) }}" method="post" enctype="multipart/form-data">

		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<p>Title:</br>
		<input type="text" name="title" id="title" value="{{ $articles["title"] }}">
		</p> 

		<p>Slug:</br>
		<input type="text" name="slug" id="slug" value="{{ $articles["slug"] }}" readonly="true">
		</p>
		
		@if($articles["image"])

		<p>Image:</br>
		<img src="{{ asset('upload/'.$articles["image"]) }}" width="100" height="100"></br>
		<input type="file" name="image" id="image">
		</p>

		@else

		<p>Image:</br>
		<input type="file" name="image" id="image">
		</p>

		@endif

		<p>
		Active:</br>
			@if($articles["active"] == 1)

			<input type="radio" name="active" value="1" checked>Publish

			@else

			<input type="radio" name="active" value="1">Publish

			@endif
		</p>
		
		<p>Content: </br>
		<textarea name="content" id="" cols="30" rows="10">{{ $articles["content"] }}</textarea>
		</p>

		<p><button type="submit">Update</button></p>
		<a href="{{ URL('admin/dashboard') }}">Back</a>
		

		</form>

	</div>

	@else


	<div class="content">


		<form action="{{ URL('/admin/create') }}" method="post" enctype="multipart/form-data">

		{{ csrf_field() }}

		<p>Title:</br>
		<input type="text" name="title" id="title">
		@if($errors->has('title'))<em>{{ $errors->first('title') }}</em>@endif
		</p> 

		<p>Slug:</br>
		<input type="text" name="slug" id="slug" readonly="true">
		</p>

		<p>Image:</br>
		<input type="file" name="image" id="image">
		</p>

		<p>
		Active:</br>
			<input type="checkbox" name="active" value="1">Publish
		</p>
		
		<p>Content: </br>
		<textarea name="content" id="" cols="30" rows="10"></textarea>
		@if($errors->has('title'))<em>{{ $errors->first('title') }}</em>@endif
		</p>

		<p><button type="submit">Create</button></p>
		<a href="{{ URL('admin/dashboard') }}">Back</a>
		

		</form>

	</div>
	
	@endif
	

	<script type="text/javascript">

	var inputText = document.getElementById("title");
		inputText.addEventListener("keyup", function(){
			ChangeToSlug();
		});

	</script>


@endsection