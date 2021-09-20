@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-success btn-sm">Add Post</a>
    </div>
 
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if ($posts->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Images</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/post_images/' . $post->image) }}" alt="" width="100px"
                                        height="50px">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    @if (!$post->trashed())
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    @else
                                        <form action="{{ route('restore', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-danger btn-sm "
                                        onclick="handledelete({{ $post->id }})">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                {{ $posts->links() }}
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
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
            @else
                <h3 class="text-center">No Posts Yet</h3>
            @endif
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

        function handledelete(id) {
            var form = document.getElementById('deletePostForm')
            let url = "{{ route('post.destroy', ':id') }}"
            url = url.replace(':id', id);
            form.action = url
        }
    </script>
@endsection
