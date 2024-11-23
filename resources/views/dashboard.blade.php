<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Weekly Progress Chart
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('weeklyProgressChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                    datasets: [{
                        label: 'Tasks',
                        data: [12, 19, 3, 5, 2, 3, 9],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('taskStatusChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'In Progress', 'Pending'],
                    datasets: [{
                        data: [50, 30, 20],
                        backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
</head>

<body class="min-h-screen  bg-[rgba(0,0,0,0.89)]  font-sans">

    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <!-- Sidebar -->
    <div class="flex ">


        @include('layouts.sidebar')


        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Top Navigation Bar -->
            @include('Tasks.navbar')

            <!-- Dashboard Content -->
            <div class="dashboard-content mt-6">
                <!-- Title Section -->
                <div class="p-6 rounded-lg shadow-sm shadow-gray-400">
                    <h2 class="text-4xl font-extrabold text-white tracking-wide text-center mb-4">Welcome to the Task Management
                        Dashboard</h2>
                    <p class="text-lg font-medium text-white leading-relaxed text-center">
                        Manage your tasks, track progress, and collaborate with your team effectively.
                    </p>
                </div>


                <!-- Statistics Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class=" shadow-sm shadow-gray-400 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-white">Total Tasks</h3>
                        <p class="text-3xl font-bold text-blue-500">120</p>
                        <p class="text-sm text-white">All tasks in the system.</p>
                    </div>
                    <div class="shadow-sm shadow-gray-400 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-white">Completed Tasks</h3>
                        <p class="text-3xl font-bold text-green-500">75</p>
                        <p class="text-sm text-white">Tasks successfully completed.</p>
                    </div>
                    <div class="shadow-sm shadow-gray-400 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-white">Pending Tasks</h3>
                        <p class="text-3xl font-bold text-yellow-500">30</p>
                        <p class="text-sm text-white">Tasks waiting to be processed.</p>
                    </div>
                </div>




                <!-- Chart Section (Placeholder for future chart integration) -->
                <div class="bg-black p-6 mt-8 rounded-lg shadow-sm shadow-gray-400">
                    <h3 class="text-xl font-semibold text-white">Task Status Overview</h3>
                    <p class="text-sm text-gray-300 mt-2">A summary of your task progress and status over the week.</p>

                    <!-- Chart Container -->
                    <div class="w-full p-2 h-64 bg-white mt-6 rounded-lg flex items-center justify-center">
                        <!-- Placeholder for Chart -->
                        <canvas id="taskStatusChart" class="rounded-lg shadow-lg"></canvas>
                    </div>

                    <!-- Weekly Progress Section -->
                    <div class="mt-6 bg-white p-4 rounded-lg shadow-md">
                        <h4 class="text-lg font-medium text-black">Weekly Progress</h4>
                        <div class="mt-4 h-48">
                            <canvas id="weeklyProgressChart"></canvas>
                        </div>
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
                <div class="bg-black p-6 mt-8 rounded-lg shadow-sm shadow-gray-400">
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
