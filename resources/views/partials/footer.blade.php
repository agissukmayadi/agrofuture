<footer class="w-full {{ Request::url() == route('cart') ? 'hidden md:block' : 'block' }}">
    <div class="h-40 bg-gray-100"></div>
    <div class="bg-green-700 px-4">
        <div class="container rounded-xl relative h-80 -top-10 mx-auto bg-cover bg-green-900 shadow-2xl">
            <img src="{{ asset('/storage/img/footer.png') }}"
                class="absolute bottom-0 right-0 z-10 h-[120%] hidden md:block" alt="">
            <div class="h-full flex flex-col justify-center items-center relative px-10 gap-2 z-30">
                <h1 class="text-white font-bold text-2xl text-center  w-fit">Agrotourism Leuwimalang
                </h1>
                <p class="text-white text-center w-fit">Jelajahi keindahan dan pertanian Desa Lewimalang serta
                    temukan
                    pesona
                    alam yang memikat</p>
                <div class="mx-auto mt-4">
                    <a href="https://maps.app.goo.gl/bf9bRnAaBrvXFf8r6" target="_blank"
                        class="cursor-pointer text-white transition-all border border-white  font-medium rounded-lg px-10 py-4 text-center md:w-fit text-xs hover:bg-green-600">Kenali
                        Kami</a>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="flex flex-col px-5 gap-5 md:flex-row md:justify-between">
                <div class="md:w-[40%]">
                    <h5 class="text-white font-bold text-2xl">Leuwimalang</h5>
                    <p class="text-white text-xs mt-2">
                        Desa Leuwimalang menawarkan pengalaman wisata yang menyeluruh, memadukan keindahan alam,
                        aktivitas pertanian berkelanjutan, dan kekayaan budaya lokal yang autentik. Terletak di dataran
                        tinggi dengan pemandangan alam yang menakjubkan, pengunjung dapat menikmati udara segar sembari
                        menjelajahi kebun-kebun dan sawah yang membentang luas.</p>
                    <div class=" space-x-2 mt-2">
                        <a href="" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                        <a href="" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                        <a href="" class="text-white"><i class="fa-brands fa-facebook"></i></a>
                    </div>
                </div>
                <div class="flex flex-col gap-5 md:flex-row md:w-[50%]">
                    <div class="flex-1">
                        <h5 class="text-white font-bold">Links</h5>
                        <div class="flex flex-col gap-2 text-xs mt-2">
                            <a href="" class="text-white">Beranda</a>
                            <a href="" class="text-white">Wisata</a>
                            <a href="" class="text-white">Produk</a>
                            <a href="" class="text-white">Tentang Kami</a>
                            <a href="" class="text-white">Produk</a>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h5 class="text-white font-bold">Contact</h5>
                        <div class="flex flex-col gap-2 text-xs mt-2">
                            <div class="flex">
                                <i class="fa-solid text-white fa-envelope mr-2"></i>
                                <span class="text-white"> leuwimalangdesa@gmail.com</span>
                            </div>
                            <div class="flex">
                                <i class="fa-solid text-white fa-location-dot mr-2"></i>
                                <span class="text-white"> Jln. Sirna Urip No.78 Leuwimalang Cisarua Bogor 16750 .</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-4 mt-4">
            <p class="text-center text-sm text-white">©2024 All rights reserved.</p>
        </div>
    </div>
</footer>
