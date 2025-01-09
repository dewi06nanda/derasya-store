@extends('admin.sidebar')

@section('container')
    <div class="max-w-screen-sm p-4 md:p-5 bg-white rounded-md">
        <h2 class="mb-6 font-semibold text-2xl text-gray-900">Edit Barang</h2>
        <!-- Modal body -->
        <form action="/admin/barang/edit/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <input type="hidden" id="id" name="id" value="{{ $barang->id }}">
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name" value="{{ $barang->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    <input type="text" name="price" id="price" value="{{ $barang->price }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                <!-- Discount -->
                <div>
                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount (%)</label>
                    <input type="number" name="discount" id="discount" value="{{ $barang->discount }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ $barang->description }}</textarea>
                </div>
                <!-- Image URL -->
                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @if ($barang->image_url)
                        <img src="{{ asset($barang->image_url) }}" alt="Barang Image" class="mt-2 max-h-48">
                    @endif
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end mt-4 pt-4 border-t">
                <a href="/admin/barang"
                    class="me-3 px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100"
                    data-modal-hide="edit-barang-modal">Cancel</a>
                <button type="submit"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">Save
                    changes</button>
            </div>
        </form>
    </div>
@endsection
