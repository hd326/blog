@extends('main')
@section('title', '| Edit Tag')
@section('content')

<div class="row">
    <div class="col-md-8-center">
        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Title:</label>
                <input name="name" class="form-control" type="text" value="{{ $tag->name }}"><br>
                <input type="submit" value="Save Changes" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>

@endsection