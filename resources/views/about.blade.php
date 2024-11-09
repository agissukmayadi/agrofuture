@extends('layout.index')

@section('content')
    <section class="relative bg-no-repeat bg-cover bg-center py-20 md:py-44"
        style="background-image: url('{{ asset('/storage/img/page-title.jpg') }}')">
        <div class="absolute top-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
        <div class="relative w-full h-full flex justify-center items-center  z-20">
            <div class="container">
                <h1 class="text-white text-center text-3xl font-thin md:text-left md:text-4xl text-shadow-md ">
                    Agrowisata
                </h1>
                <h1 class="text-white text-center text-3xl font-semibold md:text-left md:text-5xl text-shadow-md ">
                    Luewimalang
                </h1>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto">
            <div class="w-full md:w-2/3 px-10 md:px-0">
                <h1 class="text-5xl mb-10 text-center md:text-left"><span class="font-bold">AGROWISATA</span><span
                        class="font-thin">
                        LEUWIMALANG</span>
                </h1>
                <p class="mb-5 text-justify">Desa Leuwimalang merupakan Desa yang berada di daerah dataran, dengan
                    ketinggian ± 700 – 800 meter di atas permukaan laut (MDPL). Desa Leuwimalang memiliki luas wilayah
                    135.188 Ha, terdiri dari 3 RW dan 14 RT serta 3 Dusun Yaitu Dusun 1, Dusun 2,Dusun 3. Dengan batas-batas
                    wilayah Sebelah Utara Desa Jogjogan, Sebelah Selatan Kelurahan Cisarua, Sebelah Timur Desa Kopo, Sebelah
                    Barat Desa Cilember. Jarak dari Desa ke Kecamatan 0.6 Km, jarak ke Ibu Kota Kabupaten Bogor 50 Km, ke
                    Ibu Kota Provinsi Jawa Barat di Bandung 100 Km, dan ke Ibu Kota Negara di jakarta 80 Km.</p>
                <p class="text-justify ">
                    Desa Leuwimalang menawarkan pengalaman wisata yang menyeluruh, memadukan keindahan alam, aktivitas
                    pertanian berkelanjutan, dan kekayaan budaya lokal yang autentik. Terletak di dataran tinggi dengan
                    pemandangan alam yang menakjubkan, pengunjung dapat menikmati udara segar sembari menjelajahi
                    kebun-kebun dan sawah yang membentang luas. Kunjungan ke desa ini juga menghadirkan kesempatan untuk
                    berinteraksi langsung dengan para petani lokal, melihat bagaimana proses pertanian organik dilakukan,
                    mulai dari menanam hingga memanen hasil bumi. Tidak hanya itu, wisatawan juga akan diajak lebih dekat
                    dengan kehidupan masyarakat melalui pengalaman budaya yang mendalam, seperti melihat kesenian
                    tradisional, kerajinan tangan yang terus dilestarikan. Semua ini berpadu menjadi satu pengalaman wisata
                    yang mengedukasi dan memperkaya, membawa pengunjung lebih dekat dengan alam, pertanian, dan warisan
                    budaya Desa Leuwimalang.
                </p>
            </div>
        </div>
    </section>
    <section class="py-20 bg-green-600">
        <div class="container mx-auto flex justify-center">
            <div class="flex flex-col md:flex-row md:justify-center gap-10">
                <div class="w-[500px]  h-[500px] bg-cover bg-no-repeat bg-center relative"
                    style="background-image: url('{{ asset('/storage/img/g2-481x360.jpg') }}')">
                    <div class="absolute top-0 w-full h-full bg-black bg-opacity-50"></div>
                    <div class="absolute z-20 top-0 w-full h-full p-10 flex items-center">
                        <div class="flex flex-col h-full">
                            <div class="">
                                <p class=" tracking-[16px] text-4xl font-semibold text-white z-20">OUR</p>
                                <p class=" tracking-[16px] text-4xl font-semibold text-white z-20 mb-12">VISION</p>
                            </div>
                            <div class="grow">
                                <p class="text-white  text-lg italic text-center mt-10">MEWUJUDKAN DESA LEUWIMALANG MENJADI
                                    DESA MANDIRI,
                                    MAJU, SEJAHTERA,
                                    PRODUKTIF, AGAMAIS
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[500px]  h-[500px] bg-cover bg-no-repeat bg-center relative"
                style="background-image: url('{{ asset('/storage/img/3.jpg') }}')">
                <div class="absolute top-0 w-full h-full bg-black bg-opacity-50"></div>
                <div class="absolute z-20 top-0 w-full h-full p-10 flex items-center">
                    <div class="flex flex-col h-full">
                        <div class="">
                            <p class=" tracking-[16px] text-4xl font-semibold text-white z-20">OUR</p>
                            <p class=" tracking-[16px] text-4xl font-semibold text-white z-20 mb-12">MISSION</p>
                        </div>
                        <ul class=" list-disc marker:text-white text-white grow">
                            <li>Meningkatkan kualitas kesejahteraan warga masyarakat yang berdaya saing</li>
                            <li>Memberikan pemenuhan segala hak hak kebutuhan dasar warga masyarakat Desa Leuwimalang
                            </li>
                            <li>Pembangunan yang terarah dan terencana serta berkesinambungan.
                            </li>
                            <li>Meningkatkan aktifitas keagamaan, budaya, sosial kemasyarakatan serta mendorong kegiatan
                                ekstra korikuler kepemudaan.
                            </li>
                        </ul>
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
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500" alt="Gallery Image 1">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 1</span>
                    </div>
                </div>

                <!-- Gambar 2 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/2.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500" alt="Gallery Image 2">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 2</span>
                    </div>
                </div>

                <!-- Gambar 3 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/3.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500" alt="Gallery Image 3">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 3</span>
                    </div>
                </div>

                <!-- Gambar 4 -->
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('/storage/img/gallery/4.jpg') }}"
                        class="w-full h-64 object-cover hover:scale-110 transition-all duration-500" alt="Gallery Image 4">
                    <div
                        class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-500 flex justify-center items-center">
                        <span class="text-white font-bold text-xl">Image 4</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


