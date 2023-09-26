@extends('layouts.template')
@section('content')
        <!-- Header Start -->
        <header id="call-for-papers-section-1" class="overflow-x-hidden">   
            <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
                style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
                <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
                    <div class="header-title">
                        <h1 class="text-white text-2xl md:text-5xl">Call for Papers</h1>
                    </div>
                    <div class="text-xs md:text-base breadcrumbs text-white">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Call for Papers</li>
                            <li>Call for Papers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
    
        <!-- Section 2 Start -->
        <section id="call-for-papers-section-2">
            <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">
    
                <div data-aos="fade-up"
                    class="wrapper w-full h-40 md:h-80 lg:h-96 shadow-xl overflow-hidden group bg-fixed">
                    <img data-aos="fade-up"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                        src="{{ asset('dist/img/bg-about-event.jpg') }}" alt="About Event Poster">
                </div>
    
                <!-- 1st -->
                <div class="container lg:px-52 flex flex-col gap-8 md:gap-12">
                    <h1 data-aos="fade-down" class="text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">
                        International Conference on Medical Science and Health (ICOMESH)
                    </h1>
    
                    <hr class="border-disabled">
                    <div class="flex flex-col gap-8">
                        <p class="text-mydark text-justify text-sm md:text-base">
                            The paper submitted should have never been published or being submited for publication any where
                            else. After the selection process has finished, the papers accepted by the committee will be
                            given a chance to be presented and will be published in the proceedings. The papers and
                            presentation materials should be written in English.
                        </p>
    
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">GUIDELINE FOR ICOMESH ABSTRACT</p>
                            <p class="text-sm md:text-base">All abstracts must be prepared according to the following
                                instructions:</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>The abstract must be written in English;
                                </li>
                                <li>Abstract title is limited to 20 words;</li>
                                <li>Abstract is limited to 250-300 words (this does not include the title, author's names,
                                    institutions, and keywords);</li>
                                <li>Abstract must be in a structured form, including (but not limited to) background,
                                    objective, methods, result, and conclusion;</li>
                                <li>Abstract not more than 1 page (size A4);</li>
                                <li>Keywords are limited to 5 words.</li>
                            </ol> <br>
                            <p class="text-sm md:text-base">Please save your abstract in Microsoft Word file, with this
                                following file name instruction:</p>
                            <ul class="list-inside list-disc text-sm md:text-base text-justify">
                                <li>File name : participant's name_abstract_icomesh</li>
                                <li>Example : rahayu_abstract_icomesh</li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Outcomes</p>
                            <p class="text-sm md:text-base">The outputs of this activity are:</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>Your paper will be included in the conference proceeding;
                                </li>
                                <li>Proceeding will be published with an ISBN and online publication on the website;</li>
                                <li>The full paper will be published in ISI/Scopus indexed proceeding.</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Time and Place</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>Tuesday-Wednesday, November 28-29, 2023.
                                    <ul class="list-inside list-disc text-sm md:text-base text-justify indent-5">
                                        <li>November 28th, 2023 : Conference and Oral Presentation.</li>
                                        <li>November 29th, 2023 : Conference and Oral Presentation.</li>
                                    </ul>
                                </li>
                                <li>Location : Bandar Lampung (Offline) and Online
                                    via Zoom Meeting.</li>
                                <li>3rd November 2023 : Abstract Submission Deadline.</li>
                                <li>21st November 2023 : Participant Registration Deadline.</li>
                                <li>13th December 2023 : Full Paper Submission Deadline.</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Participant Registration</p>
                            <p class="text-sm md:text-base">PIU Heti Project UNILA will announce the activities of the
                                International Conference on Medical Science and Health (ICOMESH) through the
                                “icomesh-unila.com” website in September 2023. Participants will register directly on the
                                ICOMESH website and upload all the required documents.</p>
                        </div>
    
                        <a href="{{ asset('dist/docs/ICOMESH_2023_Template.docx') }}">
                            <button type="button"
                                class="md:w-1/3 py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                Download Template
                            </button>
                        </a>
                        <p class="text-mydark text-xs">*The committee has the right to review and decide whether the paper
                            is
                            accepted or rejected.</p>
                    </div>
                </div>
        </section>
        <!-- Section 2 End -->
@endsection