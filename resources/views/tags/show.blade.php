@extends('main')
@section('title', '| Show Tag')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }}</small></h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top: 20px">Edit</a>
    </div>
    <div class="col-md-2">
        <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger btn-block" value="Delete" style="margin-top:20px">
        </form>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>@foreach($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name }}</span>
                    </td>
                    @endforeach
                    <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection