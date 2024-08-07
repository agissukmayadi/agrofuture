@extends('layout.my-account')

@section('content-my-account')
    <div class="flex flex-col gap-3">
        <div class="bg-white w-full px-4 py-3 rounded-lg shadow-md">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-row justify-center items-center gap-3">
                    <i class="fa-solid fa-bag-shopping text-3xl text-secondary"></i>
                    <div class="flex flex-col">
                        <p class="font-semibold">Belanja</p>
                        <p>27 April 2024</p>
                    </div>
                </div>
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Success</span>
            </div>
            <hr class="my-3">
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
                            <p class="text-xs">+1 Produk lainnya</p>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-xs">Total Belanja:</p>
                                <p class="text-sm font-medium"> Rp. 100.000</p>
                            </div>
                            <a href="{{ route('my-account.orders.detail') }}"
                                class=" text-white bg-secondary hover:bg-secondary/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
