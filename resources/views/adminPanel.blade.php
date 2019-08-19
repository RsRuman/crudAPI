@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h1>Simple Admin Panel</h1>

                        <!-- Bootstrap table -->
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">City</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userList as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>
                                        <a href='{{route('admins.update', $user->id)}}'>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href='{{route('admins.destroy', $user->id)}}'>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection