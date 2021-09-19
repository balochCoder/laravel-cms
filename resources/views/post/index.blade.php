@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-success btn-sm">Add Post</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Images</th>
                    <th>Title</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/post_images/' . $post->image) }}" alt="" width="100px" height="50px">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>

                                <a href="{{ route('post.edit', $post->id) }}"
                                    class="btn btn-primary btn-sm  mr-2">Edit</a>
                                <button type="button" data-toggle="modal" data-target="#deleteModal"
                                    class="btn btn-danger btn-sm "
                                    onclick="handledelete({{ $post->id }})">Delete</button>

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

            {{$posts->links()}}

        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form action="" method="POST" id="deletePostForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function handledelete(id) {
            var form = document.getElementById('deletePostForm')
            let url = "{{ route('post.destroy', ':id') }}"
            url = url.replace(':id', id);
            form.action = url
        }
    </script>
@endsection
