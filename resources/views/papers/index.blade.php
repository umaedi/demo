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
                        src="{{ asset('dist') }}/img/bg-about-event.jpg" alt="About Event Poster">
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
                                <li>Keywords are limited to 5 words;</li>
                                <li>Full Paper Submission Deadline : 13 Des 2023;</li>
                                <li>1 Presentation File consist of 5 Pages inculding : Background, Literature Review,
                                    Methods, Results and Discussion;</li>
                                <li>Duration for presentation : 12 Minutes (10 min Presentation + 2 min QnA session).</li>
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
                            <p class="font-semibold text-base md:text-lg mb-2">Participant Registration</p>
                            <p class="text-sm md:text-base">PIU Heti Project UNILA will announce the activities of the
                                International Conference on Medical Science and Health (ICOMESH) through the
                                “icomesh-unila.com” website in September 2023. Participants will register directly on the
                                ICOMESH website and upload all the required documents.</p>
                        </div>
    
                        <div class="w-fit h-fit flex flex-wrap gap-3">
                            <a href="{{ asset('dist') }}/docs/ICOMESH_2023_Template.docx">
                                <button type="button"
                                    class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Download Template
                                </button>
                            </a>
                            <a href="{{ asset('dist') }}/docs/Manual_book_paper_submission_for_participant.pdf">
                                <button type="button"
                                    class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Download Manual Book
                                </button>
                            </a>
                            <a href="{{ asset('dist') }}/docs/Template_Icomesh_Scitepress.docx">
                                <button type="button"
                                    class="py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                                    Download Template Proceeding
                                </button>
                            </a>
                            
                        </div>
                        <p class="text-mydark text-xs">*The committee has the right to review and decide whether the paper
                            is
                            accepted or rejected.</p>
                    </div>
                </div>
        </section>
        <!-- Section 2 End -->

        <!-- Section 3 Start -->
    <section id="call-for-papers-section-3">
        <div class="container px-2 py-10 md:py-16 flex flex-col gap-10">

            <!-- 1st -->
            <div class="container lg:px-52 flex flex-col gap-8 md:gap-12">
                <h1 data-aos="fade-down" class="text-xl md:text-5xl font-semibold text-mydark text-center md:text-left">
                    Editorial Policy ICOMESH
                </h1>

                <hr class="border-disabled">
                <div class="flex flex-col gap-8">
                    <p class="text-mydark text-justify text-sm md:text-base">
                        All new manuscripts to ICOMESH should be submitted directly via website on
                        <a href="https://icomesh-unila.com/user/submission"
                            target="_blank">https://icomesh-unila.com/user/submission</a> After you submit via the
                        website, you will be
                        notified via email that you registered via the previous website.
                    </p>
                    <div>
                        <ol class="list-disc list-inside">
                            <li>Step 1. To maintain scientific integrity, one of our editors will run Turnitin on every
                                new submission to see if there are any potential plagiarism issues (maximum similarity
                                20%). Papers that do not pass the plagiarism check will be rejected immediately.</li>
                            <li>Step 2. Then the lead publication will conduct a preliminary check on the new submission
                                to determine if it falls within the scope of the conference and decide whether it needs
                                further review. If a new manuscript passes the initial vetting, it will be assigned to
                                reviewers for double-blind peer review.</li>
                            <li>Step 3. Each selected paper will be reviewed by at least one/two independent experts
                                with related research backgrounds, especially originality, validity, quality, and
                                readability. Review Reports received from experts will be assessed by one of the editors
                                with international scientific standards.</li>
                            <li>Step 4. If logical, then Review Reports will be sent to the authors to modify the
                                manuscript accordingly. If it is illogical, the editor can assign a new reviewer or
                                assess it himself.</li>
                            <li>Step 5. Authors will be asked to revise their paper according to the points raised.</li>
                            <li>Step 6. The revised version will then be evaluated by the editor whether the points
                                submitted by the reviewer have been responded to or not, and the editor will send back
                                the revised manuscript to the reviewer for re-evaluation.</li>
                            <li>Step 7. If the reviewers approve the revised version of the manuscript, the Chief Editor
                                will make the final decision on publication. </li>
                        </ol>
                    </div>
                </div>
            </div>
    </section>
    <!-- Section 3 End -->
@endsection