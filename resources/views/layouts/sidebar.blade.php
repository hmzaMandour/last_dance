 <nav class="shadow-sm shadow-[#446fcc] w-52 bg-black min-h-screen flex flex-col p-6">
    <div class="flex items-center justify-center mb-7">
        <div class=" rounded-lg w-[120px] flex items-center justify-center">
            <img src="{{ asset('storage/images/image-removebg-preview.png') }}" alt="Taskit Logo"
                class="w-[150px] object-contain ">
        </div>
    </div>
    <ul class="flex-grow">
        <li class="mb-4">
            <a href="{{ route('dashboard') }}"
                class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('dashboard') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                <span class="font-medium">Dashboard</span>
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('team.index') }}"
                class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('team.index') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                <i class="fas fa-users text-lg mr-3"></i>
                <span class="font-medium">Teams</span>
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('task.index') }}"
                class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('task.index') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
                <i class="fas fa-tasks text-lg mr-3"></i>
                <span class="font-medium">Tasks</span>
            </a>
        </li>
        <li class="mb-4">
            <a href="#"
                class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white">
                <i class="fas fa-calendar-alt text-lg mr-3"></i>
                <span class="font-medium">Calendar</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center py-3 px-4 rounded-lg transition hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white text-white 
                {{ Route::is('profile.edit') ? 'bg-gradient-to-r from-black to-blue-700 text-white' : '' }}">
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
                class="flex items-center w-full py-3 px-4 rounded-lg hover:bg-gradient-to-r hover:from-black hover:to-blue-700 hover:text-white transition duration-200 text-white">
                <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</nav>
