<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Taskit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    
    <nav class="flex justify-between items-center px-[5.5vw]  py-3 ">

            {{-- left part --}}
            <div class="flex items-center gap-10">
                <img src="{{ asset('storage/images/blacklogo.png') }}" class="w-16 " alt="logo">
              
            </div>



            {{-- right part --}}
            <div>
                @if (Route::has('login'))
                    <nav class="">
                        @auth
                            <a
                                href="{{ url('dashboard') }}"
                                class="rounded-full   bg-black text-[#fff] font-bold px-4 py-2  "
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-full px-4 mr-2  py-2 text-black border-[2px] border-black hover:bg-black hover:text-white font-bold transition duration-300  "
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class=" px-4 py-2 bg-black text-[#fff] border-[2px] border-black rounded-full font-bold  hover:bg-transparent hover:border-[2px]  hover:text-black transition duration-300"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </nav> 
  

   <div class="flex justify-center   gap-36 flex-wrap lg:flex-nowrap" id="hero">    
        <div class="pt-10 w-full lg:w-auto">
            <p class="bg-[#d5e1ff] text-center rounded-full py-2 px-4 w-[45vw] sm:w-[50%] md:w-[40%]">Welcome To Slogan </p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-5 text-[#202023]">Boost Productivity</h1>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-2 text-[#202023]">Through <span class="italic border-[#ffd997] border-b-4">Effortless</span></h1>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-2 text-[#202023]">Team Management</h1>

            <div class="buutons flex pt-10 ps-5 gap-3 flex-wrap">
                <button class="bg-[#202023] text-white rounded-lg px-4 py-2">Get started Today</button>
                <button class="text-[#202023]">See Our Features</button>
            </div>

            <div class="pt-10 ps-5 flex gap-5 flex-wrap lg:flex-nowrap">
                <div class="bg-[#202023] w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg mb-5 lg:mb-0">
                    <div class="flex justify-between">
                        <p class="text-white text-sm ps-5 pt-6">[ RATING ]</p>
                        <p class="text-white font-semibold text-5xl pe-6 pt-10">4.8 <span class="text-yellow-400 text-xl">★</span></p>
                    </div>
                    <p class="mt-20 text-gray-400 text-sm ms-5 border-t border-gray-400 me-6 pt-2">The perfect team management and collaboration.</p>
                </div>

                <div class="bg-[#f6f6f5] w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg">
                    <p class="p-6 text-lg font-medium text-[#202023]">Revolution The Way Your Teams Work Together With Our Intuitive Platform</p>
                    <a href="#" class="flex items-center gap-2 mt-10 ps-5 text-[#202023] font-semibold">
                        <span>View Video</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ffd997] rounded-full" fill="#ffd997" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-5.197-3.74a1 1 0 00-1.555.832v7.48a1 1 0 001.555.832l5.197-3.74a1 1 0 000-1.664z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-auto pt-10 lg:flex">
            <img src="{{ asset('storage/images/lnding_2_1.png') }}" class="w-full lg:w-[35vw] h-auto lg:h-[95vh]" alt="logo">
        </div>
    </div>

    <div class="bg-[#d5e0ff] mb-20 mt-16 rounded-xl mx-auto w-[80vw] h-[80vh]" >
        <div class="flex justify-between">
            <div class="text-5xl font-thin pt-10 ps-20">Powerful Tools For <br> Effective Team <br> Collaboration</div>
            <div class="pe-20 pt-10 ">  
                <p class=" text-gray-500 w-[30vw] ">Unleash Your Team's Potential With Our Comprehensive Set Of Collaboration Tools. From Task Delegation To Real-Time Messaging, we've Got Everything Your Team needs In one Place.</p>
                <div class="buutons flex pt-10  gap-3 flex-wrap">
                    <button class="bg-[#202023] text-white rounded-lg px-4 py-2">See Our Features</button>
                    <button class="text-[#202023]">Sing Up free</button>
                </div>
            </div>
        </div>
        <div class="flex justify-evenly pt-6">
            <div class="bg-[#ffd997] w-[20vw] h-[40vh] rounded-xl ps-8  pt-5 text-lg">Comprehensive Tailored <br> <span class="ps-4">Toolkit To Optimize</span>  <br> <span class="ps-10">Teamwork</span> 
         <img src="{{ asset('storage/images/note.png') }}" class=" mx-auto w-40 " alt="logo">

            </div>
            <div class=" w-[17vw] h-[48vh] ps-8  pt-10 text-lg">All On One Platform To <br> <span class="ps-7">Manage Projects</span>
                <img src="{{ asset('storage/images/circle.png') }}"  alt="logo">

            </div>
            <div class=" w-[17vw] h-[40vh] ps-5  pt-8 text-lg">Intuitive Interface Design
                <img src="{{ asset('storage/images/data.png') }}" class="pt-5" alt="logo">
            </div>
        </div>
    </div>

     <div class="flex justify-center gap-32">
        <div class="pt-5">
            <h1 class="text-3xl pb-5">Track Progress Efficiently <br> With Our Task <br> Management System </h1>
            <p class="text-gray-400 w-[40vw] text-lg">Our task management. With intuitive features and user-friendly interface, you can easily manage tasks, assign responsibilities, and monitor projet milestones.</p>
            <div class="ps-10 text-lg flex flex-col gap-2 pt-5 pb-10">
                <p> <i class="bi bi-check2-circle"></i> Steamline task assignment and collaboration</p>
                <p> <i class="bi bi-check2-circle"></i> Monitor Projet milestones and deadlines</p>
                <p>  <i class="bi bi-check2-circle"></i> Track Team Performance and Productivity</p>
            </div>
            <button class="bg-[#d5e0ff] rounded-xl text-black px-3 py-3">Learn More</button>
        </div>

        <div> 
            <img src="{{ asset('storage/images/flymen.png') }}" class="w-[30vw] " alt="logo">

        </div>

     </div>

     <div class="flex justify-center gap-32">
        <div> 
            <img src="{{ asset('storage/images/flywmn.png') }}" class="w-[25vw] h-[75vh]" alt="logo">
        </div>

        <div class="pt-5">
            <h1 class="text-3xl pb-5"> Efficiently Measure And <br> Track Team Performance<br>With Advanced Analytics</h1>
            <p class="text-gray-400 w-[40vw] text-lg">Our teamwork management websites provides powerful analytics and reporting tools to help you measure and optimize your Team's performance. Gain Valuable insights and make Data-driven decisions to drive success.</p>
             
            <div class="flex flex-col gap-4 ps-10 pt-8">
                <div class="border border-gray-300 rounded-lg w-[27vw] p-2 flex items-center gap-3 hover:bg-gray-100">           
                 <img src="{{ asset('storage/images/blue.png') }}" class=" h-10 w-10" alt="logo">
                  Performance Tracking <i class="bi bi-arrow-right ps-16"></i>
                 </div>
                <div class="border border-gray-300 rounded-lg w-[27vw] p-2 flex items-center gap-3 hover:bg-gray-100">
                    <img src="{{ asset('storage/images/yellow.png') }}" class="w-10 h-10 " alt="logo">
                     Data Visualization <i class="bi bi-arrow-right ps-24"></i></div>
                </div>
        </div>
     </div>
     <div>
        <h1 class="text-center text-5xl pt-10">Efficiently Manage Your Team With </h1> 
         <h1 class="pt-2 text-center text-5xl pb-14">Our Comprehensive Features </h1>
        

         <div class="flex justify-center gap-5 pb-10">
            <div class="bg-[#daf4b6] w-[35vw] h-[37vh] rounded-xl flex"> 
                <div class="ps-5 pt-10">
                    <h1 class="text-2xl ">Seamless File <br> Sharing</h1>
                    <p class="text-gray-600 w-[20vw] pt-2 pb-7">Easily share Files with your team, ensuring everyone has access to the latest documents and resources</p>
                   
                </div>
                <div>
                    <img src="{{ asset('storage/images/green.png') }}" class="pt-7" alt="logo">
                </div>
            </div>
            <div class="border border-gray-400 rounded-xl w-[20vw] h-[37vh] hover:bg-gray-100">
            <h1 class="text-2xl pt-10 ps-5 font-medium">Ingegrated <br> Calendar</h1>
            <div class="pt-24 ps-5">
            <a href="#" class="text-black">Learn More <i class="bi bi-arrow-right ms-5 text-white bg-black rounded-full px-2 py-[1vh] "></i></a>
            </div>

            </div>
            <div class="border border-gray-400 rounded-xl w-[20vw] h-[37vh] hover:bg-gray-100">
                <h1 class="text-2xl pt-10 ps-5 font-medium">Efficient <br> Communication</h1>
                <div class="pt-24 ps-5">
                    <a href="#" class="text-black">Learn More <i class="bi bi-arrow-right ms-5 text-white bg-black rounded-full  px-2 py-[1vh] "></i></a>
                </div>
    
            </div>
         </div>
     </div>
        
     <div class="bg-[#d5e0ff] h-[88vh] mb-10">
          <h1 class="pt-16 ps-16 pb-16 text-5xl ">Ready To Get Boost <br> Productivity WIth Slogan?</h1>
           <a href="#" class="bg-white rounded-full py-4 ps-5 ms-16 ">
            Contact Us 
            <i class="bi bi-arrow-right text-black bg-[#feda97] px-3 py-2 rounded-full ms-20 me-3"></i>
           </a>

           <div class="flex  justify-between ">
            <div class="w-[40vw] pt-40 ps-16">
                <h1 class="font-medium text-lg pb-3">Powerful TeamWork Management Platform.</h1>
                <p class="text-gray-600">Streamline Collaboration, Boost Productivity, And Achieve Your Business Goals With Our Innovative Teamwork managemnt website.</p>
            </div>
            <div >
            <img src="{{ asset('storage/images/bluemen.png') }}" class="w-[41vw] " alt="logo">
            </div>
           </div>
     </div>
       
     <div class="flex justify-evenly pb-10 items-center">
            <div class="flex items-center text-xl">
                <img src="{{ asset('storage/images/blacklogo.png') }}" class="w-20 h-20 " alt="logo">
    
            </div>
            <div class="text-xl">Hello@Task.com</div>
     </div>

  <footer class="bg-white py-12 mx-20 border-t pb-10">
    <div class="container mx-auto px-4">
   

      <div class="flex flex-wrap justify-center text-center lg:text-left lg:justify-between">
        <div class="w-full lg:w-1/3 mb-6 lg:mb-0">
          <h2 class="font-bold text-lg text-gray-800">Slogan</h2>
          <p class="text-gray-500 mt-4">
            Slogan is a web-based platform designed to facilitate effective teamwork and collaboration among team members.
          </p>
          <button class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-lg">Sign up</button>
        </div>
        <div class="w-full lg:w-1/3 mb-6 ps-20 lg:mb-0">
          <h3 class="font-medium text-gray-800">Navigation</h3>
          <ul class="mt-4 space-y-2 text-gray-500">
            <li>Products</li>
            <li>Services</li>
            <li>Contact</li>
          </ul>
        </div>
        <div class="w-full lg:w-1/3">
          <h3 class="font-medium text-gray-800">Follow Us</h3>
          <ul class="mt-4 space-y-2 text-gray-500">
            <li>LinkedIn</li>
            <li>X</li>
            <li>Instagram</li>
            <li>Facebook</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <div class="fixed bottom-4 right-4">
    <a href="#hero">
        <button class="bg-[#feda97] text-gray-800 px-4 py-3 rounded-full shadow-lg">
            <i class="bi bi-arrow-up-short"></i>
        </button>
    </a>

  </div>
 
   



</body>

</html>
