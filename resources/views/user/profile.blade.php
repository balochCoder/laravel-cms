@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">My Profile</div>

        <div class="card-body">

            <form action="{{ route('users.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"" value=" {{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="about" cols="5" rows="5"
                        class="form-control @error('about') is-invalid @enderror">{{ $user->about }}</textarea>
                        @error('about')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-success btn-sm btn-block" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
