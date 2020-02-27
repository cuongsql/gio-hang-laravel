@extends('index')
@section('title', 'Create User')

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{route('user.store')}}" method="POST" class="form-group">
            @csrf
            <div class="mt-3">
                <label>Category name: </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Input Category Name">
            </div>
            <div class="mt-3">
                <label>Description: </label>
                <textarea name="description" rows="3" class="form-control" placeholder="Input Category Description"></textarea>
            </div>
            <div class="mt-3">
                <input type="submit" value="Create" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection
