@extends('layouts.template')
@section('content')
<header id="proceeding-section-1" class="overflow-x-hidden">
        <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
            style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
            <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
                <div class="header-title">
                    <h1 class="text-white text-2xl md:text-5xl">Proceeding</h1>
                </div>
                <div class="text-xs md:text-base breadcrumbs text-white">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Proceeding</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Section 2 Start -->
    <section id="proceeding-section-2">
        <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">

            <div class="container lg:px-52 flex flex-col gap-8 md:gap-12">
                <!-- Title -->
                <h1 data-aos="fade-down" class="text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">
                    e-Proceeding
                </h1>

                <hr class="border-disabled">

                <!-- e-Proceeding -->
                <div data-aos="fade-down" class="wrapper flex flex-wrap gap-8 justify-center md:justify-between">
                    <!-- Card -->
                    <a href="/proceeding/show">
                        <div class="w-[220px] lg:w-[260px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                            <div class="card-img w-full h-[300px] lg:h-[340px] overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                                    src="{{ asset('dist/img/proceeding-cover-2023.png') }}" alt="photo of the speaker">
                            </div>
                            <p class="font-bold text-mydark text-base md:text-lg py-3 text-center">Volume XX No.XX</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </section>
        <!-- Section 2 End -->
@endsection