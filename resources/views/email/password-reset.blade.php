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
