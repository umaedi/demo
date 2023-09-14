@extends('layouts.auth')
@section('content')
<div class="container p-2 flex h-screen overflow-hidden">
    <!-- Images -->
    <div class="left-content hidden md:flex md:w-1/2 justify-center items-center">
        <img src="{{ asset('dist') }}/img/public-talk.gif" alt="International Conference" class="w-[500px] h-[500px]">
    </div>

    <!-- Form -->
    <div class="right-content w-full md:w-1/2 overflow-scroll py-10 px-4 md:p-10 flex flex-col gap-5">
        <div class="wrapper">
            <div
                class="wrapper w-[240px] md:w-[120px] lg:w-[240px] h-[80px] md:h-[40px] lg:h-[80px] rounded-md overflow-hidden group shadow-md hover:shadow-lg">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                    src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo icomesh">
            </div>
        </div>
        <div class="flex flex-col gap-1 items-start md:items-start">
            <p class="text-primary text-xs lg:text-base font-semibold">Sign in to set up your account</p>
            <h1 class="text-mydark font-bold text-2xl md:text-3xl">Login</h1>
        </div>

        <form action="/login" method="POST" class="input-area flex flex-col gap-10 group">
            @csrf
            <!-- Input -->
            <div class="wrapper flex flex-col gap-2">
                @if ($errors->any())
                      <!-- Alert -->
                <div class="alert alert-error flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm text-white">Invalid Email or Password!</span>
                </div>
                @endif

                <!-- Email -->
                <div class="form-control w-full">
                    <label for="email" class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input id="email" name="email" type="email" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Example: wahyuaji@gmail.com"
                        class="input input-bordered input-accent w-full text-sm" />
                </div>

                <!-- Password -->
                <div class=" form-control w-full">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input name="password" id="password" type="password" placeholder="********" required pattern=".{8,}"
                        class="input input-bordered input-accent w-full text-sm" />
                    <label class="label">
                        <a href="/forgot-password"
                            class="cursor-pointer label-text text-xs md:text-sm text-primary">Forgot Password?</a>
                    </label>
                </div>
                <div class="form-control">
                    <label class="cursor-pointer label flex justify-start gap-3">
                        <input name="remember" type="checkbox" class="checkbox checkbox-accent"/>
                        <span class="label-text text-mydark text-sm font-medium">Keep me signed in</span>
                    </label>
                </div>
            </div>

            <!-- Button Sign In -->
            <div class="wrapper flex flex-col gap-0">
                <button type="submit"
                    class="w-full py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base group-invalid:pointer-events-none group-invalid:opacity-50">
                    Login
                </button>
                <div class="divider text-xs">OR</div>
                <button type="button"
                    class="w-full py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-white hover:bg-disabled/20 text-primary hover:opacity-90 outline-double outline-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M18.1712 8.36791H17.5V8.33333H9.99996V11.6667H14.7095C14.0225 13.6071 12.1762 15 9.99996 15C7.23871 15 4.99996 12.7612 4.99996 10C4.99996 7.23875 7.23871 5 9.99996 5C11.2745 5 12.4341 5.48083 13.317 6.26625L15.6741 3.90916C14.1858 2.52208 12.195 1.66666 9.99996 1.66666C5.39788 1.66666 1.66663 5.39791 1.66663 10C1.66663 14.6021 5.39788 18.3333 9.99996 18.3333C14.602 18.3333 18.3333 14.6021 18.3333 10C18.3333 9.44125 18.2758 8.89583 18.1712 8.36791Z"
                            fill="#FFC107" />
                        <path
                            d="M2.62744 6.12125L5.36536 8.12916C6.10619 6.295 7.90036 5 9.99994 5C11.2745 5 12.4341 5.48083 13.317 6.26625L15.6741 3.90916C14.1858 2.52208 12.1949 1.66666 9.99994 1.66666C6.79911 1.66666 4.02327 3.47375 2.62744 6.12125Z"
                            fill="#FF3D00" />
                        <path
                            d="M10 18.3333C12.1525 18.3333 14.1084 17.5096 15.5871 16.17L13.008 13.9875C12.1432 14.6452 11.0865 15.0009 10 15C7.83255 15 5.99213 13.6179 5.2988 11.6892L2.5813 13.7829C3.96047 16.4817 6.7613 18.3333 10 18.3333Z"
                            fill="#4CAF50" />
                        <path
                            d="M18.1712 8.36792H17.5V8.33334H10V11.6667H14.7096C14.3809 12.5902 13.7889 13.3972 13.0067 13.9879L13.0079 13.9871L15.5871 16.1696C15.4046 16.3354 18.3333 14.1667 18.3333 10C18.3333 9.44125 18.2758 8.89584 18.1712 8.36792Z"
                            fill="#1976D2" />
                    </svg> <span class="ml-4">Login with Google</span>
                </button>
            </div>
        </form>

        <p class="text-sm text-mydark text-center">Don't have an account? <span
                class="text-primary hover:text-mydark"><a href="/register">Sign Up</a></span></p>

        <div class="wrapper w-fit">
            <a href="/" class="text-mydark hover:text-primary text-sm flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M14.8586 7.33333V8.66667H5.20129L7.36329 10.8287L6.42063 11.7713L2.64929 8L6.41996 4.22867L7.36263 5.17133L5.20129 7.33333H14.8586ZM1.99996 12V4H0.666626V12H1.99996Z"
                        fill="#343741" />
                </svg>
                <span>Back Home</span>
            </a>
        </div>
    </div>
</div>
@endsection