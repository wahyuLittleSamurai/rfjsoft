@extends('Admin.main', ['sidebars' => $sidebars])

@section('content')
<div class="container h-100 ">
    <div class="row h-100 d-flex justify-content-center align-items-center ">
        @if($errors->any())
        <div class="col-12 mb-2">
            <small><label class="text-xs text-white bg-danger rounded">{{ $errors->first() }}</label></small>
        </div>
        @endif
        <div class="col-12">
            <form method="post" action="{{ route('LoginStaff') }}">
                @csrf
                <div class="form-group ">
                    <label for="Username">Username</label>
                    <input class="form-control-sm rounded " type="text" placeholder="Username" name="Username" required />
                </div>
                
                <div class="form-group ">
                    <label for="Password">Password</label>
                    <input class="form-control-sm rounded " type="password" placeholder="Password" name="Password" required />
                </div>
                <button class="btn btn-sm btn-warning">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection