@extends('layout')

@section('title', 'Main Page')

@section('content')
    <div style="display:flex; align-items:center; flex-direction:column;row-gap:20px">
        <h1 style="font-weight: 900">Hello!</h1>
        @auth
            <p>Welcome, {{ Auth::user()->name }}</p>
            <p>You are a {{ Auth::user()->role }}.</p>
        @else
            <p>Welcome, Guest</p>
        @endauth
    </div>
@endsection
