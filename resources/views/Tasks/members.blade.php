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

<body class="min-h-screen bg-[#1c1c1c] text-gray-200">
    <h1 class="hidden">{{ $user = Auth::user() }}</h1>

    <div class="flex">
        @include('layouts.sidebar')

        <div class="flex-1 p-6">
            @include('Tasks.navbar')

            <h2 class="text-3xl font-bold text-white mb-6 text-center">Team Members</h2>

            @foreach ($teams as $team)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-300 mb-4">
                        Name of the Team: {{ $team->name }}
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($team->members as $member)
                            @if ($member->pivot->role === 'Member')
                                <div
                                    class="bg-gray-800 rounded-lg shadow-md p-6 flex flex-col items-center justify-between">
                                    <img src="{{ asset('storage/images/' . $member->image) }}" alt="{{ $member->name }}"
                                        title="{{ $member->name }}"
                                        class="w-8 h-8 rounded-full border-2 border-white" />

                                    <h4 class="text-lg font-semibold text-gray-100 mb-2">
                                        {{ $member->name }}
                                    </h4>
                                    <form
                                        action="{{ route('members.kick', ['team' => $team->id, 'member' => $member->id]) }}" 
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="mt-4 px-4 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 transition">
                                            <i class="fas fa-user-slash mr-2"></i> Kick
                                        </button>
                                    </form>


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
