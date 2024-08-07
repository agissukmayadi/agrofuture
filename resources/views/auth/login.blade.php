@extends('layout.auth')

@section('content')
    <div class="w-full min-h-screen bg-gray-300 flex justify-center items-center px-3 md:px-10">
        <div class="flex flex-col bg-white w-full shadow-md rounded-md md:flex-row md:w-3/4 overflow-hidden">
            <div class="px-6 w-full md:w-1/2 py-10 md:py-14 md:px-8">
                <h2 class="text-lg font-semibold">Sign in</h2>
                <form action="{{ route('login.action') }}" method="POST" class="space-y-3 mt-3">
                    @csrf
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                            placeholder="example@email.com" required />
                        @error('email')
                            <small class="text-red-500 text-xs">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                            placeholder="Password" required />
                        @error('password')
                            <small class="text-red-500 text-xs">{{ $message }}</small>
                        @enderror
                    </div>
                    <button
                        class="w-full bg-secondary hover:bg-secondary/80 text-white font-semibold py-2 px-4 rounded">Login</button>
                    <div class="text-center">
                        <span class="  text-xs">Dont have an account? <a href="{{ route('register') }}"
                                class="text-secondary font-semibold"> Sign
                                up</a></span>
                    </div>
                </form>
            </div>
            <div
                class="hidden md:flex md:w-1/2  bg-gradient-to-l  from-[#f76a35] to-secondary md:items-center justify-center">
                <div class="text-white text-center">
                    <h1 class=" font-bold text-2xl">Welcome to login</h1>
                    <p class="text-sm">Dont have an account?</p>
                    <a href="{{ route('register') }}"
                        class="text-sm rounded-2xl border-2 px-6 py-1 inline-block mt-2 border-white">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('home') }}" class="fixed top-2 right-2">
        <svg class="w-[28px] h-[28px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </a>
@endsection