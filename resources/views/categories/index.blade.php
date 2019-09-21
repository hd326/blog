@extends('main')

@section('title', '| Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <form method="POST" action="{{ route('categories.store') }}" >
                    {{ csrf_field() }}
                    <h2>New Category</h2>
                    <div class="form-group">
                    <label for="name">Name:</label>
                    <input 
                        name="name" 
                        class="form-control"
                        type="text" 
                        placeholder="Enter a new category..." 
                        value="{{ old('name') }}">
                        <br>
                    <input type="submit" value="Create Category" class="btn btn-primary btn-block">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection