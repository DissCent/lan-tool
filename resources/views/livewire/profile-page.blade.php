<div x-data="{ countryCodeValue: @entangle('country_code'), clanTagValue: @entangle('clan_tag'), success: @entangle('success') }">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900 w-80">
                Profil bearbeiten
            </h1>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST" wire:submit.prevent="updateProfile">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    Passwort ändern (oder leer lassen):
                </div>

                @error('new_password')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                <div>
                    <label for="new_password" class="sr-only">Passwort</label>
                    <input id="new_password" name="new_password" type="password" autocomplete="current-password" wire:model="new_password"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Passwort" />
                </div>
                <div>
                    <label for="new_password_confirm" class="sr-only">Passwort wiederholen</label>
                    <input id="new_password_confirm" name="new_password_confirm" type="password"
                        autocomplete="current-password" wire:model="new_password_confirm"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Passwort (Wiederholung)" />
                </div>
            </div>

            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div class="font-bold font-md pb-2">
                    Clan/Alter/Wohnort:
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
                        $label = 'Keinem Clan zugehörig';

                        if ($clan_tag == 'Do') {
                            $selectedIndex = 1;
                            $label = 'Mitglied im Do-Clan';
                        } elseif ($clan_tag == 'OOTS') {
                            $selectedIndex = 2;
                            $label = 'Mitglied im OOTS-Clan';
                        } elseif ($clan_tag == 'VEX') {
                            $selectedIndex = 3;
                            $label = 'Mitglied im VEX-Clan';
                        }
                    @endphp
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: {{ $selectedIndex }}, label: '{{ $label }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none rounded-t-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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
                                @click="clanTagValue = ''; label='Keinem Clan zugehörig'; selectedIndex = 0; open = false"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                                        Keinem Clan zugehörig
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
                                @click="clanTagValue = 'Do'; label='Mitglied im Do-Clan'; selectedIndex = 1; open = false"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">
                                        Mitglied im Do-Clan
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
                                @click="clanTagValue = 'OOTS'; label='Mitglied im OOTS-Clan'; selectedIndex = 2; open = false"
                                @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">
                                        Mitglied im OOTS-Clan
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
                                @click="clanTagValue = 'VEX'; label='Mitglied im VEX-Clan'; selectedIndex = 3; open = false"
                                @mouseenter="activeIndex = 3" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">
                                        Mitglied im VEX-Clan
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
                    <label for="age" class="sr-only">Alter</label>
                    <input id="age" name="age" type="number" required wire:model="age"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Alter (Jahre)" />
                </div>
                <div>
                    @php
                        $selectedIndex = 0;
                        $label = 'Wohnhaft in Deutschland';

                        if ($country_code == 'LU') {
                            $selectedIndex = 1;
                            $label = 'Wohnhaft in Luxemburg';
                        } elseif ($country_code == 'AT') {
                            $selectedIndex = 2;
                            $label = 'Wohnhaft in Österreich';
                        } elseif ($country_code == 'CH') {
                            $selectedIndex = 3;
                            $label = 'Wohnhaft in der Schweiz';
                        }
                    @endphp
                    <div class="relative"
                        x-data="{ open: false, activeIndex: null, selectedIndex: {{ $selectedIndex }}, label: '{{ $label }}' }" wire:ignore>
                        <button type="button"
                            class="relative w-full bg-white border border-gray-300 rounded-none shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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
                                @click="countryCodeValue = 'DE'; label='Wohnhaft in Deutschland'; selectedIndex = 0; open = false"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">
                                        Wohnhaft in Deutschland
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
                                @click="countryCodeValue = 'LU'; label='Wohnhaft in Luxemburg'; selectedIndex = 1; open = false"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">
                                        Wohnhaft in Luxemburg
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
                                @click="countryCodeValue = 'AT'; label='Wohnhaft in Österreich'; selectedIndex = 2; open = false"
                                @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">
                                        Wohnhaft in Österreich
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
                                @click="countryCodeValue = 'CH'; label='Wohnhaft in der Schweiz'; selectedIndex = 3; open = false"
                                @mouseenter="activeIndex = 3" @mouseleave="activeIndex = null"
                                :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                                <div class="flex items-center">
                                    <span x-state:on="Selected" x-state:off="Not Selected"
                                        class="font-normal block truncate"
                                        :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">
                                        Wohnhaft in der Schweiz
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
                    <label for="zip" class="sr-only">Postleitzahl</label>
                    <input id="zip" name="zip" type="number" required wire:model="zip"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Postleitzahl" />
                </div>
                <div>
                    <label for="city" class="sr-only">Ortschaft</label>
                    <input id="city" name="city" type="text" required wire:model="city"
                        class="appearance-none rounded-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Ortschaft" />
                </div>
            </div>

            <div class="mt-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_registered" name="show_zip_registered" type="checkbox" checked wire:model="show_zip_registered"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_registered" class="font-medium text-gray-700">Meine PLZ verifizierten Benutzern anzeigen</label>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="show_zip_public" name="show_zip_public" type="checkbox" wire:model="show_zip_public"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="show_zip_public" class="font-medium text-gray-700">Meine PLZ öffentlich anzeigen</label>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" x-show="!success"
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
                    Speichern
                </button>

                <button type="button" x-show="success"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 group-hover:text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Erfolgreich gespeichert!
                </button>
            </div>
        </form>
    </div>
</div>
