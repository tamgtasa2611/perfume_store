<title>Discover</title>
@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container-fluid p-0 position-relative d-flex align-items-center justify-content-start">
        <img src="{{asset('images/discover_1.webp')}}" class="w-100 object-fit-cover" alt="">
        <div
            class="d-flex justify-content-center align-items-center flex-column w-50 position-absolute">
            <div class="luxury-font fs-1">Best Seller</div>
            <div>Find out the perfect gift that people love</div>
            <div class="mt-3">
                <a href="{{route('product')}}"
                   class="btn btn-outline-dark rounded-0 text-decoration-none">Discover</a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mt-5 position-relative d-flex align-items-center justify-content-end">
        <img src="{{asset('images/discover_2.webp')}}" class="w-100 object-fit-cover" alt="">
        <div
            class="d-flex justify-content-center align-items-center flex-column w-50 position-absolute">
            <div class="luxury-font fs-1">Lunar New Year</div>
            <div>Explore what's new in the Year of the Dragon's collection</div>
            <div class="mt-3">
                <a href="{{route('product')}}"
                   class="btn btn-outline-dark rounded-0 text-decoration-none">Discover</a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mt-5 position-relative d-flex align-items-center justify-content-start">
        <img src="{{asset('images/discover_3.png')}}" class="w-100 object-fit-cover" alt="">
        <div
            class="d-flex justify-content-center align-items-center flex-column w-50 position-absolute">
            <div class="luxury-font fs-1">Men's Perfumes</div>
            <div>Collection of the most seductive scents for gentlemen</div>
            <div class="mt-3">
                <a href="{{route('product')}}"
                   class="btn btn-outline-dark rounded-0 text-decoration-none">Discover</a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mt-5 position-relative d-flex align-items-center justify-content-end">
        <img src="{{asset('images/discover_4.png')}}" class="w-100 object-fit-cover" alt="">
        <div
            class="d-flex justify-content-center align-items-center flex-column w-50 position-absolute">
            <div class="luxury-font fs-1">Women's Perfumes</div>
            <div>The precious gift of nature: a promise of happiness endlessly renewed</div>
            <div class="mt-3">
                <a href="{{route('product')}}"
                   class="btn btn-outline-dark rounded-0 text-decoration-none">Discover</a>
            </div>
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/home.js')}}"></script>
