@extends('layout.my-account')

@section('content-my-account')
    <div class="flex flex-col gap-4">
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
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Success</span>
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
                        <div class="flex items-center">
                            <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                <p class="">30 April 2024, 18:28 WIB</p>
                                <span class="flex w-3 h-3 me-3 shrink-0 bg-secondary rounded-full"></span>
                            </div>
                            <div class="flex flex-col w-[50%] md:w-full">
                                <p class="">Transaksi Selesai</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-2  items-center justify-between shrink-0 w-[50%] md:w-[40%]">
                                <p class="">30 Agustus 2024, 18:28 WIB</p>
                                <span class="flex w-3 h-3 me-3 shrink-0 bg-gray-400 rounded-full"></span>
                            </div>
                            <div class="flex flex-col w-[50%] md:w-full">
                                <p class="">Transaksi Selesai</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, quidem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 space-y-1">
                <div class="flex justify-between">
                    <p>No Invoice</p>
                    <p class="text-secondary">INV-123456789</p>
                </div>
                <div class="flex justify-between">
                    <p>Tanggal Pembelian</p>
                    <p>30 April 2024</p>
                </div>
            </div>
        </div>
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <h4 class="pb-3 font-medium text-primary text-base">Detail Produk</h4>
            <hr>
            <div class="mt-3 border rounded-lg p-5 space-y-5">
                <div class="flex flex-row gap-3">
                    <div class="aspect-square w-[15%] flex-shrink-0">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/1.jpeg') }}" alt="">
                    </div>
                    <div class="flex flex-col w-[85%]">
                        <div class="flex flex-col h-full justify-between pr-5">
                            <div class="w-full">
                                <p class="font-semibold truncate w-full">Elvicto Anti Acne Elvicto Anti Acne Elvicto Anti
                                    Acne Elvicto
                                    Anti Acne Elvicto Anti Acne Elvicto Anti Acne Anti Acne Anti Acne</p>
                                <p class="text-xs">2 × Rp. 100.000</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs">Total Belanja:</p>
                                <p class="text-sm font-medium"> Rp. 100.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-3">
                    <div class="aspect-square w-[15%] flex-shrink-0">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/2.jpeg') }}" alt="">
                    </div>
                    <div class="flex flex-col w-[85%]">
                        <div class="flex flex-col h-full justify-between pr-5">
                            <div class="w-full">
                                <p class="font-semibold truncate w-full">Elvicto Anti Acne Elvicto Anti Acne Elvicto Anti
                                    Acne Elvicto
                                    Anti Acne Elvicto Anti Acne Elvicto Anti Acne Anti Acne Anti Acne</p>
                                <p class="text-xs">2 × Rp. 100.000</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs">Total Belanja:</p>
                                <p class="text-sm font-medium"> Rp. 100.000</p>
                            </div>
                        </div>
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
                        <p class="">JNE - Reguler (5 Hari)</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">No Resi</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class="">005243246428</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex gap-2  items-center justify-between shrink-0 w-[30%]">
                        <p class="">Alamat</p>
                        <p class="mx-4">:</p>
                    </div>
                    <div class="flex flex-col md:w-full">
                        <p class=" font-semibold">Agis Sukmayadi</p>
                        <p>6285156134923</p>
                        <p>Kec. Ciomas Kel.Padasuka Jln.Pagelaran Kp.Kreteg RT01/03 No.35</p>
                        <p>Kota Bogor
                        </p>
                        <p>Jawa Barat</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-full px-5 py-4 shadow-md rounded-lg">
            <h4 class="pb-3 font-medium text-primary text-base">Rincian Pembayaran</h4>
            <hr>
            <div class="py-3 flex flex-col gap-4 ">
                <div class="flex items-start justify-between">
                    <p class="">Metode Pembayaran</p>
                    <p class="">BCA (Agis Sukmayadi) - 3287461863</p>
                </div>
                <div class="flex items-start justify-between">
                    <p class="">Bukti Pembayaran</p>
                    <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="block text-secondary hover:text-secondary/80 font-mediumtext-sm cursor-pointer"
                        type="button">
                        <i class="fa-regular fa-eye mr-1"></i>
                        Lihat Bukti
                    </a>
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Bukti Pembayaran
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <img src="{{ asset('/storage/img/payments/1.png') }}" class="w-full" alt="">
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b ">
                                    <button data-modal-hide="default-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-secondary focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex items-start justify-between">
                    <p class="">Total Harga (2 Barang)</p>
                    <p class="">Rp.300.000</p>
                </div>
                <div class="flex items-start justify-between">
                    <p class="">Total Ongkos Kirim</p>
                    <p class="">Rp.10.000</p>
                </div>
                <div class="flex items-start justify-between text-base font-semibold">
                    <p class="">Total Belanja</p>
                    <p class="">Rp.310.000</p>
                </div>
            </div>
        </div>
        <a href="{{ route('my-account.orders') }}"
            class="block text-center text-white bg-secondary hover:bg-secondary/80 py-1 rounded-lg font-medium text-lg cursor-pointer">Kembali</a>
    </div>
@endsection
