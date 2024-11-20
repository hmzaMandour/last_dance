            <header
                class="flex justify-between shadow-sm shadow-[#446fcc] items-center border p-4 rounded-md mb-6 bg-gradient-to-r from-blue-500 to-teal-400">
                <h2 class="text-xl text-white font-bold">
                    <a href="{{ route('dashboard') }}" class="text-white">Dashboard</a>
                </h2>

                <!-- Search Input -->
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
                        <span class="text-white">{{ $user->name }}</span>
                    </div>
                </div>
            </header>