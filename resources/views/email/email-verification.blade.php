Hallo {{ $username }},
<br/>
<br/>
du hast dich gerade auf https://{{ $server_url }} für ein Benutzerkonto registriert. Um die Registrierung abzuschließen, klicke bitte auf den folgenden Link:
<br/>
<br/>
<a href="{{ route('user.verify', $token) }}">{{ route('user.verify', $token) }}</a>
<br/>
<br/>
Falls du keine Registrierung vorgenommen hast, ignoriere bitte diese E-Mail.
<br/>
<br/>
Viele Grüße
<br/>
das Mailsystem auf {{ $server_url }}
