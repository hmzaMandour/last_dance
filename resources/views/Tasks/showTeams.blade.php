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


<body class="min-h-screen  text-gray-800 bg-gray-100 ">

    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>


    <div class="flex min-h-screen">


        @include('layouts.sidebar')


        <main class="flex-1  p-6 ">


            @include('Tasks.navbar')




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

            <div class="mb-4 flex  items-center justify-between">
                @include('Tasks.create_team')
                <div>
                    <a href="{{ route('team.members') }}"
                        class="bg-blue-600  hover:bg-blue-500  font-semibold text-white px-4 py-2 rounded-lg">View
                        members of your team</a>

                </div>
            </div>


            <section class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-6">



                @foreach ($teams as $team)
                    <div class="bg-gray-100  border border-gray-200 rounded-lg shadow-lg p-6">
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


                        <div class="flex items-center mb-4">
                            <div class="flex -space-x-2">
                                @foreach ($team->members as $member)
                                    @if ($member->pivot->role == 'Member')
                                        <img src="{{ asset('storage/images/' . $member->image) }}"
                                            alt="{{ $member->name }}" title="{{ $member->name }}"
                                            class="w-8 h-8 rounded-full border-2 border-white" />
                                    @endif
                                @endforeach
                            </div>

                            <span class="text-sm text-gray-500 ml-2">
                                {{ $team->members->where('pivot.role', 'Member')->count() }} members
                            </span>
                        </div>
                        {{-- <div class="flex items-center mb-4">
                            <div class="flex items-center -space-x-2">
                                @foreach ($team->members as $member)
                                    @if ($member->pivot->role == 'Member')
                                        <img src="{{ asset('storage/images/' . ($member->image ?? 'default.jpg')) }}"
                                            alt="{{ $member->name }}" title="{{ $member->name }}"
                                            class="w-8 h-8 rounded-full border-2 border-white hover:scale-110 transition-transform">
                                    @endif
                                @endforeach

                                <span class="text-sm text-gray-500 ml-7">
                                    {{ $team->members->where('pivot.role', 'Member')->count() }} members
                                </span>
                            </div>

                        </div> --}}


                        @if ($user->id === $team->owner_id || $team->members->contains($user->id))
                            <div class="flex justify-center flex-col gap-6 mt-4">

                                @if ($user->id === $team->owner_id)
                                    <button onclick="openModal('modaleinvite{{ $team->id }}')"
                                        class="bg-gray-900 font-semibold text-white py-2 px-6 rounded-lg divide-gray-700 transition-all duration-300 ease-in-out flex items-center shadow-lg transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 12v6m0 0h6m-6 0H6m6-6v-6m0 0h-6m6 0h6" />
                                        </svg>
                                        Invite Members
                                    </button>
                                @endif


                                <button onclick="openModal('modaltask{{ $team->id }}')"
                                    class="border border-black font-semibold text-black py-2 px-6 rounded-lg transition-all duration-300 ease-in-out flex items-center shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16M12 4v16" />
                                    </svg>
                                    Create Task
                                </button>
                            </div>
                        @endif







                        <div id="modaleinvite{{ $team->id }}"
                            class="fixed hidden z-50 inset-0 bg-black bg-opacity-80 flex justify-center items-center">
                            <div class="bg-black text-gray-200 rounded-lg shadow-lg w-full max-w-md p-6 relative">
                                <!-- Close Button -->
                                <button onclick="closeModal('modaleinvite{{ $team->id }}')" type="button"
                                    class="absolute top-3 right-3 text-gray-500 hover:bg-gray-600 rounded-full p-2 focus:ring-gray-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                                <!-- Modal Header -->
                                <h2 class="text-xl font-semibold text-blue-400 text-center mb-6">Invite Members</h2>

                                <!-- Modal Content -->
                                <form action="{{ route('invite.store', $team->id) }}" method="post" class="space-y-5">
                                    @csrf
                                    <!-- Email Input -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-400 mb-1">Email
                                            Address</label>
                                        <div class="relative mt-1">
                                            <input id="email" name="email" type="email" required
                                                class="block w-full px-4 py-2 border border-gray-600 bg-gray-900 text-gray-200 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400 placeholder-gray-500"
                                                placeholder="Enter member's email">
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-end gap-4 mt-6">
                                        <button type="button"
                                            onclick="closeModal('modaleinvite{{ $team->id }}')"
                                            class="px-4 py-2 bg-gray-700 text-gray-200 rounded-md hover:bg-gray-600 transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-500 transition">
                                            Send Invite
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div id="modaltask{{ $team->id }}"
                            class="fixed hidden z-50 inset-0 flex items-center justify-center bg-black bg-opacity-80"
                            aria-hidden="true" role="dialog">
                            <div class="bg-black text-gray-200 rounded-lg shadow-lg max-w-lg w-full p-8 relative">
                                <!-- Close Button -->
                                <button
                                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-300 focus:ring-2 focus:ring-gray-500 focus:outline-none"
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
                                <h2 class="text-2xl font-bold text-center text-blue-400 mb-6">Create a New Task</h2>

                                <!-- Form for Creating a Task -->
                                <form action="{{ route('task.store') }}" method="POST">
                                    @csrf

                                    <!-- Task Name -->
                                    <div class="mb-4">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-400 mb-1">Task Name</label>
                                        <input type="text" name="name" id="name"
                                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                                            placeholder="Enter task name" required value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                                            placeholder="Enter task description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Deadline -->
                                    <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- Date Start -->
                                        <div>
                                            <label for="start"
                                                class="block text-sm font-medium text-gray-400 mb-1">Date Start</label>
                                            <input type="datetime-local" id="start" name="start"
                                                min="{{ date('Y-m-d\TH:i') }}"
                                                class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                                                required>
                                            @error('start')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Date End -->
                                        <div>
                                            <label for="end"
                                                class="block text-sm font-medium text-gray-400 mb-1">Date End</label>
                                            <input type="datetime-local" id="end" name="end"
                                                min="{{ date('Y-m-d\TH:i') }}"
                                                class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                                                required>
                                            @error('end')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Priority -->
                                    <div class="mb-4">
                                        <label for="priority"
                                            class="block text-sm font-medium text-gray-400 mb-1">Priority</label>
                                        <select name="priority" id="priority"
                                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                                            <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>
                                                High</option>
                                            <option value="Medium"
                                                {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>
                                                Low</option>
                                        </select>
                                        @error('priority')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Assign To -->
                                    <div class="mb-4">
                                        <label for="assigned_to"
                                            class="block text-sm font-medium text-gray-400 mb-1">Assign to</label>
                                        <select name="assigned_to" id="assigned_to"
                                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                                            <option value="">-- None --</option>
                                            @foreach ($team->members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end space-x-4 mt-6">
                                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        <button type="button"
                                            onclick="toggleModal('modaltask{{ $team->id }}', false)"
                                            class="text-white bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-lg shadow transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-5 py-2 bg-blue-600 text-white font-bold rounded-lg shadow hover:bg-blue-500 transition">
                                            Create Task
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>









                    </div>
                @endforeach

                @if (!$user->isSubscribed() && $teamCount >= 5)
                    <div
                        class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white p-6 rounded-lg shadow-xl flex items-center space-x-4">

                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 20h.01M12 4a9 9 0 100 18 9 9 0 000-18z" />
                        </svg>


                        <div>
                            <p class="text-lg font-semibold">Oops! You’ve reached the maximum team limit.</p>
                            <p class="mt-2 text-sm">To create more teams, please <a href="{{ route('subscribe') }}"
                                    class="inline-block px-6 py-3 mt-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">subscribe
                                    now</a>.</p>
                        </div>
                    </div>
                @endif

















            </section>
            <div class="mt-8  flex justify-center">
                {{ $teams->links() }}
            </div>
        </main>

    </div>


</body>

</html>
