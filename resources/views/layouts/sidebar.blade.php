        <nav class="shadow-sm shadow-[#446fcc] w-64 min-h-screen flex flex-col p-6">
            <img src="{{ asset('storage/images/Screenshot__92_-removebg-preview.png') }}" alt="Taskit Logo"
                class="w-22 h-22 object-contain ">
            <ul class="flex-grow">
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 rounded-lg  hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white transition hover:text-black ">
                     <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white  ">
                        <i class="fas fa-users text-lg mr-3"></i>
                        <span class="font-medium">Teams</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white  ">
                        <i class="fas fa-tasks text-lg mr-3"></i>
                        <span class="font-medium">Tasks</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white  ">
                        <i class="fas fa-calendar-alt text-lg mr-3"></i>
                        <span class="font-medium">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white  ">
                        <i class="fas fa-cog text-lg mr-3"></i>
                        <span class="font-medium">Settings</span>
                    </a>
                </li>
            </ul>

            <!-- Logout Section -->
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full py-3 px-4 rounded-lg hover:bg-gradient-to-r hover:from-blue-500 hover:to-teal-400 hover:text-white  transition duration-200 ">
                        <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </nav>