@extends('layout.my-account')

@section('content-my-account')
    @if (session('success'))
        <div id="alert" class="flex items-center p-4 mb-4 border border-green-800 text-green-800 rounded-lg bg-green-50 "
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                data-dismiss-target="#alert" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <form class="mx-auto space-y-3" action="{{ route('my-account.edit-account.action') }}" method="POST">
        @csrf
        <div class="">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                value="{{ Auth::user()->name }}" placeholder="John Doe" required />
            @error('name')
                <small class="text-red-500 text-xs">{{ $message }}</small>
            @enderror
        </div>
        <div class="">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                value="{{ Auth::user()->email }}" placeholder="example@email.com" required />
            @error('email')
                <small class="text-red-500 text-xs">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <div class="flex items-center gap-2">
                <h4 class="text-base  font-light">Password Change</h4>
                <p class="text-xs"><span class="text-red-500">* </span>Leave blank to leave unchanged</p>
            </div>
            <hr class="my-2">
            <div class="space-y-3">
                <div class="">
                    <label for="current_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                        password</label>
                    <input type="password" id="current_password" name="current_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                        placeholder="Current Password" />
                    @error('current_password')
                        <small class="text-red-500 text-xs">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                        password</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                        placeholder="New Password" />
                    @error('password')
                        <small class="text-red-500 text-xs">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm new password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:ring-0 focus:border-secondary"
                        placeholder="Confirm New Password" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-secondary hover:bg-secondary/80 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save
            Changes</button>
    </form>
@endsection
