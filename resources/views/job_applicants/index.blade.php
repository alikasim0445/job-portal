@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4">
        <h1 class="text-2xl font-bold mb-4">Applicants for {{ $work->title }}</h1>

        <form action="{{ route('job_applicants.store', $job->id) }}" method="POST" enctype="multipart/form-data"
            class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mb-4">
                <label for="resume" class="block text-gray-700">Resume (optional)</label>
                <input type="file" id="resume" name="resume" class="w-full border border-gray-300 rounded p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Application</button>
        </form>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Resume</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $applicant->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $applicant->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($applicant->resume)
                                <a href="{{ asset('storage/' . $applicant->resume) }}" target="_blank"
                                    class="text-blue-500 hover:underline">
                                    View Resume
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('job_applicants.destroy', $applicant->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this applicant?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
