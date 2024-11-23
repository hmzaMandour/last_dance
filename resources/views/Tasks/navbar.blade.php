   <header class="bg-white shadow-lg rounded-md mb-6">
    <nav class="flex justify-between items-center px-6 py-4">
        
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('storage/images/blacklogo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
        </div>
        
        <!-- Search Input -->
        <div class="hidden md:flex flex-1 mx-6">
            <div class="relative w-full">
                <input type="text" placeholder="Search..."
                    class="w-full px-4 py-2 rounded-full text-sm text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                <span class="absolute inset-y-0 right-4 flex items-center">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>




        <!-- User Profile -->
        <div class="flex items-center space-x-4">
            <div class="relative">
                <img id="profile-image" class="w-10 h-10 rounded-full border border-black border-2 cursor-pointer"
                    src="{{ asset('storage/images/' . $user->image) }}" alt="Profile Image">
                <span class="absolute top-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
            </div>
            <div class="text-gray-700">
                <span class="text-sm font-medium">{{ $user->name }}</span>
            </div>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="md:hidden text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>
