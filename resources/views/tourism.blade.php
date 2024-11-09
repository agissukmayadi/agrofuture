@extends('layout.index')

@push('styles')
    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@section('content')
    <section class="relative bg-no-repeat bg-cover bg-center py-20 md:py-44"
        style="background-image: url('{{ asset('/storage/img/page-title.jpg') }}')">
        <div class="absolute top-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
        <div class="relative w-full h-full flex justify-center items-center  z-20">
            <div class="container">
                <h1 class="text-white text-center text-3xl font-thin md:text-left md:text-4xl text-shadow-md ">
                    Pertanian & Wisata
                </h1>
                <h1 class="text-white text-center text-3xl font-semibold md:text-left md:text-5xl text-shadow-md ">
                    Luewimalang
                </h1>
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

    <section class="py-20 bg-gray-100">
        <div class="container mx-auto">
            <div class="text-center">
                <p class=" uppercase tracking-[5px] font-semibold">Location</p>
                <h2 class="text-3xl font-semibold mt-2">Temukan lokasi kami di Desa Leuwimalang!
                </h2>
            </div>
            <div class="w-full h-96 mt-16 z-10" id="map"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const map = L.map("map").setView(
                [-6.664288694876839, 106.92357535171014],
                15
            );

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "© OpenStreetMap contributors",
            }).addTo(map);
            L.marker([-6.663036588091227, 106.92231472869092])
                .addTo(map)
                .bindPopup("Wisata 1")
                .openPopup();
            L.marker([-6.668044996048769, 106.92709640221202])
                .addTo(map)
                .bindPopup("Pertanian 1")
                .openPopup();
            L.marker([-6.659884718929989, 106.918793678189])
                .addTo(map)
                .bindPopup("Wisata 1")
                .openPopup();
        })
    </script>
@endpush
