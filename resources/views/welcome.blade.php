@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h2>Store FAQ</h2>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
