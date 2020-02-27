@extends('index')
@section('title', 'Create Product')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
            <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
            <input class="form-control" type="text" name="description">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
            <input class="form-control" type="number" name="price">
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="img">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Create">
        </form>
        </div>
    </div>
</div>
        
@endsection