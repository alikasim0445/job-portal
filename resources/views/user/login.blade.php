@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/users/login" class=" w-[300px] mx-auto p-8 bg-gray-800 rounded-lg text-white">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email')">Email</label>
            <input id="email" class="block mt-1 w-full p-1" type="email" name="email" :value="old('email')" required
                autocomplete="username" value="{{ old('email') }}" />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="__('Password')">Password</label>

            <input id="password" class="block mt-1 w-full p-1" type="password" name="password" required
                autocomplete="new-password" value="{{ old('password') }}" />

            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>


        <button class="mt-4 bg-green-400 mx-auto p-2 rounded">
            Login
            <button>
                <p>Don't have un account <a href="/users/register" class="bg-gray-400 text-black p-1 rounded">Register</a>
                </p>
    </form>

@endsection
