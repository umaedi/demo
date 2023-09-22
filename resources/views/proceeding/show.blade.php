@extends('layouts.template')
@section('content')
<!-- Header Start -->
<header id="proceeding-detail-section-1" class="overflow-x-hidden">
    <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
        style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
        <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
            <div class="header-title">
                <h1 class="text-white text-md md:text-3xl">e-Proceeding Topic 1 : Biomolecular</h1>
            </div>
            <div class="text-xs md:text-base breadcrumbs text-white">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/proceeding">Proceeding</a></li>
                    <li><a href="/proceeding/show">e-Proceeding The 1st ICOMESH 2023</a></li>
                    <li>Topic 1 : Biomolecular</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Section 2 Start -->
<section data-aos="fade-down" id="proceeding-detail-section-2">
    <div class="container px-2 lg:px-52 py-10 md:py-16">
        <!-- 3rd Content - Full Paper -->
        <div class="wrapper flex flex-col gap-5">
            <p class="font-semibold text-primary text-xl md:text-2xl mb-2">Topic 1 : Biomolecular</p>
            <div class="-mt-3">
                <table class="table table-auto table-zebra text-sm md:text-base text-mydark">
                    <!-- head -->
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="flex justify-between items-center">
                                <div class="wrapper text-mydark flex flex-col gap-2">
                                    <p class="font-semibold text-base md:text-lg">
                                        <a href="./proceeding-detail-full-paper-view.html">
                                            Paper Title
                                        </a>
                                    </p>
                                    <p>Author 1, Author 2, Author 3</p>
                                </div>
                                <a href="./../docs/ICOMESH_2023_Full_Paper.pdf">
                                    <button type="button"
                                        class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                        Download
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between items-center">
                                <div class="wrapper text-mydark flex flex-col gap-2">
                                    <p class="font-semibold text-base md:text-lg">
                                        <a href="./proceeding-detail-full-paper-view.html">
                                            Paper Title
                                        </a>
                                    </p>
                                    <p>Author 1, Author 2, Author 3</p>
                                </div>
                                <a href="./../docs/ICOMESH_2023_Full_Paper.pdf">
                                    <button type="button"
                                        class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                        Download
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between items-center">
                                <div class="wrapper text-mydark flex flex-col gap-2">
                                    <p class="font-semibold text-base md:text-lg">
                                        <a href="./proceeding-detail-full-paper-view.html">
                                            Paper Title
                                        </a>
                                    </p>
                                    <p>Author 1, Author 2, Author 3</p>
                                </div>
                                <a href="./../docs/ICOMESH_2023_Full_Paper.pdf">
                                    <button type="button"
                                        class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                        Download
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between items-center">
                                <div class="wrapper text-mydark flex flex-col gap-2">
                                    <p class="font-semibold text-base md:text-lg">
                                        <a href="./proceeding-detail-full-paper-view.html">
                                            Paper Title
                                        </a>
                                    </p>
                                    <p>Author 1, Author 2, Author 3</p>
                                </div>
                                <a href="./../docs/ICOMESH_2023_Full_Paper.pdf">
                                    <button type="button"
                                        class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                        Download
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="flex justify-between items-center">
                                <div class="wrapper text-mydark flex flex-col gap-2">
                                    <p class="font-semibold text-base md:text-lg">
                                        <a href="./proceeding-detail-full-paper-view.html">
                                            Paper Title
                                        </a>
                                    </p>
                                    <p>Author 1, Author 2, Author 3</p>
                                </div>
                                <a href="./../docs/ICOMESH_2023_Full_Paper.pdf">
                                    <button type="button"
                                        class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                        Download
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Section 2 End -->
@endsection