@extends('layout.master')

@section('body')
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-dark text-light">
            <div class="px-4">
                <div class="flex items-center justify-between mb-4 pt-4">
                    <a class="font-semibold text-3xl block" href="{{ route('admin') }}">Elvicto.</a>
                    <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button"
                        class="sm:hidden">
                        <i class="fa-solid fa-bars text-xl hover:bg-gray-700 px-2 py-1 rounded-md transition"></i>
                    </button>
                </div>
                <ul class="flex flex-col gap-2">
                    <li>
                        <a href="{{ route('admin') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ Request::url() == route('admin') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-gauge"></i>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <hr class="my-2">
                    <span class="text-xs">Master Data</span>
                    <li>
                        <a href="{{ route('admin.categories') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ Request::url() == route('admin.categories') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-layer-group"></i>
                            <span class="ms-3">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ request()->is('admin/products*') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-box-open"></i>
                            <span class="ms-3">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ Request::url() == route('admin.orders') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span class="ms-3">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ Request::url() == route('admin.users') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-users"></i>
                            <span class="ms-3">Users</span>
                        </a>
                    </li>
                    <hr class="my-2">
                    <li>
                        <a href="{{ route('home') }}"
                            class="flex items-center px-3 py-2 rounded-sm hover:bg-gray-700 {{ Request::url() == route('home') ? 'bg-gray-700' : '' }}">
                            <i class="fa-solid fa-house"></i>
                            <span class="ms-3">Home</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <div class="w-full sm:w-[calc(100%-16rem)] min-h-screen bg-light sm:ml-64">
        <nav class="bg-white h-16 shadow-sm border-b flex justify-between items-center px-4 sm:px-14">
            <div class="flex gap-3">
                <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button"
                    class="sm:hidden">
                    <i class="fa-solid fa-bars text-xl hover:bg-light px-2 py-1 rounded-md transition-all"></i>
                </button>
                <a class="font-semibold text-3xl block sm:hidden" href="{{ route('admin') }}">Elvicto.</a>
            </div>

            <button type="button" class="flex" id="user-menu-button" aria-expanded="false"
                data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" data-dropdown-offset-distance="14"
                data-dropdown-offset-skidding="-64">
                <i class="fa-regular fa-circle-user text-3xl text-indigo-700"></i>
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                    <span class="block text-sm  text-gray-500 truncate">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="px-6 py-8 sm:px-10">
            @yield('content')
        </div>
    </div>
    <div class="fixed z-[100] top-0  left-0 right-0 bottom-0 bg-black/40 hidden items-center justify-center" id="loading">
        <div role="status">
            <svg aria-hidden="true" class="w-10 h-10 text-gray-200 animate-spin  fill-indigo-600" viewBox="0 0 100 101"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection
