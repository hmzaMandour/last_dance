<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen  bg-gray-200 font-sans">

    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <!-- Sidebar -->
    <div class="flex ">
        {{-- <nav class="shadow-sm shadow-[#446fcc] w-64 bg-black min-h-screen flex flex-col p-6">
            <div class="flex items-center justify-center mb-7">
                <div class="bg-white rounded-lg w-[120px] flex items-center justify-center">
                    <img src="{{ asset('storage/images/Screenshot__92_-removebg-preview.png') }}" alt="Taskit Logo"
                        class="w-[150px] object-contain ">
                </div>
            </div>
            <ul class="flex-grow">
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('dashboard') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('team.index') }}"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('team.index') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                        <i class="fas fa-users text-lg mr-3"></i>
                        <span class="font-medium">Teams</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('task.index') }}"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('task.index') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                        <i class="fas fa-tasks text-lg mr-3"></i>
                        <span class="font-medium">Tasks</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white">
                        <i class="fas fa-calendar-alt text-lg mr-3"></i>
                        <span class="font-medium">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('profile.edit') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                        <i class="fas fa-cog text-lg mr-3"></i>
                        <span class="font-medium">Settings</span>
                    </a>
                </li>
            </ul>

            <!-- Logout Section -->
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full py-3 px-4 rounded-lg hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white transition duration-200 text-white">
                        <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </nav> --}}

        @include('layouts.sidebar')


        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Top Navigation Bar -->
            @include('Tasks.navbar')

            <!-- Dashboard Content -->
            <div class="dashboard-content mt-6">
                <!-- Title Section -->
                <div class="bg-gradient-to-r from-black via-black to-blue-700 p-6 rounded-lg shadow-lg text-white">
                    <h2 class="text-4xl font-extrabold tracking-wide text-center mb-4">Welcome to the Task Management
                        Dashboard</h2>
                    <p class="text-lg font-medium leading-relaxed text-center">
                        Manage your tasks, track progress, and collaborate with your team effectively.
                    </p>
                </div>


                <!-- Statistics Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class="bg-black p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-100">Total Tasks</h3>
                        <p class="text-3xl font-bold text-blue-500">120</p>
                        <p class="text-sm text-gray-300">All tasks in the system.</p>
                    </div>
                    <div class="bg-black p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-100">Completed Tasks</h3>
                        <p class="text-3xl font-bold text-green-500">75</p>
                        <p class="text-sm text-gray-300">Tasks successfully completed.</p>
                    </div>
                    <div class="bg-black p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-100">Pending Tasks</h3>
                        <p class="text-3xl font-bold text-yellow-500">30</p>
                        <p class="text-sm text-gray-300">Tasks waiting to be processed.</p>
                    </div>
                </div>




                <!-- Chart Section (Placeholder for future chart integration) -->
                <div class="bg-black p-6 mt-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-100">Task Status Overview</h3>
                    <!-- Example Chart Placeholder -->
                    <div class="w-full h-64 bg-gray-200 mt-4 rounded-lg">
                        <!-- You can integrate a real chart here using Chart.js or similar -->
                        <p class="text-center text-gray-500 py-24">Chart Placeholder</p>
                    </div>
                </div>

                <!-- Quick Links Section -->


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class=" bg-blue-500 text-white p-6 rounded-lg shadow-md hover:bg-blue-600 cursor-pointer">
                        <h3 class="text-xl font-semibold">Create Task</h3>
                        <p class="text-sm mt-2">Quickly add a new task to the system.</p>
                    </div>
                    <div class=" bg-green-500 text-white p-6 rounded-lg shadow-md hover:bg-green-600 cursor-pointer">
                        <h3 class="text-xl font-semibold">Manage Teams</h3>
                        <p class="text-sm mt-2">View and manage your team members.</p>
                    </div>
                    <div class=" bg-yellow-500 text-white p-6 rounded-lg shadow-md hover:bg-yellow-600 cursor-pointer">
                        <h3 class="text-xl font-semibold">View Reports</h3>
                        <p class="text-sm mt-2">Generate and view task progress reports.</p>
                    </div>
                </div>


                <!-- User Information Section -->
                <div class="bg-black p-6 mt-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-100">User Information</h3>
                    <div class="flex items-center mt-4">
                        <div
                            class="w-12 h-12 bg-gray-300 rounded-full flex justify-center items-center text-white text-2xl">
                            <img id="profile-image" class="w-10 h-10 rounded-full cursor-pointer"
                                src="{{ asset('storage/images/' . $user->image) }}" alt="Profile Image">

                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-300">{{ $user->name }}</p>
                            <p class="text-gray-400">{{ $user->email }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>

</html>
