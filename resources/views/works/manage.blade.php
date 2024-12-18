@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Edit</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $work->title }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('works.edit', $work->id) }}" class="text-blue-500 hover:underline">
                                <i class="fa-solid fa-pencil"></i> Edit
                            </a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('works.destroy', $work->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this work?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
