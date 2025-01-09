@extends('admin.sidebar')

@section('container')
    <div class="max-w-screen-sm p-4 md:p-5 bg-white rounded-md">
        <h2 class="mb-6 font-semibold text-2xl text-gray-900">Create Barang</h2>
        <!-- Modal body -->
        <form action="/admin/barang/create" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    <input type="text" name="price" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                <!-- Discount -->
                <div>
                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount (%)</label>
                    <input type="number" name="discount" id="discount"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                </div>
                <!-- Image URL -->
                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end mt-4 pt-4 border-t">
                <a href="/admin/barang"
                    class="me-3 px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100">
                    Cancel
                </a>
                <button type="submit"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Save changes
                </button>
            </div>
        </form>
    </div>
@endsection
