@extends('main')

@section('title', '| Edit Comment')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
			
            <form method="{{ route('comments.update', $comment->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $comment->name }}">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $comment->email }}">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment">{{ $comment->comment }}</textarea><br>
                <input type="submit" class="form-control btn btn-success" value="Update Comment">
            </form>
		</div>
	</div>

@endsection