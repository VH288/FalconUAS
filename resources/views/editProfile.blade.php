@extends('navbar.navbar')
@section('content')

<style>
    label{
        font-weight: bold;
        font-size: small;
    }

    .form-control::placeholder { 
        color: rgb(11, 11, 117);
        opacity: 50%;
        font-size: x-small;
    }  

    .btn-primary {
        background-color:  rgb(11, 11, 117);
        border-style: none;
        border-radius: 20px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 15px;
    }

    .btn-danger {
        background-color:  rgb(255, 68, 68);
        border-style: none;
        border-radius: 20px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 15px;
    }

    .form-control {
        border-radius: 20px;
    }

    label {
        padding-left: 5px;
    }

    input {
        font-size: small;
    }

    .validation {
        color: red;
        font-size: 12px;
        font-weight: bold;
        padding-top: 5px;
        text-align: center;
    }

</style>

<div class="container mt-5 min-vh-100">
    <i class="fas fa-user-circle fa-5x" style="display:flex; flex-direction:column; color: rgb(23, 17, 75); align-items: center;"></i>
    <br>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please reinput edit profile, there are wrong input</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="w-50 ms-auto me-auto" action="{{ url('epr',$user->id) }}" method="post">
        @csrf    
        <div class="col-lg-6 mt-5 ms-auto me-auto">
                <label class="form-label">Firstname</label>
                <input class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="New Firstname" required>
                <div class="validation">
                </div> 
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Lastname</label>
                <input class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="New Lastname" required>
                <div class="validation">
                </div>
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Phone Number</label>
                <input class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="New Phone Number" required>
                <div class="validation">
                </div>
            </div>
            <div class="col-lg-6 mt-3 ms-auto me-auto">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
                <div class="validation">
                </div>
            </div>
            <div class="col-lg-6 mt-4 mb-5 ms-auto me-auto d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('users.show',session('user_id')) }}">
                    <button class="btn btn-danger" type="button" name="cancel" >Cancel Edit</button>
                </a>
                <button class="btn btn-primary ms-2" type="submit" name="edit">Save Changes</button>
            </div>
    </form>
</div>

@endsection