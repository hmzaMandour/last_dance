<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Task Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script type="text/javascript">
        window.openModal = function(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        window.closeModal = function(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        document.onkeydown = function(event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document.getElementById('modelConfirm').classList.add('hidden');
            }
        };
    </script>

    <script>
        function hideMessages() {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 4000);
            }
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 4000);
            }
        }

        document.addEventListener('DOMContentLoaded', hideMessages);
    </script>
</head>

<body class=" text-gray-800 overflow-x-hidden bg-gray-100">
    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <div class=" flex     ">
            @include('layouts.sidebar')
        </div>

        <main class="flex-1 p-4 lg:p-6">
            <!-- Navbar -->
            @include('Tasks.navbar')

            <!-- Success & Error Messages -->
            @if (session('success'))
                <div id="success-message"
                    class="bg-green-100 border border-green-400 text-green-700 mt-4 p-4 rounded-lg mb-4 shadow-sm flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div id="error-message"
                    class="bg-red-100 border border-red-400 text-red-700 mt-4 p-4 rounded-lg mb-4 shadow-sm flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Top Section -->
            <div class="mb-4 flex flex-wrap items-center justify-between">
                <div class="mb-2 ">
                    @include('Tasks.create_task')
                </div>
                <div class="mb-2">
                    <a href="{{ route('tasks.todo') }}"
                        class="bg-blue-600 hover:bg-blue-500 font-semibold text-white px-4 py-2 rounded-lg">View To-Do
                        List</a>
                </div>
            </div>

            <!-- Team Tasks -->
            <div class="container shadow-lg bg-white rounded-lg mb-6 overflow-x-auto">
                <h2 class="text-2xl font-bold mb-4 p-2 text-center">Team Tasks</h2>
                <table class="min-w-full table-auto divide-y divide-gray-300 text-sm">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3">Task Name</th>
                            <th class="px-6 py-3">Deadline</th>
                            <th class="px-6 py-3">Priority</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Creator</th>
                            <th class="px-6 py-3">Assigned To</th>
                            <th class="px-6 py-3">Team</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($teamTasks as $task)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $task->name }}</td>
                                <td class="px-6 py-4">
                                    <div>Start: {{ \Carbon\Carbon::parse($task->start)->format('H:i') }}</div>
                                    <div>End: {{ \Carbon\Carbon::parse($task->end)->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 inline-block text-xs font-semibold rounded 
                                        @if ($task->priority === 'High') bg-red-600 text-white 
                                        @elseif ($task->priority === 'Medium') bg-yellow-500 text-black 
                                        @else bg-green-500 text-black @endif">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 inline-block text-xs font-semibold rounded 
                                        @if ($task->status === 'Do') bg-black text-red-400 
                                        @elseif ($task->status === 'Doing') bg-black text-yellow-400 
                                        @else bg-black text-green-400 @endif">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $task->creator->name }}</td>
                                <td class="px-6 py-4">{{ $task->assignee?->name ?? 'Unassigned' }}</td>
                                <td class="px-6 py-4">{{ $task->team?->name ?? 'No Team' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">

                                        @can('destroy-task', $task)
                                            <button class="p-2 text-blue-500 rounded-full">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="p-2 text-red-500 rounded-full">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- My Own Tasks -->
            <div class="container shadow-lg bg-white rounded-lg overflow-x-auto">
                <h2 class="text-2xl font-bold mb-4 p-2 text-center">My Own Tasks</h2>
                <table class="min-w-full table-auto divide-y divide-gray-300 text-sm">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3">Task Name</th>
                            <th class="px-6 py-3">Deadline</th>
                            <th class="px-6 py-3">Priority</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Creator</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($userTasks as $task)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $task->name }}</td>
                                <td class="px-6 py-4">
                                    <div>Start: {{ \Carbon\Carbon::parse($task->start)->format('H:i') }}</div>
                                    <div>End: {{ \Carbon\Carbon::parse($task->end)->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 inline-block text-xs font-semibold rounded 
                                        @if ($task->priority === 'High') bg-red-600 text-white 
                                        @elseif ($task->priority === 'Medium') bg-yellow-500 text-black 
                                        @else bg-green-500 text-black @endif">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 inline-block text-xs font-semibold rounded 
                                        @if ($task->status === 'Do') bg-black text-red-400 
                                        @elseif ($task->status === 'Doing') bg-black text-yellow-400 
                                        @else bg-black text-green-400 @endif">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $task->creator->name }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button class="p-2 text-blue-500 rounded-full">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="p-2 text-red-500 rounded-full">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

</body>

</html>
