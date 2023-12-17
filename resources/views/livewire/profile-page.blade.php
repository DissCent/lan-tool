<div x-data="{ countryCodeValue: @entangle('country_code').live, clanTagValue: @entangle('clan_tag').live, success: @entangle('success').live }">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto sm:w-80">
                {{ __('profile-page.edit-profile') }}
            </h1>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST" wire:submit="updateProfile">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    {{ __('profile-page.change-password') }}:
                </div>

                @error('new_password')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                <div>
                    <input id="new_password" name="new_password" type="password" autocomplete="current-password" wire:model.live="new_password"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('profile-page.password') }}" />
                </div>
                <div>
                    <input id="new_password_confirm" name="new_password_confirm" type="password"
                        autocomplete="current-password" wire:model.live="new_password_confirm"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('profile-page.password') }} ({{ __('profile-page.repeat') }})" />
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    {{ __('profile-page.clan-age-city') }}:
                </div>

                @error('clan_tag')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                @error('age')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                @error('country_code')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                @error('zip')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                @error('city')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                <div>
                    @php
                        $selectedIndex = 0;
                        $label = __('profile-page.no-clan');

                        if ($clan_tag == 'Do') {
                            $selectedIndex = 1;
                            $label = __('profile-page.member-of') . ' ' . 'Do-' . __('profile-page.clan');
                        } elseif ($clan_tag == 'OOTS') {
                            $selectedIndex = 2;
                            $label = __('profile-page.member-of') . ' ' . 'OOTS-' . __('profile-page.clan');
                        } elseif ($clan_tag == 'VEX') {
                            $selectedIndex = 3;
                            $label = __('profile-page.member-of') . ' ' . 'VEX-' . __('profile-page.clan');
                        }
                    @endphp
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: {{ $selectedIndex }}, label: '{{ $label }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none rounded-t-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer ring-inset focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
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
                                @click="clanTagValue = ''; label='{{ __('misc.no-clantag') }}'; selectedIndex = 0; open = false"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                                        {{ __('misc.no-clantag') }}
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
                                @click="clanTagValue = 'Do'; label='{{ __('profile-page.member-of') }} Do-{{ __('profile-page.clan') }}'; selectedIndex = 1; open = false"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">
                                        {{ __('profile-page.member-of') }} Do-{{ __('profile-page.clan') }}
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
                                @click="clanTagValue = 'OOTS'; label='{{ __('profile-page.member-of') }} OOTS-{{ __('profile-page.clan') }}'; selectedIndex = 2; open = false"
                                @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">
                                        {{ __('profile-page.member-of') }} OOTS-{{ __('profile-page.clan') }}
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
                                @click="clanTagValue = 'VEX'; label='{{ __('profile-page.member-of') }} VEX-{{ __('profile-page.clan') }}'; selectedIndex = 3; open = false"
                                @mouseenter="activeIndex = 3" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">
                                        {{ __('profile-page.member-of') }} VEX-{{ __('profile-page.clan') }}
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
                        placeholder="{{ __('profile-page.age') }}" />
                </div>
                <div>
                    @php
                        $selectedIndex = 0;
                        $label = __('login-register.living-in') . ' ' . __('login-register.germany');

                        if ($country_code == 'DK') {
                            $selectedIndex = 1;
                            $label = __('login-register.living-in') . ' ' . __('login-register.denmark');
                        } elseif ($country_code == 'CA') {
                            $selectedIndex = 2;
                            $label = __('login-register.living-in') . ' ' . __('login-register.canada');
                        } elseif ($country_code == 'LU') {
                            $selectedIndex = 3;
                            $label = __('login-register.living-in') . ' ' . __('login-register.luxemburg');
                        }elseif ($country_code == 'AT') {
                            $selectedIndex = 4;
                            $label = __('login-register.living-in') . ' ' . __('login-register.austria');
                        } elseif ($country_code == 'CH') {
                            $selectedIndex = 5;
                            $label = __('login-register.living-in') . ' ' . __('login-register.switzerland');
                        } elseif ($country_code == 'US') {
                            $selectedIndex = 6;
                            $label = __('login-register.living-in') . ' ' . __('login-register.usa');
                        }
                    @endphp
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: {{ $selectedIndex }}, label: '{{ $label }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer ring-inset focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
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
                        placeholder="{{ __('profile-page.zip') }}" />
                </div>
                <div>
                    <input id="city" name="city" type="text" required wire:model.live="city"
                        class="appearance-none rounded-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="{{ __('profile-page.city') }}" />
                </div>
            </div>

            <div class="mt-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_registered" name="show_zip_registered" type="checkbox" checked wire:model.live="show_zip_registered"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_registered" class="font-medium text-gray-700 cursor-pointer">{{ __('profile-page.show-zip-registered') }}</label>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_public" name="show_zip_public" type="checkbox" wire:model.live="show_zip_public"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_public" class="font-medium text-gray-700 cursor-pointer">{{ __('profile-page.show-zip-public') }}</label>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" x-show="!success"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('profile-page.save') }}
                </button>

                <button type="button" x-show="success"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-green-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 group-hover:text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('profile-page.saved') }}
                </button>
            </div>
        </form>
    </div>
</div>
