<div class="max-w-md w-full space-y-8">
    <div>
        <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto sm:w-80">
            Neues Passwort anfordern
        </h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            oder
            <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                zum Login zurückkehren
            </a>
        </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST" wire:submit.prevent="submitForm">
        @csrf

        <div class="rounded-md shadow-sm -space-y-px">
            @error('email')
            <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                {{ $message }}
            </div>
            @enderror
            <div>
                <label for="email" class="sr-only">E-Mail-Adresse</label>
                <input id="email" name="email" type="text" required wire:model="email"
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="E-Mail-Adresse" />
            </div>
        </div>

        <div>
            <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                Anfrage senden
            </button>
        </div>
    </form>
</div>
