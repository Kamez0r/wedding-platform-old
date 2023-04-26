@extends('layouts.dashboard')

@section('content')

    <div class="btn-group" role="group" aria-label="Change Action">
        <a class="btn btn-secondary" href="..">Back</a>
        @if(!$readonly)
            <a class="btn btn-primary"
               href="{{ route("admin.manageUsers.view", ["user" => $user->id]) }}"
            >
                Open (Read-Only)
            </a>
        @else
            <a class="btn btn-warning"
               href="{{ route("admin.manageUsers.edit", ["user" => $user->id]) }}"
            >
                Edit User
            </a>
        @endif

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
    </div>

    <a class="btn btn-danger float-end"
       href="{{ route("admin.manageUsers.remove", ["user" => $user->id]) }}"
    >
        Remove
    </a>

    <hr>

    <form>
        <div class="row">

            <!-- User ID -->
            <div class="form-group row col-lg-3">
                <label for="userId" class="col-sm-4 col-form-label">User ID</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="userId" value="{{ $user->id }}">
                </div>
            </div>

            <!-- Date Created -->
            <div class="form-group row col-lg-5">
                <label for="userDateCreated" class="col-sm-4 col-form-label">Created At</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="userDateCreated" value="{{ $user->created_at }}">
                </div>
            </div>

            <!-- Date Updated -->
            <div class="form-group row col-lg-4">
                <label for="userDateUpdated" class="col-sm-4 col-form-label">Updated At</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="userDateUpdated" value="{{ $user->updated_at }}">
                </div>
            </div>

        </div>
        <hr>



        <!-- User Name -->
        <div class="form-group row">
            <label for="userName" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"
                       id="userName"
                       name="userName"
                       value="{{$user->name}}"
                       placeholder="i.e. John Doe"
                    {{$readonly ? "readonly" : ""}}>
            </div>
        </div>
        <br>

        <!-- User Email -->
        <div class="form-group row">
            <label for="userEmail" class="col-sm-2 col-form-label">User Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"
                       id="userEmail"
                       name="userEmail"
                       value="{{$user->email}}"
                       placeholder="i.e. John Doe"
                    {{$readonly ? "readonly" : ""}}>
            </div>
        </div>
        <br>

        <!-- User New Password -->
        <div class="form-group row">
            <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control"
                       id="newPassword" name="newPassword"
                       placeholder="(leave empty to not change)"
                   {{$readonly ? "readonly" : ""}}>
            </div>
        </div>
        <br>

        <!-- User New Password Confirm -->
        <div class="form-group row">
            <label for="newPasswordConfirm" class="col-sm-2 col-form-label">Confirm New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control"
                       id="newPasswordConfirm" name="newPasswordConfirm"
                       placeholder="(leave empty to not change)"
                    {{$readonly ? "readonly" : ""}}>
            </div>
        </div>

        @if(!$readonly)
            <hr>
            <div class="btn-group float-end" role="group" aria-label="Form Submit">
                <a class="btn btn-secondary" href="..">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        @endif

    </form>

@endsection
