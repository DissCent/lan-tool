@guest
<a href="/login" class="{{ Request::is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 sm:px-2 md:px-3 py-2 rounded-md text-base font-medium">Login</a>
@endguest

@auth
<a @if ($registered) href="/lanedit" @else href="/lanregister" @endif class="{{ Request::is('lanregister') || Request::is('lanedit') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 sm:px-2 md:px-3 py-2 rounded-md text-base font-medium">Anmeldung</a>
@endauth

<a href="/info" class="{{ Request::is('info') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 sm:px-2 md:px-3 py-2 rounded-md text-base font-medium">Infos</a>

<a href="/participants" class="{{ Request::is('participants') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 sm:px-2 md:px-3 py-2 rounded-md text-base font-medium">Teilnehmer</a>

@auth
@if ($isAdmin)
<a href="/users" class="{{ Request::is('users') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block px-3 sm:px-2 md:px-3 py-2 rounded-md text-base font-medium">Mitglieder</a>
@endif
@endauth
