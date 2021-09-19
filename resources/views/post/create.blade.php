@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'Edit Post' : 'Create new Post' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @isset($post)
                    @method('PUT')
                @endisset
                <fieldset>
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                            value="{{ isset($post) ? $post->title : old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="5" rows="5"
                            class="form-control @error('description') is-invalid @enderror"
                            id="description">{{ isset($post) ? $post->description : old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" cols="5" rows="5"
                            class="form-control @error('content') is-invalid @enderror"
                            id="content">{{ isset($post) ? $post->content : old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label for="published_at">Published At</label>
                        <input type="text" class="form-control @error('published_at') is-invalid @enderror"
                            name="published_at" id="published_at"
                            value="{{ isset($post) ? $post->published_at : old('published_at') }}">
                        @error('published_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ isset($post) ? 'Update' : 'Create' }}</button>
                    </div>
                </fieldset>
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
