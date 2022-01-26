@if (count($table) > 0)
<div>
    <div class="w-full space-y-8" x-show="!showRegistration">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900">
                Teilnehmer
            </h1>
            <p class="mt-2 text-center text-sm text-gray-600">
                der {{ $lan->name }}
            </p>
        </div>

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
                                        Spieler
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        von
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        bis
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        PLZ
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        Anreise
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
                                        <div class="text-center text-sm font-medium text-gray-900">
                                            @if ($user->type == 'interested')
                                                🠗 interessiert 🠗
                                            @else
                                                🠗 abgesagt 🠗
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
											<span class="hidden sm:inline">[{{ $user->clan_tag }}]</span>
											{{ $user->username }}
										</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ (new DateTime($user->arrival_date))->format('d.m.Y') }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ (new DateTime($user->departure_date))->format('d.m.Y') }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">
                                        @auth
                                            @if ($user->show_zip_public || ($user->show_zip_registered && $verified) || Auth::user()->isadmin || (Auth::check() && Auth::user()->id == $user->id && $user->show_zip_registered))
                                            {{ $user->country_code }}-{{ $user->zip }}
                                            @else
                                            versteckt
                                            @endif
                                        @else
                                            @if ($user->show_zip_public)
                                            {{ $user->country_code }}-{{ $user->zip }}
                                            @else
                                            versteckt
                                            @endif
                                        @endauth
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">
                                        <div class="text-sm text-gray-900">
                                            @if ($user->type_of_arrival == 'train_need_ride')
                                            Zug (Abholung)
                                            @elseif ($user->type_of_arrival == 'train_no_ride')
                                            Zug
                                            @elseif ($user->type_of_arrival == 'car_space')
                                            Auto (bietet MFG)
                                            @elseif ($user->type_of_arrival == 'car_no_space')
                                            Auto (voll)
                                            @elseif ($user->type_of_arrival == 'joining_other')
                                            Auto (Mitfahrt)
                                            @elseif ($user->type_of_arrival == 'unknown')
                                            Unbekannt
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
    </div>
    @if (Auth::check() && Auth::user()->isadmin)
    <div class="text-center mt-8">
        <a href="/csv" class="m-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            CSV-Export
        </a>
    </div>
    @endif
</div>
@else
<div>
    Niemand ist angemeldet. 🙁
</div>
@endif
