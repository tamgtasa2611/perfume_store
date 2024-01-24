@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container-fluid p-0">
        <div class="ratio ratio-21x9 bg-dark position-relative">
            <video class="w-100 object-fit-cover opacity-75"
                   preload="auto" autoplay="true" loop="true" muted="true" playsinline="">
                <source src="https://mediastorage.livestory.io/armani/posts/orig/633aeb9057e272000b8b4dfe.mp4"
                        type="video/mp4">
            </video>
            <div
                class="position-absolute text-white fs-1 text-capitalize d-flex justify-content-center align-items-center">
                <span class="luxury-font home-text">Your Elegance, Our Passion</span>
            </div>
        </div>
    </div>

    <div class="container d-flex mt-5">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font home-product-text fade-left">
                ACQUA DI GIÒ PROFONDO
            </div>
            <div class="text-justify home-product-text fade-left">
                <p>
                    An intense, marine take on Acqua di Giò. More than just a simple fragrance: a captivating journey
                    into
                    the heart of the soul that encapsulates the values of freedom and sensuousness, revealing an even
                    deeper
                    dimension.
                    Like diving into the intense blue sea, the senses are invigorated by green tangerine and bergamot,
                    while
                    the iconic marine notes add a deeply aquatic touch that is almost icy. The rosemary, lavender,
                    cypress
                    and lentisk notes melt the heart, while notes of woody patchouli and enveloping musk meet the salty
                    hint
                    of mineral amber base notes, creating a very masculine, intense fragrance.
                </p>
            </div>
        </div>
        <div class="w-50 text-end">
            <img src="{{asset('images/perfume_2.webp')}}" class="w-75" alt="image1">
        </div>
    </div>

    <div class="container d-flex mt-5 flex-row-reverse">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font text-end home-product-text fade-right">
                ACQUA DI GIOIA
            </div>
            <div class="text-justify home-product-text fade-right">
                <p>
                    The scent of joy that combines happiness, serenity and optimism for a joyful emblematic
                    women's fragrance by Giorgio Armani. Feel the rhythm of the waves with a burst of acquatic freshness
                    and energy with primofiore lemon for a life lived to the fullest. Created with an amber woody base,
                    followed by notes of petalled white jasmine, cedar and brown sugar accord as deep, addictive and
                    inviting as the ocean. Inspired by the forms of nature, the organic bottle embodies Giorgio Armani's
                    aesthetic vision of essential elegance, with curved lines and sealed with an emerald green cap. This
                    fragrance is captured in a bottle that references the contemporary, authentic femininity that
                    inspires him. Created for the free-spirited, serene and optimistic woman who is in perfect harmony
                    with nature, with herself.
                </p>
            </div>
        </div>
        <div class="w-50 text-start">
            <img src="{{asset('images/perfume_1.webp')}}" class="w-75" alt="image2">
        </div>
    </div>

    @include('layouts/footer')
</x-layout>
