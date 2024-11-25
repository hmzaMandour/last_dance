<nav class="shadow-sm shadow-gray-400 bg-[#1c1c1c] w-56  flex flex-col p-6 lg:w-56 lg:block hidden">
    <div class="flex items-center justify-center mb-7">
        <div class="rounded-lg w-[130px] flex items-center justify-center">
            <img src="{{ asset('storage/images/image-removebg-preview.png') }}" alt="Taskit Logo"
                class="w-[150px] object-contain">
        </div>
    </div>

    <!-- Navigation Links -->
    <ul class="flex-grow space-y-4">
        <li>
            <a href="{{ route('dashboard') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('dashboard') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                <span class="font-medium">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('team.index') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('team.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-users text-lg mr-3"></i>
                <span class="font-medium">Teams</span>
            </a>
        </li>
        <li>
            <a href="{{ route('task.index') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('task.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-tasks text-lg mr-3"></i>
                <span class="font-medium">Tasks</span>
            </a>
        </li>
        <li>
            <a href="{{ route('calender.index') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('calender.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-calendar-alt text-lg mr-3"></i>
                <span class="font-medium">Calendar</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teamCal') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('teamCal') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-calendar-alt text-lg mr-3"></i>
                <span class="font-medium">Team Calendar</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('profile.edit') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-cog text-lg mr-3"></i>
                <span class="font-medium">Settings</span>
            </a>
        </li>
    </ul>

    <!-- Logout Button -->
    <div class="mt-6">
        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
            @csrf
            <button type="submit"
                class="flex items-center w-full py-3 px-4 rounded-lg transition duration-200 bg-red-600 text-white hover:bg-red-700">
                <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Navigation -->
<div class="lg:hidden bg-[#1c1c1c] shadow-sm shadow-gray-400 fixed top-0 left-0 w-full z-50">
    <div class="flex items-center justify-between p-4">
        <div>
            <img src="{{ asset('storage/images/image-removebg-preview.png') }}" alt="Taskit Logo" class="w-[120px]">
        </div>
        <button id="mobileMenuButton" class="text-white text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div id="mobileMenu" class="hidden flex-col p-6 space-y-4 bg-[#1c1c1c]">
        <ul class="flex-grow space-y-4">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('dashboard') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('team.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('team.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-users text-lg mr-3"></i>
                    <span class="font-medium">Teams</span>
                </a>
            </li>
            <li>
                <a href="{{ route('task.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('task.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-tasks text-lg mr-3"></i>
                    <span class="font-medium">Tasks</span>
                </a>
            </li>
            <li>
                <a href="{{ route('calender.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('calender.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-calendar-alt text-lg mr-3"></i>
                    <span class="font-medium">Calendar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('teamCal') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('teamCal') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-calendar-alt text-lg mr-3"></i>
                    <span class="font-medium">Team Calendar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('profile.edit') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-cog text-lg mr-3"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full py-3 px-4 rounded-lg transition duration-200 bg-red-600 text-white hover:bg-red-700">
                <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>

<script>
    // Toggle Mobile Menu
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
