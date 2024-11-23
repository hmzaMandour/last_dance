<section class="bg-[#1c1c1c] shadow-md rounded-lg p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-white font-semibold">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Input -->
        <div>
            <x-input-label 
                for="name" 
                :value="__('Name')" 
                class="text-gray-300" 
            />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Input -->
        <div>
            <x-input-label 
                for="email" 
                :value="__('Email')" 
                class="text-gray-300" 
            />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4">
                    <p class="text-sm text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button 
                            form="send-verification" 
                            class="underline text-blue-500 hover:text-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-500">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-white text-black hover:text-white hover:bg-black font-semibold px-4 py-2 rounded-full  focus:ring-2  focus:ring-offset-2"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 2000)" 
                    class="text-sm text-green-500"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
