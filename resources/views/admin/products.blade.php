@extends('layout.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Products</h1>
    <div class="w-full bg-white p-5 shadow-md">
        <div class="flex lg:justify-end">
            <a href="{{ route('admin.products.create') }}"
                class="block w-full lg:w-fit bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-2 text-center mb-2">Create
                Product</a>
        </div>
        <form class="w-full flex flex-col gap-3 lg:flex-row lg:justify-between lg:items-center" method="GET"
            action="{{ route('admin.products') }}">
            <div class="relative">
                <button
                    class="flex w-full lg:w-44 px-4 justify-center gap-4 lg:justify-between items-center text-white bg-indigo-600 hover:bg-indigo-700 rounded font-medium py-3 text-sm"
                    type="button" id="dropdownCheckboxButton" data-dropdown-toggle="dropdownDefaultCheckbox">
                    <span class="block">Category</span> <i class="fa-solid fa-caret-down block"></i>
                </button>
                <div id="dropdownDefaultCheckbox"
                    class="z-10 hidden w-full bg-white divide-y divide-gray-100 rounded-lg shadow">
                    <ul class="p-3 space-y-3 text-sm text-gray-700 " aria-labelledby="dropdownCheckboxButton">
                        @foreach ($categories as $category)
                            <li>
                                <div class="flex items-center">
                                    <input id="category-{{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                                        name="category_id[]"
                                        class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                        @if (in_array($category->id, request('category_id', []))) checked @endif>
                                    <label for="category-{{ $category->id }}"
                                        class="ms-2 text-sm font-medium text-gray-900 ">{{ $category->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="relative w-full lg:w-[28rem]">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                </div>
                <input type="search" id="default-search" name="name"
                    class=" block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 "
                    placeholder="Search product" value="{{ request('name') }}" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-[5.5px] bg-indigo-600 hover:bg-indigo-700 font-medium rounded text-sm px-4 py-2">Search</button>
            </div>
        </form>
        @if (
            (request()->has('category_id') && !empty(request('category_id'))) ||
                (request()->has('name') && !empty(request('name'))))
            <div class="lg:flex lg:justify-end">
                <a href="{{ route('admin.products') }}"
                    class="text-gray-500 block w-full lg:w-[28rem] text-center hover:bg-light py-2 mt-2 text-sm"><i
                        class="fa-solid fa-xmark"></i> Clear
                    Filter</a>
            </div>
        @endif
        @if (session()->has('success'))
            <div id="alert"
                class="flex items-center p-4 my-4 text-green-800 rounded-lg bg-green-50 border border-green-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                    data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div id="alert" class="flex items-center p-4 my-4 text-red-800 rounded-lg bg-red-50 border border-red-600 "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 "
                    data-dismiss-target="#alert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-indigo-600 text-white ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Weight
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->weight }}g
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($product->price) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4 lg:space-x-2">
                                <a class="text-indigo-600 hover:text-indigo-800 hover:underline font-medium"
                                    href="{{ route('admin.products.edit', $product->id) }}">
                                    Edit
                                </a>
                                <button class="text-red-600 hover:text-red-800 hover:underline font-medium"
                                    data-modal-target="delete-product-modal" id="button-modal-delete-product"
                                    data-modal-toggle="delete-product-modal" type="button"
                                    data-product="{{ $product }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
    <div id="delete-product-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="delete-product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are
                        you sure you want to delete this product?</h3>
                    <a href="#" id="delete-product-link"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </a>
                    <button data-modal-hide="delete-product-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-modal-target="delete-product-modal"]').on('click', function() {
                const product = $(this).data('product');
                let deleteUrl = "{{ route('admin.products.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', product.id);
                $('#delete-product-link').attr('href', deleteUrl);
            })
        })
    </script>
@endsection
