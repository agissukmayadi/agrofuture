@extends('layout.index')

@section('content')
    <section class="w-full h-screen bg-no-repeat bg-cover flex justify-center items-center relative"
        style="background-image: url('{{ asset('/storage/img/header.jpg') }}')">
        <div class="absolute top-0 left-0 w-full h-full z-10 bg-black/70"></div>
        <div class="text-white z-20 flex flex-col gap-3 items-center">
            <h2 class="text-center text-3xl font-bold text-green-500">Selamat Datang</h2>
            <h1 class="text-white text-5xl font-bold text-shadow-md text-center">Agrotourism Leuwimalang</h1>
            <p class="text-center md:px-96 lin px-10 line-clamp-3 md:line-clamp-none">Tempat di mana keindahan alam dan
                budaya lokal menyatu sempurna. Dari hamparan sawah
                yang hijau hingga air terjun tersembunyi, setiap sudut desa ini siap memberikan pengalaman tak terlupakan.
            </p>
            <p class="text-center text-xl ">Mulai Menjelajah Sekarang!</p>
            <div class="flex items-center gap-3">
                <a href="{{ route('tourism') }}"
                    class="border rounded-lg px-10 md:px-16 py-2 font-semibold bg-green-600 border-green-600 hover:bg-green-700  transition-all md:text-xl">Tourism</a>
                <a href="{{ route('products') }}"
                    class="border rounded-lg px-10 md:px-16 py-2 font-semibold hover:bg-green-600 hover:border-green-600 transition-all md:text-xl">Products</a>
            </div>
        </div>
    </section>
    <section class="w-full py-20 bg-gray-100">
        <div class="container px-10 md:px-44 mx-auto ">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <div class="w-full md:w-1/2 overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/bg1.jpg') }}"
                        class=" w-full hover:scale-110 transition-all duration-1000" alt="">
                </div>
                <div class="flex flex-col gap-3 md:w-1/2 ">
                    <h3 class="text-green-600">Tentang Kami</h3>
                    <h1 class="font-bold text-xl">Agrowisata Leuwimalang.</h1>
                    <small>Desa Leuwimalang menawarkan pengalaman wisata yang menyeluruh, memadukan keindahan alam,
                        aktivitas pertanian berkelanjutan, dan kekayaan budaya lokal yang autentik. Terletak di dataran
                        tinggi dengan pemandangan alam yang menakjubkan, pengunjung dapat menikmati udara segar sembari
                        menjelajahi kebun-kebun dan sawah yang membentang luas.</small>
                    <a href="{{ route('about') }}"
                        class="cursor-pointer text-green-600 border border-green-600 font-medium rounded-lg px-10 py-4 text-center md:w-fit text-xs hover:bg-green-600 hover:text-white transition-all">Lihat
                        Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-10 md:px-0">
            <div class="text-center">
                <p class=" uppercase tracking-[5px] font-semibold">Agrotourism</p>
                <h2 class="text-3xl font-semibold mt-2">Temukan lokasi wisata yang menarik di Desa Leuwimalang!
                </h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 mt-20">
                <div class="flex flex-col gap-5">
                    <img src="{{ asset('/storage/img/agrotourism/air terjun.jpg') }}"
                        class="w-full hover:-translate-y-6 transition-all duration-500" alt="">
                    <a href="#" class="text-xl transition-all hover:text-green-600 font-semibold">Air Terjun</a>
                    <p class="line-clamp-3">Air terjun menawarkan pemandangan yang spektakuler dan suasana
                        yang tenang, menjadikannya tempat yang ideal untuk bersantai dan berlibur</p>
                </div>
                <div class="flex flex-col gap-5 md:mt-20">
                    <img src="{{ asset('/storage/img/agrotourism/budaya.jpg') }}"
                        class="w-full hover:-translate-y-6 transition-all duration-500" alt="">
                    <a href="#" class="text-xl transition-all hover:text-green-600 font-semibold">Adat dan Budaya</a>
                    <p class="line-clamp-3">Menyaksikan berbagai jenis seni, seperti tari-tarian tradisional, musik, dan
                        teater yang mengisahkan sejarah dan legenda masyarakat setempat. </p>
                </div>
                <div class="flex flex-col gap-5">
                    <img src="{{ asset('/storage/img/agrotourism/Kerajinan tangan.jpg') }}"
                        class="w-full hover:-translate-y-6 transition-all duration-500" alt="">
                    <a href="#" class="text-xl transition-all hover:text-green-600 font-semibold">Kerajinan Tangan</a>
                    <p class="line-clamp-3">Berpartisipasi dalam proses pembuatan kerajinan tangan di Leuwimalang tidak
                        hanya memberikan
                        pengalaman berharga, tetapi juga membantu melestarikan budaya tradisional yang ada di desa ini.</p>
                </div>
                <div class="flex flex-col gap-5 md:mt-20">
                    <img src="{{ asset('/storage/img/agrotourism/hiking.jpg') }}"
                        class="w-full hover:-translate-y-6 transition-all duration-500" alt="">
                    <a href="#" class="text-xl transition-all hover:text-green-600 font-semibold">Hiking.</a>
                    <p class="line-clamp-3">Dikelilingi oleh pegunungan dan hutan tropis yang hijau, desa ini menawarkan
                        jalur hiking yang menarik dan beragam, menjadikannya tempat yang sempurna untuk menjelajahi
                        keindahan alam.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 ">
        <div class="container mx-auto">
            <div class="text-center">
                <p class=" uppercase tracking-[5px] font-semibold">Agriculture</p>
                <h2 class="text-3xl font-semibold mt-2">Dapatkan info produk unggulan kami!
                </h2>
            </div>
            <div class="mt-20">
                <div class="bg-gray-100 shadow-lg flex">
                    <div class=" hidden md:block w-1/2">
                        <img src="{{ asset('/storage/img/agriculture/kebun teh.jpg') }}" class="w-full" alt="">
                    </div>
                    <div class="w-full md:w-1/2 p-12 flex flex-col justify-center items-center text-center">
                        <h1 class="text-4xl mb-4 uppercase">
                            Perkebunan Teh
                        </h1>
                        <p class="text-green-600 mb-8">
                            Kebun teh yang menyajikan produk unggulan
                        </p>
                        <button class="bg-black text-white py-3 px-6 uppercase tracking-wider block mt-5">
                            Read More
                        </button>
                    </div>
                </div>
                <div class="bg-gray-100 shadow-lg flex">
                    <div class="w-full md:w-1/2 p-12 flex flex-col justify-center items-center text-center">
                        <h1 class="text-4xl mb-4  uppercase">
                            Perkebunan Sayur
                        </h1>
                        <p class="text-green-600 mb-8">
                            Perkbunan Sayur yang menawarkan hasil panen yang berkualitas
                        </p>
                        <a href="{{ route('tourism.detail', 'perkebunan-sayur') }}"
                            class="bg-black text-white py-3 px-6 uppercase tracking-wider block mt-5">
                            Read More
                        </a>
                    </div>
                    <div class=" hidden md:block w-1/2">
                        <img src="{{ asset('/storage/img/agriculture/sayuran.jpg') }}" class="w-full" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="md:flex md:flex-row gap-3 items-center md:h-[30rem] overflow-hidden bg-green-100 ">
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('/storage/img/donate.jpg') }}" class="w-full" alt="">
        </div>
        <div class="w-full p-10 md:w-1/2">
            <div class="flex flex-col justify-center gap-3">
                <p class="text-3xl font-semibold">Mari <span class="text-green-600">Bergabunglah</span> dalam pelestarian
                    Desa Leuwimalang</p>
                <p>Bersama kita menjaga keindahan alam dan kearifan lokal</p>
                <div class="flex items-start mt-4 gap-10">
                    <div class="flex flex-col items-center gap-3">
                        <div class="h-24 w-24 border-4 border-gray-300 rounded-full  flex items-center justify-center">
                            <i class="fa-solid fa-hand-holding-medical text-green-600 text-3xl"></i>
                        </div>
                        <p>Donasi</p>
                    </div>
                    <div class="flex flex-col items-center gap-3">
                        <div class="h-24 w-24 border-4 border-gray-300 rounded-full  flex items-center justify-center">
                            <i class="fa-solid fa-globe text-green-600 text-3xl"></i>
                        </div>
                        <p>Kemitraan</p>
                    </div>
                    <div class="flex flex-col items-center gap-3">
                        <div class="h-24 w-24 border-4 border-gray-300 rounded-full  flex items-center justify-center">
                            <i class="fa-solid fa-handshake-angle text-green-600 text-3xl"></i>
                        </div>
                        <div class="text-center">
                            <p>Kunjungan</p>
                            <p>Industri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full pt-20 bg-gray-100">
        <div class="container mx-auto px-10">
            <h2 class="text-center text-4xl tracking-[5px] uppercase mb-12 font-light">Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Gambar 1 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/1.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500"
                        alt="Gallery Image 1">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 1</span>
                    </div>
                </div>

                <!-- Gambar 2 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/2.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500"
                        alt="Gallery Image 2">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 2</span>
                    </div>
                </div>

                <!-- Gambar 3 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/3.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500"
                        alt="Gallery Image 3">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 3</span>
                    </div>
                </div>

                <!-- Gambar 4 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/4.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500"
                        alt="Gallery Image 4">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 4</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
