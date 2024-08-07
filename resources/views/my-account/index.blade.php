@extends('layout.my-account')

@section('content-my-account')
    <div class="flex flex-col gap-8">
        <p>Hello <span class="font-bold">{{ Auth::user()->name }}</span> (Not {{ Auth::user()->name }}? <a
                href="{{ route('logout') }}" class="hover:text-secondary">Logout</a>)</p>

        <p>From your account dashboard you can view your recent orders, and manage your account details.</p>
    </div>
@endsection
