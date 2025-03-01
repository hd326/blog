@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ asset('images/' . $post->image)}}">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{!! $post->body !!}</p>
        <hr>
        <div class="tags">
            @foreach ($post->tags as $tag)
            <span class="label label-default">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div id="backend-comments" style="margin-top: 50px;">
            <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                    <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
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