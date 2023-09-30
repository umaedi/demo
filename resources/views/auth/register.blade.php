<!DOCTYPE html>
<html lang="en" class="font-inter scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist') }}/style.css" rel="stylesheet">
    <title>Register | ICOMESH 2023</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist') }}/img/favicon.ico">
</head>
<body class="bg-white">
    <div class="container p-2 flex md:flex-col lg:flex-row h-screen overflow-hidden">
        <!-- Images -->
        <div class="left-content hidden md:flex lg:w-1/2 justify-center items-center p-5">
            <img src="{{ asset('dist') }}/img/public-talk.gif" alt="International Conference"
                class="md:w-[300px] md:h-[300px] lg:w-[500px] lg:h-[500px]">
        </div>

        <!-- Form -->
        <div class="right-content w-full lg:w-1/2 overflow-scroll py-10 px-4 md:p-10 flex flex-col gap-5">

            <div class="wrapper">
                <div
                    class="wrapper w-[240px] md:w-[120px] lg:w-[240px] h-[80px] md:h-[40px] lg:h-[80px] rounded-md overflow-hidden hover:shadow-lg">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                        src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo icomesh">
                </div>
            </div>
            <div class="flex flex-col gap-1 items-start md:items-start">
                <p class="text-primary text-xs lg:text-base font-semibold">Please sign up to register the event</p>
                <h1 class="text-mydark font-bold text-2xl md:text-3xl">GET STARTED</h1>
            </div>
            
            @if (session('msgPersence'))
            <div class="alert alert-error flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-white shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm text-white">{{ session('msgPersence') }}</span>
            </div>
            @endif
            
            <form action="/register" method="POST" class="input-area group flex flex-col gap-10" novalidate>
                @csrf
                <!-- Input -->
                <div class="wrapper flex flex-col gap-2">

                    <!-- Email -->
                    <div class="form-control w-full">
                        <label for="email" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Example: wahyuaji@gmail.com"
                            class="peer input input-bordered input-accent w-full text-sm @error('email') invalid:border-red-500 @enderror" />
                        @error('email')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control w-full">
                        <label class="label" for="password">
                            <span class="label-text">Password</span>
                        </label>
                        <input id="password" name="password" value="{{ old('password') }}" type="password"  autocomplete="current-password" required
                        pattern=".{6,}" placeholder="********"
                        class="peer input input-bordered input-accent w-full text-sm @error('password') invalid:border-red-500 @enderror" />
                        @error('password')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Re-enter Password -->
                    <div class="form-control w-full">
                        <label class="label" for="re-enter-password">
                            <span class="label-text">Re-enter Password</span>
                        </label>
                        <input id="re-enter-password" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" required pattern=".{6,}"
                            placeholder="********"
                            class="peer input input-bordered input-accent w-full text-sm @error('password') invalid:border-red-500 @enderror" />
                            @error('password_confirmation')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Salutation -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Salutation</span>
                        </label>
                        <select name="salutation" class="peer select select-bordered select-accent @error('password') invalid:border-red-500 @enderror" required>
                            <option value="">Please select...</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Prof. Dr.">Prof. Dr.</option>
                            <option value="Dr.">Dr.</option>
                        </select>
                        @error('salutation')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Full Name</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Full Name" required
                            class="peer input input-bordered input-accent w-full text-sm @error('password') invalid:border-red-500 @enderror" />
                            @error('name')
                            <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <!-- Gender -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <select name="gender" {{ old('gender') }} class="peer select select-bordered select-accent @error('password') invalid:border-red-500 @enderror" required>
                            <option disabled selected>Please select...</option>
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                        @error('gender')
                        <label class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </label>
                        @enderror
                    </div>

                    <!-- Affiliation / Institution -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Affiliation / Institution</span>
                        </label>
                        <input name="institution" value="{{ old('institution') }}" type="text" placeholder="" required
                            class="peer input input-bordered input-accent w-full text-sm @error('institution') invalid:border-red-500 @enderror" />
                            @error('institution')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Country of Institution -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Country of Institution</span>
                        </label>
                        <input type="text" name="country" value="{{ old('country') }}" placeholder="" required
                            class="peer input input-bordered input-accent w-full text-sm @error('country') invalid:border-red-500 @enderror" />
                            @error('country')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Mobile Number / Whatsapp -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Mobile Number / Whatsapp</span>
                        </label>
                        <input type="text" name="no_tlp" value="{{ old('no_tlp') }}" placeholder="Example: 6281108110811" required
                            class="peer input input-bordered input-accent w-full text-sm @error('password') invalid:border-red-500 @enderror" />
                        @error('no_tlp')
                        <span class="label invisible peer-invalid:visible text-red-500 font-light text-xs md:text-sm">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Participant Type -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Participant Type</span>
                        </label>
                        <select name="type_user" class="peer select select-bordered select-accent @error('type_user')  invalid:border-red-500 @enderror" required>
                            <option disabled selected>Please select...</option>
                            <option value="Participant Only">Participant Only</option>
                            <option value="Presenter">Presenter (Oral/Poster)</option>
                        </select>
                        @error('type_user')
                        <label class=" label invisible peer-invalid:visible text-red-500 font-light text-xs
                        md:text-sm">
                        Please select participant type
                        </label>
                        @enderror
                    </div>
                    <!-- Participant Type -->
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Presence</span>
                        </label>
                        <select name="presence" class="peer select select-bordered select-accent @error('presence')  invalid:border-red-500 @enderror" required>
                            <option disabled selected>Please select...</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                        @error('presence')
                        <label class=" label invisible peer-invalid:visible text-red-500 font-light text-xs
                        md:text-sm">
                        Please select participant type
                        </label>
                        @enderror
                    </div>
                </div>

                <!-- Button Sign Up -->
                <div class="wrapper flex flex-col gap-0">
                    <button type="submit"
                        class="w-full py-3 px-5 shadow-sm inline-flex justify-center items-center rounded-xl font-semibold bg-primary text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all text-xs lg:text-base group-invalid:pointer-events-none group-invalid:opacity-50">
                        Sign Up
                    </button>
                </div>
            </form>

            <p class="text-sm text-mydark text-center">Already have an account? <span
                    class="text-primary hover:text-mydark"><a href="/login">Login</a></span></p>

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
    <script src="{{ asset('dist') }}/script.js"></script>
</body>

</html>