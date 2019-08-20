@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h1>Simple Admin Panel</h1>

                        @if(isset($userUpdate))
                            <form method="put" action="{{route('admins.update',$userUpdate->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="{{$userUpdate->name}}" class="form-control" placeholder="Enter Name" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{$userUpdate->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" value="{{$userUpdate->phone}}" class="form-control"   placeholder="Enter Phone" required autocomplete="phone" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" value="{{$userUpdate->city}}" class="form-control"   placeholder="Enter city" required autocomplete="city" autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        @else

                        <!-- Form start here -->
                        <form method="post" action="{{route('admins.store')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="name" value="" class="form-control" placeholder="Enter Name" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control"   placeholder="Enter Phone" required autocomplete="phone" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control"   placeholder="Enter city" required autocomplete="city" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required autocomplete="password" autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endif
                        <br>

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
                                        <a href='{{route('admins.show', $user->id)}}'>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td><a href='{{route('admins.destroy', $user->id)}}'>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a></td>

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