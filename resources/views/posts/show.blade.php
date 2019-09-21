@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
        <hr>
        <div class="tags">
            @foreach ($post->tags as $tag)
            <span class="label label-default">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <label>Url:</label>
                <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
            </dl>
            <dl class="dl-horizontal">
                <label>Category Name:</label>
                <p>{{ $post->category->name }}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Created At:</label>
                <p>{{ date('M j, Y h:ia', strtotime($post->created_at->toDateTimeString())) }}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Last Updated:</label>
                <p>{{ date('M j, Y h:ia', strtotime($post->updated_at->toDateTimeString())) }}</p>
            </dl>

            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary btn-block">Edit</a>
                </div>
                <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-danger btn-block" value="Delete">
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <a href="{{ route('posts.index') }}" class="btn btn-default btn-block">Show all Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection