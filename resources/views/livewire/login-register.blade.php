<div x-data="{ showRegistration: false, countryCodeValue: @entangle('country_code').live, clanTagValue: @entangle('clan_tag').live }">
    <div class="max-w-md w-full space-y-8" x-show="!showRegistration">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto sm:w-80">
                {{ __('login-register.headline-login') }}
            </h1>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('login-register.or') }}
                <a href="#!" class="font-medium text-indigo-600 hover:text-indigo-500" @click="showRegistration = true">
                    {{ __('login-register.subheadline-login') }}
                </a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST" wire:submit="login">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px">

                @error('username')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                @enderror
                @error('password')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                @enderror
                <div>
                    <input id="username" name="username" type="text" required wire:model.live="username"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.player-name') }}" />
                </div>
                <div>
                    <input id="password" name="password" type="password" autocomplete="current-password" required wire:model.live="password"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.password') }}" />
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" wire:model.live="remember_me"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer" />
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                        {{ __('login-register.remember-me') }}
                    </label>
                </div>

                <div class="text-sm">
                    <a href="/forgot-password" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{ __('login-register.forgot-password') }}
                    </a>
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
                    {{ __('login-register.login') }}
                </button>
            </div>
        </form>
    </div>
    <div class="max-w-md w-full space-y-8" x-show="showRegistration" x-cloak>
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto sm:w-80">
                {{ __('login-register.headline-register') }}
            </h1>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('login-register.or') }}
                <a href="#!" class="font-medium text-indigo-600 hover:text-indigo-500" @click="showRegistration = false">
                    {{ __('login-register.subheadline-register') }}
                </a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST" wire:submit="register">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    {{ __('login-register.basic-data') }}:
                </div>

                @error('new_username')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                @error('email')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                @error('new_password')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                <div>
                    <input id="new_username" name="new_username" type="text" required wire:model.live="new_username"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.player-name') }}" />
                </div>
                <div>
                    <input id="email" name="email" type="email" required wire:model.live="email"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.email') }}" />
                </div>
                <div>
                    <input id="new_password" name="new_password" type="password" autocomplete="current-password" required wire:model.live="new_password"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.password') }}" />
                </div>
                <div>
                    <input id="new_password_confirm" name="new_password_confirm" type="password"
                        autocomplete="current-password" required wire:model.live="new_password_confirm"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.password') }} ({{ __('login-register.repeat') }})" />
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    {{ __('login-register.settings') }}:
                </div>

                @error('age')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                @error('zip')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                @error('city')
                <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
                <br/>
                @enderror
                <div>
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ __('login-register.no-clan') }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none rounded-t-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer ring-inset focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm"
                            x-ref="button" @click="open = !open" aria-haspopup="listbox" :aria-expanded="open"
                            aria-labelledby="listbox-label">
                            <span class="flex items-center">
                                <span class="block truncate" x-html="label"></span>
                            </span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/selector"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>

                        <ul x-show="open" x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                            x-max="1" @click.away="open = false"
                            x-description="Select popover, show/hide based on select state."
                            @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                            aria-labelledby="listbox-label" style="display: none;">

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-0" role="option"
                                @click="clanTagValue = ''; label='{{ __('login-register.no-clan') }}'; selectedIndex = 0; open = false"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                                        {{ __('login-register.no-clan') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 0, 'text-indigo-600': !(activeIndex === 0) }"
                                    x-show="selectedIndex === 0" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-1" role="option"
                                @click="clanTagValue = 'Do'; label='{{ __('login-register.member-of') }} Do-{{ __('login-register.clan') }}'; selectedIndex = 1; open = false"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">
                                        {{ __('login-register.member-of') }} Do-{{ __('login-register.clan') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 1, 'text-indigo-600': !(activeIndex === 1) }"
                                    x-show="selectedIndex === 1" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-2" role="option"
                                @click="clanTagValue = 'OOTS'; label='{{ __('login-register.member-of') }} OOTS-{{ __('login-register.clan') }}'; selectedIndex = 2; open = false"
                                @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">
                                        {{ __('login-register.member-of') }} OOTS-{{ __('login-register.clan') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 2, 'text-indigo-600': !(activeIndex === 2) }"
                                    x-show="selectedIndex === 2" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-3" role="option"
                                @click="clanTagValue = 'VEX'; label='{{ __('login-register.member-of') }} VEX-{{ __('login-register.clan') }}'; selectedIndex = 3; open = false"
                                @mouseenter="activeIndex = 3" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">
                                        {{ __('login-register.member-of') }} VEX-{{ __('login-register.clan') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 3, 'text-indigo-600': !(activeIndex === 3) }"
                                    x-show="selectedIndex === 3" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <input id="age" name="age" type="number" required wire:model.live="age"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.age') }}" />
                </div>
                <div>
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ __('login-register.living-in') }} {{ __('login-register.germany') }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none ring-inset focus:ring-2 focus:ring-indigo-500 sm:text-sm"
                            x-ref="button" @click="open = !open" aria-haspopup="listbox" :aria-expanded="open"
                            aria-labelledby="listbox-label">
                            <span class="flex items-center">
                                <span class="block truncate" x-html="label"></span>
                            </span>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/selector"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>

                        <ul x-show="open" x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                            x-max="1" @click.away="open = false"
                            x-description="Select popover, show/hide based on select state."
                            @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                            aria-labelledby="listbox-label" style="display: none;">

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-0" role="option"
                                @click="countryCodeValue = 'DE'; label='{{ __('login-register.living-in') }} {{ __('login-register.germany') }}'; selectedIndex = 0; open = false"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.germany') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 0, 'text-indigo-600': !(activeIndex === 0) }"
                                    x-show="selectedIndex === 0" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlregisteredns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-1" role="option"
                                @click="countryCodeValue = 'DK'; label='{{ __('login-register.living-in') }} {{ __('login-register.denmark') }}'; selectedIndex = 1; open = false"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.denmark') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 1, 'text-indigo-600': !(activeIndex === 1) }"
                                    x-show="selectedIndex === 1" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlregisteredns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-2" role="option"
                                @click="countryCodeValue = 'CA'; label='{{ __('login-register.living-in') }} {{ __('login-register.canada') }}'; selectedIndex = 2; open = false"
                                @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.canada') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 2, 'text-indigo-600': !(activeIndex === 2) }"
                                    x-show="selectedIndex === 2" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-3" role="option"
                                @click="countryCodeValue = 'LU'; label='{{ __('login-register.living-in') }} {{ __('login-register.luxemburg') }}'; selectedIndex = 3; open = false"
                                @mouseenter="activeIndex = 3" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.luxemburg') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 3, 'text-indigo-600': !(activeIndex === 3) }"
                                    x-show="selectedIndex === 3" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-4" role="option"
                                @click="countryCodeValue = 'AT'; label='{{ __('login-register.living-in') }} {{ __('login-register.austria') }}'; selectedIndex = 4; open = false"
                                @mouseenter="activeIndex = 4" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 4, 'text-gray-900': !(activeIndex === 4) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 4, 'font-normal': !(selectedIndex === 4) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.austria') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 4, 'text-indigo-600': !(activeIndex === 4) }"
                                    x-show="selectedIndex === 4" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-5" role="option"
                                @click="countryCodeValue = 'CH'; label='{{ __('login-register.living-in') }} {{ __('login-register.switzerland') }}'; selectedIndex = 5; open = false"
                                @mouseenter="activeIndex = 5" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 5, 'text-gray-900': !(activeIndex === 5) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 5, 'font-normal': !(selectedIndex === 5) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.switzerland') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 5, 'text-indigo-600': !(activeIndex === 5) }"
                                    x-show="selectedIndex === 5" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>

                            <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                                id="listbox-option-6" role="option"
                                @click="countryCodeValue = 'US'; label='{{ __('login-register.living-in') }} {{ __('login-register.usa') }}'; selectedIndex = 6; open = false"
                                @mouseenter="activeIndex = 6" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 6, 'text-gray-900': !(activeIndex === 6) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 6, 'font-normal': !(selectedIndex === 6) }">
                                        {{ __('login-register.living-in') }} {{ __('login-register.usa') }}
                                    </span>
                                </div>

                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                    :class="{ 'text-white': activeIndex === 6, 'text-indigo-600': !(activeIndex === 6) }"
                                    x-show="selectedIndex === 6" style="display: none;">
                                    <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <input id="zip" name="zip" type="number" required wire:model.live="zip"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.zip') }}" />
                </div>
                <div>
                    <input id="city" name="city" type="text" required wire:model.live="city"
                        class="appearance-none rounded-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('login-register.city') }}" />
                </div>
            </div>

            <div class="mt-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_registered" name="show_zip_registered" type="checkbox" checked wire:model.live="show_zip_registered"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_registered" class="font-medium text-gray-700 cursor-pointer">{{ __('login-register.show-zip-registered') }}</label>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_public" name="show_zip_public" type="checkbox" wire:model.live="show_zip_public"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_public" class="font-medium text-gray-700 cursor-pointer">{{ __('login-register.show-zip-public') }}</label>
                    </div>
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
                    {{ __('login-register.register') }}
                </button>
            </div>
        </form>
    </div>
</div>
