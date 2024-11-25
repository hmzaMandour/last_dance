<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        window.openModal = function(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        };

        window.closeModal = function(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };
    </script>
    <title>Document</title>
</head>

<body class="bg-[#1c1c1c]">
    <h1 class="hidden"> {{ $user = Auth::user() }}</h1>

    <div class="flex ">
        @include('layouts.sidebar')

        <div class="flex-1  p-6">
            @include('Tasks.navbar')


            <div>
                <section class="  bg-[#1c1c1c]">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 overflow-x-auto">
                            <div id="calendar" class="min-w-[300px]"></div>
                        </div>
                    </div>
                </section>

                <!-- Modal -->
                <div id="showcourse"
                    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
                    <div class="relative top-20 mx-auto shadow-xl rounded-xl bg-white max-w-lg w-full">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('showcourse')" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <h1 id="name" class="text-2xl font-bold text-gray-900 mb-4"></h1>
                            <p id="description" class="text-gray-600 mb-4"></p>
                            {{-- <p id="place" class="text-lg text-gray-700 mb-2"></p> --}}
                            <p id="time" class="text-indigo-600 mb-1"></p>
                            <p id="time2" class="text-indigo-600 mb-6"></p>
                            <form action="" method="POST">
                                @csrf

                                <button id="tranzabadan">

                                </button>
                                <p id="tranzabadann" onclick="closeModal('showcourse')"
                                    class="w-full text-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                                    Take it now
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', async function() {
                        let response = await axios.get("/task/calender/create2");
                        let events = response.data.events;

                        var myCalendar = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(myCalendar, {
                            headerToolbar: {
                                left: '',
                                center: 'title',
                                right: ''
                            },
                            initialView: window.innerWidth < 768 ? "timeGridDay" : "timeGridWeek",
                            slotMinTime: "04:00:00",
                            slotMaxTime: "23:00:00",
                            nowIndicator: true,
                            selectable: true,
                            events: events,
                            height: 'auto',
                            windowResize: function(view) {
                                if (window.innerWidth < 768) {
                                    calendar.changeView('timeGridDay');
                                } else {
                                    calendar.changeView('timeGridWeek');
                                }
                            },
                            eventClick: (info) => {
                                const a = info.event.extendedProps;
                                const eventStartTime = new Date(a.start_time);
                                const eventEndTime = new Date(a.end_time);
                                const nowDate = new Date();
                                const tranzabadan = document.getElementById('tranzabadan');

                                document.getElementById('name').textContent = "Team Name: " + a.name;
                                document.getElementById('description').textContent = "About the Team: " + a
                                    .description;

                                document.getElementById('time').textContent = "Start At: " + a.start_time;
                                document.getElementById('time2').textContent = "End At: " + a.end_time;
                                // tranzabadan.textContent = "Cencel";
                                tranzabadann.textContent = "Cencel";

                                // if (eventStartTime <= nowDate && eventEndTime >= nowDate) {
                                //     tranzabadan.textContent = "Take the course";
                                //     tranzabadan.classList.remove('cursor-not-allowed', 'bg-green-500');
                                //     tranzabadan.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
                                //     tranzabadan.type = "submit";
                                // } else {
                                //     tranzabadan.textContent = "The course is not available";
                                //     tranzabadan.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                                //     tranzabadan.classList.add('bg-gray-500', 'cursor-not-allowed');
                                //     tranzabadan.type = "button";
                                // }

                                openModal('showcourse');
                            },
                        });

                        calendar.render();
                    });

                    // function handleTakeCourse(courseId, startTime, endTime, availablePlaces) {
                    //     const button = document.getElementById(`take-now-${courseId}`);
                    //     const nowDate = new Date();
                    //     const courseStartTime = new Date(startTime);
                    //     const courseEndTime = new Date(endTime);

                    //     if (courseStartTime <= nowDate && courseEndTime >= nowDate && availablePlaces > 0) {
                    //         button.textContent = "Take the course";
                    //         button.classList.remove('cursor-not-allowed', 'bg-gray-500');
                    //         button.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
                    //         button.setAttribute('type', 'submit');
                    //     } else {
                    //         button.textContent = "Not available";
                    //         button.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    //         button.classList.add('bg-gray-500', 'cursor-not-allowed');
                    //         button.setAttribute('type', 'button');
                    //     }
                    // }
                </script>
            </div>




        </div>


    </div>

</body>

</html>
