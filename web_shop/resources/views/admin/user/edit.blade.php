@extends('index')
@section('title', 'Edit User')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label>User Name</label>
            <input class="form-control" type="text" name="username" value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <label>PassWord</label>
            <input class="form-control" type="password" name="password" value="">
            </div>
            <div class="form-group">
                <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
            </div>

            <input class="btn btn-primary" type="submit" value="Edit">
        </form>
        </div>
    </div>
</div>
        
@endsection