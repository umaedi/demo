@extends('layouts.template')
@section('content')
<!-- Header Start -->
<header id="icomesh-2023-section-1" class="overflow-x-hidden">
    <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
        style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
        <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
            <div class="header-title">
                <h1 class="text-white text-2xl md:text-5xl">ICOMESH</h1>
            </div>
            <div class="text-xs md:text-base breadcrumbs text-white">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>ICOMESH</li>
                    <li>ICOMESH 2023</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Section 2 Start -->
<section id="call-for-papers-section-2">
    <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">

        <!-- 1st -->
        <div class="container lg:px-52 flex flex-col gap-8 md:gap-12">
            <h1 data-aos="fade-down" class="text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">
                The 1st ICOMESH
            </h1>

            <hr class="border-disabled">

            <!-- Symposium -->
            <!-- <div class="flex flex-col gap-8">
                <div class="text-mydark">
                    <p class="font-semibold text-primary text-base md:text-lg mb-2">Symposium</p>
                    <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                        <li>Grace Mange</li>
                        <li>dr. Arif Suriawinata, Ph.D.</li>
                        <li>dr. Rusdy Mauleka, Ph.D, Sp.S</li>
                        <li>Dr. Lisa Barrett</li>
                    </ol>
                </div>
            </div> -->

            <!-- Workshop -->
            <!-- <div class="flex flex-col gap-8">
                <div class="text-mydark">
                    <p class="font-semibold text-primary text-base md:text-lg mb-2">Workshop</p>
                    <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                        <li>Grace Mange</li>
                        <li>dr. Arif Suriawinata, Ph.D.</li>
                        <li>dr. Rusdy Mauleka, Ph.D, Sp.S</li>
                        <li>Dr. Lisa Barrett</li>
                    </ol>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- Section 2 End -->
@endsection