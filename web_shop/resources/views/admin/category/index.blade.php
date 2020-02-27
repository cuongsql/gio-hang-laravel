@extends('index')

@section('title', 'List Categories')

@section('content')
    
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $key => $category)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->desciption}}</td>
                        <td>
                            <a href="" class="btn btn-info">Show</a>
                        <a href="{{ route('destroyCategory', $category->id) }}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                        <a href="{{ route('formEditCategory', $category->id) }}" class="btn btn-primary">Edit</a>
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
            <a href="{{ route('formCreateCategory') }}" class="btn btn-success">Create New Category</a>
        </div>
    </div>
@endsection
