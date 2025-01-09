@extends('user.navbar')

@section('container')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://marketplace.canva.com/EAFoEJMTGiI/1/0/1600w/canva-beige-aesthetic-new-arrival-fashion-banner-landscape-cNjAcBMeF9s.jpg"
                    alt="Banner 1" class="w-full h-[600px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="https://marketplace.canva.com/EAFHG6sbLsQ/1/0/1600w/canva-brown-beige-simple-special-sale-banner-lQfPvhnznqs.jpg"
                    alt="Banner 2" class="w-full h-[600px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="https://d3jmn01ri1fzgl.cloudfront.net/photoadking/webp_thumbnail/shark-new-collection-sale-clothing-banner-template-p3ztild89dffd0.webp"
                    alt="Banner 3" class="w-full h-[600px] object-cover">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <section class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Trending Products</h2>
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
        <div class="text-center w-full">
            <a href="/product">
                <button class="mt-10 w-fit px-8 bg-white text-gray-900 border border-gray-200 py-2 rounded-md">
                    Lihat semua
                </button>
            </a>
        </div>
    </section>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">Testimoni</h2>
                <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl">Ini kata mereka yang telah menggunakan Deresya
                    Store</p>
            </div>
            <div class="grid mb-8 lg:mb-12 lg:grid-cols-3">
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500">
                        <h3 class="text-lg font-semibold text-gray-900">Web ini memudahkan saya untuk melakukan perbelanjaan
                        </h3>
                        <p class="my-4">"Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ea laboriosam
                            quam, molestias voluptatum ratione. Natus temporibus voluptatibus ipsam.</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium text-left">
                            <div>Bonnie Green</div>
                            <div class="text-sm font-light text-gray-500">Developer at Open AI</div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500">
                        <h3 class="text-lg font-semibold text-gray-900">Web ini memudahkan saya untuk melakukan perbelanjaan
                        </h3>
                        <p class="my-4">"Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ea laboriosam
                            quam, molestias voluptatum ratione. Natus temporibus voluptatibus ipsam.</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium text-left">
                            <div>Bonnie Green</div>
                            <div class="text-sm font-light text-gray-500">Developer at Open AI</div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500">
                        <h3 class="text-lg font-semibold text-gray-900">Web ini memudahkan saya untuk melakukan perbelanjaan
                        </h3>
                        <p class="my-4">"Lorem ipsum dolor sit amet consectetur adipisicing elit. At illum ea laboriosam
                            quam, molestias voluptatum ratione. Natus temporibus voluptatibus ipsam.</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium text-left">
                            <div>Bonnie Green</div>
                            <div class="text-sm font-light text-gray-500">Developer at Open AI</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
    </section>
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
        });
    </script>
@endsection
