@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    @foreach($products as $product)
        <div>
            {{$product->id}}

            {{$product->price}}
        </div>
    @endforeach
    @include('layouts/footer')
</x-layout>
