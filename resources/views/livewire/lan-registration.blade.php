<div class="max-w-xs w-full space-y-8" x-data="
    {
        typeValue: @entangle('type').live,
        arrivalValue: @entangle('arrival').live,
        departureValue: @entangle('departure').live,
        typeOfArrivalValue: @entangle('type_of_arrival').live,
        mealInfoValue: @entangle('meal_info').live
    }">
    <div>
        <h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white w-auto sm:w-80">
            {{ __('lan-forms.registration') }}
        </h1>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-300">
            {{ __('lan-forms.for-the') }} {{ $lan->name }}
        </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST" wire:submit="register">
        @csrf

        <div class="rounded-md shadow-xs -space-y-px mb-6">
            <div>
                <div class="relative"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($typeValues) }}' }" wire:ignore>
                    <button type="button"
                        class="grid w-full cursor-default grid-cols-1 rounded-t-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:focus-visible:outline-indigo-500 cursor-pointer"
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
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base overflow-auto focus:outline-hidden sm:text-sm outline-1 outline-black/5 dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                        x-max="1" @click.away="open = false"
                        x-description="Select popover, show/hide based on select state."
                        @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                        aria-labelledby="listbox-label" style="display: none;">

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($typeValues as $label => $value)
                        <li class="text-gray-900 dark:text-white select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="typeValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600 dark:bg-indigo-500': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 dark:text-indigo-500"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600 dark:text-indigo-500': !(activeIndex === {{ $entryCount }}) }"
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
                <div class="relative -mt-px"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ __('lan-forms.arrival') }}: {{ Session::get('locale') == 'de' ? array_key_first($landays) : $landays[array_key_first($landays)] }}' }" wire:ignore>
                    <button type="button"
                        class="grid w-full cursor-default grid-cols-1 rounded-none-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:focus-visible:outline-indigo-500 cursor-pointer"
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
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base overflow-auto focus:outline-hidden sm:text-sm outline-1 outline-black/5 dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                        x-max="1" @click.away="open = false"
                        x-description="Select popover, show/hide based on select state."
                        @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                        aria-labelledby="listbox-label" style="display: none;">

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($landays as $dateGerman => $dateSql)
                        <li class="text-gray-900 dark:text-white select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="arrivalValue = '{{ $dateSql }}'; label='{{ __('lan-forms.arrival') }}: {{ Session::get('locale') == 'de' ? $dateGerman : $dateSql }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600 dark:bg-indigo-500': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ __('lan-forms.arrival') }}: {{ Session::get('locale') == 'de' ? $dateGerman : $dateSql }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 dark:text-indigo-500"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600 dark:text-indigo-500': !(activeIndex === {{ $entryCount }}) }"
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
                <div class="relative -mt-px"
                    x-data="{ open: false, activeIndex: null, selectedIndex: {{ (count($landays) - 1) }}, label: '{{ __('lan-forms.departure') }}: {{ Session::get('locale') == 'de' ? array_key_last($landays) : $landays[array_key_last($landays)] }}' }" wire:ignore>
                    <button type="button"
                        class="grid w-full cursor-default grid-cols-1 rounded-none-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:focus-visible:outline-indigo-500 cursor-pointer"
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
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base overflow-auto focus:outline-hidden sm:text-sm outline-1 outline-black/5 dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                        x-max="1" @click.away="open = false"
                        x-description="Select popover, show/hide based on select state."
                        @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                        aria-labelledby="listbox-label" style="display: none;">

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($landays as $dateGerman => $dateSql)
                        <li class="text-gray-900 dark:text-white select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="departureValue = '{{ $dateSql }}'; label='{{ __('lan-forms.departure') }}: {{ Session::get('locale') == 'de' ? $dateGerman : $dateSql }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600 dark:bg-indigo-500': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ __('lan-forms.departure') }}: {{ Session::get('locale') == 'de' ? $dateGerman : $dateSql }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 dark:text-indigo-500"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600 dark:text-indigo-500': !(activeIndex === {{ $entryCount }}) }"
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
                <div class="relative -mt-px"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($typeOfArrivalValues) }}' }" wire:ignore>
                    <button type="button"
                        class="grid w-full cursor-default grid-cols-1 rounded-none-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:focus-visible:outline-indigo-500 cursor-pointer"
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
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base overflow-auto focus:outline-hidden sm:text-sm outline-1 outline-black/5 dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                        x-max="1" @click.away="open = false"
                        x-description="Select popover, show/hide based on select state."
                        @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                        aria-labelledby="listbox-label" style="display: none;">

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($typeOfArrivalValues as $label => $value)
                        <li class="text-gray-900 dark:text-white select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="typeOfArrivalValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600 dark:bg-indigo-500': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 dark:text-indigo-500"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600 dark:text-indigo-500': !(activeIndex === {{ $entryCount }}) }"
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
                <input id="descentforum_login" name="descentforum_login" type="text" wire:model.live="descentforum_login"
                    class="appearance-none block w-full rounded-none rounded-b-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                    placeholder="{{ __('lan-forms.descentforum-login') }}" />
            </div>

            {{--
            <div>
                <div class="relative -mt-px"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_key_first($mealInfoValues) }}' }" wire:ignore>
                    <button type="button"
                        class="grid w-full cursor-default grid-cols-1 rounded-none-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:focus-visible:outline-indigo-500 cursor-pointer"
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
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base overflow-auto focus:outline-hidden sm:text-sm outline-1 outline-black/5 dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                        x-max="1" @click.away="open = false"
                        x-description="Select popover, show/hide based on select state."
                        @keydown.escape="open = false" x-ref="listbox" tabindex="-1" role="listbox"
                        aria-labelledby="listbox-label" style="display: none;">

                        @php
                            $entryCount = 0;
                        @endphp

                        @foreach ($mealInfoValues as $label => $value)
                        <li class="text-gray-900 dark:text-white select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="mealInfoValue = '{{ $value }}'; label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            @mouseenter="activeIndex = {{ $entryCount }}" @mouseleave="activeIndex = null"
                            :class="{ 'text-white bg-indigo-600 dark:bg-indigo-500': activeIndex === {{ $entryCount }}, 'text-gray-900': !(activeIndex === {{ $entryCount }}) }">
                            <div class="flex items-center">
                                <span x-state:on="Selected" x-state:off="Not Selected"
                                    class="font-normal block truncate"
                                    :class="{ 'font-semibold': selectedIndex === {{ $entryCount }}, 'font-normal': !(selectedIndex === {{ $entryCount }}) }">
                                    {{ $label }}
                                </span>
                            </div>

                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600 dark:text-indigo-500"
                                :class="{ 'text-white': activeIndex === {{ $entryCount }}, 'text-indigo-600 dark:text-indigo-500': !(activeIndex === {{ $entryCount }}) }"
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
                <input id="comment" name="comment" type="text" wire:model.live="comment"
                    class="appearance-none block w-full rounded-none rounded-b-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
                    placeholder="{{ __('lan-forms.comment') }} ({{ __('lan-forms.optional') }})" />
            </div>
            --}}
        </div>

        {{--
        <div class="mt-4 space-y-4">
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="allergies" type="checkbox" name="allergies" wire:model.live="allergies" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="allergies" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.allergies') }}</label>
                </div>
            </div>
        </div>

        <div class="mb-2 text-sm dark:text-white">{{ __('lan-forms.kitchen-1') }}<br/>{{ __('lan-forms.kitchen-2') }}:</div>

        <div class="mt-4 space-y-2">
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_thu_ev" type="checkbox" name="kitchen_duties_thu_ev" wire:model.live="kitchen_duties_thu_ev" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_thu_ev" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.thursday') }} {{ __('lan-forms.evening') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[0] == 0) text-red-500 @elseif ($kitchen_duty_count[0] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[0]) }}
                    </span>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_fri_mo" type="checkbox" name="kitchen_duties_fri_mo" wire:model.live="kitchen_duties_fri_mo" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_fri_mo" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.friday') }} {{ __('lan-forms.morning') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[1] == 0) text-red-500 @elseif ($kitchen_duty_count[1] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[1]) }}
                    </span>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_fri_ev" type="checkbox" name="kitchen_duties_fri_ev" wire:model.live="kitchen_duties_fri_ev" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_fri_ev" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.friday') }} {{ __('lan-forms.evening') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[2] == 0) text-red-500 @elseif ($kitchen_duty_count[2] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[2]) }}
                    </span>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_sat_mo" type="checkbox" name="kitchen_duties_sat_mo" wire:model.live="kitchen_duties_sat_mo" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_sat_mo" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.saturday') }} {{ __('lan-forms.morning') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[3] == 0) text-red-500 @elseif ($kitchen_duty_count[3] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[3]) }}
                    </span>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_sat_ev" type="checkbox" name="kitchen_duties_sat_ev" wire:model.live="kitchen_duties_sat_ev" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_sat_ev" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.saturday') }} {{ __('lan-forms.evening') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[4] == 0) text-red-500 @elseif ($kitchen_duty_count[4] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[4]) }}
                    </span>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="kitchen_duties_sun_mo" type="checkbox" name="kitchen_duties_sun_mo" wire:model.live="kitchen_duties_sun_mo" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:indeterminate:border-indigo-500 dark:indeterminate:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:checked:bg-white/10 forced-colors:appearance-auto cursor-pointer" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25 dark:group-has-disabled:stroke-white/25">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="kitchen_duties_sun_mo" class="font-medium text-gray-900 dark:text-white cursor-pointer">{{ __('lan-forms.sunday') }} {{ __('lan-forms.morning') }}</label>
                    <br/>
                    <span class="@if ($kitchen_duty_count[5] == 0) text-red-500 @elseif ($kitchen_duty_count[5] < 3) text-yellow-600 dark:text-yellow-400 @else text-green-600 @endif">
                        {{ trans_choice('lan-forms.volunteers', $kitchen_duty_count[5]) }}
                    </span>
                </div>
            </div>
        </div>
        --}}

        @error('departure')
        <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg flex dark:bg-rose-900/50 dark:text-rose-200" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800 dark:text-rose-200 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            {{ $message }}
        </div>
        @enderror

        <div>
            @if (! $lanOver)
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
                {{ __('lan-forms.send') }}
            </button>
            @else
            <button type="button"
                class="group relative w-full flex justify-center items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-hidden dark:bg-red-500 dark:shadow-none dark:hover:bg-red-400 dark:focus-visible:outline-none mx-auto cursor-pointer">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-red-500 group-hover:text-red-400 dark:text-red-300 dark:group-hover:text-red-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                {{ __('lan-forms.closed') }}
            </button>
            @endif
        </div>
    </form>
</div>
