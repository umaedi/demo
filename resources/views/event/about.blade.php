@extends('layouts.template')
@section('content')
        <!-- Header Start -->
        <header id="about-event-section-1" class="overflow-x-hidden">
  
            <div data-aos="fade-up" class="header-menu h-44 md:h-60 w-full bg-cover bg-bottom md:bg-center pt-2"
                style="background-image: url({{ asset('dist/img/bg-page-header.png') }});">
                <div data-aos="fade-up" class="container px-2 flex flex-col gap-0justify-center pt-20 md:pt-28">
                    <div class="header-title">
                        <h1 class="text-white text-2xl md:text-5xl">About Event</h1>
                    </div>
                    <div class="text-xs md:text-base breadcrumbs text-white">
                        <ul>
                            <li><a href="/user/login">Home</a></li>
                            <li>Event</li>
                            <li>About Event</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
    
        <!-- Section 2 Start -->
        <section id="about-event-section-2">
            <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">
    
                <div data-aos="fade-up"
                    class="wrapper w-full h-40 md:h-80 lg:h-96 shadow-xl overflow-hidden group bg-fixed">
                    <img data-aos="fade-up"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                        src="{{ asset('dist/img/bg-about-event.jpg') }}" alt="About Event Poster">
                </div>
    
                <!-- 1st -->
                <div class="container lg:px-52 flex flex-col gap-8 md:gap-12">
                    <h1 data-aos="fade-down"
                        class="uppercase text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">WELLCOME TO
                        THE INTERNATIONAL CONFERENCE ON
                        MEDICAL SCIENCE AND HEALTH (ICOMESH)
                    </h1>
    
                    <hr class="border-disabled">
                    <div class="flex flex-col gap-8">
                        <p class="text-mydark text-justify text-sm md:text-base">
                            Based on The Constitutional Number 14 of 2005 Article 1 Paragraph 2, lecturers are professional
                            and scientific
                            educators with the main task of transforming, developing, and disseminating knowledge,
                            technology,
                            and art through education to the community. A lecturer is required to always develop his
                            intellect through quality research which will then have a positive impact on society.
                            <br><br>
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
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Objectives</p>
                            <p class="text-sm md:text-base">The objectives of this activity are:</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>Increase the knowledge of lecturers and students at the Faculty of Medicine, University
                                    of Lampung, and the other related faculties about biomolecular;
                                </li>
                                <li>Increase the knowledge of lecturers and students at the Faculty of Medicine, University
                                    of Lampung, and the other related faculties about genetic diseases;</li>
                                <li>Increase the knowledge of lecturers and students at the Faculty of Medicine, University
                                    of Lampung, and the other related faculties about degenerative diseases;</li>
                                <li>Improving international research and publications by qualified University of Lampung
                                    lecturers and students;</li>
                                <li>Achieve established HETI project KPIs to increase the number of international
                                    publications.</li>
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Types of Activities</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>The implementation of the activity is the implementation of an international conference
                                    that will
                                    be held for 2 days (8 hours) from 08.00 to 17.00. After the conference, it will be
                                    followed by an oral presentation and an assessment will be held.
                                </li>
                                <li>The person in charge of implementing activities is the organizing committee in
                                    collaboration with the appointed event organizer.</li>
                                <li>The theme of the conference was "Biomolecular, genetic and degenerative disease;
                                    from bench to practice".
                                    <ul class="list-inside list-disc text-sm md:text-base text-justify indent-5">
                                        <li>Indonesian goverment policies in tackling and preventing malnutrition as an
                                            effort to prevent degenerative diseases (Ministry of Health of the Republic of
                                            Indonesia).</li>
                                        <li>Malnutrition has been linked to various socioeconomic factors, including limited
                                            access to healthy foods and a general lack of awareness of healthy diets
                                            (University of Indonesia).</li>
                                        <li>Inflammation and aging in chronic and degenerative diseases: Current and future
                                            therapeutic strategies (University in Malaysia).</li>
                                        <li>The Molecullar Aspects of Early Detection and Interception of Cancer (University
                                            in Korea).</li>
                                        <li>Environmental pollution effects in pulmonary inflamation process: the role of
                                            cytokine in chronic respiratory problem (Hiroshima University).</li>
                                        <li>The substance/drug abuse resulted in a loss of healthy life (University in
                                            Australia).</li>
                                    </ul>
                                </li>
                                <li>Registration of participants and the implementation of conferences and proceedings are
                                    carried out by the committee with reviewers appointed by the team.</li>
                                <li>Target participants: 200 or more from Indonesia and other countries.</li>
                                <li>Time of Activity Implementation:
                                    <ul class="list-inside list-disc text-sm md:text-base text-justify indent-5">
                                        <li>Activities are planned for November 28-29, 2023.</li>
                                        <li>Participant Location: hybrid (offline and online), offline in Bandar Lampung
                                            City, and online via Zoom Meeting.</li>
                                    </ul>
                                </li>
    
                            </ol>
                        </div>
                        <div>
                            <p class="font-semibold text-base md:text-lg mb-2">Outcomes</p>
                            <p class="text-sm md:text-base">The outputs of this activity are:</p>
                            <ol class="list-inside list-decimal text-sm md:text-base text-justify">
                                <li>Activity reports.
                                </li>
                                <li>Proceedings indexed and/or ISBN.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="wrapper w-fit">
                        <a href="/register">
                            <button type="button"
                                class="py-3 px-5 shadow-sm justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                Register Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
@endsection