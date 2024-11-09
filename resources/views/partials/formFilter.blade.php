<form class="w-full" method="GET" action="{{ route('products') }}">
    <div>
        <label class="font-medium">Product : </label>
        <div class="relative mt-2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="default-search" name="product"
                class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-600 focus:border-green-600"
                placeholder="Search Product" autocomplete="off" value="{{ request('product') }}" />
        </div>
    </div>
    <div class="mt-6">
        <label class="font-medium">Category : </label>
        <div class="mt-2">
            @foreach ($categories as $category)
                <div class="flex items-center mb-3">
                    <input id="{{ $category->id }}" name="category[]" type="checkbox" value="{{ $category->slug }}"
                        class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        @if (in_array($category->slug, request('category', []))) checked @endif>
                    <label for="{{ $category->id }}"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
    @if (!empty(request('category')) || !empty(request('product')))
        <a href="{{ route('products') }}"
            class="text-center flex items-center text-sm w-full justify-center gap-2">Clear
            All <i class="fa-solid fa-xmark"></i></a>
    @endif
    <button type="submit"
        class="w-full bg-green-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-green-600/80">Apply</button>
</form>
