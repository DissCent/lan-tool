@if (Session::get('locale') == 'de')
Hallo {{ $username }},
<br/>
<br/>
soeben wurde auf https://{{ $server_url }} eine Anfrage zum Zurücksetzen deines Passworts abgeschickt:
<br/>
<br/>
<a href="{{ route('password.reset', $token) }}">{{ route('password.reset', $token) }}</a>
<br/>
<br/>
Falls du kein neues Passwort anfordern möchtest oder diese Aktion nicht selbst veranlasst hast, ignoriere bitte diese E-Mail.
<br/>
<br/>
Viele Grüße
<br/>
das Mailsystem auf {{ $server_url }}
@else
Hi {{ $username }},
<br/>
<br/>
we just received a request to reset your password on https://{{ $server_url }}:
<br/>
<br/>
<a href="{{ route('password.reset', $token) }}">{{ route('password.reset', $token) }}</a>
<br/>
<br/>
If you do not want to change your password or if it wasn't you who requested this action, please ignore this message.
<br/>
<br/>
Best regards
<br/>
the email system on {{ $server_url }}
@endif
