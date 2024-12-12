@extends('layouts.app')

@section('title', 'Job Listings')

@section('content')


    <form action="{{ route('works.index') }}" method="GET" class="flex justify-center">
        <input type="text" name="search" placeholder="Search jobs..." value="{{ request('search') }}"
            class="w-[800px] border-4 p-2 rounded mb-3 ">
        <button type="submit" class="bg-red-500 px-3 ml-3 text-white font-bold h-11 rounded-md">Search</button>
    </form>

    <div class="bg-slate-300 ">
        @if ($works->count())
            <div class="grid grid-cols-3 gap-5 bg-slate-100 p-10">
                @foreach ($works as $work)
                    <div class="bg-red-900 text-white rounded-md p-4" {{ route('works.show', $work) }}>

                        <li class="list-none mb-4 ">
                            <a href="{{ route('works.show', $work->id) }}" class="text-2xl">{{ $work->title }}</a>
                            <p class="mt-4 mb-2">{{ $work->company }} - {{ $work->location }}</p>
                        </li>
                        <div class="bg-slate-200 p-3 rounded-md text-slate-600">
                            <p>{{ $work->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No jobs found.</p>
        @endif
    </div>

    <a href="{{ route('works.create') }}">Post a Job</a>
@endsection
