@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Users</div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Images</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::get($user->email)}}" alt="">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!$user->isAdmin() && Auth::user()->id !== $user->id)
                                        <form action="{{ route('users.admin', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success btn-sm" type="submit">Make Admin</button>
                                        </form>
                                    @elseif($user->isAdmin() && Auth::user()->id !== $user->id)
                                        <form action="{{ route('users.writer', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-info btn-sm text-white" type="submit">Make Writer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            @else
                <h3 class="text-center">No User Yet</h3>
            @endif
        </div>
    </div>


@endsection
