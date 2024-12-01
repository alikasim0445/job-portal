@extends('layout')

@section('content')
    <h1>{{ $heading }}</h1>
    @if (!empty($listings))
        <div class="grid grid-cols-2 gap-6 bg-white">
            @foreach ($listings as $list)
                <div {{ $list['id'] }} class="flex p-5 border-2 w-auto gap-8 align-middle bg-slate-100">
                    <img src="{{ asset('image/no-image.png') }}" alt="No Image" class="h-[100px] mt-10 ">

                    <div>
                        <a href="{{ route('listings.show', ['id' => $list['id']]) }}" class="text-2xl text-center mb-5">
                            {{ $list['title'] }}
                        </a>
                        <p class="my-2 text-2xl text-sky-900">{{ $list['company'] }}</p>
                        <p class="text-black text-[20px] mb-2">{{ $list['tags'] }}</p>
                        <p class="text-[20px] text-lime-950s font-bold mb-2">{{ $list['location'] }}</p>



                        <p class="text-[20px] mt-3 text-end">created At: {{ $list['created_at'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No listings found.</p>
    @endif
@endsection
