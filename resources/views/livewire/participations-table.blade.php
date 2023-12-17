<div>
    <div class="w-full space-y-8">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900">
                {{ __('participations-table.participants') }}
            </h1>
            <p class="mt-2 text-center text-sm text-gray-600">
                <div class="relative max-w-fit mx-auto"
                    x-data="{ open: false, activeIndex: null, selectedIndex: 0, label: '{{ array_values($lans)[0] }}' }" wire:ignore>
                    <button type="button"
                        class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer ring-inset focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
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

                        @foreach ($lans as $value => $label)
                        <li class="text-gray-900 select-none relative py-2 pl-3 pr-9 cursor-pointer"
                            id="listbox-option-{{ $entryCount }}" role="option"
                            @click="label='{{ $label }}'; selectedIndex = {{ $entryCount }}; open = false"
                            wire:click="changeLan({{ $value }})"
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
            </p>
        </div>

        @if (count($table) > 0)
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('participations-table.player') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('participations-table.from') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('participations-table.until') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        {{ __('participations-table.zip') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        {{ __('participations-table.approach') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $usercount = 0;
                                    $rowcount = 0;
                                    $curType = 'binding';
                                @endphp
                                @foreach ($table as $user)
                                @php
                                    if ($user->user_verified_at == null && (! Auth::check() || $user->id != Auth::user()->id)) {
                                        continue;
                                    }

                                    ++$usercount;
                                    ++$rowcount;
                                @endphp
                                @if ($curType != $user->type)
                                <tr class="@if ($rowcount % 2 == 0) bg-gray-50 @endif">
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap" colspan="6">
                                        <div class="text-sm font-medium text-gray-900 flex justify-center">
                                            @if ($user->type == 'interested')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            {{ __('participations-table.interested') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            {{ __('participations-table.canceled') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    ++$rowcount;
                                @endphp
                                @endif
                                <tr class="@if ($rowcount % 2 == 0) bg-gray-50 @endif">
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $usercount }}
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
											@if ($user->clan_tag != '')
											<span class="hidden sm:inline">[{{ $user->clan_tag }}]</span>
											@endif
											{{ $user->username }}
										</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if (Session::get('locale') == 'de')
                                            {{ (new DateTime($user->arrival_date))->format('d.m.Y') }}
                                            @else
                                            {{ $user->arrival_date }}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if (Session::get('locale') == 'de')
                                            {{ (new DateTime($user->departure_date))->format('d.m.Y') }}
                                            @else
                                            {{ $user->departure_date }}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">
                                        @auth
                                            @if ($user->show_zip_public || ($user->show_zip_registered && $verified) || Auth::user()->isadmin || (Auth::check() && Auth::user()->id == $user->id && $user->show_zip_registered))
                                            {{ $user->country_code }}-{{ $user->zip }}
                                            @else
                                            {{ __('participations-table.hidden') }}
                                            @endif
                                        @else
                                            @if ($user->show_zip_public)
                                            {{ $user->country_code }}-{{ $user->zip }}
                                            @else
                                            {{ __('participations-table.hidden') }}
                                            @endif
                                        @endauth
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">
                                        <div class="text-sm text-gray-900">
                                            @if ($user->type_of_arrival == 'train_need_ride')
                                            {{ __('participations-table.train-need-ride') }}
                                            @elseif ($user->type_of_arrival == 'train_no_ride')
                                            {{ __('participations-table.train-no-ride') }}
                                            @elseif ($user->type_of_arrival == 'car_space')
                                            {{ __('participations-table.car-space') }}
                                            @elseif ($user->type_of_arrival == 'car_no_space')
                                            {{ __('participations-table.car-no-space') }}
                                            @elseif ($user->type_of_arrival == 'joining_other')
                                            {{ __('participations-table.joining-other') }}
                                            @elseif ($user->type_of_arrival == 'unknown')
                                            {{ __('participations-table.unknown') }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $curType = $user->type;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div>
            {{ __('participations-table.nobody-registered') }} 🙁
        </div>
        @endif
    </div>
    @if (Auth::check() && Auth::user()->isadmin && count($table) > 0)
    <div class="text-center mt-8 flex flex-col">
        <a href="/csv?id={{ $id }}" class="mx-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            {{ __('participations-table.csv-export') }}
        </a>
        <a href="/kitchen?id={{ $id }}" class="mx-auto mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            {{ __('participations-table.kitchen-export') }}
        </a>
    </div>
    @endif
</div>
