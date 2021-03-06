@extends('navbar.navbar')
@section('content')
    <style>
        .card {
            border-radius: 20px;
            font-size: 15px;
        }

        .btn-primary {
            background-color:  rgb(11, 11, 117);
            border-style: none;
            border-radius: 20px;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-size: 15px;
        }

        div.relative {
            position: relative;
        }
    </style>
        <div class="container mt-5 min-vh-100">
            <i class="fas fa-user-circle fa-5x" style="display:flex; flex-direction:column; color: rgb(23, 17, 75); align-items: center;"></i>
                    <br>
                    <hr>
                        <div class="w-25 mt-5 ms-auto me-auto">
                            <div class="card mb-3 p-2 px-3">
                                <div class="relative">
                                    <b>Nama            : </b>{{ $user->first_name }} {{ $user->last_name }}
                                </div>
                            </div>
                            <div class="card mb-3 p-2 px-3">
                                <div class="relative">
                                    <b>Username        : </b>{{ $user->username }}
                                </div>
                            </div>
                            <div class="card mb-3 p-2 px-3">
                                <div class="relative"> 
                                    <b>Email           : </b>{{ $user->email }}
                                </div>
                            </div>
                            <div class="card mb-3 p-2 px-3">
                                <div class="relative"> 
                                    <b>Phone Number    : </b>{{ $user->phone }}
                                </div>
                            </div>
                            <div class="mb-3"> 
                                <a href="{{ route('users.edit',$user->id) }}" class="d-grid gap-2 text-decoration-none">
                                    <button type="submit" class="btn btn-primary" value="Edit Profile">Edit Profile</button>
                                </a>
                            </div>
                            <div class="mb-3">
                                <a href="{{ url('deluser',$user->id) }}" class="d-grid gap-2 text-decoration-none">
                                    <button type="submit" class="btn btn-danger" value="Delete Profile" name="delete">Delete Profile</button>
                                </a>
                            </div>
                        </div>
        </div>
@endsection