@extends('layouts.app')

@section('title', 'Apply for Job')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Apply for {{ $work->title }}</h1>

        <form action="{{ route('job_applicants.store', $work->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Your Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Your Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Resume -->
            <div class="mb-4">
                <label for="resume" class="block text-gray-700 font-bold">Upload Resume</label>
                <input type="file" name="resume" id="resume" accept="pdf doc png jpeg docx "
                    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('resume')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
@endsection
