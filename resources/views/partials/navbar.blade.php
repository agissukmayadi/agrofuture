<nav class="bg-green-700 fixed w-full h-16 z-50 top-0 start-0 transition-all" id="navbar">
    <div class="container flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex w-full justify-between md:w-fit space-x-3 md:space-x-0 rtl:space-x-reverse md:order-2">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-green-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="flex gap-6 items-center">
                @if (Auth::user())
                    @if (Auth::user()->role == 'customer')
                        <a href="{{ route('cart') }}" class="relative group">
                            <span
                                class="absolute -top-1 -right-2 text-xs text-white inline-flex items-center justify-center px-1 py-0.5 leading-none  bg-red-600 group-hover:bg-red-800 rounded-full">{{ Auth::user()->carts()->whereHas('product', function ($query) {
                                        $query->where('stock', '>', 0)->whereNull('deleted_at');
                                    })->sum('quantity') }}</span>
                            <i class="fa-solid fa-cart-shopping text-white group-hover:text-white text-lg"></i></a>
                    @endif
                    <a href="{{ route('my-account') }}">
                        <svg class="w-[28px] h-[28px] text-white hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white  font-medium rounded-lg text-sm px-4 py-2 text-center ">Login
                    </a>
                @endif

            </div>

        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">

                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-green-600 rounded hover:bg-gray-200 md:hover:bg-transparent md:text-white md:hover:underline underline-offset-8 transition-all {{ Route::is('home') ? 'bg-gray-200 md:underline md:bg-transparent' : '' }} md:p-0 ">
                        Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                        class="block py-2 px-3 text-green-600 rounded hover:bg-gray-200 md:hover:bg-transparent md:text-white md:hover:underline underline-offset-8 transition-all {{ Route::is('about') ? 'bg-gray-200 md:underline md:bg-transparent' : '' }} md:p-0 ">About
                        Us</a>
                </li>
                <li>
                    <a href="{{ route('tourism') }}"
                        class="block py-2 px-3 text-green-600 rounded hover:bg-gray-200 md:hover:bg-transparent md:text-white md:hover:underline underline-offset-8 transition-all {{ Route::is('tourism') ? 'bg-gray-200 md:underline md:bg-transparent' : '' }} md:p-0 ">Tourism</a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                        class="block py-2 px-3 text-green-600 rounded hover:bg-gray-200 md:hover:bg-transparent md:text-white md:hover:underline underline-offset-8 transition-all {{ Route::is('products') ? 'bg-gray-200 md:underline md:bg-transparent' : '' }} md:p-0  ">Product</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-2 px-3 text-green-600 rounded hover:bg-gray-200 md:hover:bg-transparent md:text-white md:hover:underline underline-offset-8 transit0ion-all {{ Route::is('contact') ? 'bg-gray-200 md:underline md:bg-transparent' : '' }} md:p-0 ">Contact</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
