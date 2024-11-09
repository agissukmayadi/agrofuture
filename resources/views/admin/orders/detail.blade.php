@extends('layout.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Order Detail</h1>
    <div class="w-full p-5">
        @if (session()->has('success'))
            <div id="alert"
                class="flex items-center p-4 my-4 text-green-800 rounded-lg bg-green-50 border border-green-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
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
        <div class="flex flex-col md:flex-row gap-5 text-sm md:items-start ">
            <div class="w-full md:w-2/3 space-y-4">

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
                                    <p class="text-indigo-600">Detail Status</p>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-indigo-600"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
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
                                            <p>{{ \Carbon\Carbon::parse($order->success_at)->translatedFormat('d F Y, H:i') }}
                                            </p>
                                            <span
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'SUCCESS' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
                                        </div>
                                        <div class="flex flex-col w-[50%] md:w-full">
                                            <p class="">Pesanan selesai</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($order->shipped_at != null)
                                    <div class="flex items-center">
                                        <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                            <p>{{ \Carbon\Carbon::parse($order->shipped_at)->translatedFormat('d F Y, H:i') }}
                                            </p>
                                            <span
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'SHIPPED' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
                                        </div>
                                        <div class="flex flex-col w-[50%] md:w-full">
                                            <p class="">Pesanan dikirim</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($order->cancelled_at != null && $order->paid_at != null)
                                    <div class="flex items-center">
                                        <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                            <p>{{ \Carbon\Carbon::parse($order->cancelled_at)->translatedFormat('d F Y, H:i') }}
                                            </p>
                                            <span
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'CANCELLED' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
                                        </div>
                                        <div class="flex flex-col w-[50%] md:w-full">
                                            <p class="">Pesanan dibatalkan</p>
                                            <p>Alasan: {{ $order->note_cancelled }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($order->paid_at != null)
                                    <div class="flex items-center">
                                        <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                            <p>{{ \Carbon\Carbon::parse($order->paid_at)->translatedFormat('d F Y, H:i') }}
                                            </p>
                                            <span
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'PAID' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
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
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'CANCELLED' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
                                        </div>
                                        <div class="flex flex-col w-[50%] md:w-full">
                                            <p class="">Pesanan dibatalkan</p>
                                            <p>{{ $order->note_cancelled }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($order->created_at != null)
                                    <div class="flex items-center">
                                        <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                            <p>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y, H:i') }}
                                            </p>
                                            <span
                                                class="flex w-3 h-3 me-3 shrink-0 {{ $order->status == 'PENDING' ? 'bg-indigo-600' : 'bg-gray-400' }} rounded-full"></span>
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
                            <p class="text-indigo-600">{{ $order->invoice_number }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Tanggal Pembelian</p>
                            <p>{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
                    <h4 class="pb-3 font-medium text-primary text-base">Daftar Produk</h4>
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
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="font-medium text-primary text-base">Rincian Pembayaran</h4>
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
            </div>
            <div class="w-full md:w-1/3 space-y-4">
                <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg oveflow-wrap">
                    <h4 class="pb-3 font-medium text-primary text-base">Customer</h4>
                    <hr>
                    <div class="py-3 flex flex-col gap-4 ">
                        <div class="flex items-start">
                            <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                                <p class="">Nama</p>
                                <p class="mx-4">:</p>
                            </div>
                            <div class="flex flex-col md:w-full">
                                <p class="">{{ $order->user->name }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex gap-2 items-center justify-between shrink-0 w-[30%]">
                                <p class="">Email</p>
                                <p class="mx-4">:</p>
                            </div>
                            <div class="flex flex-col md:w-full">
                                <p class="">{{ $order->user->email }}</p>
                            </div>
                        </div>
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
                        <div class="flex items-center">
                            <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                                <p class="">No Resi</p>
                                <p class="mx-4">:</p>
                            </div>
                            <div class="flex flex-col md:w-full">
                                <p class="">
                                    @if ($order->status == 'PAID')
                                        <button data-modal-target="input-resi-modal" id="button-modal-input-resi"
                                            data-modal-toggle="input-resi-modal"
                                            class=" px-2  py-1 bg-indigo-600 text-white hover:bg-indigo-700  transition-all">Input
                                            Resi</button>
                                        <div id="input-resi-modal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full ">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow ">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                                            Input Resi
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                                            data-modal-toggle="input-resi-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form class="p-4 md:p-5"
                                                        action="{{ route('admin.order.tracking_number', $order->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                            <div class="col-span-2">
                                                                <label for="name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 ">Resi</label>
                                                                <input type="text" name="tracking_number"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                                                    placeholder="Masukan Resi" required>
                                                                @error('tracking_number')
                                                                    <small
                                                                        class="text-red-500 text-xs">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="text-white inline-flex items-center bg-indigo-700 hover:bg-indigo-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        {{ $order->shipment->tracking_number ? $order->shipment->tracking_number : '-' }}
                                    @endif
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
                <div>
                    <a href="{{ route('admin.orders') }}"
                        class="w-full text-center bg-indigo-600 hover:bg-indigo-700 block text-white py-2">Kembali</a>
                    @if ($order->status == 'PENDING')
                        <button data-modal-target="cancel-order-modal" data-modal-toggle="cancel-order-modal"
                            class="w-full text-center  block bg-red-600  hover:bg-red-700 text-white py-2 mt-1">Batalkan
                            Order</button>
                        <div id="cancel-order-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full ">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow ">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                            Cancel Order
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                            data-modal-toggle="cancel-order-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="p-4 md:p-5" action="{{ route('admin.order.cancel', $order->id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 ">Alasan
                                                    Dibatalkan</label>
                                                <textarea name="note_cancelled"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 "
                                                    placeholder="Masukan Alasan" required></textarea>
                                                @error('note_cancelled')
                                                    <small class="text-red-500 text-xs">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-indigo-700 hover:bg-indigo-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
