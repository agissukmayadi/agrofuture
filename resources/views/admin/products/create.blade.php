@extends('layout.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-5">Products</h1>
    <div class="w-full bg-white p-5 shadow-md">
        <h3 class="text-lg font-bold mb-2">Create new product</h3>
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 col-span-1 lg:grid-cols-2 lg:gap-6">
                <div class="lg:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                        placeholder="Type product name" required value="{{ old('name') }}">
                    @error('name')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select id="category_id" name="category_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                        <option disabled selected>Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    <input type="number" name="price" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                        placeholder="Rp.0" required min="0" value="{{ old('price') }}">
                    @error('price')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">Weight (gram)</label>
                    <input type="number" name="weight" id="weight"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                        placeholder="0" required min="0" value="{{ old('weight') }}">
                    @error('weight')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                        placeholder="0" required min="0" value="{{ old('stock') }}" required>
                    @error('stock')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="lg:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                    <textarea id="description" name="description" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 "
                        placeholder="Your description here" required>{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                </div>
                <div class="lg:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image_thumbnail">Image
                        Thumbnail</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                        id="image_thumbnail" name="image_thumbnail" type="file" accept="image/*" required>
                    <p class="mt-1 text-xs text-gray-500 ml-2">PNG, JPG, JPEG (MAX. 2MB). Ratio 1:1, Min. Width : 600px,
                        Min. Height : 600px</p>
                    @error('image_thumbnail')
                        <small class="text-red-500 ml-2">{{ $message }}</small>
                    @enderror
                    <div id="preview_thumbnail" class="mt-4 grid grid-cols-4 lg:grid-cols-6 gap-4">
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Images</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                        id="images" name="images[]" type="file" multiple accept="image/*" required>
                    <p class="mt-1 text-xs text-gray-500 ml-2">PNG, JPG, JPEG (MAX. 2MB). Ratio 1:1, Min. Width : 600px,
                        Min. Height : 600px </p>
                    @foreach ($errors->get('images.*') as $messages)
                        @foreach ($messages as $message)
                            <small class="text-red-500 ml-2">{{ $message }}</small><br>
                        @endforeach
                    @endforeach
                    <div id="preview" class="mt-4 grid grid-cols-4 lg:grid-cols-6 gap-4">
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col lg:flex-row lg:justify-between lg:items-center">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 lg:mt-6 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-indigo-200 hover:bg-indigo-800">
                    Add product
                </button>
                <a href="{{ route('admin.products') }}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 lg:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 hover:bg-red-800">
                    Back
                </a>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Preview for multiple images
            $('#images').on('change', function() {
                $('#preview').empty();

                let files = this.files;

                if (files.length > 0) {
                    $.each(files, function(index, file) {
                        let reader = new FileReader();

                        reader.onload = function(e) {
                            let img = $('<img />', {
                                'src': e.target.result,
                                'class': 'w-full h-auto rounded-lg shadow-md hover:scale-105 transition-all'
                            });
                            $('#preview').append(img);
                        };

                        reader.readAsDataURL(file);
                    });
                }
            });

            // Preview for image thumbnail
            $('#image_thumbnail').on('change', function() {
                $('#preview_thumbnail').empty();

                let file = this.files[0];

                if (file) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        let img = $('<img />', {
                            'src': e.target.result,
                            'class': 'w-full h-auto rounded-lg shadow-md hover:scale-105 transition-all'
                        });
                        $('#preview_thumbnail').append(img);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
