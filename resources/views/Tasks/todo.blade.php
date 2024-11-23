h3<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Function to update task status via a PATCH request
            const updateTaskStatus = (taskId, newStatus) => {
                console.log(taskId, 'hhhhhhhhhhhhhhhhhhhhhh');

                fetch(`/tasks/${taskId}/update-status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            status: newStatus,
                        }),
                    })
                    .then((response) => {
                        if (!response.ok) {
                            return response.text().then((text) => {
                                console.error('Failed to update task status:', text);
                                alert('Failed to update task status. Please try again.');
                            });
                        }
                        return response.json(); // Expect JSON response
                    })
                    .then((data) => {
                        console.log('Task status updated successfully:', data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    });
            };

            // Map list IDs to task statuses
            const statusById = {
                'do-list': 'Do',
                'doing-list': 'Doing',
                'done-list': 'Done',
            };
            // console.log('wwwwwwwwwwwwwww',statusById);


            // Get references to all lists
            const doList = document.getElementById('do-list');
            const doingList = document.getElementById('doing-list');
            const doneList = document.getElementById('done-list');

            // Configure Sortable for each list
            [doList, doingList, doneList].forEach((list) => {
                new Sortable(list, {
                    group: 'tasks', // Shared group for dragging between lists
                    animation: 150,
                    onEnd: (event) => {
                        const taskId = event.item.getAttribute('data-id'); // Get the task ID
                        const targetListId = event.to
                            .id; // ID of the list where the task was dropped
                        // console.log('wwwwwwwwwwwwwww',targetListId);
                        const newStatus = statusById[
                            targetListId]; // Map list ID to task status

                        console.log('Dropped Task ID:', taskId);
                        console.log('New Status:', newStatus);

                        // Update the task status if valid
                        if (newStatus) {
                            updateTaskStatus(taskId, newStatus);
                        } else {
                            console.error('Failed to determine new status.');
                        }
                    },
                });
            });
        });
    </script>


    <style>
        .draggable-task {
            cursor: grab;
        }

        .draggable-task:active {
            cursor: grabbing;
            opacity: 0.6;
        }
    </style>


</head>

<body class="bg-[#1c1c1c]  text-gray-800">
    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <div class="flex">
        @include('layouts.sidebar')

        <div class="flex-1 p-6">
            @include('Tasks.navbar')


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Do Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-red-600 text-center mb-4">Do</h2>
                    <ul id="do-list" class="space-y-3">
                        @forelse ($tasks['Do'] ?? [] as $task)
                            <li class="p-4 rounded-lg shadow transition hover:shadow-lg draggable-task 
                        {{ $task->priority === 'High' ? 'bg-red-100 border-l-4 border-red-500' : '' }}
                        {{ $task->priority === 'Medium' ? 'bg-yellow-100 border-l-4 border-yellow-500' : '' }}
                        {{ $task->priority === 'Low' ? 'bg-green-100 border-l-4 border-green-500' : '' }}"
                                data-id="{{ $task->id }}">
                                <h3 class="font-semibold text-lg text-gray-800">{{ $task->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                            </li>
                        @empty
                            <p class="text-gray-500 text-center">No tasks in this category.</p>
                        @endforelse
                    </ul>
                </div>

                <!-- Doing Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-yellow-600 text-center mb-4">Doing</h2>
                    <ul id="doing-list" class="space-y-3">
                        @forelse ($tasks['Doing'] ?? [] as $task)
                            <li class="p-4 rounded-lg shadow transition hover:shadow-lg draggable-task 
                        {{ $task->priority === 'High' ? 'bg-red-100 border-l-4 border-red-500' : '' }}
                        {{ $task->priority === 'Medium' ? 'bg-yellow-100 border-l-4 border-yellow-500' : '' }}
                        {{ $task->priority === 'Low' ? 'bg-green-100 border-l-4 border-green-500' : '' }}"
                                data-id="{{ $task->id }}">
                                <h3 class="font-semibold text-lg text-gray-800">{{ $task->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                            </li>
                        @empty
                            <p class="text-gray-500 text-center">No tasks in this category.</p>
                        @endforelse
                    </ul>
                </div>

                <!-- Done Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-green-600 text-center mb-4">Done</h2>
                    <ul id="done-list" class="space-y-3">
                        @forelse ($tasks['Done'] ?? [] as $task)
                            <li class="p-4 rounded-lg shadow transition hover:shadow-lg draggable-task 
                        {{ $task->priority === 'High' ? 'bg-red-100 border-l-4 border-red-500' : '' }}
                        {{ $task->priority === 'Medium' ? 'bg-yellow-100 border-l-4 border-yellow-500' : '' }}
                        {{ $task->priority === 'Low' ? 'bg-green-100 border-l-4 border-green-500' : '' }}"
                                data-id="{{ $task->id }}">
                                <h3 class="font-semibold text-lg text-gray-800">{{ $task->name }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                            </li>
                        @empty
                            <p class="text-gray-500 text-center">No tasks in this category.</p>
                        @endforelse
                    </ul>
                </div>
            </div>




        </div>


    </div>



</body>

</html>
