@extends('Admin.main', ['sidebars' => $sidebars])

@section('content')
<div class="container h-100 ">
    <div class="row h-100 justify-content-md-center align-items-center " style="min-height: 80vh;">
        
        <div class="col-4 mx-auto border shadow rounded p-2">
            @if($errors->any())
            <div class="row text-center w-100 m-0 p-0">
                <div class="alert alert-danger" role="alert">
                    <small>{{ $errors->first() }}</small>
                </div>
            </div>
            @endif

            <form method="post" action="{{ route('ActionStaffResetPass') }}" >
                @csrf
                <div class="form-group ">
                    <label for="EmailOrPhone" class="form-label">Email OR Phone</label>
                    <input class="form-control" type="text" placeholder="Email Or Phone" name="EmailOrPhone" required />
                </div>
                <div class="form-group ">
                    <label for="Password" class="form-label">Password</label>
                    <input class="form-control" type="text" placeholder="Password" name="Password" required />
                </div>
                <div class="form-group ">
                    <label for="re-Password">re-Password</label>
                    <input class="form-control rounded " type="password" placeholder="re-Password" name="re-password" required />
                </div>
               
                <button class="btn btn-primary text-white float-end mt-2" >RESET PASS</button>

            </form>
            
        </div>
    </div>
</div>

@endsection