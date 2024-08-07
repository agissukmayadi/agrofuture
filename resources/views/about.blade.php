@extends('layout.index')

@section('content')
    <section class="w-full mt-16 bg-primary">

        <div class="flex flex-col justify-center px-12 gap-6 mx-auto container  py-20 md:py-52 relative">
            <div class="md:w-[60%] z-20">
                <h1 class="text-white text-center text-4xl font-bold md:text-left md:text-5xl text-shadow-md ">Elvicto Mens
                    Grooming,
                    Bro!
                </h1>
            </div>
            <img src="{{ asset('/storage/img/hero.png') }}" alt=""
                class=" hidden md:block absolute bottom-0 right-0 z-10 md:w-[600px]">
        </div>
    </section>
    <section class="w-full py-20 bg-gray-100">
        <div class="container px-10 md:px-44 mx-auto ">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <img src="{{ asset('/storage/img/about.png') }}" class="rounded-lg  md:w-1/2" alt="">
                <div class="flex flex-col gap-3 ">
                    <h1 class="font-bold text-xl">Elvicto adalah skincare terkemuka dengan solusi perawatan kulit efektif
                        dan aman.</h1>
                    <small>Elvicto adalah sebuah brand skincare yang dibuat dan diformulasikan khusus untuk para pria di
                        Indonesia, agar peduli dengan kesehatan kulitnya baik wajah maupun tubuh. Manfaat lainnya adalah
                        meningkatkan kenyamanan dan kepercayaan diri mereka dalam menjalani segala aktifitasnya</small>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full bg-gray-100">
        <h1 class="text-center text-4xl font-bold mb-5">Our Marketplace</h1>
        <div class="container mx-auto flex flex-wrap justify-center text-center items-center px-10 md:px-44 gap-10">
            <a href="">
                <div class="w-[200px] p-5">
                    <img src="{{ asset('/storage/img/marketplace/1691991102tokopedia-png-logo.webp') }}" alt="" />
                </div>
            </a>
            <a href="">
                <div class="w-[200px] p-5">
                    <img src="{{ asset('/storage/img/marketplace/shopee.png') }}" alt="" />
                </div>
            </a>
        </div>
    </section>
@endsection
