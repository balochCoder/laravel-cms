@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tag.create') }}" class="btn btn-success btn-sm">Add Tag</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if ($tags->count() > 0)
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->posts->count() }}</td>
                                <td>

                                    <a href="{{ route('tag.edit', $tag->id) }}"
                                        class="btn btn-primary btn-sm  mr-2">Edit</a>
                                    @if ($tag->posts->count() === 0)
                                        <button type="button" data-toggle="modal" data-target="#deleteModal"
                                            class="btn btn-danger btn-sm "
                                            onclick="handledelete({{ $tag->id }})">Delete</button>
                                    @endif

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

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
                                <form action="" method="POST" id="deleteTagForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3 class="text-center">No Tag Yet</h3>
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
            var form = document.getElementById('deleteTagForm')
            let url = "{{ route('tag.destroy', ':id') }}"
            url = url.replace(':id', id);
            form.action = url
        }
    </script>
@endsection
