@extends('layout.master')

@section('body')
    <div class="w-full min-h-screen bg-gray-300 flex justify-center items-center px-3 md:px-10">
        <div class="flex flex-col bg-white w-full shadow-md rounded-md md:flex-row md:w-3/4 overflow-hidden">
            <div class="px-6 w-full md:w-1/2 py-10 md:py-14 md:px-8">
                <h2 class="text-lg font-semibold">{{ Request::url() == route('login') ? 'Sign in' : 'Sign up' }}</h2>
                @yield('form')
                <div class="text-center mt-3">
                    @if (Request::url() == route('login'))
                        <span class="  text-xs">Dont have an account? <a href="{{ route('register') }}"
                                class="text-secondary font-semibold"> Sign
                                up</a></span>
                    @else
                        <span class="  text-xs">Already have an account? <a href="{{ route('login') }}"
                                class="text-secondary font-semibold"> Sign
                                in</a></span>
                    @endif
                </div>
            </div>
            <div
                class="hidden md:flex md:w-1/2  bg-gradient-to-l  from-[#f76a35] to-secondary md:items-center justify-center">
                <div class="text-white text-center">
                    <h1 class=" font-bold text-2xl">Welcome to {{ Request::url() == route('login') ? 'login' : 'register' }}
                    </h1>
                    <p class="text-sm">
                        {{ Request::url() == route('login') ? 'Dont have an account?' : 'Already have an account' }}</p>
                    @if (Request::url() == route('login'))
                        <a href="{{ route('register') }}"
                            class="text-sm rounded-2xl border-2 px-6 py-1 inline-block mt-2 border-white">Sign up</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm rounded-2xl border-2 px-6 py-1 inline-block mt-2 border-white">Sign in</a>
                    @endif
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
