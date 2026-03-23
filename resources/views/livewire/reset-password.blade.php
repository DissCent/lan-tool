<div class="max-w-md w-full space-y-8">
    <div>
        <h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white w-auto sm:w-80">
            {{ __('reset-password.headline') }}
        </h1>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-300">
            {{ __('reset-password.subheadline') }}
        </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST" wire:submit="submitForm">
        @csrf

        <div class="rounded-md shadow-xs -space-y-px">
            @error('email')
            <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg flex dark:bg-rose-900/50 dark:text-rose-200" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 dark:text-rose-200 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                {{ $message }}
            </div>
            @enderror
            @error('password')
            <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg flex dark:bg-rose-900/50 dark:text-rose-200" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 dark:text-rose-200 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                {{ $message }}
            </div>
            @enderror
            <div>
                <input id="email" name="email" type="email" required wire:model.live="email"
                    class="appearance-none block w-full rounded-none rounded-t-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                    placeholder="{{ __('reset-password.email') }}" />
            </div>
            <div>
                <input id="password" name="password" type="password" required wire:model.live="password"
                    class="appearance-none block w-full rounded-none bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                    placeholder="{{ __('reset-password.new-password') }}" />
            </div>
            <div>
                <input id="password_confirmation" name="password_confirmation" type="password" required wire:model.live="password_confirmation"
                    class="appearance-none block w-full rounded-none rounded-b-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                    placeholder="{{ __('reset-password.new-password') }} ({{ __('reset-password.repeat') }})" />
            </div>
        </div>

        <div>
            <button type="submit"
                class="group relative w-full flex justify-center items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500 mx-auto cursor-pointer">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 dark:text-indigo-300 dark:group-hover:text-indigo-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                {{ __('reset-password.reset-password') }}
            </button>
        </div>
    </form>
</div>
