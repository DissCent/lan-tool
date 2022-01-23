<nav x-data="{ open: false, openContext: false, activeIndex: -1 }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                    x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Navigation öffnen</span>
                    <svg x-description="Icon when menu is closed. Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                        :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-description="Icon when menu is open. Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                        :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <div class="text-2xl font-extrabold text-white">
                        {{ $lan->name }}
                    </div>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        @include('components/navigation-items')
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div x-data="{ openContext: false }"
                    @keydown.escape.stop="openContext = false"
                    class="ml-3 relative">
                    <div>
                        <button type="button"
                            class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            id="user-menu-button" x-ref="button"
                            @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                            aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="openContext.toString()"
                            @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()"
                            @auth
                            @click="openContext = !openContext">
                            @endauth
                            @guest
                            @click="window.location.href = '/login'">
                            @endguest
                            <span class="sr-only">Benutzermenü öffnen</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 p-1.5 rounded-full bg-indigo-500 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>
                    </div>

                    <div x-show="openContext" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                        role="menu" aria-orientation="vertical"
                        aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                        @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="openContext = false"
                        @keydown.enter.prevent="openContext = false; focusButton()"
                        @keyup.space.prevent="openContext = false; focusButton()"
                        @click.away="openContext = false" style="display: none;">

                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active"
                            x-state:off="Not Active" :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem"
                            tabindex="-1" i@mouseenter="activeIndex = 0"
                            @mouseleave="activeIndex = -1" d="user-menu-item-0" @mouseenter="activeIndex = 0"
                            @mouseleave="activeIndex = -1" @click="openContext = false; focusButton()">Mein Profil</a>

                        <a href="/registrations" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-1" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = -1"
                            @click="openContext = false; focusButton()">Meine Anmeldungen</a>

                        <a href="/logout" class="block px-4 py-2 text-sm text-gray-700"
                            :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                            @click="openContext = false; focusButton()">Abmelden</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu"
        x-show="open" style="display: none;">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @include('components/navigation-items')
        </div>
    </div>
</nav>
