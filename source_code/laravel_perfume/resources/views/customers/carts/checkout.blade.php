@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container d-flex align-items-center justify-content-between mt-5 min-vh-80 overflow-hidden">
        {{--        cart--}}
        <div class="w-70 d-flex justify-content-between flex-column">
            <div class="border bg-white w-100 rounded overflow-hidden">
a
            </div>
        </div>

        {{--        order summary--}}
        <div class="border w-25 bg-white rounded h-100">
a
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
