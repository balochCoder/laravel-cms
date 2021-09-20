@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? 'Edit Tag' : 'Create new Tag' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tag.update', $tag->id) : route('tag.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @isset($tag)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ isset($tag) ? $tag->name : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ isset($tag) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
    </script>
@endsection
