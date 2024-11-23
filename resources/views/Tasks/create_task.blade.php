<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Task</title>
    <style>
        body.overflow-hidden {
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-black text-gray-200">
    <!-- Button to Open Modal -->
    <button onclick="toggleModal('modaletasks', true)"
        class="bg-blue-600 font-bold text-white px-3 py-2 rounded-md text-sm hover:bg-blue-500 transition">
        + Create Task
    </button>

    <!-- Modal -->
    <div id="modaletasks" class="fixed hidden z-50 inset-0 flex items-center justify-center bg-black bg-opacity-80"
        aria-hidden="true" role="dialog">
        <div class="bg-black rounded-lg shadow-lg max-w-lg w-full p-8 relative text-gray-200">
            <!-- Close Button -->
            <button
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-300 focus:ring-2 focus:ring-gray-500 focus:outline-none"
                aria-label="Close Modal" onclick="toggleModal('modaletasks', false)">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                    <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Task Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                        placeholder="Enter task name" required value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-400 mb-1">Description</label>
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
                        <label for="start" class="block text-sm font-medium text-gray-400 mb-1">Date Start</label>
                        <input type="datetime-local" id="start" name="start" min="{{ date('Y-m-d\TH:i') }}"
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                            required>
                        @error('start')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date End -->
                    <div>
                        <label for="end" class="block text-sm font-medium text-gray-400 mb-1">Date End</label>
                        <input type="datetime-local" id="end" name="end" min="{{ date('Y-m-d\TH:i') }}"
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                            required>
                        @error('end')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <!-- Priority -->
                <div class="mb-4">
                    <label for="priority" class="block text-sm font-medium text-gray-400 mb-1">Priority</label>
                    <select name="priority" id="priority"
                        class="w-full px-4 py-3 border border-gray-600 bg-gray-900 text-gray-200 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                        <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                        <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                    </select>
                    @error('priority')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="toggleModal('modaletasks', false)"
                        class="text-gray-300 bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-lg shadow transition">
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
</body>


</html>
