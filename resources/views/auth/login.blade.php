<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Login Form -->
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('storage/images/Screenshot__92_-removebg-preview.png') }}" alt="Taskit Logo"
                class="w-[130px] h-[80px] object-contain">
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-[#446fcc] mb-2">Email</label>
                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
                               focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400"
                        placeholder="Enter your email" />
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-[#446fcc]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 7.5L19.5 10.5M16.5 10.5L19.5 7.5M12 12.75v6m0 0h6m-6 0H6m6-6.75v-9M9.75 12L6 8.25M15.75 12L19.5 8.25" />
                        </svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-[#446fcc] mb-2">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="block w-full px-4 py-2 text-sm border border-[#446fcc] rounded-lg shadow-sm 
                               focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400"
                        placeholder="Enter your password" />
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-[#446fcc]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 11.25V5.25m0 6v5.25m-3.75-6H5.25m6 0h5.25m-6 0H6.75m7.5 0H9.75" />
                        </svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="w-4 h-4 text-[#446fcc] border-gray-300 rounded focus:ring-[#446fcc]" />
                <label for="remember_me" class="ml-2 text-sm text-gray-700">Remember me</label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#446fcc] hover:underline">
                        Forgot your password?
                    </a>
                @endif

                <button type="submit"
                    class="bg-[#446fcc] text-white px-6 py-2 rounded-lg shadow hover:bg-[#3271f7] focus:ring-2 font-semibold focus:outline-none">
                    Log in
                </button>
            </div>
        </form>
    </div>

</body>

</html>
