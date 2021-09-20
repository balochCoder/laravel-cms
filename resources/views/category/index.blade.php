@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">Add Category</a>
    </div>
   
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->posts->count() }}</td>
                                <td>

                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm  mr-2">Edit</a>
                                    <button type="button" data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-danger btn-sm "
                                        onclick="handledelete({{ $category->id }})">Delete</button>

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
                                <form action="" method="POST" id="deleteCategoryForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3 class="text-center">No Category Yet</h3>
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
            var form = document.getElementById('deleteCategoryForm')
            let url = "{{ route('category.destroy', ':id') }}"
            url = url.replace(':id', id);
            form.action = url
        }
    </script>
@endsection
