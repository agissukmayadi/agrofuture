@extends('layout.my-account')

@section('content-my-account')
    <div class="flex flex-col gap-3">
        <div
            class="text-sm font-medium text-center text-gray-500 border-b-2 bg-white border-gray-200 w-full overflow-x-auto overflow-y-hidden">
            <ul class="flex -mb-px w-full">
                <li class="me-2">
                    <a href="{{ route('my-account.orders') }}"
                        class=" inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == null ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">
                        Semua</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'PENDING']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'PENDING' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">
                        Belum Dibayar</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'PAID']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'PAID' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">Dibayar</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'SHIPPED']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'SHIPPED' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">Dikirim</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'SUCCESS']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'SUCCESS' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">Selesai</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'CANCELLED']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'CANCELLED' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">Dibatalkan</a>
                </li>
                <li class="me-2">
                    <a href="{{ route('my-account.orders', ['status' => 'FAILED']) }}"
                        class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->status == 'FAILED' ? 'text-secondary border-secondary' : 'hover:text-gray-600 hover:border-gray-300 border-transparent' }} ">Gagal</a>
                </li>
            </ul>
        </div>
        @if (session()->has('success'))
            <div id="alert-3" class="flex items-center p-4 border border-green-800 text-green-800 rounded-lg bg-green-50 "
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
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8  "
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="bg-white w-full px-4 py-3 rounded-lg shadow-md">
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row justify-center items-center gap-3">
                            <i class="fa-solid fa-bag-shopping text-3xl text-secondary"></i>
                            <div class="flex flex-col">
                                <p class="font-semibold">Belanja</p>
                                <p>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        @php
                            switch (strtolower($order->status)) {
                                case 'pending':
                                    $bgColor = 'bg-yellow-100';
                                    $textColor = 'text-yellow-800';
                                    break;
                                case 'paid':
                                    $bgColor = 'bg-blue-100';
                                    $textColor = 'text-blue-800';
                                    break;
                                case 'shipped':
                                    $bgColor = 'bg-indigo-100';
                                    $textColor = 'text-indigo-800';
                                    break;
                                case 'success':
                                    $bgColor = 'bg-green-100';
                                    $textColor = 'text-green-800';
                                    break;
                                case 'cancelled':
                                    $bgColor = 'bg-red-100';
                                    $textColor = 'text-red-800';
                                    break;
                                case 'failed':
                                    $bgColor = 'bg-red-100';
                                    $textColor = 'text-red-800';
                                    break;
                                default:
                                    $bgColor = 'bg-gray-100';
                                    $textColor = 'text-gray-800';
                                    break;
                            }
                        @endphp

                        <span
                            class="{{ $bgColor }} {{ $textColor }} text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                            {{ ucfirst(strtolower($order->status)) }}
                        </span>

                    </div>
                    <hr class="my-3">
                    <div class="flex flex-row gap-3">
                        <div class="aspect-square w-[15%] flex-shrink-0">
                            <img src="{{ asset('/storage/img/products/' . $order->orderDetails[0]->product->image_thumbnail->name) }}"
                                alt="">
                        </div>
                        <div class="flex flex-col w-[85%]">
                            <div class="flex flex-col h-full justify-between">
                                <div class="w-full">
                                    <a href="{{ route('my-account.order.detail', $order->id) }}"
                                        class="font-semibold line-clamp-2 w-full">
                                        {{ $order->orderDetails[0]->product->name }}</a>

                                    @if ($order->orderDetails->count() > 1)
                                        <a class="text-xs"
                                            href="{{ route('my-account.order.detail', $order->id) }}">+{{ $order->orderDetails->count() - 1 }}
                                            Produk lainnya</a>
                                    @endif
                                </div>
                                <div class="flex justify-end lg:justify-between items-end">
                                    <div>
                                        <p class="text-xs">Total Belanja:</p>
                                        <p class="text-sm font-medium">Rp {{ number_format($order->total) }}</p>
                                    </div>
                                    <div class=" gap-2 hidden lg:flex">
                                        @if ($order->status == 'PENDING')
                                            <button
                                                class="pay-button text-secondary  border border-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                                                data-snap-token='{{ $order->snap_token }}'>Bayar</button>
                                        @elseif ($order->status == 'SHIPPED')
                                            <button data-modal-target="complete-order-modal"
                                                data-modal-toggle="complete-order-modal"
                                                data-order-id="{{ $order->id }}"
                                                class=" complete-order-button text-green-600  border border-green-600 hover:bg-green-600 hover:text-white transition-all font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Selesai</button>
                                        @endif

                                        <a href="{{ route('my-account.order.detail', $order->id) }}"
                                            class=" text-white bg-secondary/90 hover:bg-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Detail</a>

                                        @if ($order->status == 'PENDING')
                                            <button data-modal-target="cancel-order-modal"
                                                data-modal-toggle="cancel-order-modal" data-order-id="{{ $order->id }}"
                                                class="cancel-order-button bg-red-500 text-white hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Batalkan</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                {{ $orders->links() }}
            </div>
        @else
            <div
                class="w-full bg-white px-6 py-6 rounded-md shadow-md flex flex-col gap-3 items-start lg:flex-row lg:justify-between lg:items-center ">
                <p>No orders</p>
                <a href="{{ route('products') }}"
                    class="bg-secondary/90 hover:bg-secondary transition-all text-primary font-medium px-4 py-2 {{ request()->status !== null ? 'hidden' : '' }}">Browse
                    Products</a>
            </div>
        @endif
    </div>
@endsection
