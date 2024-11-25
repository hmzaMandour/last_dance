<section class="bg-white shadow-md rounded-lg p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold  font-semibold">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm ">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label 
                for="update_password_current_password" 

            />
            Current Password
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label 
                for="update_password_password" 

            />
            New Password'
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label 
                for="update_password_password_confirmation" 

            />
            Confirm Password
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-black text-white hover:text-white hover:bg-black font-semibold px-4 py-2 rounded-lg focus:ring-2 focus:ring-offset-2"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
