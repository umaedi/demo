@extends('layouts.auth')
@section('content')
<div class="container p-2 flex h-screen overflow-hidden">
    <!-- Images -->
    <div class="left-content hidden md:flex md:w-1/2 justify-center items-center">
        <img src="{{ asset('dist') }}/img/public-talk.gif" alt="International Conference" class="w-[500px] h-[500px]" loading="lazy">
    </div>

    <!-- Form -->
    <div class="right-content w-full md:w-1/2 overflow-scroll py-10 px-4 md:p-10 flex flex-col gap-5">
        <div class="wrapper">
            <div
                class="wrapper w-[240px] md:w-[120px] lg:w-[240px] h-[80px] md:h-[40px] lg:h-[80px] rounded-md overflow-hidden group">
                <img class="w-full h-full object-cover"
                    src="{{ asset('dist') }}/img/logo-icomesh-no-bg.png" alt="logo icomesh" loading="lazy">
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