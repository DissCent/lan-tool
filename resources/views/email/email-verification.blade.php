@if (Session::get('locale') == 'de')
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
@else
Hi {{ $username }},
<br/>
<br/>
you just registered a user account on https://{{ $server_url }}. In order to complete your registration, please click on the following link:
<br/>
<br/>
<a href="{{ route('user.verify', $token) }}">{{ route('user.verify', $token) }}</a>
<br/>
<br/>
If you didn't register on our site, please ignore this email.
<br/>
<br/>
Best regards
<br/>
the email system on {{ $server_url }}
@endif
