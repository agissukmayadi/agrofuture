@extends('layout.my-account')

@section('content-my-account')
    <div class="flex flex-col gap-4">
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
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900"
                data-inactive-classes="text-gray-500">
                <h2 id="accordion-flush-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full pb-3 font-medium rtl:text-right text-primary gap-3"
                        data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                        aria-controls="accordion-flush-body-1">
                        <div class=" space-x-2">
                            <span class="text-semibold text-base ">Status Pesanan </span>
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
                        <div class="flex items-center gap-x-5">
                            <p class="text-secondary">Detail Status</p>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-secondary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </div>
                    </button>
                    <hr>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                    <div class="my-4 p-5 border rounded-md border-gray-200 flex flex-col gap-4 ">
                        @if ($order->success_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->success_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'SUCCESS' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan selesai</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->shipped_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->shipped_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'SHIPPED' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan dikirim</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->cancelled_at != null && $order->paid_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->cancelled_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'CANCELLED' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan dibatalkan</p>
                                    <p>Alasan: {{ $order->note_canceled }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->paid_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->paid_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'PAID' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan dibayar</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->cancelled_at != null && $order->paid_at == null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->cancelled_at)->translatedFormat('d F Y, H:i') }}
                                    </p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'CANCELLED' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan dibatalkan</p>
                                    <p>{{ $order->note_cancelled }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->failed_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->failed_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'FAILED' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan gagal</p>
                                    <p>{{ $order->note_failed }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($order->created_at != null)
                            <div class="flex items-center">
                                <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                    <p>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y, H:i') }}</p>
                                    <span
                                        class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'PENDING' ? 'bg-secondary' : 'bg-gray-400' }} rounded-full"></span>
                                </div>
                                <div class="flex flex-col w-[50%] md:w-full">
                                    <p class="">Pesanan dibuat</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-4 space-y-1">
                <div class="flex justify-between">
                    <p>No Invoice</p>
                    <p class="text-secondary">{{ $order->invoice_number }}</p>
                </div>
                <div class="flex justify-between">
                    <p>Tanggal Pembelian</p>
                    <p>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <h4 class="pb-3 font-medium text-primary text-base">Detail Produk</h4>
            <hr>
            <div class="mt-3 border rounded-lg p-5 space-y-5">
                @foreach ($order->orderDetails as $orderDetail)
                    <div class="flex flex-row gap-3">
                        <div class="aspect-square w-[15%] flex-shrink-0">
                            <img src="{{ asset('/storage/img/products/' . $orderDetail->product->image_thumbnail->name) }}"
                                alt="">
                        </div>
                        <div class="flex flex-col w-[85%]">
                            <div class="flex flex-col h-full justify-between">
                                <div class="w-full">
                                    <p class="font-semibold truncate w-full">{{ $orderDetail->product->name }}</p>
                                    <p class="text-xs"> {{ $orderDetail->quantity }} × Rp
                                        {{ number_format($orderDetail->price) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs">Total Belanja:</p>
                                    <p class="text-sm font-medium"> Rp
                                        {{ number_format($orderDetail->price * $orderDetail->quantity) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <h4 class="pb-3 font-medium text-primary text-base">Info Pengiriman</h4>
            <hr>
            <div class="py-3 flex flex-col gap-4 ">
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">Kurir</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class="">{{ $order->shipment->courier }} - {{ $order->shipment->service }}</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">Estimasi</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class="">{{ $order->shipment->estimate }} Days
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">No Resi</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class="">
                            {{ $order->shipment->tracking_number ? $order->shipment->tracking_number : '-' }}
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">Alamat</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class=" font-semibold">{{ $order->shipment->name }}</p>
                        <p>{{ $order->shipment->phone }}</p>
                        <p>{{ $order->shipment->address }}</p>
                        <p>{{ $order->shipment->city }}</p>
                        <p>{{ $order->shipment->province }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-medium text-primary text-base">Rincian Pembayaran</h4>
                @if ($order->status == 'PENDING')
                    <button data-snap-token="{{ $order->snap_token }}"
                        class="pay-button block text-center text-secondary border border-secondary hover:bg-secondary hover:text-white transition-all font-medium  px-4 py-2 text-sm">Bayar</button>
                @endif
            </div>
            <hr>
            <div class="py-3 flex flex-col gap-4 ">
                <div class="flex items-start justify-between">
                    <p class="">Total Harga ({{ $order->orderDetails->count() }} Barang)</p>
                    <p class="">Rp {{ number_format($subtotal) }}</p>
                </div>
                <div class="flex items-start justify-between">
                    <p class="">Total Ongkos Kirim</p>
                    <p class="">Rp {{ number_format($order->shipment->cost) }}</p>
                </div>
                <div class="flex items-start justify-between text-base font-semibold">
                    <p class="">Total Belanja</p>
                    <p class="">Rp {{ number_format($order->total) }}</p>
                </div>
            </div>
        </div>
        <div class=" space-y-1.5">
            @if ($order->status == 'PENDING')
                <button data-modal-target="cancel-order-modal" data-modal-toggle="cancel-order-modal"
                    data-order-id="{{ $order->id }}"
                    class="cancel-order-button w-full hidden lg:block text-center text-white bg-red-500 hover:bg-red-600 py-1 rounded-lg font-medium text-lg cursor-pointer">Batalkan
                    Pesanan</button>
                <button data-drawer-target="drawer-cancel-order" data-drawer-show="drawer-cancel-order"
                    data-drawer-placement="bottom" aria-controls="drawer-cancel-order"
                    data-order-id="{{ $order->id }}"
                    class="cancel-order-button w-full block lg:hidden text-center text-white bg-red-500 hover:bg-red-600 py-1 rounded-lg font-medium text-lg cursor-pointer">Batalkan
                    Pesanan</button>
            @endif
            @if ($order->status == 'SHIPPED')
                <button data-modal-target="complete-order-modal" data-modal-toggle="complete-order-modal"
                    data-order-id="{{ $order->id }}"
                    class="complete-order-button w-full  block text-center text-green-700 border border-green-700 hover:bg-green-700 hover:text-white transition-all py-1 rounded-lg font-medium text-lg cursor-pointer">Pesanan
                    diterima</button>
            @endif
            <a href="{{ route('my-account.orders') }}"
                class="block text-center text-white bg-secondary/90 hover:bg-secondary py-1 rounded-lg font-medium text-lg cursor-pointer">Kembali</a>
        </div>
    </div>
@endsection
