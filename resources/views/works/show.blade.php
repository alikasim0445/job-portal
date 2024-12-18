@extends('layouts.app')

@section('title', $work->title)

@section('content')
    <div class="bg-gray-800 w-full max-w-xl mx-auto p-6 rounded-md shadow-lg mt-8">
        <h1 class="text-3xl font-bold mb-4 text-white">{{ $work->title }}</h1>

        <!-- Job Description -->
        <p class="text-lg mb-4 text-white">{{ $work->description }}</p>

        <!-- Company and Location Details -->
        <div class="flex justify-between items-center bg-gray-200 p-3 rounded-md mb-5">
            <p class="font-bold">Company: <span class="font-normal">{{ $work->company }}</span></p>
            <p class="font-bold">Location: <span class="font-normal">{{ $work->location }}</span></p>
        </div>




        <!-- Back Button -->
        <a href="{{ route('works.index') }}">
            <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-600 transition">
                Back
            </button>
        </a>
    </div>
    </div>
@endsection
