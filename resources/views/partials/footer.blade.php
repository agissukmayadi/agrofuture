<footer class="w-full {{ Request::url() == route('cart') ? 'hidden md:block' : 'block' }}">
    <div class="h-40 bg-gray-100"></div>
    <div class="bg-gray-300 px-4">
        <div class="container bg-primary rounded-xl relative h-80 -top-10 mx-auto">
            <img src="{{ asset('/storage/img/footer-hero.png') }}" class="absolute bottom-0 right-0 z-10" alt="">
            <div class="h-full flex flex-col justify-center z-20 relative px-10 gap-2">
                <h1 class="text-white font-bold text-2xl text-center text-shadow-xl">Miliki Kulit Bercahaya
                    Sekarang!
                </h1>
                <p class="text-white text-center text-shadow-xl">Coba sekarang dan rasakan perbedaannya! Dapatkan
                    kulit
                    sehat dan bercahaya dengan produk Elvicto</p>
                <div class="mx-auto mt-4">
                    <a
                        class="cursor-pointer text-primary bg-secondary hover:bg-secondary/80 font-medium rounded-lg px-10 py-4 text-center md:w-fit text-xs">Belanja
                        Sekarang</a>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="flex flex-col px-5 gap-5 md:flex-row md:justify-between">
                <div class="md:w-[40%]">
                    <h5 class="text-primary font-bold text-2xl">ELVICTO</h5>
                    <p class="text-primary text-xs mt-2">
                        Sebuah brand skincare yang dibuat dan diformulasikan khusus untuk para pria di Indonesia,
                        agar
                        peduli dengan kesehatan kulitnya baik wajah maupun tubuh. Manfaat lainnya adalah
                        meningkatkan
                        kenyamanan dan kepercayaan diri mereka dalam menjalani segala aktifitasnya.</p>
                    <div class=" space-x-2 mt-2">
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                    </div>
                </div>
                <div class="flex flex-col gap-5 md:flex-row md:w-[50%]">
                    <div class="flex-1">
                        <h5 class="text-primary font-bold">Links</h5>
                        <div class="flex flex-col gap-2 text-xs mt-2">
                            <a href="">Beranda</a>
                            <a href="">Produk</a>
                            <a href="">Tentang Kami</a>
                            <a href="">Produk</a>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h5 class="text-primary font-bold">Marketplace</h5>
                        <div class="flex flex-col gap-2 text-xs mt-2">
                            <a href="">Tokopedia</a>
                            <a href="">Shopee</a>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h5 class="text-primary font-bold">Contact</h5>
                        <div class="flex flex-col gap-2 text-xs mt-2">
                            <div class="flex">
                                <i class="fa-solid fa-clock mr-2"></i>
                                <span> 10.00 - 22.00 WIB</span>
                            </div>
                            <div class="flex">
                                <i class="fa-solid fa-envelope mr-2"></i>
                                <span> Elvicto@gmail.com</span>
                            </div>
                            <div class="flex">
                                <i class="fa-solid fa-phone mr-2"></i>
                                <span> 02128537235</span>
                            </div>
                            <div class="flex">
                                <i class="fa-solid fa-location-dot mr-2"></i>
                                <span> Komplek Santunan Jaya No.35, Kel.
                                    Jatiwaringin, Kec.Pondokgede, Kota Bekasi, Prov. Jawa Barat 17411.
                                    Indonesia.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-4 mt-4">
            <p class="text-center text-sm">©2023 PT Indonesia Premium Goods. All rights reserved.</p>
        </div>
    </div>
</footer>
