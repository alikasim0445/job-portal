@extends('layouts.app')

@section('title', 'Post a New Job')

@section('content')
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="bg-red-900 text-white p-6 w-full max-w-md rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-4">Post a New Job</h1>

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

            <!-- Job Posting Form -->
            <form action="{{ route('works.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <!-- Job Title -->
                <div>
                    <label for="title" class="block font-bold mb-1">Job Title:</label>
                    <input type="text" name="title" id="title" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        value="{{ old('title') }}" placeholder="Enter job title">
                </div>

                <!-- Job Description -->
                <div>
                    <label for="description" class="block font-bold mb-1">Job Description:</label>
                    <textarea name="description" id="description" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        rows="4" placeholder="Enter job description">{{ old('description') }}</textarea>
                </div>

                <!-- Company -->
                <div>
                    <label for="company" class="block font-bold mb-1">Company:</label>
                    <input type="text" name="company" id="company" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        value="{{ old('company') }}" placeholder="Enter company name">
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block font-bold mb-1">Location:</label>
                    <input type="text" name="location" id="location" required
                        class="w-full p-2 text-black border-2 border-gray-300 rounded focus:outline-none focus:ring focus:ring-red-500"
                        value="{{ old('location') }}" placeholder="Enter job location">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-white text-red-900 font-bold py-2 px-4 rounded hover:bg-gray-200 transition text-center">
                    Post Job
                </button>
            </form>
        </div>
    </div>
@endsection
