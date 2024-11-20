<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Taskit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <!-- Navbar -->
        <nav class="sticky top-0 bg-white z-50 shadow-sm">
            <div class="container mx-auto px-6  flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('/storage/images/Screenshot__92_-removebg-preview.png') }}" alt="Taskit Logo"
                        class="object-contain" style="width: 90px; height: 90px;">
                </div>
                <div class="flex items-center space-x-4">

                    <a href="{{ route('login') }}"
                        class="rounded-full px-4 py-2 border border-gray-300   hover:bg-[#3271f7] hover:text-white transition">Log
                        in</a>
                    <a href="{{ route('register') }}"
                        class="rounded-full px-4 py-2 bg-[#446fcc] text-white     hover:bg-[#3271f7]   transition">Register</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            <div class="container mx-auto px-6 py-9 md:py-12">
                <div class="grid md:grid-cols-2 gap-28 items-center">
                    <div class="order-2 md:order-1">

                        <dotlottie-player
                            src="https://lottie.host/88026811-f49b-4c86-a550-03311560b540/Jdxg1SeY6n.lottie"
                            background="transparent" speed="1" width='200px' loop autoplay></dotlottie-player>
                    </div>
                    <div class="order-1 md:order-2 text-center md:text-left">
                        <h1 class="text-4xl md:text-4xl font-bold leading-tight mb-6">
                            Organize, Assign, and Accomplish Your Goals
                        </h1>
                        <p class="text-xl text-gray-600 mb-8 ">
                            Accomplish project goals on time within a fun and easy-to-use collaborative environment.
                        </p>
                        <a href="{{ route('register') }}"
                            class="rounded-full bg-[#446fcc] text-white  hover:bg-[#3271f7]  text-lg px-8 py-3 inline-block">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>



            <!-- Features Section -->
            <section class="bg-white py-16">
                <div class="container mx-auto px-6">
                    <h2 class="text-3xl font-bold text-center  mb-12">Why Choose Taskit?</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div
                            class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-lg shadow-sm group hover:bg-gray-100 hover:border-green-500 border border-gray-200 transition">
                            <h3 class="mt-4 mb-2 text-xl font-semibold">Intuitive Interface</h3>
                            <p class="text-gray-600">Easy-to-use platform that streamlines your task management process.
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6M5.25 5.25a2.25 2.25 0 014.5 0h5.25a2.25 2.25 0 014.5 0m-1.5 13.5a2.25 2.25 0 01-4.5 0H9.75a2.25 2.25 0 01-4.5 0" />
                            </svg>
                        </div>

                        <div
                            class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-lg shadow-sm group hover:bg-gray-100 hover:border-blue-500 border border-gray-200 transition">

                            <h3 class="mt-4 mb-2 text-xl font-semibold">Customizable Workflows</h3>
                            <p class="text-gray-600">Tailor the platform to fit your unique project management needs.
                            </p>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 6.75h.008v.008h-.008v-.008ZM5.25 6.75h.008v.008H5.25v-.008ZM9.75 9.75a2.25 2.25 0 11-4.5 0m4.5 0v-.008v.008Zm4.5-3a2.25 2.25 0 10-4.5 0m4.5 0v.008-.008Zm5.25 9.75h.008v.008h-.008v-.008Zm-2.25 0h.008v.008H17.25v-.008Zm-7.5 0h.008v.008h-.008v-.008ZM4.5 16.5h.008v.008H4.5v-.008ZM6.75 19.5h.008v.008H6.75v-.008ZM18 19.5h.008v.008H18v-.008Z" />
                            </svg>
                        </div>

                        <div
                            class="flex flex-col items-center text-center p-6 bg-gray-50 rounded-lg shadow-sm group hover:bg-gray-100 hover:border-yellow-500 border border-gray-200 transition">

                            <h3 class="mt-4 mb-2 text-xl font-semibold">Collaboration Tools</h3>
                            <p class="text-gray-600">Work seamlessly with your team, assign tasks, and track progress in
                                real-time.</p>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3.75L8.625 7.125l.797 5.625h5.156l.797-5.625L12 3.75zM3.75 12L7.125 8.625l5.625.797v5.156l-5.625.797L3.75 12zm16.5 0l-3.375 3.375-5.625-.797V9.422l5.625-.797L20.25 12zM12 20.25l-3.375-3.375-.797-5.625h5.156l-.797 5.625L12 20.25z" />
                            </svg>
                        </div>


                    </div>
                </div>
            </section>

            <div class="container mx-auto p-6">

                <!-- Section 1: Task Management Overview -->
                <div
                    class="flex flex-col items-center  p-8 bg-gray-50 rounded-lg shadow-sm mb-8 hover:bg-gray-100 transition">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Task Management Simplified</h2>
                    <p class="text-gray-600 mb-4 ">Stay organized and on track with our easy-to-use task management
                        system.</p>
                    <div class="flex items-center justify-center space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l6 6L21 3" />
                        </svg>
                    </div>
                </div>

                <!-- Section 2: Assign & Track Tasks -->
                <div
                    class="flex flex-col md:flex-row items-center text-center md:text-left p-8 bg-white rounded-lg shadow-sm mb-8 hover:bg-gray-50 transition">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <h3 class="text-4xl font-semibold  text-gray-800 mb-4">Assign & Track Tasks</h3>
                        <p class="text-gray-600 ">Assign tasks to your team members and track their progress in
                            real-time.</p>
                    </div>
                    <div class="md:w-1/2">

                        <dotlottie-player
                            src="https://lottie.host/88026811-f49b-4c86-a550-03311560b540/Jdxg1SeY6n.lottie"
                            background="transparent" speed="1" width='200px' loop autoplay></dotlottie-player>
                    </div>
                </div>

                <!-- Section 3: Deadline Alerts -->
                <div
                    class="flex flex-col items-center text-center p-8 bg-yellow-50 rounded-lg shadow-sm mb-8 hover:bg-yellow-100 transition">
                    <h3 class="text-2xl font-semibold text-yellow-600 mb-4">Deadline Alerts</h3>
                    <p class="text-gray-600 mb-4">Never miss a deadline with automatic reminders and notifications.</p>
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-yellow-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 0v4m0-4H8m4 0h4m-1-7H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2z" />
                        </svg>
                    </div>
                </div>

                <!-- Section 4: Task Prioritization -->
                <div
                    class="flex flex-col md:flex-row items-center text-center md:text-left p-8 bg-blue-50 rounded-lg shadow-sm mb-8 hover:bg-blue-100 transition">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <h3 class="text-2xl font-semibold text-blue-600 mb-4">Task Prioritization</h3>
                        <p class="text-gray-600">Organize tasks by priority and focus on what matters most.</p>
                    </div>
                    <div class="md:w-1/2">
                        <img src="{{ asset('/storage/images/tasks.jpg') }}" alt="Task Prioritization"
                            class="rounded-lg shadow-md">
                    </div>
                </div>

                <!-- Section 5: Collaborative Task Editing -->
                <div
                    class="flex flex-col items-center text-center p-8 bg-purple-50 rounded-lg shadow-sm mb-8 hover:bg-purple-100 transition">
                    <h3 class="text-2xl font-semibold text-purple-600 mb-4">Collaborative Task Editing</h3>
                    <p class="text-gray-600 mb-4">Work together with your team on tasks and see real-time updates.</p>
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-purple-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                    </div>
                </div>

                <!-- Section 6: Analytics & Reports -->
                <div
                    class="flex flex-col md:flex-row gap-10 items-center text-center md:text-left p-8 bg-gray-50 rounded-lg shadow-sm mb-8 hover:bg-gray-100 transition">
                    <div class="md:w-1/2">
                        <img src="{{ asset('/storage/images/tasks2.jpg') }}" alt="Analytics"
                            class="rounded-lg shadow-md">
                    </div>
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Analytics & Reports</h3>
                        <p class="text-gray-600">Generate task progress reports and insights with powerful analytics.
                        </p>
                    </div>

                </div>

            </div>



        </main>

        <!-- Footer -->
        <footer class="bg-[#446fcc] text-gray-300 py-12">
            <div class="container mx-auto px-6 md:px-12">
                <!-- Footer Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Company Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-black mb-4">About Us</h3>
                        <p class="text-white">
                            We provide task management solutions that simplify workflows and improve team productivity.
                        </p>
                        <p class="mt-4 text-white">
                            <strong>Email:</strong> support@taskmanager.com
                        </p>
                        <p class="text-white">
                            <strong>Phone:</strong> +1 234 567 890
                        </p>
                    </div>

                    <!-- Useful Links -->
                    <div>
                        <h3 class="text-lg font-semibold text-black mb-4">Quick Links</h3>
                        <ul>
                            <li class="mb-2">
                                <a href="#" class="hover:text-blue-400 transition">Home</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="hover:text-blue-400 transition">Features</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="hover:text-blue-400 transition">Pricing</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="hover:text-blue-400 transition">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Social Media Links -->
                    <div>
                        <h3 class="text-lg font-semibold text-black mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:text-blue-400 text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M12 2.2c3.2 0 3.6.01 4.85.07 1.17.05 1.97.22 2.42.37.61.2 1.05.44 1.51.9.47.47.71.9.9 1.51.15.45.32 1.25.37 2.42.06 1.25.07 1.65.07 4.85s-.01 3.6-.07 4.85c-.05 1.17-.22 1.97-.37 2.42-.2.61-.44 1.05-.9 1.51-.47.47-.9.71-1.51.9-.45.15-1.25.32-2.42.37-1.25.06-1.65.07-4.85.07s-3.6-.01-4.85-.07c-1.17-.05-1.97-.22-2.42-.37-.61-.2-1.05-.44-1.51-.9-.47-.47-.71-.9-.9-1.51-.15-.45-.32-1.25-.37-2.42-.06-1.25-.07-1.65-.07-4.85s.01-3.6.07-4.85c.05-1.17.22-1.97.37-2.42.2-.61.44-1.05.9-1.51.47-.47.9-.71 1.51-.9.45-.15 1.25-.32 2.42-.37C8.4 2.21 8.8 2.2 12 2.2zm0-2.2C8.76 0 8.33.01 7.05.07 5.78.13 4.74.34 3.84.7a5.53 5.53 0 00-2 1.3A5.53 5.53 0 00.7 3.84c-.36.9-.57 1.94-.63 3.21C.01 8.33 0 8.76 0 12s.01 3.67.07 4.95c.06 1.27.27 2.31.63 3.21.4.94.92 1.5 1.63 2.21.71.71 1.27 1.23 2.21 1.63.9.36 1.94.57 3.21.63C8.33 23.99 8.76 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.31-.27 3.21-.63.94-.4 1.5-.92 2.21-1.63.71-.71 1.23-1.27 1.63-2.21.36-.9.57-1.94.63-3.21.06-1.27.07-1.7.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.27-2.31-.63-3.21a5.53 5.53 0 00-1.3-2A5.53 5.53 0 0020.16.7c-.9-.36-1.94-.57-3.21-.63C15.67.01 15.24 0 12 0z" />
                                    <path
                                        d="M12 5.8a6.2 6.2 0 100 12.4 6.2 6.2 0 000-12.4zm0 10.2a4 4 0 110-8 4 4 0 010 8zM18.4 5.65a1.5 1.5 0 11-3.001-.001A1.5 1.5 0 0118.4 5.65z" />
                                </svg>
                            </a>
                            <a href="#" class="hover:text-blue-400 text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M22.46 6c-.77.35-1.58.58-2.44.69a4.26 4.26 0 001.88-2.35 8.3 8.3 0 01-2.66 1.02 4.16 4.16 0 00-7.13 3.79 11.78 11.78 0 01-8.55-4.34 4.14 4.14 0 001.3 5.5c-.68-.02-1.32-.21-1.87-.52v.05a4.16 4.16 0 003.33 4.07 4.2 4.2 0 01-1.86.07 4.17 4.17 0 003.89 2.89A8.36 8.36 0 012 19.2a11.73 11.73 0 006.29 1.83">
                                    </path>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-blue-400 text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M22.23 0H1.77A1.77 1.77 0 000 1.77v20.46A1.77 1.77 0 001.77 24h20.46A1.77 1.77 0 0024 22.23V1.77A1.77 1.77 0 0022.23 0zM7.2 20.52H3.6V9h3.6v11.52zM5.4 7.8A2.08 2.08 0 013.6 6c0-1.08.88-1.96 1.96-1.96S7.52 4.92 7.52 6a2.08 2.08 0 01-2.12 1.8zM20.4 20.52h-3.6V15c0-1.32-.24-2.16-1.8-2.16s-2.16 1.08-2.16 2.16v5.52h-3.6V9h3.6v1.56h.04c.48-.88 1.64-1.92 3.36-1.92 3.6 0 4.28 2.4 4.28 5.64v6.24z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-700 mt-8"></div>

                <!-- Copyright -->
                <div class="flex flex-col md:flex-row justify-between items-center mt-8 text-black text-sm">
                    <p>&copy; 2024 TaskManager. All rights reserved.</p>
                    <ul class="flex space-x-4 mt-4 md:mt-0">
                        <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Support</a></li>
                    </ul>
                </div>
            </div>
        </footer>

    </div>

</body>

</html>
