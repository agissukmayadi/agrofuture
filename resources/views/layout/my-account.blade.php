@extends('layout.index')
@section('content')
    <section class="relative bg-no-repeat bg-cover bg-center py-20 md:py-44"
        style="background-image: url('{{ asset('/storage/img/page-title.jpg') }}')">
        <div class="absolute top-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
        <div class="relative w-full h-full flex justify-center items-center  z-20">
            <div class="container">
                <h1 class="text-white text-center text-3xl font-thin md:text-left md:text-4xl text-shadow-md ">
                    My Account
                </h1>
                <h1 class="text-white text-center text-3xl font-semibold md:text-left md:text-5xl text-shadow-md ">
                    Luewimalang
                </h1>
            </div>
        </div>
    </section>
    <section class="w-full bg-gray-100">
        <div class="container mx-auto px-4 md:px-20 py-10">
            <div class="flex flex-col md:flex-row gap-5 text-sm  md:items-start">
                <div class="w-full md:w-[30%] bg-white">
                    <a href="{{ route('my-account') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-green-600 cursor-pointer {{ Request::url() == route('my-account') ? 'text-green-600' : '' }}">Dashboard</a>
                    @if (Auth::user()->role == 'customer')
                        <a href="{{ route('orders') }}"
                            class="border border-gray-300 px-3 py-2 transition-all block hover:text-green-600 cursor-pointer {{ Request::url() == route('orders') ? 'text-green-600' : '' }}">Orders</a>
                    @else
                        <a href="{{ route('admin') }}"
                            class="border border-gray-300 px-3 py-2 transition-all block hover:text-green-600 cursor-pointer {{ Request::url() == route('admin') ? 'text-green-600' : '' }}">Admin
                            Page</a>
                    @endif
                    <a href=" {{ route('my-account.edit-account') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-green-600 cursor-pointer {{ Request::url() == route('my-account.edit-account') ? 'text-green-600' : '' }}">Account
                        Details</a>
                    <a href="{{ route('logout') }}"
                        class="border border-gray-300 px-3 py-2 transition-all block hover:text-green-600 cursor-pointer">Logout</a>
                </div>
                <div class="w-full md:w-[70%]">
                    <h4 class="text-lg font-bold">{{ $title }}</h4>
                    <hr class="my-3">
                    @yield('content-my-account')
                    <!-- Main modal -->
                    <div id="cancel-order-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[200] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                    <h3 class="text-xl font-semibold text-gray-900 ">
                                        Pembatalan Pesanan
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="cancel-order-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                @include('partials.formCancelOrder')
                            </div>
                        </div>
                    </div>
                    <!-- drawer component -->
                    <div id="drawer-cancel-order"
                        class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 translate-y-full lg:hidden"
                        tabindex="-1" aria-labelledby="drawer-bottom-label" aria-hidden="true">
                        <h5 id="drawer-bottom-label"
                            class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>Pembatalan Pesanan
                        </h5>
                        <button type="button" data-drawer-hide="drawer-cancel-order" aria-controls="drawer-cancel-order"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        @include('partials.formCancelOrder')
                    </div>

                    <div id="complete-order-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow ">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                    data-modal-hide="complete-order-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Apakah kamu yakin mengonfirmasi
                                        pesanan?</h3>
                                    <form action="#" id="form-confirm-order" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, konfirmasi
                                        </button>
                                    </form>
                                    <button data-modal-hide="complete-order-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        function pay(snapToken) {
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    let url = '{{ route('redirect.pay', ':id') }}'
                    url = url.replace(':id', result.order_id)
                    window.location.href = url
                },
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    console.log(result);
                }
            })
        }

        $(document).ready(function() {
            $('.pay-button').click(function() {
                const snapToken = $(this).data('snap-token')
                pay(snapToken)
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.cancel-order-button').on('click', function() {
                const orderId = $(this).data('order-id')
                const formCancelOrder = $('#form-cancel-order')
                let url = '{{ route('order.cancel', ':id') }}'
                url = url.replace(':id', orderId)
                formCancelOrder.attr('action', url)
            })

            $('.complete-order-button').on('click', function() {
                const orderId = $(this).data('order-id')
                const formConfirmOrder = $('#form-confirm-order')
                let url = '{{ route('order.confirm', ':id') }}'
                url = url.replace(':id', orderId)
                formConfirmOrder.attr('action', url)
            })
        })
    </script>
    @if (session('directPay'))
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.pay-button').click();
                }, 300); // Penundaan 300ms
            });
        </script>
    @endif
@endsection
