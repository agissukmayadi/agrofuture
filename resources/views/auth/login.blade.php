@extends('layout.auth')

@section('form')
    <form action="{{ route('login.action') }}" method="POST" class="space-y-3 mt-3">
        @csrf
        <div class="">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-green-600"
                placeholder="example@email.com" required />
            @error('email')
                <small class="text-red-500 text-xs">{{ $message }}</small>
            @enderror
        </div>
        <div class="">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-green-600"
                placeholder="Password" required />
            @error('password')
                <small class="text-red-500 text-xs">{{ $message }}</small>
            @enderror
        </div>
        <button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Login</button>
    </form>
@endsection
