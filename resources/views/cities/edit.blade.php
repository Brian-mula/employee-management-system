@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update City') }}
                <a href="{{route('cities.index')}}" class="btn btn-success float-right">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                            @method('PUT')
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">

                            <select name="state_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select State</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}" {{$state->id== $city->state_id ? 'selected' : "" }} >{{$state->name}}</option>
                                        @endforeach
                                        </select>

                                <!-- <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" autofocus> -->

                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$city->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update City') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- delete city form -->

            <div class="m-4 p-4">
            <form action="{{route('cities.destroy',$city->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete {{$city->name}}</button>
            </form>
            </div>

            <!-- end of city delete form -->
        </div>
    </div>
</div>

@endsection