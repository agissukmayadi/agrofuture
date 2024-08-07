@extends('layout.index')
@section('content')
    <section class="w-full mt-14 bg-primary">
        <div class="flex flex-col justify-center md:flex-row px-12 gap-6 mx-auto container py-20">
            <h1 class="text-white text-center text-4xl font-bold md:text-5xl text-shadow-md ">
                My Account
            </h1>
        </div>
    </section>
    <section class="w-full bg-gray-100">
        <div class="container mx-auto px-4 md:px-20 py-10">
            <div class="flex flex-col md:flex-row gap-5 text-sm">
                <div class="w-full md:w-[30%]">
                    <a href="{{ route('my-account') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-secondary cursor-pointer {{ Request::url() == route('my-account') ? 'text-secondary bg-gray-200/50' : '' }}">Dashboard</a>
                    <a href="{{ route('my-account.orders') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-secondary cursor-pointer {{ Request::url() == route('my-account.orders') || Request::url() == route('my-account.orders.detail') ? 'text-secondary bg-gray-200/50' : '' }}">Orders</a>
                    <a href=" {{ route('my-account.edit-account') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-secondary cursor-pointer {{ Request::url() == route('my-account.edit-account') ? 'text-secondary bg-gray-200/50' : '' }}">Account
                        Details</a>
                    <a href="{{ route('logout') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-secondary cursor-pointer">Logout</a>
                </div>
                <div class="w-full md:w-[70%]">
                    <h4 class="text-lg font-bold">{{ $title }}</h4>
                    <hr class="my-3">
                    @yield('content-my-account')
                </div>
            </div>
        </div>
    </section>
@endsection
