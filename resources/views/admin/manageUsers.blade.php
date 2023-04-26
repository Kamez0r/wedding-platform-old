@extends('layouts.dashboard')

@section('content')

<a class="btn btn-primary" href="{{ route("admin.manageUsers.create") }}">(+) Add and Edit New Empty User</a>
<br><br>

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

                        <a class="btn btn-primary"
                           href="{{ route("admin.manageUsers.view", ["user" => $user->id]) }}"
                        >
                            Open
                        </a>

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

                        <a class="btn btn-warning"
                           href="{{ route("admin.manageUsers.edit", ["user" => $user->id]) }}"
                        >
                            Edit
                        </a>

                        <a class="btn btn-danger"
                           href="{{ route("admin.manageUsers.remove", ["user" => $user->id]) }}"
                        >
                            Remove
                        </a>
                    </div>
                </td>

            </tr>

        @endforeach
    </tbody>
</table>

@endsection
