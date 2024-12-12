@extends('layouts.app')

@section('title', 'Edit Job: ' . $work->title)

@section('content')
    <h1 class="text-center">{{ $work->title }}</h1>

    <div class="flex justify-center mt-5">
        <div class="flex flex-col gap-3 bg-red-900 w-[400px] h-fit p-5 rounded-lg">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('works.update', $work->id) }}" method="POST" class="flex flex-col gap-2">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1">
                    <label for="title">Work Title:</label><br>
                    <input type="text" name="title" value="{{ old('title', $work->title) }}" required class="p-2"><br>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="description">Work Description:</label><br>
                    <textarea name="description" required class="p-2">{{ old('description', $work->description) }}</textarea><br>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="company">Company:</label><br>
                    <input type="text" name="company" value="{{ old('company', $work->company) }}" required
                        class="p-2"><br>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="location">Location:</label><br>
                    <input type="text" name="location" value="{{ old('location', $work->location) }}" required
                        class="p-2"><br>
                </div>

                <button type="submit" class="bg-white text-black font-bold p-2 mt-3">Update Work</button>
            </form>
        </div>
</div>@endsection
