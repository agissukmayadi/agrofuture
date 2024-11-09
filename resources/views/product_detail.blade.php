@extends('layout.index')

@section('content')
    <section class="w-full mt-16 md:pt-10  md:pb-20 bg-gray-100">
        <div class="container mx-auto flex flex-col md:flex-row px-4 lg:px-40 py-10 gap-10">
            <div id="default-carousel" class="relative w-full flex-1" data-carousel="slide">
                <div class="relative overflow-hidden rounded-lg aspect-square">
                    @foreach ($product->images as $image)
                        <div class="hidden duration-700 ease-in-out"
                            data-carousel-item="{{ $image->is_thumbnail == true ? 'active' : '' }}">
                            <img src="{{ asset('storage/img/products') . '/' . $image->name }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-4 w-full gap-5 mt-5">
                    @foreach ($product->images as $image)
                        <button type="button" aria-current="false" data-carousel-slide-to="{{ $loop->iteration - 1 }}"
                            class="indicator-carousel relative after:content-[''] after:absolute after:top-0 after:left-0 after:w-full after:h-full after:z-20 after:transition-all"><img
                                src=" {{ asset('storage/img/products') . '/' . $image->name }}" alt=""></button>
                    @endforeach
                </div>
            </div>
            <div class=" flex-1 flex flex-col gap-4">
                <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                <p>
                    {{ $product->description }}
                </p>
                <span class="text-xl font-semibold">Rp {{ number_format($product->price) }}</span>
                <span class="text-sm text-gray-600">Stock Available:
                    <strong>{{ !$product->deleted_at ? $product->stock : 0 }}</strong></span>
                @if ((auth()->check() && auth()->user()->role == 'customer') || auth()->guest())
                    <form class="flex gap-5 items-end" method="POST" action="{{ route('cart.store', $product->id) }}">
                        @csrf
                        <div class="max-w-xs">
                            <label for="quantity-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                quantity:</label>
                            <div class="relative flex items-center w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg h-10 disabled:cursor-not-allowed disabled:hover:bg-gray-100 "
                                    {{ $product->stock == 0 || $product->deleted_at || $product->deleted_at ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-minus p-3"></i>
                                </button>
                                <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1"
                                    data-input-counter-max="{{ $product->stock }}"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border-x-0  border-gray-300 h-10 text-center text-gray-900 text-sm block w-full py-2.5 focus:ring-0 focus:border-gray-300 disabled:cursor-not-allowed"
                                    placeholder="999" value="1" required name="quantity"
                                    {{ $product->stock == 0 || $product->deleted_at ? 'disabled' : '' }} />
                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg h-10 disabled:cursor-not-allowed disabled:hover:bg-gray-100 "
                                    {{ $product->stock == 0 || $product->deleted_at ? 'disabled' : '' }}>
                                    <i class="fa-solid fa-plus p-3"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-green-600/80 hover:bg-green-600 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:cursor-not-allowed disabled:hover:bg-green-600 {{ $product->stock == 0 ? 'opacity-50' : '' }}"
                            {{ $product->stock == 0 || $product->deleted_at ? 'disabled' : '' }}><i
                                class="fa-solid fa-cart-shopping text-white  mr-3 "></i>{{ $product->stock == 0 ? 'Out of stock' : 'Add to cart' }}</button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const indicator_carousel = $('.indicator-carousel');

            // Function to handle the addition of the class
            function handleAriaCurrentChange(mutationsList) {
                mutationsList.forEach(mutation => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'aria-current') {
                        const target = $(mutation.target);
                        if (target.attr('aria-current') === 'false') {
                            target.addClass(
                                'after:bg-black/50'
                            ); // Replace 'your-class-name' with the class you want to add
                        } else {
                            target.removeClass(
                                'after:bg-black/50'
                            ); // Optional: remove the class if aria-current is not true
                        }
                    }
                });
            }

            // Create an observer instance linked to the callback function
            const observer = new MutationObserver(handleAriaCurrentChange);

            // Start observing each indicator carousel element for attribute changes
            indicator_carousel.each(function() {
                observer.observe(this, {
                    attributes: true
                });
            });
        });
    </script>
@endsection
