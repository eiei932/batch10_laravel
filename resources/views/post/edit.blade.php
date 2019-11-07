@extends('template')

@section('content')
<div class="container">
<h3>Post Edit Form</h3>

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<form method="post" action="{{route('post.update',$post->id)}}
" enctype="multipart/form-data">
@csrf
@method('PUT')
	<div class="form-group">
		<label>Title:</label>
		<input type="text" name="title" class="tovalidate1 form-control" value="{{$post->title}}">
		@if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
            <style>
            	.tovalidate1{
            		border: 1px solid #e74c3c
            	}
            </style>
        @endif
	</div>
	<div class="form-group">
		<label>Content:</label>
		<textarea name="content" class="tovalidate2 form-control">{{$post->body}}</textarea>
		@if ($errors->has('content'))
            <span class="text-danger">{{ $errors->first('content') }}</span>
            <style>
            	.tovalidate2{
            		border: 1px solid #e74c3c
            	}
            </style>
        @endif
	</div>
	<div class="form-group">
		<label>Photo:</label><span class="text-danger">[supported file types:jpeg, png]</span>
		<input type="file" name="photo" class="tovalidate3">
		<input type="hidden" name="oldphoto" value="{{$post->image}}">
		@if ($errors->has('photo'))
            <span class="text-danger">{{ $errors->first('photo') }}</span>
            <style>
            	.tovalidate3{
            		border: 1px solid #e74c3c
            	}
            </style>
        @endif
	</div>
	<div class="form-group">
		<label>Categories:</label>
		<select name="category" class="tovalidate4 form-control">
			<option value="">Choose Category</option>
			{-- accept data and loop --}
			@foreach($categories as $row)
			
			<option value="{{$row->id}}" 
				@if($row->id==$post->category_id){{'selected'}}
				@endif
			>{{$row->name}}</option>
			@endforeach
		</select>
		@if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
            <style>
            	.tovalidate4{
            		border: 1px solid #e74c3c
            	}
            </style>
        @endif
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
	</div>
</form>
</div>
@endsection