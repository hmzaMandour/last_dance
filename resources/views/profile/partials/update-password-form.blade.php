<section class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-blue-600 dark:text-blue-400">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-gray-700 dark:text-gray-200" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-gray-700 dark:text-gray-200" />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-200" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 2000)" 
                    class="text-sm text-green-600 dark:text-green-400"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
