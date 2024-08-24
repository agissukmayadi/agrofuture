@extends('layout.admin')


@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
        <div class="bg-white shadow-md p-6 flex flex-col gap-3">
            <div class="w-12 h-12 flex  items-center justify-center bg-light rounded-full">
                <i class="fa-solid fa-cart-shopping text-indigo-600"></i>
            </div>
            <div>
                <p class="font-semibold text-xl truncate">Rp. 1.000.000</p>
                <div class="flex justify-between items-center">
                    <p class="text-slate-500  text-sm">Total Penjualan</p>
                    <p class="text-green-500  text-sm">2.59%</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md p-6 flex flex-col gap-3">
            <div class="w-12 h-12 flex  items-center justify-center bg-light rounded-full">
                <i class="fa-solid fa-bag-shopping text-indigo-600"></i>
            </div>
            <div>
                <p class="font-semibold text-xl truncate">2.450</p>
                <div class="flex justify-between items-center">
                    <p class="text-slate-500  text-sm">Total Produk</p>
                    <p class="text-green-500  text-sm">1.29%</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md p-6 flex flex-col gap-3">
            <div class="w-12 h-12 flex  items-center justify-center bg-light rounded-full">
                <i class="fa-solid fa-users text-indigo-600"></i>
            </div>
            <div>
                <p class="font-semibold text-xl truncate">3.500</p>
                <div class="flex justify-between items-center">
                    <p class="text-slate-500  text-sm">Total User</p>
                    <p class="text-green-500  text-sm">10.59%</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md p-6 flex flex-col gap-3">
            <div class="w-12 h-12 flex  items-center justify-center bg-light rounded-full">
                <i class="fa-solid fa-file-invoice text-indigo-600"></i>
            </div>
            <div>
                <p class="font-semibold text-xl truncate">1.450</p>
                <div class="flex justify-between items-center">
                    <p class="text-slate-500  text-sm">Total Transaksi</p>
                    <p class="text-green-500  text-sm">2.59%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5 grid grid-cols-6 gap-4 items-start">
        <div class=" bg-white shadow-md col-span-6 xl:col-span-4 px-8 py-6">
            <p class="font-semibold text-xl mb-3">Top 5 Best Product Sales</p>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right ">
                    <thead class="text-xs uppercase bg-indigo-600 text-white ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="bg-white shadow-md col-span-6 xl:col-span-2 px-8 py-6">
            <p class="font-semibold text-xl mb-3">Grafik Penjualan</p>
            <div>
                <canvas id="myChart" class="h-80 w-80"></canvas>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow',
                    'Green',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100, 80],
                    backgroundColor: [
                        '#2a38a3',
                        '#6577f3',
                        '#8ed0ee',
                        '#0fadd0'
                    ],
                    hoverOffset: 6,
                }]
            },
            options: {
                // responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom', // Menempatkan label di bawah chart
                        labels: {
                            boxWidth: 40,
                            padding: 20
                        }
                    }
                }
            }
        });
    </script>
@endsection
