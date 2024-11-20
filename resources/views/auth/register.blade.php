<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Register</title>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
        class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('storage/images/Screenshot__92_-removebg-preview.png') }}" alt="Taskit Logo"
                class="w-[130px] h-[80px] object-contain">
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="text-[#446fcc] block mb-2">Name</label>
            <div class="relative">
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" placeholder="Enter your name..."
                    class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
           focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400" />
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#446fcc]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 7.5l-.225.9m0 0L16.5 9.75M15.75 7.5l-1.35-1.35M12 12v6m0 0h6m-6 0h-6M6.75 12l-.9-.225M9.75 15.75l1.35 1.35m-1.35-1.35l-1.35 1.35m6-3.75l.9.225m-.9-.225l.9-.9m-2.7-2.7l1.35-1.35m-1.35 1.35l-1.35-1.35M6.75 12l1.35-1.35M9.75 8.25l1.35-1.35m-1.35 1.35L6.75 12M9.75 8.25L6.75 4.5" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="text-[#446fcc] block mb-2">Email</label>
            <div class="relative">
                <input id="email" type="email" name="email" :value="old('Email')" required autofocus
                    autocomplete="email" placeholder="Enter your email..."
                    class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
           focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400" />
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#446fcc]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 7.5L19.5 10.5M16.5 10.5L19.5 7.5M12 12.75v6m0 0h6m-6 0H6m6-6.75v-9M9.75 12L6 8.25M15.75 12L19.5 8.25" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="text-[#446fcc] block mb-2">Password</label>
            <div class="relative">
                <input id="password" type="password" name="password" :value="old('Password')" required autofocus
                    autocomplete="password" placeholder="Enter your password..."
                    class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
           focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400" />
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#446fcc]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 7.5L19.5 10.5M16.5 10.5L19.5 7.5M12 12.75v6m0 0h6m-6 0H6m6-6.75v-9M9.75 12L6 8.25M15.75 12L19.5 8.25" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="text-[#446fcc] block mb-2">Confirm Password</label>
            <div class="relative">
                <input id="password_confirmation" type="password" name="password_confirmation" :value="old('name')" required autofocus
                    autocomplete="new-password" placeholder="Confirm Password"
                    class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
           focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400" />
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#446fcc]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 7.5L19.5 10.5M16.5 10.5L19.5 7.5M12 12.75v6m0 0h6m-6 0H6m6-6.75v-9M9.75 12L6 8.25M15.75 12L19.5 8.25" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Profile Photo -->
        <div class="mt-4">
            <label for="image" class="block text-sm font-medium text-[#446fcc] mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 inline-block text-[#446fcc] mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 7.5l-.225.9m0 0L16.5 9.75M15.75 7.5l-1.35-1.35M12 12v6m0 0h6m-6 0h-6M6.75 12l-.9-.225M9.75 15.75l1.35 1.35m-1.35-1.35l-1.35 1.35m6-3.75l.9.225m-.9-.225l.9-.9m-2.7-2.7l1.35-1.35m-1.35 1.35l-1.35-1.35M6.75 12l1.35-1.35M9.75 8.25l1.35-1.35m-1.35 1.35L6.75 12M9.75 8.25L6.75 4.5" />
                </svg>
                Profile Photo
            </label>
            <div class="relative">

                <input id="image" type="file" name="image" accept="image/*"  required autofocus
                    autocomplete="name" placeholder="Enter your name..."
                    class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
           focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400" />
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-[#446fcc]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 7.5l-.225.9m0 0L16.5 9.75M15.75 7.5l-1.35-1.35M12 12v6m0 0h6m-6 0h-6M6.75 12l-.9-.225M9.75 15.75l1.35 1.35m-1.35-1.35l-1.35 1.35m6-3.75l.9.225m-.9-.225l.9-.9m-2.7-2.7l1.35-1.35m-1.35 1.35l-1.35-1.35M6.75 12l1.35-1.35M9.75 8.25l1.35-1.35m-1.35 1.35L6.75 12M9.75 8.25L6.75 4.5" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('image')" class="mt-2 text-red-600" />
        </div>


        <!-- Action Buttons -->
        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-[#446fcc] hover:text-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <button class="rounded-full px-4 py-2 bg-[#446fcc] text-white     hover:bg-[#3271f7]  transition">
                {{ __('Register') }}
            </button>
        </div>
    </form>

</body>

</html>
