@extends('layout.index')

@section('content')
    <section class="w-full bg-gray-300 mt-16">
        <div class="container mx-auto flex flex-col items-center justify-center relative py-16 px-10 bg-no-repeat"
            style="background-image: url('{{ asset('/storage/img/bg.png') }}')">
            <img src="{{ asset('/storage/img/young-man-applying-his-anti-aging-treatment-removebg-preview-1.png') }}"
                class=" absolute left-0 bottom-0 z-0 hidden md:block md:w-[12rem]">
            <h1 class="text-left text-3xl font-bold text-primary relative z-10 text-shadow-sm">Skincare Terlengkap No 1. di
                Indonesia</h1>
        </div>
    </section>
    <section class="w-full bg-gray-100 py-10">
        <div class="container mx-auto px-4 flex flex-col gap-5">
            <div class="text-right md:hidden">
                <button class="text-primary border border-primary px-6 py-3 text-center md:w-fit text-sm" type="button"
                    data-drawer-target="drawer-filter" data-drawer-show="drawer-filter" data-drawer-placement="bottom"
                    aria-controls="drawer-filter">
                    <i class="fa-solid fa-filter mr-2"></i> Filter
                </button>
            </div>
            <div id="drawer-filter"
                class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white translate-y-full md:hidden"
                tabindex="-1" aria-labelledby="drawer-bottom-label">
                <h5 id="drawer-bottom-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 ">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>Filter
                </h5>
                <button type="button" data-drawer-hide="drawer-filter" aria-controls="drawer-filter"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                @include('partials.formFilter')
            </div>
            <div class="flex md:flex-row md:gap-8">
                <div class="hidden md:flex md:w-[20%]">
                    @include('partials.formFilter')
                </div>
                <div class="flex flex-col gap-10 items-center md:w-[80%]">
                    @if ($products->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
                            @foreach ($products as $product)
                                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                    <div class=" max-w-full flex flex-col gap-2">
                                        <div class="relative overflow-hidden rounded-lg">
                                            <img src="{{ asset('/storage/img/products/' . $product->images->first()->name) }}"
                                                alt="">
                                            @if ($product->stock <= 0)
                                                <div
                                                    class="absolute top-0 right-0 bottom-0 left-0 bg-black/40 flex justify-center items-center">
                                                    <span class="text-white text-shadow-md">Out of stock</span>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-primary font-bold">{{ $product->name }}</h3>
                                        <p class="text-primary">Rp {{ number_format($product->price) }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                    @else
                        <div class="flex flex-col items-center gap-3">
                            <p class=" text-left text-lg font-semibold text-primary">Sorry, we don't have any product
                            </p>

                            @if (request()->has('product') || request()->has('category'))
                                <a href="{{ route('product') }}"
                                    class="rounded-full border border-primary px-6 py-2 flex items-center gap-2 w-fit">Clear
                                    <i class="fa-solid fa-xmark"></i></a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
