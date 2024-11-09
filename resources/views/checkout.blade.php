@extends('layout.index')


@section('content')
    <section class="w-full mt-16 bg-gray-100">
        <div class="container mx-auto px-4 md:px-10 py-10">
            <h1 class="text-left text-3xl font-bold mb-4">Checkout</h1>
            <form class="flex flex-col md:flex-row md:items-start gap-8" id="form-checkout" method="POST"
                action="{{ route('checkout.store') }}">
                @csrf
                <div class="w-full md:w-3/5 border p-6 bg-white ">
                    <h6 class="text-sm font-semibold mb-3">Informasi Detail Penerima</h6>
                    <div class=" space-y-4">
                        <div class="flex flex-col md:flex-row gap-5 ">
                            <div class="flex-1 space-y-1">
                                <label for="name" class="text-sm">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0"
                                    placeholder="Enter your name" required>
                                @error('name')
                                    <small class="text-red-500 text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex-1 space-y-1">
                                <label for="phone" class="text-sm">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0"
                                    placeholder="Enter your phone number" required>
                                @error('phone')
                                    <small class="text-red-500 text-xs">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h6 class="text-sm font-semibold mt-6 mb-3">Address</h6>
                    <div class="space-y-4">
                        <div>
                            <label for="province" class="text-sm">Province</label>
                            <select name="province" id="province"
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0" disabled
                                required>
                                <option selected disabled value="">Select province</option>
                            </select>
                            @error('province')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="text-sm">City</label>
                            <select name="city" id="city"
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0" disabled
                                required>
                                <option selected disabled value="">Select city</option>
                            </select>
                            @error('city')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="text-sm">Full Address</label>
                            <textarea name="address" id="address" rows="4"
                                class="w-full rounded-md py-2 text-sm border-none bg-gray-100 focus:ring-0" placeholder="Enter your address"
                                required></textarea>
                            @error('address')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <h6 class="text-sm font-semibold mt-6 mb-3">Shipment</h6>
                    <div class="flex flex-col gap-6 md:flex-row">
                        <div class="flex-1">
                            <label for="courier" class="text-sm">Courier</label>
                            <select name="courier" id="courier"
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0" disabled
                                required>
                                <option selected disabled value="">Select Courier</option>
                                <option value="JNE" data-courier="jne">JNE</option>
                                <option value="POS" data-courier="pos">POS</option>
                                <option value="TIKI" data-courier="tiki">TIKI</option>
                            </select>
                            @error('courier')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="service" class="text-sm">Service</label>
                            <select name="service" id="service"
                                class="w-full rounded-md h-12 py-2 text-sm border-none bg-gray-100 focus:ring-0" disabled
                                required>
                                <option selected disabled value="">Select Service</option>
                            </select>
                            @error('service')
                                <small class="text-red-500 text-xs">{{ $message }}</small>
                            @enderror
                            <input type="hidden" name="cost" id="cost">
                            <input type="hidden" name="estimate" id="estimate">
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
                                    @foreach ($cart as $item)
                                        <tr class="bg-white">
                                            <th scope="row" class=" py-2 font-medium whitespace-nowrap ">
                                                {{ $item->product->name }} <span class=" font-semibold">×
                                                    {{ $item->quantity }}</span>
                                            </th>
                                            <td class=" py-2 text-end font-medium">
                                                Rp {{ number_format($item->product->price * $item->quantity) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class=" border-t">
                                    <tr class="bg-white text-gray-500">
                                        <th scope="row" class=" col-span-2 py-4 whitespace-nowrap font-bold uppercase">
                                            SUBTOTAL
                                        </th>
                                        <td class=" py-2 text-end font-bold">
                                            <p>Rp {{ number_format($subtotal) }}</p>
                                        </td>
                                    </tr>
                                    <tr class="bg-white text-gray-500">
                                        <th scope="row" class=" py-2 font-medium whitespace-nowrap ">
                                            Shipping
                                        </th>
                                        <td class=" py-2 text-end font-medium">
                                            <p id="shipping">Rp -</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <hr>
                            <div class="w-full flex justify-between text-sm mt-4 text-primary font-bold">
                                <p class="uppercase">
                                    Total
                                </p>
                                <p id="total">Rp. -</p>
                            </div>
                        </div>
                        <button type="submit" id="checkout-button"
                            class=" mt-6 shadow-md w-full bg-green-600/90 hover:bg-green-600 transition-all text-white font-bold py-2 px-4 rounded disabled:bg-gray-400"
                            disabled>Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const province = $('#province');
            const city = $('#city');
            const address = $('#address');
            const courier = $('#courier');
            const service = $('#service');
            const checkoutButton = $('#checkout-button');
            const shipping = $('#shipping');
            const total = $('#total');
            const form = $('#form-checkout');
            const loading = $('#loading');

            function showLoading() {
                loading.addClass('flex');
                loading.removeClass('hidden');
            }

            function hideLoading() {
                loading.addClass('hidden');
                loading.removeClass('flex');
            }

            $.ajax({
                url: '{{ route('api.province') }}',
                type: 'GET',
                beforeSend: () => {
                    province.attr('disabled', true)
                    province.val('')
                    city.attr('disabled', true)
                    city.val('')
                    courier.attr('disabled', true)
                    courier.val('')
                    service.attr('disabled', true)
                    service.val('')
                    shipping.html('Rp. -')
                    total.html('Rp. -')
                    checkoutButton.attr('disabled', true)
                    showLoading();
                }
            }).done(function(response) {
                let provinceOption = "<option disabled selected value=''>Select province</option>"
                response.rajaongkir.results.forEach((element) => {
                    provinceOption +=
                        `<option value="${element.province}" data-id="${element.province_id}">${element.province}</option>`
                });
                province.html(provinceOption);
                province.removeAttr('disabled');
                hideLoading();
            });

            province.on('change', function() {
                let selectedProvinceId = $(this).find(':selected').data('id');

                $.ajax({
                    url: '{{ route('api.city') }}',
                    type: 'GET',
                    data: {
                        province: selectedProvinceId
                    },
                    beforeSend: () => {
                        city.attr('disabled', true)
                        city.val('')
                        courier.attr('disabled', true)
                        courier.val('')
                        service.attr('disabled', true)
                        service.val('')
                        shipping.html('Rp. -')
                        total.html('Rp. -')
                        checkoutButton.attr('disabled', true)
                        showLoading();
                    }
                }).done(function(response) {
                    let cityOption = "<option disabled selected value=''>Select city</option>"
                    response.rajaongkir.results.forEach((element) => {
                        cityOption +=
                            `<option value="${element.type} ${element.city_name}" data-id="${element.city_id}">${element.type} ${element.city_name}</option>`
                    });
                    city.html(cityOption);
                    city.removeAttr('disabled');
                    hideLoading();
                });
            });

            city.on('change', function() {
                courier.removeAttr('disabled')
                courier.val('')
                service.attr('disabled', true)
                service.val('')
                shipping.html('Rp. -')
                total.html('Rp. -')
                checkoutButton.attr('disabled', true)
            })

            courier.on('change', function() {
                let destination = city.find(':selected').data('id');
                $.ajax({
                    url: '{{ route('api.cost') }}',
                    type: 'POST',
                    data: {
                        destination: destination,
                        weight: {{ $weight }},
                        courier: $(this).find(':selected').data('courier'),
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: () => {
                        service.attr('disabled', true)
                        service.val('')
                        shipping.html('Rp. -')
                        total.html('Rp. -')
                        checkoutButton.attr('disabled', true)
                        showLoading();
                    },
                }).done((response) => {
                    let serviceOption = "<option disabled selected value=''>Select Service</option>"
                    response.rajaongkir.results[0].costs.forEach((element) => {
                        const estimate = element.cost[0].etd
                        const cost = element.cost[0].value
                        const service = element.service
                        const description = element.description

                        serviceOption +=
                            `<option value="${description} (${service})" data-estimate="${estimate}" data-cost="${cost}">${description} (${service}) - Rp. ${cost} (${estimate} days)</option>`

                    })
                    service.html(serviceOption)
                    service.removeAttr('disabled')
                    hideLoading();
                });
            })

            service.on('change', function() {
                const shippingCost = $(this).find(':selected').data('cost')
                const shippingEstimate = $(this).find(':selected').data('estimate')

                $('input[name=cost]').val(shippingCost)
                $('input[name=estimate]').val(shippingEstimate)

                const totalPrice = shippingCost + {{ $subtotal }};
                const formattedShippingCost = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(shippingCost);

                const formattedTotalPrice = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(totalPrice);

                shipping.html(formattedShippingCost)
                total.html(formattedTotalPrice)
                checkoutButton.removeAttr('disabled')
            })
        })
    </script>
@endsection
