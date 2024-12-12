@extends('layouts.app')

@section('title', $work->title)

@section('content')
    <div class="bg-slate-100 w-[50%] mx-auto p-6 rounded-md">
        <h1 class="text-2xl mb-3">{{ $work->title }}</h1>
        <p class="mb-3">{{ $work->description }}</p>
        <div class="flex justify-between mb-3">
            <p>Company: {{ $work->company }}</p>
            <p>Location: {{ $work->location }}</p>
        </div>

        <div class="flex justify-between mt-5">
            <a href="{{ route('works.edit', $work->id) }}"><button
                    class="bg-green-400 px-3 rounded font-bold py-2">Edit</button></a>

            <form action="{{ route('works.destroy', $work->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')"
                    class="bg-red-500 px-3 rounded font-bold py-2">Delete </button>
            </form>

            <a href="{{ route('works.index') }} " class="bg-gray-500 px-3 rounded font-bold py-2"><button>back</button></a>
        </div>
    </div>
@endsection
