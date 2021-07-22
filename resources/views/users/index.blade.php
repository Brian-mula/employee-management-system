@extends('layouts.main')

@section('content')


    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>  
 </div>

 <div class="container">

 <main class="mx-auto m-4">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
            </div>
            <div class="card-header bg-dark text-white">
                <div class="row">
                    <div class="col">
                    <h4>User List</h4>
                    </div>
                    <div class="col">
                        <form action="{{route('users.index')}}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="inlineFormInput" class="form-controll mb-2">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-success mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                    <a href="{{route('users.create')}}" class="btn btn-success float-right">Create</a>
                    </div>
                </div>
                
                    
            </div>
            <div class="card-body">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th># Id</th>
                            <th>Username</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row" >{{$user->id}}</th>
                            <th>{{$user->username}}</th>
                            <th>{{$user->first_name}}</th>
                            <th>{{$user->last_name}}</th>
                            <th>{{$user->email}}</th>
                            <th>
                               <a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Edit</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- user add form -->
    
</div>
 </main>
</div>


 @endsection