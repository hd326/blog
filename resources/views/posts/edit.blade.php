@extends('main')

@section('title', '| Edit Post')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Edit Post</h1>
    <hr>

  </div>
</div>

{{-- mine vs --}}

<div class="row">
  <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="col-md-8">
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label name="slug">Slug:</label>
        <input id="slug" name="slug" class="form-control" value="{{ $post->slug }}">
      </div>

      <div class="form-group">
        <label name="category">Category:</label>
        <select name="category_id" class="form-control">
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
          <label name="tags">Tags:</label>
          <select class="select2-multi form-control" name="tags[]" multiple="multiple">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
        </div>

        <label class="btn btn-primary" for="featured_image">
            <input name="featured_image" id="featured_image" type="file" style="display:none"
              onchange="$('#upload-file-info').html(this.files[0].name)">
            Browse... </label>
          <span class='label label-info' id="upload-file-info">File Name:</span>

      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="10" class="form-control">{{ $post->body }}</textarea>
      </div>
      {{-- <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block"> --}}
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->created_at->toDateTimeString())) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at->toDateTimeString())) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary btn-block">Edit</a>
          </div>
          <div class="col-sm-6">
            <input type="submit" class="btn btn-success btn-block" value="Save Changes">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({{ $post->tags->pluck('id') }}).trigger('change');
  });
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea'
});
</script>
@endsection