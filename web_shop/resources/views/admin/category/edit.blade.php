@extends('index')
@section('title', 'Edit Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label>Description</label>
            <input class="form-control" type="text" name="description" value="{{ $category->desciption }}">
            </div>

            <input class="btn btn-primary" type="submit" value="Edit">
        </form>
        </div>
    </div>
</div>
        
@endsection