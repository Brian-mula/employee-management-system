@extends('layouts.main')

@section('content')


    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">departments</h1>  
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
                    <h4>Department List</h4>
                    </div>
                    <div class="col">
                        <form action="{{route('departments.index')}}" method="GET">
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
                    <a href="{{route('departments.create')}}" class="btn btn-success float-right">Create</a>
                    </div>
                </div>
                
                    
            </div>
            <div class="card-body">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th># Id</th>
                            <th>department name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <th scope="row" >{{$department->id}}</th>
                            <th>{{$department->name}}</th>
                            
                            <th>
                               <a href="{{route('departments.edit',$department->id)}}" class="btn btn-success">Edit</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- department add form -->

    <!-- end of add form -->
    
</div>
 </main>
</div>


 @endsection