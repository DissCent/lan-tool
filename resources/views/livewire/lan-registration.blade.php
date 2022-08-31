<div class="max-w-xs w-full space-y-8" x-data="
    {
        typeValue: @entangle('type'),
        arrivalValue: @entangle('arrival'),
        departureValue: @entangle('departure'),
        typeOfArrivalValue: @entangle('type_of_arrival'),
        mealInfoValue: @entangle('meal_info')
    }">
    <div>
        <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto sm:w-80">
            Anmeldung
        </h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            für die {{ $lan->name }}
        </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST" wire:submit.prevent="register">
        @csrf

        <div class="rounded-md shadow-sm -space-y-px mb-6">
            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($typeValues) }}' }" wire:ignore>
                    <button type="button"
                        class="relative w-full bg-white border border-gray-300 rounded-t-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($typeValues as $label => $value)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="typeValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600': !(activeIndex === {{ $entryCount }}) }"
                                x-show="selectedIndex === {{ $entryCount }}" style="display: none;">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        @php
                            ++$entryCount;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: 'Anreise: {{ array_key_first($landays) }}' }" wire:ignore>
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

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($landays as $dateGerman => $dateSql)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="arrivalValue = '{{ $dateSql }}'; label='Anreise: {{ $dateGerman }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    Anreise: {{ $dateGerman }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600': !(activeIndex === {{ $entryCount }}) }"
                                x-show="selectedIndex === {{ $entryCount }}" style="display: none;">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        @php
                            ++$entryCount;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: {{ (count($landays) - 1) }}, label: 'Abreise: {{ array_key_last($landays) }}' }" wire:ignore>
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

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($landays as $dateGerman => $dateSql)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="departureValue = '{{ $dateSql }}'; label='Abreise: {{ $dateGerman }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    Abreise: {{ $dateGerman }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600': !(activeIndex === {{ $entryCount }}) }"
                                x-show="selectedIndex === {{ $entryCount }}" style="display: none;">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        @php
                            ++$entryCount;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($typeOfArrivalValues) }}' }" wire:ignore>
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

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($typeOfArrivalValues as $label => $value)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="typeOfArrivalValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600': !(activeIndex === {{ $entryCount }}) }"
                                x-show="selectedIndex === {{ $entryCount }}" style="display: none;">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        @php
                            ++$entryCount;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <label for="descentforum_login" class="sr-only">DescentForum-Benutzername</label>
                <input id="descentforum_login" descentforum_login="wish_games" type="text" wire:model="descentforum_login"
                    class="appearance-none rounded-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="DescentForum-Benutzername" />
            </div>

            {{--
            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($mealInfoValues) }}' }" wire:ignore>
                    <button type="button"
                        class="relative w-full bg-white border border-gray-300 rounded-b-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
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

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($mealInfoValues as $label => $value)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="mealInfoValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600': !(activeIndex === {{ $entryCount }}) }"
                                x-show="selectedIndex === {{ $entryCount }}" style="display: none;">
                                <svg class="h-5 w-5" x-description="Heroicon name: solid/check"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                        @php
                            ++$entryCount;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
            --}}
        </div>

        {{--
        <div class="mt-4 space-y-4">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="allergies" name="allergies" type="checkbox" checked wire:model="allergies"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="allergies" class="font-medium text-gray-700 cursor-pointer">Ich habe Allergien</label>
                </div>
            </div>
        </div>

        <div class="rounded-md shadow-sm -space-y-px mb-6">
            <div class="rounded-md shadow-sm -space-y-px mb-6">
                <div>
                    <label for="comment" class="sr-only">Anmerkungen</label>
                    <input id="comment" name="comment" type="text" wire:model="comment"
                        class="appearance-none rounded-none rounded-t-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Anmerkungen (optional)" />
                </div>
                <div>
                    <label for="wish_drinks" class="sr-only">Getränkewunsch</label>
                    <input id="wish_drinks" name="wish_drinks" type="text" wire:model="wish_drinks"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Getränkewunsch (optional)" />
                </div>
                <div>
                    <label for="wish_games" class="sr-only">Spielewunsch</label>
                    <input id="wish_games" name="wish_games" type="text" wire:model="wish_games"
                        class="appearance-none rounded-none rounded-b-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Spielewunsch (optional)" />
                </div>
            </div>
        </div>

        <div class="mt-4 space-y-2">
            <span class="text-sm">Interesse an Liga in folgenden Spielen:</span>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_descent_rebirth" name="league_descent_rebirth" type="checkbox" checked wire:model="league_descent_rebirth"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_descent_rebirth" class="font-medium text-gray-700 cursor-pointer">DXX-Rebirth</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_descent_3" name="league_descent_3" type="checkbox" checked wire:model="league_descent_3"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_descent_3" class="font-medium text-gray-700 cursor-pointer">Descent 3</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_overload" name="league_overload" type="checkbox" checked wire:model="league_overload"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_overload" class="font-medium text-gray-700 cursor-pointer">Overload</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_shootmania" name="league_shootmania" type="checkbox" checked wire:model="league_shootmania"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_shootmania" class="font-medium text-gray-700 cursor-pointer">Shootmania</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_rocket_league" name="league_rocket_league" type="checkbox" checked wire:model="league_rocket_league"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_rocket_league" class="font-medium text-gray-700 cursor-pointer">Rocket League</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="league_csgo" name="league_csgo" type="checkbox" checked wire:model="league_csgo"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="league_csgo" class="font-medium text-gray-700 cursor-pointer">Counter Strike: Global Offensive</label>
                </div>
            </div>
        </div>

        <div class="mt-4 space-y-2">
            <span class="text-sm">Ich übernehme den Küchendienst an<br/>folgenden Tagen:</span>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_thu_ev" name="kitchen_duties_thu_ev" type="checkbox" checked wire:model="kitchen_duties_thu_ev"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_thu_ev" class="font-medium text-gray-700 cursor-pointer">Donnerstag abends</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_fri_mo" name="kitchen_duties_fri_mo" type="checkbox" checked wire:model="kitchen_duties_fri_mo"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_fri_mo" class="font-medium text-gray-700 cursor-pointer">Freitag früh</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_fri_ev" name="kitchen_duties_fri_ev" type="checkbox" checked wire:model="kitchen_duties_fri_ev"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_fri_ev" class="font-medium text-gray-700 cursor-pointer">Freitag abends</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_sat_mo" name="kitchen_duties_sat_mo" type="checkbox" checked wire:model="kitchen_duties_sat_mo"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_sat_mo" class="font-medium text-gray-700 cursor-pointer">Samstag früh</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_sat_ev" name="kitchen_duties_sat_ev" type="checkbox" checked wire:model="kitchen_duties_sat_ev"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_sat_ev" class="font-medium text-gray-700 cursor-pointer">Samstag abends</label>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="kitchen_duties_sun_mo" name="kitchen_duties_sun_mo" type="checkbox" checked wire:model="kitchen_duties_sun_mo"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="kitchen_duties_sun_mo" class="font-medium text-gray-700 cursor-pointer">Sonntag früh</label>
                </div>
            </div>
        </div>
        --}}

        @error('departure')
        <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 flex" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            {{ $message }}
        </div>
        @enderror

        @if ($lan->covid_restrictions)
        <div class="mb-2 mt-2 space-y-2">
            <span class="text-sm font-bold">Dies ist eine sogenannte "2G-Veranstaltung"!</span>
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="covid_consent" name="covid_consent" type="checkbox" required
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="covid_consent" class="font-medium text-gray-700 cursor-pointer">
                        Ich bestätige, während meiner Anwesen&shy;heit bei der {{ $lan->name }} entweder den Genesenenstatus oder Geimpftenstatus
                        gemäß der aktuellen
                        <a class="text-indigo-600 hover:text-indigo-900" href="https://www.hessen.de/Handeln/Corona-in-Hessen" target="_blank">
                            Corona-Verordnung des Landes Hessen
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -mt-0.5 -ml-0.5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        </a> jederzeit nachweisen zu können. Ich bin mir dessen bewusst, dass die Veranstaltung aufgrund der aktuellen Lage
                        kurzfristig abgesagt werden kann - in diesem Fall wirst du von uns benachrichtigt.
                    </label>
                </div>
            </div>
        </div>
        @endif

        <div>
            @if (! $lanOver)
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
                Absenden
            </button>
            @else
            <button type="button"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-red-500 group-hover:text-red-400"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                Anmeldung vorbei
            </button>
            @endif
        </div>
    </form>
</div>
