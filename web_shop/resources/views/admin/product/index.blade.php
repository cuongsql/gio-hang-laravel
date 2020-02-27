@extends('index')

@section('title', 'List Products')

@section('content')

<div class="input-group">
    <button class="btn btn-danger" id="hi">Hide images</button>
    <input type="number" class="form-control" id="size-image" value="1">
    <div class="input-group-prepend">
      <div class="input-group-text">Search</div>
    </div>
    <input type="text" class="form-control" id="search-product" placeholder="keyword">
</div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="hide-img">Img</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="list-product">
                @forelse($products as $key => $product)
                    <tr>
                        <th>{{++$key}}</th>
                    <th class="hide-img"><img src="{{ asset('storage/images/'.$product->img) }}" class="image-thumbnail-product" width="50"></th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->description}}</td>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->category->name }}</th>
                        <td>
                            <a href="" class="btn btn-info">Show</a>
                        <a href="{{ route('destroyProduct', $product->id) }}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                        <a href="{{ route('formEditProduct', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">No data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <a href="{{ route('formCreateProduct') }}" class="btn btn-success">Create New Category</a>
        </div>
    </div>
@endsection
