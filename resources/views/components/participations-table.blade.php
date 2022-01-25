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
                                    if ($user->user_verified_at == null && $user->id != Auth::user()->id) {
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
                                        <div class="text-sm text-gray-900">{{ $user->username }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ (new DateTime($user->arrival_date))->format('d.m.Y') }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ (new DateTime($user->departure_date))->format('d.m.Y') }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden md:table-cell">
                                        @auth
                                            @if ($user->show_zip_public || ($user->show_zip_registered && $verified) || Auth::user()->isadmin)
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
</div>
@else
<div>
    Niemand ist angemeldet. 🙁
</div>
@endif
