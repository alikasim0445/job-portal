@extends('layouts.app')

@section('title', 'Post a New Job')

@section('content')
    <h1 class="text-center mb-4">Post a New Job</h1>

    <div class="flex justify-center mx-auto">
        <div class=" bg-red-900 text-white  p-5 w-[400px] h-fit rounded-lg">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('works.store') }}" method="POST" class="flex flex-col gap-3">
                @csrf
                <div class="text-black flex flex-col gap-1 font-bold">
                    <label for="title">Job Title:</label> <br>
                    <input type="text" name="title" required class="p-2"><br>
                </div>

                <div class="text-black flex flex-col gap-1 font-bold">
                    <label for="description">Job Description:</label><br>
                    <textarea name="description" required class="p-2" cols="60px"></textarea><br>
                </div>

                <div class="text-black flex flex-col gap-1 font-bold">
                    <label for="company">Company:</label><br>
                    <input type="text" name="company" required class="p-2"><br>
                </div>

                <div class="text-black flex flex-col gap-1 font-bold">
                    <label for="location">Location:</label><br>
                    <input type="text" name="location" required class="p-2"><br>
                </div>

                <button type="submit" class="bg-white text-black font-bold p-2 mt-2">Post Job</button>
            </form>
        </div>
    </div>
@endsection
