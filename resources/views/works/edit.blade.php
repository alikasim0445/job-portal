@extends('layouts.app')

@section('title', 'Edit Job: ' . $work->title)

@section('content')
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="bg-gray-800 text-white p-6 w-full max-w-md rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-4">Edit Job: {{ $work->title }}</h1>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-700 text-white p-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Job Form -->
            <form action="{{ route('works.update', $work->id) }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')

                <!-- Job Title -->
                <div>
                    <label for="title" class="block font-bold mb-1">Job Title:</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $work->title) }}" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        placeholder="Enter job title">
                </div>

                <!-- Job Description -->
                <div>
                    <label for="description" class="block font-bold mb-1">Job Description:</label>
                    <textarea name="description" id="description" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        rows="4" placeholder="Enter job description">{{ old('description', $work->description) }}</textarea>
                </div>

                <!-- Company -->
                <div>
                    <label for="company" class="block font-bold mb-1">Company:</label>
                    <input type="text" name="company" id="company" value="{{ old('company', $work->company) }}"
                        required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        placeholder="Enter company name">
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block font-bold mb-1">Location:</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $work->location) }}"
                        required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        placeholder="Enter job location">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-white text-red-900 font-bold py-2 px-4 rounded hover:bg-gray-200 transition text-center mt-4">
                    Update Job
                </button>
            </form>
        </div>
    </div>
@endsection
