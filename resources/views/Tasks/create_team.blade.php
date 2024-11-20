<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Team</title>
    <style>
        body.overflow-hidden {
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Button to Open Modal -->
    <button onclick="toggleModal('modalConfirm', true)"
        class="bg-[#446fcc] font-bold text-white px-3 py-2 rounded-md text-sm hover:bg-[#617deb] transition">
        + Create Team
    </button>

    <!-- Modal -->
    <div id="modalConfirm" class="fixed hidden z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-60"
        aria-hidden="true" role="dialog">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8 relative">
            <!-- Close Button -->
            <button
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none"
                aria-label="Close Modal" onclick="toggleModal('modalConfirm', false)">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Modal Heading -->
            <h2 class="text-2xl font-bold text-center text-[#446fcc] mb-6">Create a New Team</h2>

            <!-- Form for Creating a Team -->
            <form action="{{ route('task.store') }}" method="POST">
                @csrf

                <!-- Team Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-[#446fcc] mb-1">Team Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]"
                        placeholder="Enter team name" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Team Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-[#446fcc] mb-1">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-3 border border-[#446fcc] rounded-md shadow-sm focus:ring-[#446fcc] focus:border-[#446fcc]"
                        placeholder="Describe your team (optional)"></textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="toggleModal('modalConfirm', false)"
                        class="text-gray-900 bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-lg shadow transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-[#446fcc] text-white font-bold rounded-lg shadow hover:bg-[#617deb] transition">
                        Create Team
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
