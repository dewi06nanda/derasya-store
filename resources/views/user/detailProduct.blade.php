@extends('user.navbar')

@section('container')
    <section class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Detail Products</h2>
        <div class="flex gap-8">
            <div class="w-[30%]"><img src="{{ $barang->image_url }}" alt="" class="h-80 w-80 object-cover"></div>
            <div class="w-[70%]">
                <h3 class="text-2xl font-semibold">{{ $barang->name }}</h3>
                @if ($barang->discount)
                    <div class="flex gap-3">
                        <p class="text-gray-800 mt-2 text-xl font-semibold">
                            Rp{{ $barang->price - ($barang->price * $barang->discount) / 100 }}</p>
                        <p class="text-gray-600 mt-2 line-through">Rp{{ $barang->price }}</p>
                    </div>
                @else
                    <p class="text-gray-800 mt-2 text-xl font-semibold">Rp{{ $barang->price }}</p>
                @endif
                <p class="pt-4 text-gray-500">{{ $barang->description }}</p>
                <div class="w-full">
                    <a href="https://wa.me/6282335183534?text=Halo saya ingin memesan {{ $barang->name }}">
                        <button
                            class="mt-10 w-fit px-8 text-white font-semibold border border-gray-200 bg-green-600
                         py-2 rounded-md">
                            Pesan sekarang
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="max-w-7xl mx-auto py-8">
            <h2 class="text-2xl font-bold mb-6">Lihat produk lainya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($barangs as $barang)
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-hidden relative">
                        @if ($barang->discount)
                            <span
                                class="absolute top-4 left-4 bg-red-600 p-2 text-white font-semibold rounded-full">{{ $barang->discount }}%</span>
                        @endif
                        <img src="http://127.0.0.1:8000{{ $barang->image_url }}" alt="Product {{ $barang->id }}"
                            class="w-full h-48 rounded-md object-contain bg-gray-100">
                        <div class="pt-2">
                            <h3 class="text-lg font-semibold">{{ $barang->name }}</h3>
                            @if ($barang->discount)
                                <div class="flex gap-3">
                                    <p class="text-gray-600 mt-2 font-semibold">
                                        Rp{{ $barang->price - ($barang->price * $barang->discount) / 100 }}</p>
                                    <p class="text-gray-600 mt-2 line-through">Rp{{ $barang->price }}</p>
                                </div>
                            @else
                                <p class="text-gray-600 mt-2">Rp{{ $barang->price }}</p>
                            @endif
                            <a href="{{ url('/product/' . $barang->id) }}">
                                <button
                                    class="mt-4 w-full border-2 border-gray-500 text-gray-600 py-2 rounded-md hover:bg-gray-600 hover:text-white hover:font-semibold transition duration-300">Detail</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
