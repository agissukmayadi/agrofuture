@extends('layout.index')

@section('content')
    <section class="w-full mt-16 pb-40 bg-gray-100">
        <div class="container mx-auto px-4 py-10">
            <h1 class="text-left text-3xl font-semibold mb-4">Cart</h1>
            <div class="flex flex-col md:flex-row md:items-start gap-5">
                <div class="md:w-2/3 flex flex-col gap-3">
                    <div class="bg-white rounded-lg shadow-sm w-full flex flex-row p-5 items-stretch gap-4">
                        <div class=" aspect-square w-[15%] ">
                            <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/4.jpeg') }}" class="w-full"
                                alt="">
                        </div>
                        <div class="flex flex-col grow  justify-between">
                            <div class="space-y-1">
                                <h4 class="text-sm">Apple MacBook Pro 17"</h4>
                                <p class="text-sm font-semibold">Rp. 2999</p>
                            </div>
                            <div class="flex flex-row justify-end md:justify-between items-center">
                                <span class=" font-semibold hidden md:inline md:text-sm">Subtotal : Rp. 2999</span>
                                <div class="flex gap-5 items-center">
                                    <a href=""><i class="fa-solid fa-trash text-red-500"></i></a>
                                    <div class="relative flex items-center w-[120px]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-minus p-3"></i>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            data-input-counter-min="1" data-input-counter-max="50"
                                            aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 grow border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                            placeholder="999" value="5" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-plus p-3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm w-full flex flex-row p-5 items-stretch gap-4">
                        <div class=" aspect-square w-[15%] ">
                            <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/4.jpeg') }}" class="w-full"
                                alt="">
                        </div>
                        <div class="flex flex-col grow  justify-between">
                            <div class="space-y-1">
                                <h4 class="text-sm">Apple MacBook Pro 17"</h4>
                                <p class="text-sm font-semibold">Rp. 2999</p>
                            </div>
                            <div class="flex flex-row justify-end md:justify-between items-center">
                                <span class=" font-semibold hidden md:inline md:text-sm">Subtotal : Rp. 2999</span>
                                <div class="flex gap-5 items-center">
                                    <a href=""><i class="fa-solid fa-trash text-red-500"></i></a>
                                    <div class="relative flex items-center w-[120px]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-minus p-3"></i>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            data-input-counter-min="1" data-input-counter-max="50"
                                            aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 grow border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                            placeholder="999" value="5" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-plus p-3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm w-full flex flex-row p-5 items-stretch gap-4">
                        <div class=" aspect-square w-[15%] ">
                            <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/4.jpeg') }}" class="w-full"
                                alt="">
                        </div>
                        <div class="flex flex-col grow justify-between">
                            <div class="space-y-1">
                                <h4 class="text-sm">Apple MacBook Pro 17"</h4>
                                <p class="text-sm font-semibold">Rp. 2999</p>
                            </div>
                            <div class="flex flex-row justify-end md:justify-between items-center">
                                <span class=" font-semibold hidden md:inline md:text-sm">Subtotal : Rp. 2999</span>
                                <div class="flex gap-5 items-center">
                                    <a href=""><i class="fa-solid fa-trash text-red-500"></i></a>
                                    <div class="relative flex items-center w-[120px]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-minus p-3"></i>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            data-input-counter-min="1" data-input-counter-max="50"
                                            aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 grow border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                            placeholder="999" value="5" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-plus p-3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm w-full flex flex-row p-5 items-stretch gap-4">
                        <div class=" aspect-square w-[15%] ">
                            <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/4.jpeg') }}"
                                class="w-full" alt="">
                        </div>
                        <div class="flex flex-col grow  justify-between">
                            <div class="space-y-1">
                                <h4 class="text-sm">Apple MacBook Pro 17"</h4>
                                <p class="text-sm font-semibold">Rp. 2999</p>
                            </div>
                            <div class="flex flex-row justify-end md:justify-between items-center">
                                <span class=" font-semibold hidden md:inline md:text-sm">Subtotal : Rp. 2999</span>
                                <div class="flex gap-5 items-center">
                                    <a href=""><i class="fa-solid fa-trash text-red-500"></i></a>
                                    <div class="relative flex items-center w-[120px]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-minus p-3"></i>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            data-input-counter-min="1" data-input-counter-max="50"
                                            aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 grow border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                            placeholder="999" value="5" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 ">
                                            <i class="fa-solid text-xs fa-plus p-3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/3 bg-white rounded-lg shadow-sm p-5 fixed md:static bottom-0 left-0 right-0 z-20 mx-5">
                    <h4 class="font-semibold mb-3">Ringkasan Belanja</h4>
                    <div class="flex justify-between border-b pb-2">
                        <p>Total : </p>
                        <p class="font-semibold">Rp.100.000</p>
                    </div>
                    <a href=" {{ route('checkout') }} ">
                        <button
                            class="w-full bg-secondary text-white px-4 py-2 rounded-lg mt-4 hover:bg-secondary/80">Checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
