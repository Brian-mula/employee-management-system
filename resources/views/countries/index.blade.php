@extends('layouts.main')

@section('content')


    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">countries</h1>  
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
                    <h4>country List</h4>
                    </div>
                    <div class="col">
                        <form action="{{route('countries.index')}}" method="GET">
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
                    <a href="{{route('countries.create')}}" class="btn btn-success float-right">Create</a>
                    </div>
                </div>
                
                    
            </div>
            <div class="card-body">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th># Id</th>
                            <th>countrycode</th>
                            <th>Country name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                        <tr>
                            <th scope="row" >{{$country->id}}</th>
                            <th>{{$country->country_code}}</th>
                            <th>{{$country->name}}</th>
                            
                            <th>
                               <a href="{{route('countries.edit',$country->id)}}" class="btn btn-success">Edit</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- country add form -->

    <!-- end of add form -->
    
</div>
 </main>
</div>


 @endsection