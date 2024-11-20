<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>

    <div class="flex">
        @include('layouts.sidebar')
        <main class="flex-1 p-6">
            <header class="flex justify-between  bg-gradient-to-r from-blue-500 to-teal-400 shadow-lg shadow items-center border  p-4  rounded-md mb-6">
                <!-- Profile Heading -->
                <h2 class="text-xl text-white font-bold">
                    <a href="{{ route('dashboard') }}" class="text-black">Profile</a>
                </h2>

                <!-- Search Input in the Middle -->
                <div class="flex-1 mx-6">
                    <div class="relative">
                        <input type="text" placeholder="Search..."
                            class="w-full px-4 py-2 rounded-md text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                        <span class="absolute inset-y-0 right-4 flex items-center">
                            <i class="fas fa-search text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <!-- User Profile Section -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <img id="profile-image" class="w-10 h-10 rounded-full cursor-pointer"
                            src="{{ asset('storage/images/' . $user->image) }}" alt="Profile Image">
                        <span class="text-black">{{ $user->name }}</span>
                    </div>
                </div>
            </header>


            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

</body>

</html>
