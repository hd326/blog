@extends('main')

@section('title', '| Create New Post')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('posts.store') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label name="slug">Slug:</label>
        <input id="slug" name="slug" class="form-control">
      </div>
      <div class="form-group">
        <label name="tags">Tags:</label>
        <select class="select2-multi form-control" name="tags[]" multiple="multiple">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label name="category">Category:</label>
        <select name="category_id" class="form-control">
          @foreach ($categories as $category)
          <option value={{ $category->id }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
      </div>
      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
    </form>
  </div>
</div>

@endsection

@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.select2-multi').select2();
  });
</script>
@endsection