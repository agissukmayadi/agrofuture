@extends('layout.index')


@section('content')
    <section class="w-full mt-16 bg-gray-100">
        <div class="container mx-auto px-4 md:px-10 py-10">
            <h1 class="text-left text-3xl font-bold mb-4">Checkout</h1>
            <div class="flex flex-col md:flex-row md:items-start gap-8">
                <div class="w-full md:w-3/5 border p-6 bg-white ">
                    <h6 class="text-sm font-semibold mb-3">Informasi Detail Penerima</h6>
                    <div class=" space-y-4">
                        <div class="flex flex-col md:flex-row gap-5 ">
                            <div class="flex-1 space-y-1">
                                <label for="" class="text-sm">First Name</label>
                                <input type="text"
                                    class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0"
                                    placeholder="Enter your first name">
                            </div>
                            <div class="flex-1 space-y-1">
                                <label for="" class="text-sm">Last Name</label>
                                <input type="text"
                                    class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0"
                                    placeholder="Enter your last name">
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-sm">Phone</label>
                            <input type="text"
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0"
                                placeholder="Enter your phone number">
                        </div>
                    </div>
                    <h6 class="text-sm font-semibold mt-6 mb-3">Address</h6>
                    <div class="space-y-4">
                        <div>
                            <label for="" class="text-sm">Province</label>
                            <select name="" id=""
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0">
                                <option value="">Tes</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="text-sm">City</label>
                            <select name="" id=""
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0">
                                <option value="">Tes</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="text-sm">Full Address</label>
                            <textarea name="" id="" rows="4"
                                class="w-full rounded-md py-2 text-sm border-none bg-gray-100 focus:ring-0"></textarea>
                        </div>
                    </div>
                    <h6 class="text-sm font-semibold mt-6 mb-3">Shipment</h6>
                    <div class="flex flex-col gap-6 md:flex-row">
                        <div class="flex-1">
                            <label for="" class="text-sm">Courier</label>
                            <select name="" id=""
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0">
                                <option value="">Tes</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="" class="text-sm">Service</label>
                            <select name="" id=""
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0">
                                <option value="">Tes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-2/5 flex flex-col gap-3">
                    <div class="w-full bg-white p-6 border">
                        <h6 class="text-sm font-semibold mb-3">Rincian Pesanan</h6>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                <thead class="text-xs text-gray-900 uppercase ">
                                    <tr>
                                        <th scope="col" class=" py-3">
                                            Product
                                        </th>
                                        <th scope="col" class=" py-3 text-end">
                                            Subtotal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-500">
                                    <tr class="bg-white">
                                        <th scope="row" class=" py-2 font-medium whitespace-nowrap ">
                                            Apple MacBook Pro 17" <span class=" font-semibold">× 2</span>
                                        </th>
                                        <td class=" py-2 text-end font-semibold">
                                            $2999
                                        </td>
                                    </tr>
                                    <tr class="bg-white">
                                        <th scope="row" class=" py-2 font-medium whitespace-nowrap ">
                                            Shipping
                                        </th>
                                        <td class=" py-2 text-end font-semibold">
                                            <p> $2999
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class=" border-t">

                                    <tr class="bg-white text-primary">
                                        <th scope="row" class=" py-4 whitespace-nowrap font-bold uppercase">
                                            TOTAL
                                        </th>
                                        <td class=" py-2 text-end font-bold">
                                            <p>$2999</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="w-full bg-white p-6 border">
                        <h6 class="text-sm font-semibold mb-3">Pembayaran</h6>
                        <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg ">
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center ps-3">
                                    <input id="list-radio-license" type="radio" value="" name="list-radio"
                                        class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2 dark:bg-gray-600 ">
                                    <label for="list-radio-license"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">BCA (Agis Sukmayadi) -
                                        1267615274</label>
                                </div>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center ps-3">
                                    <input id="list-radio-license" type="radio" value="" name="list-radio"
                                        class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2 dark:bg-gray-600 ">
                                    <label for="list-radio-license"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">BCA (Agis Sukmayadi) -
                                        1267615274</label>
                                </div>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center ps-3">
                                    <input id="list-radio-license" type="radio" value="" name="list-radio"
                                        class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-secondary focus:ring-2 dark:bg-gray-600 ">
                                    <label for="list-radio-license"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">BCA (Agis Sukmayadi) -
                                        1267615274</label>
                                </div>
                            </li>

                        </ul>
                        <div class="mt-5">
                            <label for="" class="text-sm">Bukti Pembayaran</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file">
                        </div>
                        <button
                            class=" mt-4 shadow-md w-full bg-secondary hover:bg-secondary/80 text-white font-bold py-2 px-4 rounded">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
