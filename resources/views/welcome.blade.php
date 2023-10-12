@extends('layouts.template')
@section('content')
    <!-- Header Start -->
    <header id="home-section-1" class="overflow-x-hidden">
        <!-- Navbar Start -->
        @include('layouts.front.navbar')
        <!-- Navbar End -->
        <!-- Hero -->
        <div
            class="home-hero w-full bg-[url('/dist/img/bg-home-hero.png')] md:h-3/4 lg:min-h-screen bg-cover bg-fixed py-10" loading="lazy">
            <div class="wrapper flex flex-col gap-10 w-full h-full justify-center">
                <div class="container px-2 pt-32 ">
                    <div class="hero-title-1 w-full lg:w-1/2 flex flex-col gap-3" data-aos="fade-up">
                        <p class="text-primary text-base md:text-base">New Event 2023</p>
                        <h1 class="text-black uppercase font-bold text-3xl sm:text-5xl">INTERNATIONAL
                            CONFERENCE ON
                            MEDICAL SCIENCE AND
                            HEALTH (ICOMESH)</h1>
                        <h3 class="text-mydark text-base lg:text-2xl">Topic : Biomolecular, Genetic, and Degenerative
                            Desease
                        </h3>
                        <div class="mt-5 lg:mt-10 flex flex-wrap gap-5 lg:gap-10">
                            <a href="/register">
                                <button type="button"
                                    class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Register Now
                                    <div class="ms-2 badge badge-warning text-mydark text-xs lg:text-base">FREE</div>
                                </button>
                            </a>
                            <a href="{{ asset('dist') }}/docs/ICOMESH_2023_Template.docx">
                                <button type="button"
                                    class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Download Template
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wrapper flex justify-end">
                    <div class="hero-title-2 px-5 py-3 w-8/12 flex flex-col gap-1 md:w-3/12 rounded-tl-xl rounded-bl-xl bg-mydark/[.3] backdrop-blur-sm"
                        data-aos="fade-left">
                        <p class="text-xs lg:text-sm text-white">HETI Project</p>
                        <p class="text-xs lg:text-sm text-white">University of Lampung</p>
                        <hr class="w-full text-disabled">
                        <p class="text-xs lg:text-sm text-white">Bandar Lampung</p>
                        <p class="text-xs lg:text-sm text-white">28 - 29 November 2023</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Section 2 Start-->
    <section id="home-section-2" class="lg:min-h-screen md:h-min overflow-x-hidden">
        <div class="container px-2 py-10 h-full w-full md:flex md:flex-col md:gap-10 lg:flex lg:flex-row lg:gap-0">

            <!-- Images -->
            <div data-aos="fade-right" class="left-content lg:w-1/2 gap-3 hidden md:flex md:h-[400px] lg:h-[600px]">
                <div class="md:w-full md:h-full flex flex-col gap-3">
                    <div class="w-full h-full bg-cover rounded-lg shadow-lg hover:shadow-2xl"
                        style="background-image: url({{ asset('dist') }}/img/bg-about-event-home-1.jpg);" loading="lazy"></div>
                    <div class="w-full h-full bg-cover rounded-lg shadow-lg hover:shadow-2xl"
                        style="background-image: url({{ asset('dist') }}/img/bg-about-event-home-2.jpg);" loading="lazy"></div>
                </div>
                <div class="w-full h-full bg-cover rounded-lg shadow-lg hover:shadow-2xl"
                    style="background-image: url({{ asset('dist') }}/img/bg-about-event-home-3.jpg);" loading="lazy">
                </div>
            </div>

            <!-- Text -->
            <div data-aos="fade-left"
                class="right-content md:px-28 lg:px-0 lg:w-1/2 lg:h-[600px] lg:pl-3 flex flex-col gap-3 overflow-scroll">
                <div class="flex flex-col gap-1">
                    <p class="uppercase text-primary text-xs lg:text-base font-semibold">about event</p>
                    <h1 class="uppercase text-mydark font-bold text-3xl md:text-5xl">welcome to the
                        international conference</h1>
                </div>
                <div>
                    <p class="text-base text-mydark text-justify">
                        International Conference are a means for lecturers to increase their knowledge and develop their
                        knowledge through international publications. The HETI Project University of Lampung is a
                        project funded by the Asian Development Bank's foreign aid. One of the activities in this
                        project is Capacity Building. The capacity building program includes international conference.
                        <br><br>
                        This International Conference took the topic Biomolecular, Genetic, and Degenerative Disease.
                        This
                        topic is in accordance with one of the service excellence in the teaching hospital RSPTN
                        University of Lampung project which is the HETI Project University of Lampung. This topic was
                        also taken because it corresponds to the number of cases of non-communicable diseases caused by
                        genetic and degenerative changes in Indonesia.
                    </p>
                </div>
                <div>
                    <a href="/about"
                        class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 2 End -->

    <!-- Section 3 Start -->
    <section id="home-section-3" class="w-full pt-10 pb-10 bg-fixed overflow-x-hidden"
        style="background-image: url({{ asset('dist') }}/img/bg-section-3-home.png);">
        <div data-aos="flip-down"
            class="container flex flex-wrap justify-center md:justify-between gap-10 md:gap-0 w-full">

            <!-- 1st Card -->
            <div class="flex flex-col items-center gap-1 w-[150px] lg:w-[180px] text-center justify-between">
                <svg class="w-8 md:w-12 lg:w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81 80" fill="none">
                    <path
                        d="M40.5 33.3333C44.0362 33.3333 47.4276 31.9285 49.9281 29.428C52.4286 26.9276 53.8333 23.5362 53.8333 20C53.8333 16.4637 52.4286 13.0724 49.9281 10.5719C47.4276 8.07138 44.0362 6.66663 40.5 6.66663C36.9638 6.66663 33.5724 8.07138 31.0719 10.5719C28.5714 13.0724 27.1667 16.4637 27.1667 20C27.1667 23.5362 28.5714 26.9276 31.0719 29.428C33.5724 31.9285 36.9638 33.3333 40.5 33.3333ZM18.8333 43.3333C21.0435 43.3333 23.1631 42.4553 24.7259 40.8925C26.2887 39.3297 27.1667 37.2101 27.1667 35C27.1667 32.7898 26.2887 30.6702 24.7259 29.1074C23.1631 27.5446 21.0435 26.6666 18.8333 26.6666C16.6232 26.6666 14.5036 27.5446 12.9408 29.1074C11.378 30.6702 10.5 32.7898 10.5 35C10.5 37.2101 11.378 39.3297 12.9408 40.8925C14.5036 42.4553 16.6232 43.3333 18.8333 43.3333ZM70.5 35C70.5 37.2101 69.622 39.3297 68.0592 40.8925C66.4964 42.4553 64.3768 43.3333 62.1667 43.3333C59.9565 43.3333 57.8369 42.4553 56.2741 40.8925C54.7113 39.3297 53.8333 37.2101 53.8333 35C53.8333 32.7898 54.7113 30.6702 56.2741 29.1074C57.8369 27.5446 59.9565 26.6666 62.1667 26.6666C64.3768 26.6666 66.4964 27.5446 68.0592 29.1074C69.622 30.6702 70.5 32.7898 70.5 35ZM40.5 36.6666C44.9203 36.6666 49.1595 38.4226 52.2851 41.5482C55.4107 44.6738 57.1667 48.913 57.1667 53.3333V73.3333H23.8333V53.3333C23.8333 48.913 25.5893 44.6738 28.7149 41.5482C31.8405 38.4226 36.0797 36.6666 40.5 36.6666ZM17.1667 53.3333C17.1667 51.0233 17.5 48.7933 18.1267 46.6866L17.56 46.7333C14.7029 47.047 12.0622 48.4043 10.1442 50.545C8.2262 52.6857 7.16591 55.459 7.16666 58.3333V73.3333H17.1667V53.3333ZM73.8333 73.3333V58.3333C73.8337 55.3612 72.6997 52.501 70.6629 50.3366C68.6261 48.1721 65.84 46.8666 62.8733 46.6866C63.4967 48.7933 63.8333 51.0233 63.8333 53.3333V73.3333H73.8333Z"
                        fill="#FAFAFA" />
                </svg>
                <p class="text-sm lg:text-xl text-white">HETI Project</p>
                <p class="text-white text-xs lg:text-lg">University of Lampung</p>
            </div>

            <!-- 2nd Card -->
            <div class="flex flex-col items-center gap-1 w-[150px] lg:w-[180px] text-center">
                <svg class="w-8 md:w-12 lg:w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81 80" fill="none">
                    <path
                        d="M40.75 38.3333C38.5399 38.3333 36.4203 37.4553 34.8574 35.8925C33.2946 34.3297 32.4167 32.2101 32.4167 30C32.4167 27.7898 33.2946 25.6702 34.8574 24.1074C36.4203 22.5446 38.5399 21.6666 40.75 21.6666C42.9601 21.6666 45.0798 22.5446 46.6426 24.1074C48.2054 25.6702 49.0833 27.7898 49.0833 30C49.0833 31.0943 48.8678 32.1779 48.449 33.189C48.0302 34.2 47.4164 35.1187 46.6426 35.8925C45.8687 36.6663 44.9501 37.2802 43.939 37.699C42.928 38.1177 41.8444 38.3333 40.75 38.3333ZM40.75 6.66663C34.5616 6.66663 28.6267 9.12495 24.2508 13.5008C19.875 17.8766 17.4167 23.8116 17.4167 30C17.4167 47.5 40.75 73.3333 40.75 73.3333C40.75 73.3333 64.0833 47.5 64.0833 30C64.0833 23.8116 61.625 17.8766 57.2492 13.5008C52.8733 9.12495 46.9384 6.66663 40.75 6.66663Z"
                        fill="#FAFAFA" />
                </svg>
                <p class="text-white text-sm lg:text-xl">Bandar Lampung</p>
                <p class="text-white text-xs lg:text-lg">Lampung, Indonesia</p>
            </div>

            <!-- 3rd Card -->
            <div class="flex flex-col items-center gap-1 w-[150px] lg:w-[180px] text-center">
                <svg class="w-8 md:w-12 lg:w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81 80" fill="none">
                    <path
                        d="M27.1667 46.6666C26.2222 46.6666 25.43 46.3466 24.79 45.7066C24.15 45.0666 23.8311 44.2755 23.8333 43.3333C23.8333 42.3888 24.1533 41.5966 24.7933 40.9566C25.4333 40.3166 26.2244 39.9977 27.1667 40C28.1111 40 28.9033 40.32 29.5433 40.96C30.1833 41.6 30.5022 42.3911 30.5 43.3333C30.5 44.2777 30.18 45.07 29.54 45.71C28.9 46.35 28.1089 46.6688 27.1667 46.6666ZM40.5 46.6666C39.5556 46.6666 38.7633 46.3466 38.1233 45.7066C37.4833 45.0666 37.1644 44.2755 37.1667 43.3333C37.1667 42.3888 37.4867 41.5966 38.1267 40.9566C38.7667 40.3166 39.5578 39.9977 40.5 40C41.4444 40 42.2367 40.32 42.8767 40.96C43.5167 41.6 43.8356 42.3911 43.8333 43.3333C43.8333 44.2777 43.5133 45.07 42.8733 45.71C42.2333 46.35 41.4422 46.6688 40.5 46.6666ZM53.8333 46.6666C52.8889 46.6666 52.0967 46.3466 51.4567 45.7066C50.8167 45.0666 50.4978 44.2755 50.5 43.3333C50.5 42.3888 50.82 41.5966 51.46 40.9566C52.1 40.3166 52.8911 39.9977 53.8333 40C54.7778 40 55.57 40.32 56.21 40.96C56.85 41.6 57.1689 42.3911 57.1667 43.3333C57.1667 44.2777 56.8467 45.07 56.2067 45.71C55.5667 46.35 54.7756 46.6688 53.8333 46.6666ZM17.1667 73.3333C15.3333 73.3333 13.7633 72.68 12.4567 71.3733C11.15 70.0666 10.4978 68.4977 10.5 66.6666V20C10.5 18.1666 11.1533 16.5966 12.46 15.29C13.7667 13.9833 15.3356 13.3311 17.1667 13.3333H20.5V6.66663H27.1667V13.3333H53.8333V6.66663H60.5V13.3333H63.8333C65.6667 13.3333 67.2367 13.9866 68.5433 15.2933C69.85 16.6 70.5022 18.1688 70.5 20V66.6666C70.5 68.5 69.8467 70.07 68.54 71.3766C67.2333 72.6833 65.6644 73.3355 63.8333 73.3333H17.1667ZM17.1667 66.6666H63.8333V33.3333H17.1667V66.6666Z"
                        fill="#FAFAFA" />
                </svg>
                <p class="text-white text-sm lg:text-xl">2023</p>
                <p class="text-white text-xs lg:text-lg">28 - 29 November</p>
            </div>

            <!-- 4th Card -->
            <div class="flex flex-col items-center gap-1 w-[150px] lg:w-[180px] text-center">
                <svg class="w-8 md:w-12 lg:w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81 80" fill="none">
                    <path
                        d="M63.5833 26.6667V46.6667C69.25 46.6667 73.5833 42.3333 73.5833 36.6667C73.5833 31 69.25 26.6667 63.5833 26.6667ZM36.9167 23.3333H13.5833C9.91667 23.3333 6.91667 26.3333 6.91667 30V43.3333C6.91667 47 9.91667 50 13.5833 50H16.9167V60C16.9167 63.6667 19.9167 66.6667 23.5833 66.6667H30.25V50H36.9167L50.25 63.3333H56.9167V10H50.25L36.9167 23.3333Z"
                        fill="#FAFAFA" />
                </svg>
                <p class="text-white text-sm lg:text-xl">4</p>
                <p class="text-white text-xs lg:text-lg">Keynote Speakers</p>
            </div>

            <!-- 5th Card -->
            <div class="flex flex-col items-center gap-1 w-[150px] lg:w-[180px] text-center">
                <svg class="w-8 md:w-12 lg:w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="none">
                    <g clip-path="url(#clip0_6_82)">
                        <path
                            d="M18.3333 55C20.1014 55 21.7971 55.7023 23.0474 56.9526C24.2976 58.2028 25 59.8985 25 61.6666C25 63.4347 24.2976 65.1304 23.0474 66.3807C21.7971 67.6309 20.1014 68.3333 18.3333 68.3333C16.5652 68.3333 14.8695 67.6309 13.6193 66.3807C12.369 65.1304 11.6667 63.4347 11.6667 61.6666C11.6667 59.8985 12.369 58.2028 13.6193 56.9526C14.8695 55.7023 16.5652 55 18.3333 55ZM40 55C41.7681 55 43.4638 55.7023 44.714 56.9526C45.9643 58.2028 46.6667 59.8985 46.6667 61.6666C46.6667 63.4347 45.9643 65.1304 44.714 66.3807C43.4638 67.6309 41.7681 68.3333 40 68.3333C38.2319 68.3333 36.5362 67.6309 35.2859 66.3807C34.0357 65.1304 33.3333 63.4347 33.3333 61.6666C33.3333 59.8985 34.0357 58.2028 35.2859 56.9526C36.5362 55.7023 38.2319 55 40 55ZM61.6667 55C63.4348 55 65.1305 55.7023 66.3807 56.9526C67.6309 58.2028 68.3333 59.8985 68.3333 61.6666C68.3333 63.4347 67.6309 65.1304 66.3807 66.3807C65.1305 67.6309 63.4348 68.3333 61.6667 68.3333C59.8985 68.3333 58.2029 67.6309 56.9526 66.3807C55.7024 65.1304 55 63.4347 55 61.6666C55 59.8985 55.7024 58.2028 56.9526 56.9526C58.2029 55.7023 59.8985 55 61.6667 55ZM18.3333 33.3333C20.1014 33.3333 21.7971 34.0357 23.0474 35.2859C24.2976 36.5362 25 38.2318 25 40C25 41.7681 24.2976 43.4638 23.0474 44.714C21.7971 45.9642 20.1014 46.6666 18.3333 46.6666C16.5652 46.6666 14.8695 45.9642 13.6193 44.714C12.369 43.4638 11.6667 41.7681 11.6667 40C11.6667 38.2318 12.369 36.5362 13.6193 35.2859C14.8695 34.0357 16.5652 33.3333 18.3333 33.3333ZM40 33.3333C41.7681 33.3333 43.4638 34.0357 44.714 35.2859C45.9643 36.5362 46.6667 38.2318 46.6667 40C46.6667 41.7681 45.9643 43.4638 44.714 44.714C43.4638 45.9642 41.7681 46.6666 40 46.6666C38.2319 46.6666 36.5362 45.9642 35.2859 44.714C34.0357 43.4638 33.3333 41.7681 33.3333 40C33.3333 38.2318 34.0357 36.5362 35.2859 35.2859C36.5362 34.0357 38.2319 33.3333 40 33.3333ZM61.6667 33.3333C63.4348 33.3333 65.1305 34.0357 66.3807 35.2859C67.6309 36.5362 68.3333 38.2318 68.3333 40C68.3333 41.7681 67.6309 43.4638 66.3807 44.714C65.1305 45.9642 63.4348 46.6666 61.6667 46.6666C59.8985 46.6666 58.2029 45.9642 56.9526 44.714C55.7024 43.4638 55 41.7681 55 40C55 38.2318 55.7024 36.5362 56.9526 35.2859C58.2029 34.0357 59.8985 33.3333 61.6667 33.3333ZM18.3333 11.6666C20.1014 11.6666 21.7971 12.369 23.0474 13.6192C24.2976 14.8695 25 16.5652 25 18.3333C25 20.1014 24.2976 21.7971 23.0474 23.0473C21.7971 24.2976 20.1014 25 18.3333 25C16.5652 25 14.8695 24.2976 13.6193 23.0473C12.369 21.7971 11.6667 20.1014 11.6667 18.3333C11.6667 16.5652 12.369 14.8695 13.6193 13.6192C14.8695 12.369 16.5652 11.6666 18.3333 11.6666ZM40 11.6666C41.7681 11.6666 43.4638 12.369 44.714 13.6192C45.9643 14.8695 46.6667 16.5652 46.6667 18.3333C46.6667 20.1014 45.9643 21.7971 44.714 23.0473C43.4638 24.2976 41.7681 25 40 25C38.2319 25 36.5362 24.2976 35.2859 23.0473C34.0357 21.7971 33.3333 20.1014 33.3333 18.3333C33.3333 16.5652 34.0357 14.8695 35.2859 13.6192C36.5362 12.369 38.2319 11.6666 40 11.6666ZM61.6667 11.6666C63.4348 11.6666 65.1305 12.369 66.3807 13.6192C67.6309 14.8695 68.3333 16.5652 68.3333 18.3333C68.3333 20.1014 67.6309 21.7971 66.3807 23.0473C65.1305 24.2976 63.4348 25 61.6667 25C59.8985 25 58.2029 24.2976 56.9526 23.0473C55.7024 21.7971 55 20.1014 55 18.3333C55 16.5652 55.7024 14.8695 56.9526 13.6192C58.2029 12.369 59.8985 11.6666 61.6667 11.6666Z"
                            fill="#FAFAFA" />
                    </g>
                    <defs>
                        <clipPath id="clip0_6_82">
                            <rect width="80" height="80" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <p class="text-white text-sm lg:text-xl">3</p>
                <p class="text-white text-xs lg:text-lg">Topics</p>
            </div>
        </div>
    </section>
    <!-- Section 3 End -->

    <!-- Section 4 Start -->
    <section id="home-section-4" class="overflow-x-hidden">
        <div class="container pt-20 pb-20 flex flex-col gap-10">
            <div data-aos="fade-down" class="section-4-title">
                <div class="flex flex-col gap-1 items-center">
                    <p class="uppercase text-primary text-sm lg:text-base font-semibold">international conference</p>
                    <h1 class="uppercase text-mydark font-bold text-3xl md:text-5xl">keynote speakers</h1>
                </div>
            </div>

            <div data-aos="flip-down" class="wrapper flex flex-wrap gap-10 justify-center">
                <!-- Speaker Card 1 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-1.png" alt="photo of the speaker" loading="lazy">
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Speaker 1</p>
                        <p class="text-sm md:text-base text-mydark">Ministry of Health of the Republic of Indonesia</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark">Indonesian goverment policies in tackling and preventing malnutrition as an effort to prevent degenerative diseases</p>
                    </div>
                </div>

                <!-- Speaker Card 2 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-2.png" alt="photo of the speaker" loading="lazy">
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Prof. dr. Nur Indrawati Lipoeto, M.Sc, Ph.D, Sp.GK</p>
                        <p class="text-sm md:text-base text-mydark">Andalas University</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark">Malnutrition has been linked to various socioeconomic factors, including limited access to healthy foods and a general lack of awareness of healthy diets</p>
                    </div>
                </div>

                <!-- Speaker Card 3 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-3.png" alt="photo of the speaker" loading="lazy"> 
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Prof. Dr. Sazzli Shahlan Kasim</p>
                        <p class="text-sm md:text-base text-mydark">University</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark text-center">Inflammation in atherosclerotic cardiovascular disease, where we are and where are we going</p>
                    </div>
                </div>

                <!-- Speaker Card 4 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-4.png" alt="photo of the speaker" loading="lazy">
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Speaker 4</p>
                        <p class="text-sm md:text-base text-mydark">University in Korea</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark">The Molecullar Aspects of Early Detection and Interception of Cancer</p>
                    </div>
                </div>

                <!-- Speaker Card 5 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-5.png" alt="photo of the speaker" loading="lazy">
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Prof. Noboru Hattori, MD, Ph.D</p>
                        <p class="text-sm md:text-base text-mydark">Hiroshima University</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark"> Environmental pollution effects in pulmonary inflamation process: the role of cytokine in chronic respiratory problem</p>
                    </div>
                </div>
                <!-- Speaker Card 6 -->
                <div class="w-[320px] md:w-[300px] rounded-lg shadow-md overflow-hidden group hover:shadow-lg">
                    <div class="card-img w-full h-[380px] md:h-[340px] overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('dist') }}/img/speaker-6.png" alt="photo of the speaker" loading="lazy">
                    </div>
                    <div class="py-3 px-3 flex flex-col justify-center items-center text-center">
                        <p class="font-bold text-primary text-xl">Speaker 6</p>
                        <p class="text-sm md:text-base text-mydark">University in Australia</p>
                        <div class="w-full py-3">
                            <hr class="w-full text-disabled">
                        </div>
                        <p class="text-xs text-mydark">The substance/drug abuse resulted in a loss of healthy life</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 4 End -->

    <!-- Section 5 Start -->
    <section id="home-section-5" class="overflow-x-hidden">
        <div class="container sm:rounded-md w-full flex flex-col gap-10 p-10 cover shadow-lg"
            style="background-image: url({{ asset('dist') }}/img/bg-section-5-home.png);">
            <div data-aos="fade-down" class="section-5-title flex flex-col gap-1 items-center">
                <p class="uppercase text-secondary text-sm lg:text-base font-semibold">event timeline</p>
                <h1 class="uppercase text-white font-bold text-3xl md:text-5xl">important dates</h1>
            </div>
            <div data-aos="flip-down" class="section-5-content">
                <ul class="steps steps-vertical lg:steps-horizontal text-white w-full">
                    <li class="step step-white text-white text-sm lg:text-base">
                        <div class="text-left lg:text-center pt-10 pb-10 px-2 lg:pt-0 lg:px-10">
                            <p>22 September - 3 November 2023</p>
                            <p class="font-semibold text-lg">Registration</p>
                            <p>Event Registration and Paper Submission</p>
                        </div>
                    </li>
                    <li class="step step-white text-white text-sm lg:text-base">
                        <div class="text-left lg:text-center pt-10 pb-10 px-2 lg:pt-0 lg:px-10">
                            <p>28 November 2023</p>
                            <p class="font-semibold text-lg">Conference and Oral Presentation</p>
                            <p>Day 1</p>
                        </div>
                    </li>
                    <li class="step step-white text-white text-sm lg:text-base">
                        <div class="text-left lg:text-center pt-10 pb-10 px-2 lg:pt-0 lg:px-10">
                            <p>29 November 2023</p>
                            <p class="font-semibold text-lg">Conference and Oral Presentation</p>
                            <p>Day 2</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Section 5 End -->

       <!-- Section 6 Start -->
       <section id="home-section-6" class="overflow-x-hidden">
        <div class="container px-2 py-10 h-full w-full">
            <div class="flex flex-wrap gap-5 justify-center">
                <div class="flex flex-col gap-1 items-center p-2 bg-primary rounded-box text-white">
                    <h1 id="days" class="countdown font-mono text-3xl md:text-8xl">
                        <!-- Days Counting Here -->
                        0
                    </h1>
                    <span class="text-white text-base md:text-xl">Days</span>
                </div>
                <div class="flex flex-col gap-1 items-center p-2 bg-primary rounded-box text-white">
                    <h1 id="hours" class="countdown font-mono text-3xl md:text-8xl">
                        <!-- Hours Counting Here -->
                        0
                    </h1>
                    <span class="text-white text-base md:text-xl">Hours</span>
                </div>
                <div class="flex flex-col gap-1 items-center p-2 bg-primary rounded-box text-white">
                    <h1 id="minutes" class="countdown font-mono text-3xl md:text-8xl">
                        <!-- Minutes Counting Here -->
                        0
                    </h1>
                    <span class="text-white text-base md:text-xl">Mins</span>
                </div>
                <div class="flex flex-col gap-1 items-center p-2 bg-primary rounded-box text-white">
                    <h1 id="seconds" class="countdown font-mono text-3xl md:text-8xl">
                        <!-- Seconds Counting Here -->
                        0
                    </h1>
                    <span class="text-white text-base md:text-xl">Secs</span>
                </div>
                <div class="flex flex-col gap-1 items-center p-2 bg-warning rounded-box text-white">
                    <h1 id="participants" class="countdown font-mono text-3xl md:text-8xl">
                        <!-- Participants Counting Here -->
                        {{ $partisipant }}
                    </h1>
                    <span class="text-white text-base md:text-xl">Participant Registered</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Section 6 End -->
@endsection
@push('js')
<script type="text/javascript">
   const targetDate = new Date("{{ $end_time }}").getTime();

    const x = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
        document.getElementById('days').innerHTML = days;
        document.getElementById('hours').innerHTML = hours;
        document.getElementById('minutes').innerHTML = minutes;
        document.getElementById('seconds').innerHTML = seconds;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById('days').innerHTML = 0;
            document.getElementById('hours').innerHTML = 0;
            document.getElementById('minutes').innerHTML = 0;
            document.getElementById('seconds').innerHTML = 0;
        }
    }, 1000);
</script>    
@endpush

