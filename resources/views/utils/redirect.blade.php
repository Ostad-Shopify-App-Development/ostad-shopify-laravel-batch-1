@extends('layouts.master')

@section('title', 'Create Group')

@section('contents')
    <h1>Redirecting in 2 secs</h1>
    <a id="redirect" href="{{$path}}">URL</a>
@endsection

@push('scripts')
    <script>
        setTimeout(function() {
            console.log("Ran")
            // document.getElementById('redirect').click();
        }, 2000);
    </script>
@endpush
