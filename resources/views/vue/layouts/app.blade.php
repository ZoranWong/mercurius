@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        @yield('components')
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
