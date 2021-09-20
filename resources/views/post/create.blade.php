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
                        <input id="content" type="hidden" name="content"
                            value="{{ isset($post) ? $post->content : old('content') }}">
                        <trix-editor input="content"></trix-editor>
                        {{-- <textarea name="content" cols="5" rows="5"
                            class="form-control @error('content') is-invalid @enderror"
                            id="content"></textarea> --}}
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="category_id">State</label>
                        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                            name="category_id">
                            @empty($post)
                                <option selected disabled value="">Select Category</option>
                            @endempty
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @isset($post)
                                    {{ $category->id == $post->category_id ? 'selected' : '' }} @endisset>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if ($tags->count() > 0)
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="form-control tags-selector" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @isset($post) @if ($post->hasTag($tag->id))
                                        selected
                                @endif
                            @endisset
                            >{{ $tag->name }}</option>
                @endforeach
                </select>
    </div>
    @endif
    <div class="form-group ">
        <label for="published_at">Published At</label>
        <input type="text" class="form-control @error('published_at') is-invalid @enderror" name="published_at"
            id="published_at" value="{{ isset($post) ? $post->published_at : old('published_at') }}">
        @error('published_at')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    @isset($post)
        <div class="form-group">
            <img src="{{ asset('storage/post_images/' . $post->image) }}" alt="" style="width: 100%">
        </div>
    @endisset
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">{{ isset($post) ? 'Update' : 'Create' }}</button>
    </div>
    </fieldset>
    </form>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    $(document).ready(function() {
        $('.tags-selector').select2();
        $(document).on('submit', 'form', function() {
            $('button').attr('disabled', 'disabled');

        });
        flatpickr("#published_at", {
            enableTime: true
        });
    });
</script>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
