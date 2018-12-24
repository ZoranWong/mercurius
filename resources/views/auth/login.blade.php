@extends('vue::layouts.app')

@section('components')
    <platform-login :remember-me = "{{$rememberMe}}"></platform-login>
@endsection
