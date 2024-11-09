@extends('layout.index')

@section('content')
    <section class="w-full mt-16 h-[calc(100vh-64px)] md:h-full pb-40 bg-gray-100">
        <div class="container mx-auto px-4 py-10">
            <h1 class="text-left text-3xl font-semibold mb-4">Cart</h1>
            <div class="flex flex-col md:flex-row md:items-start gap-5">
                <div class="md:w-2/3 flex flex-col gap-3">
                    @if ($cart->count() > 0)
                        @foreach ($cart as $item)
                            <div class="bg-white rounded-lg shadow-sm w-full flex flex-row p-5 items-stretch gap-4">
                                <a href="{{ route('product.detail', $item->product->slug) }}" class=" aspect-square w-[15%] ">
                                    <img src="{{ asset('/storage/img/products') . '/' . $item->product->image_thumbnail->name }}"
                                        class="w-full" alt="">
                                </a>
                                <div class="flex flex-col grow justify-between">
                                    <div class="space-y-1">
                                        <a href="{{ route('product.detail', $item->product->slug) }}"
                                            class="text-sm hover:text-green-600 transition-all">{{ $item->product->name }}</a>
                                        <p class="text-sm font-semibold">Rp. {{ number_format($item->product->price) }}
                                        </p>
                                    </div>
                                    <div class="flex flex-row justify-end md:justify-between items-center">
                                        <span class=" font-semibold hidden md:inline md:text-sm">Subtotal : Rp.
                                            {{ number_format($item->product->price * $item->quantity) }}</span>
                                        <div class="flex gap-5 items-center">
                                            <button data-modal-target="delete-cart-modal"
                                                data-modal-toggle="delete-cart-modal" type="button"
                                                data-product-id="{{ $item->product->id }}"><i
                                                    class="fa-solid fa-trash text-red-500"></i></button>
                                            <form class="relative flex items-center w-[120px]"
                                                action="{{ route('cart.update', $item->product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" id="decrement-button"
                                                    data-input-counter-decrement="quantity-input-{{ $loop->iteration }}"
                                                    class="decrement-button flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 "
                                                    {{ $item->quantity == 1 ? 'disabled' : '' }}>
                                                    <i class="fa-solid text-xs fa-minus p-3"></i>
                                                </button>
                                                <input type="text" id="quantity-input-{{ $loop->iteration }}"
                                                    name="quantity" data-input-counter data-input-counter-min="1"
                                                    data-input-counter-max="{{ $item->product->stock }}"
                                                    aria-describedby="helper-text-explanation"
                                                    class="quantity-input bg-gray-50 border-x-0 grow border-gray-300 h-8 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                                    placeholder="999" value="{{ $item->quantity }}" required />
                                                <button type="submit" id="increment-button"
                                                    data-input-counter-increment="quantity-input-{{ $loop->iteration }}"
                                                    class="increment-button flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-8 disabled:cursor-not-allowed disabled:hover:bg-gray-100 "
                                                    {{ $item->quantity == $item->product->stock ? 'disabled' : '' }}>
                                                    <i class="fa-solid text-xs fa-plus p-3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div
                            class="w-full bg-white px-6 py-6 rounded-md shadow-md flex flex-col gap-3 items-start lg:flex-row lg:justify-between lg:items-cente ">
                            <p>No products in the cart</p>
                            <a href="{{ route('products') }}"
                                class="text-white transition-all bg-green-600/80 hover:bg-green-600 px-4 py-2">Browse
                                Product</a>
                        </div>
                    @endif
                    @if ($itemNotAvailable->count() > 0)
                        <div class="w-full bg-white px-6 py-6 rounded-md shadow-md">
                            <div class="flex justify-between items-center">
                                <p class="">Produk tidak tersedia</p>
                                <a href="{{ route('cart.clear') }}"
                                    class="text-red-600 hover:text-red-700 text-sm font-semibold hover:underline">Hapus</a>
                            </div>
                            <hr class="my-4">
                            <div class="space-y-6 ">
                                @foreach ($itemNotAvailable as $item)
                                    <div class="bg-white rounded-lg w-full flex flex-row items-stretch gap-4">
                                        <a href="{{ route('product.detail', $item->product->slug) }}"
                                            class=" aspect-square w-[15%] relative">
                                            <img src="{{ asset('/storage/img/products') . '/' . $item->product->image_thumbnail->name }}"
                                                class="w-full" alt="">
                                            <div
                                                class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center text-white text-sm">
                                                <span class="hidden  md:block">Not available</span>
                                            </div>
                                        </a>
                                        <div class="flex flex-col grow justify-between">
                                            <div class="space-y-1">
                                                <a href="{{ route('product.detail', $item->product->id) }}"
                                                    class="text-sm text-primary/50 hover:text-green-600 transition-all">{{ $item->product->name }}</a>
                                                <p class="text-sm font-semibold text-primary/50">Rp.
                                                    {{ number_format($item->product->price) }}
                                                </p>
                                            </div>
                                            <div class="flex flex-row justify-end md:justify-between items-center">
                                                <span
                                                    class=" font-semibold hidden md:inline md:text-sm text-primary/50">Subtotal
                                                    : Rp.
                                                    {{ number_format($item->product->price * $item->quantity) }}</span>
                                                <div class="flex gap-5 items-center mr-4">
                                                    <button data-modal-target="delete-cart-modal"
                                                        data-modal-toggle="delete-cart-modal" type="button"
                                                        data-product-id="{{ $item->product->id }}"><i
                                                            class="fa-solid fa-trash text-red-500"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="md:w-1/3 bg-white rounded-lg shadow-sm p-5 fixed md:static bottom-0 left-0 right-0 z-20 mx-5">
                    <h4 class="font-semibold mb-3">Ringkasan Belanja</h4>
                    <div class="flex justify-between border-b pb-2">
                        <p>Total : </p>
                        <p class="font-semibold">Rp {{ number_format($total) }}</p>
                    </div>
                    <form action="{{ route('checkout') }}" method="GET" id="checkout-form">
                        <button type="submit"
                            class="w-full block text-center px-4 py-2 rounded-lg mt-4 {{ $total > 0 ? 'bg-green-600 hover:bg-green-600/80 text-white' : 'bg-gray-300 cursor-not-allowed' }}"
                            {{ $total <= 0 ? 'disabled' : '' }}>Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div id="delete-cart-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="delete-cart-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are
                        you sure you want to delete this product?</h3>
                    <a href="#" id="delete-cart-link"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </a>
                    <button data-modal-hide="delete-cart-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-600 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('[data-modal-target="delete-cart-modal"]').on('click', function() {
            const productId = $(this).data('product-id');
            let deleteUrl = "{{ route('cart.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(':id', productId);
            $('#delete-cart-link').attr('href', deleteUrl);
        })
    </script>
    <script>
        $('.decrement-button, .increment-button').on('click', function() {
            const form = $(this).closest('form');
            const loading = $('#loading');

            loading.addClass('flex');
            loading.removeClass('hidden');
            setTimeout(function() {
                form.submit();
            }, 1000);

        })
        $('.quantity-input').on('change', function() {
            const quantity = $(this).val();
            if (quantity != "") {
                const form = $(this).closest('form');
                form.submit();
            }
        })
    </script>
@endsection


