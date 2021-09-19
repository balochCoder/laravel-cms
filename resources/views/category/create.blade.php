@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Create new Category' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @isset($category)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ isset($category) ? $category->name : old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{ isset($category) ? 'Update' : 'Create' }}</button>
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
