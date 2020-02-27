@extends('index')

@section('title', 'List User')

@section('content')
<button id="password" class="bnt btn-warning">Hide Password</button>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="show-password">Password</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$user->username}}</td>
                        <td class="show-password">{{$user->password}}</td>                        
                        <td>{{$user->email}}</td>
                        <td>
                            {{-- <a href="" class="btn btn-info">Show</a> --}}
                        <a href="{{ route('destroyUser', $user->id) }}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                        <a href="{{ route('formEdit', $user->id) }}" class="btn btn-primary">Edit</a>
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
        {{-- <div class="col-12">
            <a href="{{ route('formRegister') }}" class="btn btn-success">Create New Category</a>
        </div> --}}
    </div>
@endsection
