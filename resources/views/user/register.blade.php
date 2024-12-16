@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/users/register" class=" w-[300px] mx-auto p-8 bg-gray-800 text-white rounded-lg">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" :value="__('Name')">Name</label>
            <input id="name" class="block mt-1 w-full p-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" value="{{ old('name') }}" />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email')">Email</label>
            <input id="email" class="block mt-1 w-full p-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" value="{{ old('email') }}" />
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

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>

            <input id="password_confirmation" class="block mt-1 w-full p-1" type="password" name="password_confirmation"
                required autocomplete="new-password" value="{{ old('password_confirmation') }}" />

            @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button class="mt-4 bg-green-400 mx-auto p-2 rounded">
            Register
            <button>
                <p>Already have un account <a href="/users/login" class="bg-gray-400 text-black p-1 rounded">login</a> </p>
    </form>

@endsection
