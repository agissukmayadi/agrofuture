@extends('layout.index')


@section('content')
    <section class="relative bg-no-repeat bg-cover bg-center py-20 md:py-44"
        style="background-image: url('{{ asset('/storage/img/page-title.jpg') }}')">
        <div class="absolute top-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
        <div class="relative w-full h-full flex justify-center items-center  z-20">
            <div class="container">
                <h1 class="text-white text-center text-3xl font-thin md:text-left md:text-4xl text-shadow-md ">
                    Contact
                </h1>
                <h1 class="text-white text-center text-3xl font-semibold md:text-left md:text-5xl text-shadow-md ">
                    Luewimalang
                </h1>
            </div>
        </div>
    </section>
    <section class="w-full bg-gray-100 py-10">
        <div class="container mx-auto px-10">
            <div
                class="text-center text-green-600 after:content-[''] after:block after:w-12 after:h-0.5 after:bg-green-600 after:mx-auto after:mt-2 space-y-1">
                <h4 class=" font-semibold text-lg">Ada Pertanyaan ?</h4>
                <h1 class=" font-bold text-3xl">Kami disini untuk membantu</h1>
            </div>
            <div class="flex flex-wrap justify-center pt-12 gap-8 items-start">
                <div
                    class="flex flex-col items-center shadow-md hover:bg-slate-50 rounded-lg w-[400px] border py-5 px-10 cursor-pointer">
                    <div
                        class="mb-3 rounded-full border border-dashed border-green-600 text-green-600 text-center text-2xl w-[50px] h-[50px] flex items-center justify-center">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h4 class="font-semibold text-green-600 text-xl">Location</h4>
                    <p class="text-slate-500"> Desa Leuwimalang Kab.Bogor</p>
                </div>
                <div
                    class="flex flex-col items-center shadow-md hover:bg-slate-50 rounded-lg w-[400px] border py-5 px-10 cursor-pointer">
                    <div
                        class="mb-3 rounded-full border border-dashed border-green-600 text-green-600 text-center text-2xl w-[50px] h-[50px] flex items-center justify-center">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h4 class="font-semibold text-green-600 text-xl">Email</h4>
                    <p class="text-slate-500">leuwimalangdesa@gmail.com</p>
                </div>

            </div>
            <div class="flex flex-col gap-10 mt-14 md:flex-row md:items-center">
                <div class="text-center md:text-left text-green-600 w-full ">
                    <h5 class="font-semibold">Jangan seperti orang asing!</h5>
                    <h2 class="font-bold text-xl">Beritahu kami, kami siap mendengarkan anda.</h2>
                    <iframe class=" mt-5 w-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31702.83422479514!2d106.90155480588925!3d-6.664974023108268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b7d2cc8f1c8b%3A0xb67e1047e0ad0363!2sLeuwimalang%2C%20Kec.%20Cisarua%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1728485712359!5m2!1sid!2sid"
                        frameborder="0" style="border: 0; width: 100%; height: 384px" allowfullscreen></iframe>
                </div>
                <form class="w-full mx-auto">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="floating_first_name" id="floating_first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " required />
                            <label for="floating_first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="floating_last_name" id="floating_last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " required />
                            <label for="floating_last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-600 peer-focus:dark:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                    </div>
                    <div class="relative z-0 w-full mb-5">
                        <textarea id="message" rows="4"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                            border-0 border-b-2 border-gray-300 appearance-none
                            focus:outline-none focus:ring-0 focus:border-green-600 focus:placeholder:text-green-600"
                            placeholder="Your message here..."></textarea>

                    </div>
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-600/80 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                </form>

            </div>
        </div>
    </section>
@endsection
