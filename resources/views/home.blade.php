@extends('layout.index')

@section('content')
    <section class="w-full h-screen bg-primary relative">
        <img src="{{ asset('/storage/img/hero.png') }}" alt=""
            class=" hidden md:block absolute bottom-0 right-0 w-[55%] z-10">
        <div class="h-full flex flex-col justify-center px-12 gap-6 mx-auto container z-20 relative">
            <div class="md:w-[60%]">
                <h1 class="text-white text-center text-4xl font-bold md:text-left md:text-5xl">Maskulinitas yang Menawan
                    Kosmetik Pria Terbaik
                </h1>
            </div>
            <div class="md:w-[60%]">
                <small class="text-white text-center md:text-left ">Kami menyediakan beragam produk dan layanan yang inovatif
                    dan berkualitas tinggi, dirancang khusus untuk
                    memastikan Anda tampil segar, percaya diri, dan memukau di setiap kesempatan.</small>
            </div>
            <a
                class="cursor-pointer text-primary bg-secondary hover:bg-secondary/80 font-medium rounded-lg px-10 py-4 text-center md:w-fit text-xs">Belanja
                Sekarang</a>
            <div class="flex flex-col gap-2 text-white md:flex-row md:w-[60%]">
                <div class="w-full border rounded-md p-4 flex flex-col gap-2">
                    <h2 class="text-xl">No. 1</h2>
                    <small>Terlengkap di Indonesia</small>
                </div>
                <div class="w-full border rounded-md p-4 flex flex-col gap-2">
                    <h2 class="text-xl">100%</h2>
                    <small>Diformulasikan untuk Pria</small>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full py-20">
        <div class="container px-10 md:px-44 mx-auto ">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <img src="{{ asset('/storage/img/about.png') }}" class="rounded-lg  md:w-1/2" alt="">
                <div class="flex flex-col gap-3 ">
                    <h3 class="text-secondary">Tentang Kami</h3>
                    <h1 class="font-bold text-xl">Elvicto adalah skincare terkemuka dengan solusi perawatan kulit efektif
                        dan aman.</h1>
                    <small>Sebuah brand skincare yang dibuat dan diformulasikan khusus untuk para pria di
                        Indonesia</small>
                    <a
                        class="cursor-pointer text-secondary border border-secondary font-medium rounded-lg px-10 py-4 text-center md:w-fit text-xs hover:bg-secondary hover:text-primary transition-all">Lihat
                        Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full py-20 bg-primary">
        <h1 class="text-center text-4xl font-bold text-white mb-12">BEST SELLER</h1>
        <div class="container mx-auto mb-12">
            <div class="flex flex-wrap justify-center gap-8">
                <a href="">
                    <div class="max-w-xs flex flex-col gap-2">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/1.jpeg') }}" class="rounded-lg"
                            alt="">
                        <h3 class="text-white font-bold">Elvicto Anti Acne</h3>
                        <p class="text-white">Rp. 100.000</p>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-xs flex flex-col gap-2">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/1.jpeg') }}" class="rounded-lg"
                            alt="">
                        <h3 class="text-white font-bold">Elvicto Anti Acne</h3>
                        <p class="text-white">Rp. 100.000</p>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-xs flex flex-col gap-2">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/1.jpeg') }}" class="rounded-lg"
                            alt="">
                        <h3 class="text-white font-bold">Elvicto Anti Acne</h3>
                        <p class="text-white">Rp. 100.000</p>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-xs flex flex-col gap-2">
                        <img src="{{ asset('/storage/img/products/facewash/elvicto_anti_acne/1.jpeg') }}" class="rounded-lg"
                            alt="">
                        <h3 class="text-white font-bold">Elvicto Anti Acne</h3>
                        <p class="text-white">Rp. 100.000</p>
                    </div>
                </a>
            </div>
            <div class="flex justify-center">
                <a href=""
                    class="w-fit bg-secondary rounded-md px-10 py-3 mt-10 text-sm hover:bg-secondary/80">Produk Lainnya</a>
            </div>
        </div>

    </section>
@endsection
