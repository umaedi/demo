@extends('layouts.template')
@section('content')
   <!-- Header Start -->
   <header id="proceeding-detail-section-1" class="overflow-x-hidden">

    <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
        style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
        <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
            <div class="header-title">
                <h1 class="text-white text-md md:text-3xl">e-Proceeding The 1st ICOMESH 2023</h1>
            </div>
            <div class="text-xs md:text-base breadcrumbs text-white">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/proceeding">Proceeding</a></li>
                    <li><a href="/proceeding/show">e-Proceeding The 1st ICOMESH 2023</a></li>
                    <li>Full Paper View</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Section 2 Start -->
<section data-aos="fade-down" id="proceeding-detail-section-2">
    <div class="container px-2 lg:px-52 py-10 md:py-16">
        <object data="{{ asset('dist/docs/ICOMESH_2023_Full_Paper.pdf') }}" type="application/pdf" width="100%" height="800px"
            aria-labelledby="PDF document">
            <p class="text-mydark text-sm">
                Your browser doesn't support to view this type of file. <br> Please use desktop to view the pdf or
                <a href="{{ asset('dist/docs/ICOMESH_2023_Full_Paper.pdf') }}">Download the PDF</a>
            </p>
        </object>
    </div>
</section>
<!-- Section 2 End -->
@endsection