<div class="navbar bg-white fixed z-50 shadow-sm">
    <div class="container flex justify-between">
        <div class="">
            <a class="cursor-pointer" href="/">
                <div class="wrapper h-[50px] rounded-lg overflow-hidden shadow-sm hover:shadow-lg">
                    <img class="w-full h-full object-cover" src="./dist/img/logo-icomesh.png"
                        alt="Logo ICOMESH">
                </div>
            </a>
        </div>
        <div>

            <!-- Toggle on Mobile -->
            <div class="dropdown dropdown-bottom dropdown-end">
                <label tabindex="0" class="btn btn-ghost lg:hidden text-mydark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="text-mydark menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-white rounded-box w-52">
                    <li><a href="/">Home</a></li>
                    <li>
                        <a>Event</a>
                        <ul class="p-2">
                            <li><a href="./dist/pages/steering-committee.html">Steering Committee</a></li>
                            <li><a href="./dist/pages/about-event.html">About Event</a></li>
                            <li><a href="./dist/pages/schedule.html">Schedule</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>Call for Papers</a>
                        <ul class="p-2">
                            <li><a href="./dist/pages/call-for-papers.html">Call for Papers</a></li>
                            <li><a href="./dist/pages/login.html">Paper Upload</a></li>
                        </ul>
                    </li>
                    <li><a href="./dist/pages/proceeding.html">Proceeding</a></li>
                    <li>
                        <a>ICOMESH</a>
                        <ul class="p-2">
                            <li><a href="./dist/pages/icomesh-2023.html">ICOMESH 2023</a></li>
                            <li><a href="./dist/pages/gallery.html">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="flex flex-col gap-2">
                        <a href="/register"
                            class="lg:inline-flex py-2 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-sm">
                            Register
                        </a>
                        <a href="/login"
                            class="lg:inline-flex py-2 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-sm">
                            Login
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Large Screen -->
            <div class="wrapper hidden lg:inline-block">
                <ul class="menu menu-horizontal px-1 text-mydark text-base gap-1">
                    <li><a href="./index.html">Home</a></li>
                    <li>
                        <div class="dropdown dropdown-hover dropdown-end">
                            <label tabindex="0" class="flex items-center gap-1">
                                Event
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path d="M12 6L8 10L4 6" stroke="#343741" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></label>
                            <ul tabindex="0"
                                class="dropdown-content text-mydark text-base z-[1] mt-40 p-2 shadow bg-white rounded-box w-52">
                                <li><a href="./dist/pages/steering-committee.html">Steering Committee</a></li>
                                <li><a href="./dist/pages/about-event.html">About Event</a></li>
                                <li><a href="./dist/pages/schedule.html">Schedule</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown dropdown-hover dropdown-end">
                            <label tabindex="0" class="flex items-center gap-1">
                                Call for Papers
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path d="M12 6L8 10L4 6" stroke="#343741" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></label>
                            <ul tabindex="0"
                                class="dropdown-content text-mydark text-base z-[1] mt-32 p-2 shadow bg-white rounded-box w-52">
                                <li><a href="./dist/pages/call-for-papers.html">Call for Papers</a></li>
                                <li><a href="./dist/pages/login.html">Paper Upload</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="./dist/pages/proceeding.html">Proceeding</a></li>
                    <li>
                        <div class="dropdown dropdown-hover dropdown-end">
                            <label tabindex="0" class="flex items-center gap-1">
                                ICOMESH
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path d="M12 6L8 10L4 6" stroke="#343741" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></label>
                            <ul tabindex="0"
                                class="dropdown-content text-mydark text-base z-[1] mt-32 p-2 shadow bg-white rounded-box w-52">
                                <li><a href="./dist/pages/icomesh-2023.html">ICOMESH 2023</a></li>
                                <li><a href="./dist/pages/gallery.html">Gallery</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="flex flex-col md:flex-row gap-2">
                        <a href="/register"
                            class="lg:inline-flex py-2 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-sm">
                            Register
                        </a>
                        <a href="/login"
                            class="lg:inline-flex py-2 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-medium bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-sm">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>