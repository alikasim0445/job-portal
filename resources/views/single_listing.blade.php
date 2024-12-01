@extends('layout')

@section('content')
    <div {{ $listings['id'] }}>
        <h1>{{ $listings['title'] }}</h1>
        <p>{{ $listings['description'] }}</p>
    </div>
    <a href="{{ route('listings.index') }}"><button>Go back</button></a>
@endsection
