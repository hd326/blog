@extends('main')

@section('title', '| Tags')

@section('content')
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tag</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="well">
            <form method="POST" action="{{ route('tags.store') }}">
                {{ csrf_field() }}
                <h2>New Tag</h2>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" class="form-control"><br>
                    <input type="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection