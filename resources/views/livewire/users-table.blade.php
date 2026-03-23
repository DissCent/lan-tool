<div>
    @if (count($table) > 0)
    <div class="w-full space-y-8">
        <div>
            <h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                {{ __('users-table.waiting-users') }}
            </h1>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow-sm overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('users-table.user') }}<span class="sm:hidden"> / {{ __('users-table.user') }}</span>
                                    </th>
                                    <th scope="col"
                                        class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider hidden sm:table-cell">
                                        {{ __('users-table.email') }}
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800/50 divide-y divide-gray-200 dark:divide-gray-700">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($table as $user)
                                @php
                                    ++$count;
                                @endphp
                                <tr class="@if ($count % 2 == 0) bg-gray-50 dark:bg-gray-800/50 @endif">
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $count }}
                                        </div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $user->username }}</div>
                                        <div class="sm:hidden text-sm text-gray-600 dark:text-gray-300">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm hidden sm:table-cell">
                                        <div class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#!" class="group relative inline-flex justify-center items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500 mx-auto cursor-pointer" wire:click="unlock({{ $user->id }})">
                                            {{ __('users-table.ok') }}
                                        </a>
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
    @else
    <div class="dark:text-white">
        {{ __('users-table.all-users-activated') }} 😀
    </div>
    @endif
</div>
