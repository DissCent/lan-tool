@if (count($table) > 0)
<div>
    <div class="w-full space-y-8" x-show="!showRegistration">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900">
                Deine LAN-Anmeldungen
            </h1>
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
                                        LAN
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        Anreise
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        Abreise
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Ändern</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($table as $lan)
                                <tr>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $lan['name'] }}
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                        <div class="text-sm text-gray-900">{{ $lan['arrival'] }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                        <div class="text-sm text-gray-900">{{ $lan['departure'] }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($lan['type'] == 'binding')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            zugesagt
                                        </span>
                                        @elseif ($lan['type'] == 'interested')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            interessiert
                                        </span>
                                        @elseif ($lan['type'] == 'cancelled')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            abgesagt
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if ($lan['editable'])
                                        <a href="/lanedit" class="text-indigo-600 hover:text-indigo-900">Ändern</a>
                                        @endif
                                    </td>
                                </tr>
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
Du bist aktuell noch zu keiner LAN angemeldet.
@if ($lanAvailable)
<br/>
<br/>
<a href="/lanregister" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    Zur LAN-Anmeldung
</a>
@endif
@endif
