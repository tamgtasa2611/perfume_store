<title>Scentvibe</title>
@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container-fluid p-0">
        <div class="ratio ratio-21x9 bg-dark position-relative">
            <video class="w-100 object-fit-cover fade-in opacity-75"
                   preload="auto" autoplay="true" loop="true" muted="true">
                <source src="https://mediastorage.livestory.io/armani/posts/orig/633aeb9057e272000b8b4dfe.mp4"
                        type="video/mp4">
            </video>
            <div
                class="position-absolute text-white fs-1 text-capitalize d-flex justify-content-center align-items-center">
                <span class="luxury-font fade-in fade-bottom">Your Elegance, Our Passion</span>
            </div>
        </div>
    </div>
    {{--  Products  --}}
    <div class="container d-flex mt-5">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font text-uppercase home-product-text fade-left">
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
            <img src="{{asset('images/perfume_2.webp')}}" class="w-75 fade-right fade-in" alt="image1">
        </div>
    </div>

    <div class="container d-flex mt-5 flex-row-reverse">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font text-uppercase text-end home-product-text fade-right">
                VELVET DESERT OUD EAU DE PARFUM
            </div>
            <div class="text-justify home-product-text fade-right">
                <p>
                    The mystic power of the wind blowing across the desert dunes, captured in a fragrance which effuses
                    incense and oud: Dolce&Gabbana Velvet Desert Oud, a precious and rare fragrance in the Velvet
                    Collection, is the quintessence of mystery and seduction.
                    Dark and mysterious, Dolce&Gabbana Velvet Desert Oud tells a tale of opulence and seduction,
                    unfolding among notes of tobacco, saffron, and dark woods. A fragrance crafted from the finest
                    ingredients, in a blend where East meets West.
                    Part of the exclusive Dolce&Gabbana Velvet Collection, luxury fragrances embroidered on lush velvet,
                    offering an invitation to discover and explore the brand's creative vision. An intimate and
                    authentic voyage expressed through our Designers' olfactive memories and their love for Italy.
                </p>
            </div>
        </div>
        <div class="w-50 text-start">
            <img src="{{asset('images/perfume_3.jpg')}}" class="w-75 fade-left fade-in" alt="image2">
        </div>
    </div>

    <div class="container d-flex mt-5">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font text-uppercase home-product-text fade-left">
                ACQUA DI GIOIA
            </div>
            <div class="text-justify home-product-text fade-left">
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
        <div class="w-50 text-end">
            <img src="{{asset('images/perfume_1.webp')}}" class="w-75 fade-right fade-in" alt="image1">
        </div>
    </div>

    <div class="container d-flex mt-5 flex-row-reverse">
        <div class="w-50 d-flex flex-column justify-content-center">
            <div class="fs-1 luxury-font text-uppercase text-end home-product-text fade-right">
                SAUVAGE Parfum
            </div>
            <div class="text-justify home-product-text fade-right">
                <p>
                    Sauvage Parfum is a highly concentrated interpretation of Sauvage with an extreme freshness bathed
                    in
                    warm oriental tones and an animal beauty that comes to life on the skin.
                    To compose Sauvage Parfum, François Demachy, Dior Perfumer-Creator, drew inspiration from a wild,
                    unspoiled expanse beneath a blue-tinged night sky, as the intense aromas of a crackling fire rise
                    into the air. Its trail unfurls notes of Mandarin, Tonka Bean and Sandalwood.
                </p>
            </div>
        </div>
        <div class="w-50 text-start">
            <img src="{{asset('images/perfume_4.avif')}}" class="w-75 fade-left fade-in" alt="image2">
        </div>
    </div>
    {{--  End Products  --}}

    <div class="container-fluid p-0 mt-5">
        <div class="ratio ratio-21x9 bg-dark position-relative">
            <img src="{{asset('images/home.jpg')}}" class="w-100 opacity-75 object-fit-cover" alt="">
            <div
                class="position-absolute text-white d-flex justify-content-center align-items-center">
                <div class="container d-flex justify-content-between fade-in fade-bottom">
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-truck fs-2 p-2"></i>
                        <div class="text-uppercase">FREE SHIPPING AND RETURNS</div>
                        <p>Safety and easiness guaranteed on your shopping</p>
                    </div>
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-chat-dots fs-2 p-2"></i>
                        <div class="text-uppercase">ONLINE CLIENT ADVISOR</div>
                        <p>Our Client Advisors will guide you through a personalized shopping experience</p>
                    </div>
                    <div class="w-25 text-center d-flex justify-content-center align-items-center flex-column">
                        <i class="bi bi-gift fs-2 p-2"></i>
                        <div class="text-uppercase">GIFT BOX AVAILABLE</div>
                        <p>Free and customizable gift box for your loved one</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/scroll_to_top')
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/home.js')}}"></script>
