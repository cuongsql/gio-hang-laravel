@extends('index')
@section('title', 'Edit Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
            <input class="form-control" type="text" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label>Description</label>
            <input class="form-control" type="text" name="description" value="{{ $product->description }}">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="3">{{ $product->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
            <input class="form-control" type="number" name="price" value="{{ $product->price }}">
            </div>
            <img src="{{asset('storage/images/'.$product->img)}}" style="width: 100px">
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
            <input class="btn btn-primary" type="submit" value="Edit">
        </form>
        </div>
    </div>
</div>
        
@endsection