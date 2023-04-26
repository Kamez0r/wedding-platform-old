@extends('layouts.dashboard')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">{{ "#" }}</th>
            <th scope="col">{{ "User Name" }}</th>
            <th scope="col">{{ "User Email" }}</th>
            <th scope="col">{{ "Date Created" }}</th>
            <th scope="col">{{ "Date Updated" }}</th>
            <th scioe="col">{{ "Action" }}</th>

        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <div class="btn-group flex-wrap" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Open</button>

                        <div class="btn-group" role="group"> <!-- Action -->
                            <button id="btnGroupDrop{{ $user->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $user->id }}">
                                <a class="dropdown-item" href="#">* Send Email Invitation</a>
                                <a class="dropdown-item" href="#">* Open PDF Invitation</a>
                                <a class="dropdown-item" href="#">* Login as this user</a>
                            </div>
                        </div>

                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Remove</button>
                    </div>
                </td>

            </tr>

        @endforeach
    </tbody>
</table>

@endsection
