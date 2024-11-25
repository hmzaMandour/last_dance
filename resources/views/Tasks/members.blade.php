<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Team Members</title>
</head>

<body class="min-h-screen bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 text-gray-800">
    <h1 class="hidden">{{ $user = Auth::user() }}</h1>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Navbar -->
            @include('Tasks.navbar')

            <!-- Page Title -->
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-700 tracking-wide">Team Members</h2>
                <p class="text-lg text-gray-600">Manage and view members of each team</p>
            </div>

            <!-- Teams -->
            @foreach ($teams as $team)
                <div class="mb-10">
                    <!-- Team Name -->
                    <h3 class="text-2xl font-semibold text-gray-700 mb-6 border-b-2 border-gray-300 pb-2">
                        <i class="fas fa-users text-blue-600 mr-2"></i> {{ $team->name }}
                    </h3>

                    <!-- Members Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($team->members as $member)
                            @if ($member->pivot->role === 'Member')
                                <!-- Member Card -->
                                <div
                                    class="bg-white rounded-xl shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                                    <div class="p-6 flex flex-col items-center">
                                        <img src="{{ asset('storage/images/' . $member->image) }}"
                                            alt="{{ $member->name }}" title="{{ $member->name }}"
                                            class="w-20 h-20 rounded-full border-4 border-blue-600 shadow-lg mb-4">

                                        <h4 class="text-xl font-semibold text-gray-800">{{ $member->name }}</h4>
                                        <p class="text-sm text-gray-600 mt-2">Role: Member</p>

                                        <!-- Kick Button -->
                                        <form
                                            action="{{ route('members.kick', ['team' => $team->id, 'member' => $member->id]) }}"
                                            method="post" class="mt-4 w-full">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full py-2 px-4 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition">
                                                <i class="fas fa-user-slash mr-2"></i> Remove Member
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
