@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update State') }}
                <a href="{{route('states.index')}}" class="btn btn-success float-right">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('states.update',$state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">

                            <select name="contry_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id== $state->contry_id ? 'selected' :''}}>{{$country->name}}</option>
                                        @endforeach
                                        </select>

                                <!-- <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" autofocus> -->

                                @error('contry_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$state->name) }}" required autocomplete="name" autofocus>

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
                                    {{ __('Update State') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- delete state form -->

            <div class="m-4 p-4">
            <form action="{{route('states.destroy',$state->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete {{$state->name}}</button>
            </form>
            </div>

            <!-- end of delete form -->
        </div>
    </div>
</div>

@endsection