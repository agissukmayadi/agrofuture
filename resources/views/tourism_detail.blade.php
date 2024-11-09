@extends('layout.index')

@push('styles')
    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@section('content')
    <section class="w-full pt-20 mt-16  bg-gray-100">
        <div class="container  mx-auto bg-white rounded-lg shadow-md p-10">
            <h1 class="text-3xl font-semibold uppercase tracking-[5px]">Perkebunan Sayur</h1>
            <div class="w-full my-4">
                <div class="w-full h-96 bg-cover bg-bottom"
                    style="background-image: url('{{ asset('/storage/img/agriculture/detail/header.jpg') }}')"></div>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-lg font-semibold mb-2">Description</h2>
                    <p>Kebun Sayuran di Desa Wisata Leuwimalang menawarkan beragam jenis sayuran segar yang ditanam dengan
                        penuh cinta oleh para petani lokal. Dengan tanah yang subur dan iklim yang mendukung, kebun sayuran
                        ini menjadi sumber utama sayuran organik yang sehat dan berkualitas bagi masyarakat dan pengunjung.
                    </p>
                    <p class="mt-2">Pengunjung dapat berkeliling di kebun sayuran, melihat langsung berbagai jenis sayuran
                        yang ditanam,
                        seperti sawi, kangkung, tomat, dan cabe. Selain itu, mereka juga berkesempatan untuk berpartisipasi
                        dalam kegiatan memetik sayuran, sehingga bisa merasakan langsung pengalaman berkebun. Kegiatan ini
                        tidak hanya mendidik, tetapi juga mendukung praktik pertanian organik yang ramah lingkungan.</p>
                </div>
                <div>
                    <div class="h-64 z-10" id="map"></div>
                    <span class="block mt-2 text-green-600 text-end">Ciomas, Bogor</span>
                </div>
            </div>
            <div class="w-full my-4">
                <h2 class="text-lg font-semibold mb-2">Gallery</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    <img src="{{ asset('/storage/img/agriculture/detail/galery-1.jpg') }}" alt=""
                        class="rounded-lg shadow-md" alt="">
                    <img src="{{ asset('/storage/img/agriculture/detail/galery-2.jpg') }}" alt=""
                        class="rounded-lg shadow-md" alt="">
                    <img src="{{ asset('/storage/img/agriculture/detail/galery-3.jpg') }}" alt=""
                        class="rounded-lg shadow-md" alt="">
                    <img src="{{ asset('/storage/img/agriculture/detail/galery-4.jpg') }}" alt=""
                        class="rounded-lg shadow-md" alt="">
                </div>
            </div>
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
            L.marker([-6.659884718929989, 106.918793678189])
                .addTo(map)
                .bindPopup("Wisata 1")
                .openPopup();
        })
    </script>
@endpush
