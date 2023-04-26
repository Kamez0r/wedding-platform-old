@extends('layouts.dashboard')

@section('content')

    <h3>Hello, {{ $user->name }}!</h3>
    {{ __('You are logged in!') }}

@endsection
