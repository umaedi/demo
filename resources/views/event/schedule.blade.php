@extends('layouts.template')
@section('content')
        <!-- Header Start -->
        <header id="schedule-section-1" class="overflow-x-hidden">
   
            <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
                style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
                <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
                    <div class="header-title">
                        <h1 class="text-white text-2xl md:text-5xl">ICOMESH Schedule</h1>
                    </div>
                    <div class="text-xs md:text-base breadcrumbs text-white">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Event</li>
                            <li>Schedule</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
    
        <!-- Section 2 Start -->
        <section id="schedule-section-2">
            <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">
    
                <div data-aos="fade-up"
                    class="wrapper w-full h-40 md:h-80 lg:h-96 shadow-xl overflow-hidden group bg-fixed">
                    <img data-aos="fade-up"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                        src="{{ asset('dist/img/bg-about-event.jpg') }}" alt="About Event Poster">
                </div>
    
                <!-- 1st -->
                <div class="container px-2 flex flex-col gap-8 md:gap-12">
                    <h1 data-aos="fade-down"
                        class="uppercase text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">
                        Schedule
                    </h1>
    
                    <hr class="border-disabled">
                    <div class="flex flex-col gap-8">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Topics</th>
                                        <th>Moderator</th>
                                        <th>Speaker</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <td>Indonesian goverment policies in tackling and preventing malnutrition as an effort to prevent degenerative diseases</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>Malnutrition has been linked to various socioeconomic factors, including limited access to healthy foods and a general lack of awareness of healthy diets</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>Inflammation and aging in chronic and degenerative diseases: Current and future therapeutic strategies</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr class="bg-disabled">
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>The Molecullar Aspects of Early Detection and Interception of Cancer</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>Environmental pollution effects in pulmonary inflamation process: the role of cytokine in chronic respiratory problem</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>The substance/drug abuse resulted in a loss of healthy life</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 2 End -->
@endsection