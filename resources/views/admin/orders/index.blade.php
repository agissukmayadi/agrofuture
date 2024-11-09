@extends('layout.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Orders</h1>
    <div class="w-full bg-white p-5 shadow-md">
        <form class="w-full flex flex-col gap-3 lg:flex-row lg:justify-between lg:items-center" method="GET"
            action="{{ route('admin.orders') }}">
            <div class="relative">
                <button
                    class="flex w-full lg:w-44 px-4 justify-center gap-4 lg:justify-between items-center text-white bg-indigo-600 hover:bg-indigo-700 rounded font-medium py-3 text-sm"
                    type="button" id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox">
                    <span class="block">Status</span> <i class="fa-solid fa-caret-down block"></i>
                </button>
                <div id="dropdownDefaultCheckbox"
                    class="z-10 hidden w-full bg-white divide-y divide-gray-100 rounded-lg shadow">
                    <ul class="p-3 space-y-3 text-sm text-gray-700 " aria-labelledby="dropdownCheckboxButton">
                        <li>
                            <div class="flex items-center">
                                <input id="PENDING" type="checkbox" value="PENDING" name="status[]"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                    @if (in_array('PENDING', request('status', []))) checked @endif>
                                <label for="PENDING" class="ms-2 text-sm font-medium text-gray-900 ">Belum Dibayar</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <input id="PAID" type="checkbox" value="PAID" name="status[]"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                    @if (in_array('PAID', request('status', []))) checked @endif>
                                <label for="PAID" class="ms-2 text-sm font-medium text-gray-900 ">Dibayar</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <input id="SHIPPED" type="checkbox" value="SHIPPED" name="status[]"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                    @if (in_array('SHIPPED', request('status', []))) checked @endif>
                                <label for="SHIPPED" class="ms-2 text-sm font-medium text-gray-900 ">Dikirim</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <input id="SUCCESS" type="checkbox" value="SUCCESS" name="status[]"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                    @if (in_array('SUCCESS', request('status', []))) checked @endif>
                                <label for="SUCCESS" class="ms-2 text-sm font-medium text-gray-900 ">Selesai</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <input id="CANCELLED" type="checkbox" value="CANCELLED" name="status[]"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                    @if (in_array('CANCELLED', request('status', []))) checked @endif>
                                <label for="CANCELLED" class="ms-2 text-sm font-medium text-gray-900 ">Dibatalkan</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="relative w-full lg:w-[28rem]">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                </div>
                <input type="search" id="default-search" name="invoice_number"
                    class=" block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 "
                    placeholder="Search Invoice Number" value="{{ request('invoice_number') }}" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-[5.5px] bg-indigo-600 hover:bg-indigo-700 font-medium rounded text-sm px-4 py-2">Search</button>
            </div>
        </form>
        @if (
            (request()->has('status') && !empty(request('status'))) ||
                (request()->has('invoice_number') && !empty(request('invoice_number'))))
            <div class="lg:flex lg:justify-end">
                <a href="{{ route('admin.orders') }}"
                    class="text-gray-500 block w-full lg:w-[28rem] text-center hover:bg-light py-2 mt-2 text-sm"><i
                        class="fa-solid fa-xmark"></i> Clear
                    Filter</a>
            </div>
        @endif
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
        @if (session()->has('error'))
            <div id="alert" class="flex items-center p-4 my-4 text-red-800 rounded-lg bg-red-50 border border-red-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
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
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-indigo-600 text-white ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Invoice
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->invoice_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($order->total) }}
                            </td>
                            <td class="px-6 py-4">
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
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 lg:space-x-2">
                                <a class="text-indigo-600 hover:text-indigo-800 hover:underline font-medium"
                                    href="{{ route('admin.order.detail', $order->id) }}">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
