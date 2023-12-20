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
                         <li>e-Proceeding The 1st ICOMESH 2023</li>
                     </ul>
                 </div>
             </div>
         </div>
     </header>
     <!-- Header End -->
 
     <!-- Section 2 Start -->
     <section id="proceeding-detail-section-2">
         <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">
 
             <!-- 1st -->
             <div data-aos="fade-down" class="container lg:px-52 flex flex-col gap-16 md:gap-20">
 
                 <!-- 1st Content -->
                 <div class="wrapper flex flex-col gap-5">
                     <hr class="border-disabled">
                     <div class="wrapper flex flex-col md:flex-row gap-10">
 
                         <div class="wrapper flex justify-center">
                             <!-- Card -->
                             <div
                                 class="w-[220px] lg:w-[260px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                                 <div class="card-img w-full h-[300px] lg:h-[340px] overflow-hidden">
                                     <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                                         src="{{ asset('dist/img/proceeding-cover-2023.png') }}" alt="photo of the speaker">
                                 </div>
                             </div>
                         </div>
 
                         <!-- Text -->
                         <div class="wrapper flex flex-col gap-5">
                             <h1 class="text-lg md:text-2xl font-semibold text-mydark md:text-left">
                                 The 1st ICOMESH 2023
                             </h1>
                             <p class="text-sm md:text-base text-mydark">Topic: <br>
                                 Biomolecular, Genetic, and Degenerative Desease
                             </p>
                             <div class="wrapper">
                                 <table class="table text-sm md:text-base text-mydark">
                                     <!-- head -->
                                     <thead>
                                         <tr>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <!-- row 1 -->
                                         <tr>
                                             <td>Date</td>
                                             <td>: 28<sup>th</sup> - 29<sup>th</sup> November 2023</td>
                                         </tr>
                                         <!-- row 2 -->
                                         <tr>
                                             <td>Venue</td>
                                             <td>: Swiss-Belhotel, Lampung, Indonesia</td>
                                         </tr>
                                         <!-- row 3 -->
                                         <tr>
                                             <td>E-ISBN</td>
                                             <td>: xxx-xxx-xxxxx-x-x</td>
                                         </tr>
                                         <tr>
                                             <th></th>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <hr class="border-disabled">
                 </div>
 
                 <!-- 2nd Content - General -->
                 <div class="wrapper flex flex-col gap-5">
                     <p class="font-semibold text-primary text-xl md:text-2xl mb-2">General</p>
                     <div class="wrapper flex flex-col gap-2">
                         <hr class="border-disabled">
                         <div class="wrapper flex justify-between">
                             <p class="text-sm md:text-base text-mydark">Cover</p>
                             <a href="{{ asset('dist/docs/ICOMESH_2023_Cover.pdf') }}">
                                 <button type="button"
                                     class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                     Download
                                 </button>
                             </a>
                         </div>
                         <hr class="border-disabled">
                         <div class="wrapper flex justify-between">
                             <p class="text-sm md:text-base text-mydark">Preface</p>
                             <a href="{{ asset('dist/docs/ICOMESH_2023_Preface.pdf') }}">
                                 <button type="button"
                                     class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                     Download
                                 </button>
                             </a>
                         </div>
                         <hr class="border-disabled">
                         <div class="wrapper flex justify-between">
                             <p class="text-sm md:text-base text-mydark">Table of Content</p>
                             <a href="{{ asset('dist/docs/ICOMESH_2023_Table_of_Content.pdf') }}">
                                 <button type="button"
                                     class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                     Download
                                 </button>
                             </a>
                         </div>
                         <hr class="border-disabled">
                         <div class="wrapper flex justify-between">
                            <p class="text-sm md:text-base text-mydark">Full e-Proceeding Document</p>
                            <a href="{{ asset('dist/docs/ICOMESH_2023_Table_of_Content.pdf') }}">
                                <button type="button"
                                    class="py-1 px-3 shadow-sm inline-flex justify-center rounded-md font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Download
                                </button>
                            </a>
                        </div>
                        <hr class="border-disabled">
                     </div>
                 </div>
 
                 <!-- 3rd Content - Full Paper -->
                 <div class="wrapper flex flex-col gap-5">
                     <p class="font-semibold text-primary text-xl md:text-2xl mb-2">Full Paper</p>
                     <div class="-mt-3">
                         <table class="table table-zebra text-sm md:text-base text-mydark">
                             <!-- head -->
                             <thead>
                                 <tr>
                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- row 1 -->
                                 <tr>
                                     <td>
                                         <a href="/proceeding/topic1" class="block">
                                             Topic 1 : Biomolecular
                                         </a>
                                     </td>
                                 </tr>
                                 <!-- row 2 -->
                                 <tr>
                                     <td>
                                        {{-- <a href="/proceeding/topic2" class="block"> --}}
                                            Topic 2 :
                                             Genetic
                                            {{-- </a> --}}
                                        </td>
                                 </tr>
                                 <!-- row 3 -->
                                 <tr>
                                     <td>
                                        {{-- <a href="/proceeding/topic3" class="block"> --}}
                                            Topic 3 :
                                             Degenerative
                                             Desease
                                            {{-- </a> --}}
                                        </td>
                                 </tr>
                                 <tr></tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Section 2 End -->
@endsection