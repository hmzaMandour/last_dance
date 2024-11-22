{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
        function toggleModal(modalId, show) {
            const modal = document.getElementById(modalId);
            if (show) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                modal.setAttribute('aria-hidden', 'false');
            } else {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                modal.setAttribute('aria-hidden', 'true');
            }
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.querySelector('.fixed:not(.hidden)');
                if (modal) toggleModal(modal.id, false);
            }
        });
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


<body class="min-h-screen bg-gray-200 text-gray-800">

    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <!-- Sidebar -->
    <div class="flex">


        @include('layouts.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-6 ">
            <!-- Top Navigation Bar -->

            @include('Tasks.navbar')



            <!-- Success Message -->
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

            <!-- Error Messages -->
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

            <div class="mb-4">
                @include('Tasks.create_team')
            </div>

            <!-- Overview Section -->
            <section class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Teams Overview -->


                @foreach ($teams as $team)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $team->name }}</h3>
                            <div>
                                <span class="text-[10px] font-medium text-gray-500">
                                    owner: {{ $team->owner->name }}
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">
                            {{ $team->description }}
                        </p>

                        <!-- Team Members -->
                        <div class="flex items-center mb-4">
                            <div class="flex -space-x-2">
                                @foreach ($team->members as $member)
                                    <img src="{{ asset('storage/images/' . $member->image) }}" alt="{{ $member->name }}"
                                        title="{{ $member->name }}"
                                        class="w-8 h-8 rounded-full border-2 border-white" />
                                @endforeach
                            </div>
                            <span class="text-sm text-gray-500 ml-2">
                                +{{ $team->members->count() }} members
                            </span>
                        </div>

                        @if (auth()->id() === $team->owner_id)
                            <div class="flex justify-center flex-col gap-6 mt-4">
                                <!-- Invite Members Button -->
                                <button onclick="openModal('modaleinvite{{ $team->id }}')"
                                    class="bg-gray-900 font-semibold text-white py-2 px-6 rounded-lg divide-gray-700 transition-all duration-300 ease-in-out flex items-center shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 12v6m0 0h6m-6 0H6m6-6v-6m0 0h-6m6 0h6" />
                                    </svg>
                                    Invite Members
                                </button>

                                <!-- Create Task Button -->
                                <button onclick="openModal('modaltask{{ $team->id }}')"
                                    class="border border-black font-semibold text-black py-2 px-6 rounded-lg  transition-all duration-300 ease-in-out flex items-center shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16M12 4v16" />
                                    </svg>
                                    Create Task
                                </button>
                            </div>
                        @endif





                        <!-- Modal invite -->
                        <div id="modaleinvite{{ $team->id }}"
                            class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 flex justify-center items-center">
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                                <!-- Close Button -->
                                <button onclick="closeModal('modaleinvite{{ $team->id }}')" type="button"
                                    class="absolute top-3 right-3 text-gray-400 hover:bg-red-200 hover:text-red-600 rounded-full p-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                                <!-- Modal Header -->
                                <h2 class="text-xl font-semibold text-[#446fcc] text-center mb-6">Invite Members</h2>

                                <!-- Modal Content -->
                                <form action="{{ route('invite.store', $team->id) }}" method="post" class="space-y-5">
                                    @csrf
                                    <!-- Email Input -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                            Address</label>
                                        <div class="relative mt-1">
                                            <input id="email" name="email" type="email" required
                                                class="block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc] placeholder-gray-400"
                                                placeholder="Enter member's email">
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end gap-4 mt-6">
                                        <button type="button" onclick="closeModal('modaleinvite{{ $team->id }}')"
                                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-[#446fcc] text-white rounded-md hover:bg-[#3658a7] transition">
                                            Send Invite
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal task-->
                        <div id="modaltask{{ $team->id }}"
                            class="fixed hidden z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-60"
                            aria-hidden="true" role="dialog">
                            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8 relative">
                                <!-- Close Button -->
                                <button
                                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none"
                                    aria-label="Close Modal"
                                    onclick="toggleModal('modaltask{{ $team->id }}', false)">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Modal Heading -->
                                <h2 class="text-2xl font-bold text-center text-[#446fcc] mb-6">Create a New Task</h2>

                                <!-- Form for Creating a Task -->
                                <form action="{{ route('task.store') }}" method="POST">
                                    @csrf

                                    <!-- Task Name -->
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-sm font-medium text-[#446fcc] mb-1">Task Name</label>
                                        <input type="text" name="name" id="name"
                                            class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]"
                                            placeholder="Enter task name" required value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-[#446fcc] mb-1">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]"
                                            placeholder="Enter task description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Deadline -->
                                    <div class="mb-4">
                                        <label for="deadline"
                                            class="block text-sm font-medium text-[#446fcc] mb-1">Deadline</label>
                                        <input type="datetime-local" name="deadline" id="deadline"
                                            class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]"
                                            value="{{ old('deadline') }}" required>
                                        @error('deadline')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Priority -->
                                    <div class="mb-4">
                                        <label for="priority"
                                            class="block text-sm font-medium text-[#446fcc] mb-1">Priority</label>
                                        <select name="priority" id="priority"
                                            class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]">
                                            <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>
                                                High</option>
                                            <option value="Medium"
                                                {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>
                                                Low</option>
                                        </select>
                                        @error('priority')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Assign To -->
                                    <div class="mb-4">
                                        <label for="assigned_to"
                                            class="block text-sm font-medium text-[#446fcc] mb-1">Assign to</label>
                                        <select name="assigned_to" id="assigned_to"
                                            class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]">
                                            <option value="">-- None --</option>
                                            @foreach ($team->members as $member)
                                                <h1>{{ $member }}</h1>
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end space-x-4 mt-6">
                                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        <button type="button"
                                            onclick="toggleModal('modaltask{{ $team->id }}', false)"
                                            class="text-gray-900 bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-lg shadow transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-5 py-2 bg-[#446fcc] text-white font-bold rounded-lg shadow hover:bg-[#617deb] transition">
                                            Create Task
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>







                    </div>
                @endforeach

                @if (!$user->isSubscribed() && $teamCount >= 5)
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md shadow-md">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 20h.01M12 4a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>
                            <div>
                                <p class="font-bold">You’ve reached the maximum team limit.</p>
                                <p>
                                    <a href="{{ route('subscribe') }}"
                                        class="text-blue-600 hover:underline font-medium">
                                        Subscribe
                                    </a>
                                    to create more teams.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif













                <!-- Tasks Overview -->
                {{-- <div class="bg-white p-4 shadow rounded-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">My Tasks</h3>
                        <button
                            class="bg-green-500 text-white px-3 py-1 rounded-md text-sm hover:bg-green-600 transition">
                            + Add Task
                        </button>
                    </div>
                    <ul>
                        <li class="mb-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold">Complete Wireframe</h4>
                                    <p class="text-sm text-gray-500">Deadline: 20 Nov 2024</p>
                                </div>
                                <span class="bg-yellow-200 text-yellow-600 px-2 py-1 text-xs font-medium rounded-md">In
                                    Progress</span>
                            </div>
                        </li>
                        <li>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold">Finalize API Integration</h4>
                                    <p class="text-sm text-gray-500">Deadline: 25 Nov 2024</p>
                                </div>
                                <span
                                    class="bg-red-200 text-red-600 px-2 py-1 text-xs font-medium rounded-md">Overdue</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Calendar Overview -->
                <div class="bg-white p-4 shadow rounded-md">
                    <h3 class="text-lg font-bold mb-4">Calendar</h3>
                    <div class="h-40 bg-gray-100 rounded-md flex items-center justify-center">
                        <p class="text-gray-500">Calendar View Coming Soon</p>
                    </div>
                </div> --}}
            </section>
            <div class="mt-8  flex justify-center">
                {{ $teams->links() }}
            </div>
        </main>

    </div>

    <!-- Team Cards Section -->
    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Team Card Example -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Team Name</h3>
                <span class="text-sm font-medium text-gray-500">Owner: John Doe</span>
            </div>
            <p class="text-gray-600 mb-4">
                A brief description of the team goes here, summarizing the mission and goals of the team.
            </p>

            <!-- Status -->
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm text-gray-500">Status:</span>
                <span class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Open for Join</span>
            </div>

            <!-- Team Members -->
            <div class="flex items-center mb-4">
                <div class="flex -space-x-2">
                    <img src="https://i.pravatar.cc/40?img=1" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                    <img src="https://i.pravatar.cc/40?img=2" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                    <img src="https://i.pravatar.cc/40?img=3" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                </div>
                <span class="text-sm text-gray-500 ml-2">+3 members</span>
            </div>

            <!-- Join Button -->
            <div class="flex justify-center">
                <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                    Join Team
                </button>
            </div>
        </div>

        <!-- Repeat for more teams -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Design Team</h3>
                <span class="text-sm font-medium text-gray-500">Owner: Jane Smith</span>
            </div>
            <p class="text-gray-600 mb-4">
                A group of creative minds working on design projects and enhancing user experience.
            </p>

            <!-- Status -->
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm text-gray-500">Status:</span>
                <span class="px-3 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">Invitation
                    Only</span>
            </div>

            <!-- Team Members -->
            <div class="flex items-center mb-4">
                <div class="flex -space-x-2">
                    <img src="https://i.pravatar.cc/40?img=4" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                    <img src="https://i.pravatar.cc/40?img=5" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                    <img src="https://i.pravatar.cc/40?img=6" alt="Member"
                        class="w-8 h-8 rounded-full border-2 border-white" />
                </div>
                <span class="text-sm text-gray-500 ml-2">+5 members</span>
            </div>

            <!-- Join Button -->
            <div class="flex justify-center">
                <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                    Request Invitation
                </button>
            </div>
        </div>

        <!-- More team cards can be added below -->
    </div> --}}

</body>

</html>
