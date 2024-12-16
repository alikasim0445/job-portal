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

        <!-- Action Buttons -->
        <div class="flex justify-between mt-6">
            <!-- Edit Button -->
            <a href="{{ route('works.edit', $work->id) }}">
                <button class="bg-green-500 text-white font-bold py-2 px-4 rounded-md hover:bg-green-600 transition">
                    <i class="fa-solid fa-pencil"></i> Edit
                </button>
            </a>

            <!-- Delete Button -->
            <form action="{{ route('works.destroy', $work->id) }}" method="POST"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white font-bold py-2 px-4 rounded-md hover:bg-red-600 transition">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>

            <!-- Back Button -->
            <a href="{{ route('works.index') }}">
                <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-600 transition">
                    Back
                </button>
            </a>
        </div>
    </div>
@endsection
