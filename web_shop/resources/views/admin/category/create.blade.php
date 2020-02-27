@extends('index')
@section('title', 'Create Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
            <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>

            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        </div>
    </div>
</div>
        
@endsection