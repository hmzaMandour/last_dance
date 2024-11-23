 <nav class="shadow-sm shadow-gray-400 bg-[#1c1c1c] w-52  min-h-screen flex flex-col p-6">
     <div class="flex items-center justify-center mb-7">
         <div class=" rounded-lg w-[130px] flex items-center justify-center">
             <img src="{{ asset('storage/images/image-removebg-preview.png') }}" alt="Taskit Logo"
                 class="w-[150px] object-contain ">
         </div>
     </div>
     <ul class="flex-grow">
         <li class="mb-4">
             <a href="{{ route('dashboard') }}"
                 class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
        {{ Route::is('dashboard') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                 <i class="fas fa-tachometer-alt rounded-full flex items-center justify-center text-lg mr-3"></i>
                 <span class="font-medium">Dashboard</span>
             </a>
         </li>

         <li class="mb-4">
             <a href="{{ route('team.index') }}"
                 class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300  
                {{ Route::is('team.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                 <i class="fas fa-users   rounded-full flex items-center justify-center text-lg mr-3"></i>
                 <span class="font-medium ">Teams</span>
             </a>
         </li>
         <li class="mb-4">
             <a href="{{ route('task.index') }}"
                 class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 
                {{ Route::is('task.index') ? 'bg-white text-black' : 'bg-[#151516] text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                 <i class="fas fa-tasks text-lg mr-3"></i>
                 <span class="font-medium">Tasks</span>
             </a>
         </li>
         <li class="mb-4">
             <a href="{{ route('calender.index') }}"
                 class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300  text-white">
                 <i class="fas fa-calendar-alt text-lg mr-3"></i>
                 <span class="font-medium">Calendar</span>
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

     <!-- Logout Section -->
     <div class="mt-auto">
         <form method="POST" action="{{ route('logout') }}" class="flex items-center">
             @csrf
             <button type="submit"
                 class="flex items-center w-full py-3 px-4 rounded-lg  transition duration-200 text-white bg-red-600 hover:bg-red-700 ">
                 <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                 <span class="font-medium">Logout</span>
             </button>
         </form>
     </div>
 </nav>
