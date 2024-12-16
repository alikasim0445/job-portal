@extends('layouts.app')

@section('title', 'Job Listings')

@section('content')
    <div class="min-h-screen bg-slate-300 py-10">
        <!-- Search Form -->
        <form action="{{ route('works.index') }}" method="GET" class="flex justify-center mb-6">
            <input type="text" name="search" placeholder="Search jobs..." value="{{ request('search') }}"
                class="w-[800px] border-2 border-gray-400 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            <button type="submit"
                class="ml-3 bg-red-500 px-4 py-2 text-white font-bold rounded-md hover:bg-red-600 transition">
                Search
            </button>
        </form>

        <!-- Job Listings -->
        @if ($works->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-10">
                @foreach ($works as $work)
                    <div class="bg-gray-800 text-white rounded-md p-5 shadow-md">
                        <!-- Job Title -->
                        <h3 class="text-2xl font-bold mb-2">
                            <a href="{{ route('works.show', $work->id) }}" class="hover:underline">
                                {{ $work->title }}
                            </a>
                        </h3>

                        <!-- Company and Location -->
                        <p class="mb-4 text-sm">
                            <strong>{{ $work->company }}</strong> - {{ $work->location }}
                        </p>

                        <!-- Job Description -->
                        <div class="bg-slate-200 text-slate-600 p-3 rounded-md">
                            <p>{{ Str::limit($work->description, 100, '...') }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="mt-4">
                            <a href="{{ route('works.show', $work->id) }}"
                                class="text-sm bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 text-center px-20">
                {{ $works->links() }}
            </div>
        @else
            <!-- No Jobs Found -->
            <p class="text-center text-gray-500 text-lg">No jobs found. Try adjusting your search.</p>
        @endif

        <!-- Post a Job Button -->
        @auth
            <div class="mt-8 text-center">
                <a href="{{ route('works.create') }}"
                    class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-600 transition">
                    Post a Job
                </a>
            </div>
        @endauth
    </div>
@endsection
