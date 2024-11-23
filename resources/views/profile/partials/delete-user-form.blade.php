<section class="bg-[#1c1c1c] shadow-md rounded-lg p-6 space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-red-500">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
    >
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end items-center gap-4">
                <button
                    x-on:click="$dispatch('close')"
                    type="button"
                    class="bg-gray-700 text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                >
                    {{ __('Cancel') }}
                </button>

                <button
                    type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                >
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
