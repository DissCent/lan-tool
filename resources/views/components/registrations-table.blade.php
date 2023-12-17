@if (count($table) > 0)
<div>
    <div class="w-full space-y-8" x-show="!showRegistration">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900">
                {{ __('registrations-table.your-registrations') }}
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
                                        {{ __('registrations-table.lan') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        {{ __('registrations-table.approach') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                        {{ __('registrations-table.departure') }}
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('registrations-table.status') }}
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($table as $lan)
                                <tr>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $lan->name }}
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if (Session::get('locale') == 'de')
                                            {{ (new DateTime($lan->arrival_date))->format('d.m.Y') }}
                                            @else
                                            {{ $lan->arrival_date }}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if (Session::get('locale') == 'de')
                                            {{ (new DateTime($lan->departure_date))->format('d.m.Y') }}
                                            @else
                                            {{ $lan->departure_date }}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($lan->type == 'binding')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ __('registrations-table.confirmed') }}
                                        </span>
                                        @elseif ($lan->type == 'interested')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ __('registrations-table.interested') }}
                                        </span>
                                        @elseif ($lan->type == 'cancelled')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            {{ __('registrations-table.canceled') }}
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if ($lan->date_begin > date('Y-m-d'))
                                        <a href="/lanedit" class="text-indigo-600 hover:text-indigo-900">{{ __('registrations-table.change') }}</a>
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
{{ __('registrations-table.no-registrations') }}
@if ($lanAvailable)
<br/>
<br/>
<a href="/lanregister" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    {{ __('registrations-table.to-registration') }}
</a>
@endif
@endif
