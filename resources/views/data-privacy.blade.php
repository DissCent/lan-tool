@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
@if (Session::get('locale') == 'de')
<div>
    <div class="bg-white shadow-sm overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6">
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto mb-4">Datenschutzhinweise</h1>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Verantwortlicher</h2>
                <p class="mb-4">Verantwortlicher im Sinne der Datenschutzgesetze, insbesondere der EU-Datenschutz-Grundverordnung (DSGVO), ist:
                </p>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('eW5hbXJlRyAvIGRuYWxoY3N0dWVE'))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Ihre Betroffenenrechte</h2>
                <p class="mb-4">Unter den angegebenen Kontaktdaten können Sie gemäß EU-Datenschutz-Grundverordnung (DSGVO) jederzeit folgende Rechte ausüben:
                </p>
                <ul>
					<li>Auskunft über Ihre bei uns gespeicherten Daten und deren Verarbeitung (Art. 15 DSGVO),</li>
					<li>Berichtigung unrichtiger personenbezogener Daten (Art. 16 DSGVO),</li>
					<li>Löschung Ihrer bei uns gespeicherten Daten (Art. 17 DSGVO),</li>
					<li>Einschränkung der Datenverarbeitung, sofern wir Ihre Daten aufgrund gesetzlicher Pflichten noch nicht löschen dürfen (Art. 18 DSGVO),</li>
					<li>Widerspruch gegen die Verarbeitung Ihrer Daten bei uns (Art. 21 DSGVO) und</li>
					<li>Datenübertragbarkeit, sofern Sie in die Datenverarbeitung eingewilligt haben oder einen Vertrag mit uns abgeschlossen haben (Art. 20 DSGVO).</li>
				</ul>
                <p class="mb-4">Sofern Sie uns eine Einwilligung erteilt haben, können Sie diese jederzeit mit Wirkung für die Zukunft widerrufen.</p>
                <p class="mb-4">Sie können sich jederzeit mit einer Beschwerde an eine Aufsichtsbehörde wenden, z. B. an die zuständige Aufsichtsbehörde des Bundeslands Ihres Wohnsitzes oder an die für uns als verantwortliche Stelle zuständige Behörde.</p>
                <p class="mb-4">Eine Liste der Aufsichtsbehörden (für den nichtöffentlichen Bereich) mit Anschrift finden Sie unter: <a
                        href="https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html" target="_blank"
                        rel="noopener nofollow" class="underline">https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html</a>.</p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Verarbeitungstätigkeiten</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Erfassung allgemeiner Informationen beim Besuch unserer Website</h3>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Art und Zweck der Verarbeitung</h4>
				<p class="mb-4">Wenn Sie auf unsere Website zugreifen, d.h., wenn Sie sich nicht registrieren oder anderweitig Informationen übermitteln, werden automatisch Informationen allgemeiner Natur erfasst. Diese Informationen (Server-Logfiles) beinhalten etwa die Art des Webbrowsers, das verwendete Betriebssystem, den Domainnamen Ihres Internet-Service-Providers, Ihre IP-Adresse und ähnliches.</p>
				<p class="mb-4">Sie werden insbesondere zu folgenden Zwecken verarbeitet:</p>
				<ul>
					<li>Sicherstellung eines problemlosen Verbindungsaufbaus der Website</li>
					<li>Sicherstellung einer reibungslosen Nutzung der Website</li>
					<li>Sicherstellung und Auswertung der Systemsicherheit und -stabilität, insbesondere zur Missbrauchserkennung</li>
				</ul>
				<p class="mb-4">Wir verwenden Ihre Daten nicht, um Rückschlüsse auf Ihre Person zu ziehen. Allerdings behalten wir uns vor, die Server-Logfiles nachträglich zu überprüfen, sollten konkrete Anhaltspunkte auf eine rechtswidrige Nutzung hinweisen.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage und berechtigtes Interesse</h4>
				<p class="mb-4">Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der Verbesserung der Stabilität und Funktionalität unserer Website sowie der Sicherstellung der Systemsicherheit und Missbrauchserkennung.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Empfänger</h4>
				<p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Webseite als Auftragsverarbeiter tätig werden.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Speicherdauer</h4>
				<p class="mb-4">Daten werden in Server-Log-Dateien in einer Form, die die Identifizierung der betroffenen Personen ermöglicht, maximal für zwei Monate gespeichert; es sei denn, dass ein sicherheitsrelevantes Ereignis auftritt (z.B. ein DDoS-Angriff).</p>
				<p class="mb-4">Im Falle eines solchen Ereignisses werden Server-Log-Dateien bis zur Beseitigung und vollständigen Aufklärung des sicherheitsrelevanten Ereignisses gespeichert.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich</h4>
				<p class="mb-4">Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben. Ohne die IP-Adresse ist jedoch der Dienst und die Funktionsfähigkeit unserer Website nicht gewährleistet. Zudem können einzelne Dienste und Services nicht verfügbar oder eingeschränkt sein.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Widerspruch</h4>
				<p class="mb-4">Lesen Sie dazu die Informationen über Ihr Widerspruchsrecht nach Art. 21 DSGVO weiter unten.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Kontaktaufnahme</h3>
				<p class="mb-4">Art und Zweck der Verarbeitung</p>
				<p class="mb-4">Eine Kontaktaufnahme ist über die bereitgestellten E-Mail-Adressen möglich. In diesem Fall werden die mit der E-Mail übermittelten personenbezogenen Daten des Nutzers gespeichert. Hierzu zählen Datum und Uhrzeit des E-Mailversands, E-Mailadresse, IP-Adressen sowie Informationen zu den an der E-Mail-Kommunikation beteiligten Servern.</p>
				<p class="mb-4">Sie können Sie über die bereitgestellten Telefonnummern Kontakt zu uns aufnehmen. Hierbei erheben wir Protokolldaten, die Ihre Telefonnummer und die Dauer des Gesprächs beinhalten.</p>
				<p class="mb-4">Unabhängig von der gewählten Kommunikationsart erheben wir den Inhalt Ihrer Anfrage. Ihre Daten werden zum Zweck der individuellen Kommunikation mit Ihnen gespeichert.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage</h4>
				<p class="mb-4">Die Verarbeitung der Daten erfolgt auf der Grundlage eines berechtigten Interesses (Art. 6 Abs. 1 lit. f DSGVO).</p>
				<p class="mb-4">Unser berechtigtes Interesse an der Verarbeitung Ihrer Daten ist die Ermöglichung einer unkomplizierten Kontaktaufnahme.</p>
				<p class="mb-4">Sofern Sie mit uns Kontakt aufnehmen, um ein Angebot zu erfragen, erfolgt die Verarbeitung der Daten zur Durchführung vorvertraglicher Maßnahmen (Art. 6 Abs. 1 lit. b DSGVO).</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Empfänger</h4>
				<p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Webseite als Auftragsverarbeiter tätig werden.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Speicherdauer</h4>
				<p class="mb-4">Daten werden spätestens sechs Monate nach Bearbeitung der Kontaktaufnahme gelöscht.</p>
				<p class="mb-4">Sofern es zu einem Vertragsverhältnis kommt, unterliegen wir den gesetzlichen Aufbewahrungsfristen. Diese betragen grundsätzlich 6 oder 10 Jahre aus Gründen der ordnungsmäßigen Buchführung und steuerrechtlichen Anforderungen.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich</h4>
				<p class="mb-4">Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig. Wir können Ihre Anfrage jedoch nur bearbeiten, sofern Sie uns die erforderlichen Daten und den Grund der Anfrage mitteilen.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Widerspruch</h4>
				<p class="mb-4">Lesen Sie dazu die Informationen über Ihr Widerspruchsrecht nach Art. 21 DSGVO weiter unten.</p>
				<h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Cookies</h2>
				<p class="mb-4">Ein Cookie ist ein kleiner Datensatz, der beim Besuch einer Website erstellt und auf dem System Websitebesuchers zwischengespeichert wird. Wird der Server dieser Website erneut vom Nutzer der Website aufgerufen, sendet der Browser des Nutzers der Website das zuvor empfangenen Cookie wieder zurück an den Server. Der Server kann die durch dieses Verfahren erhaltenen Informationen auswerten. Durch Cookies kann insbesondere das Navigieren auf einer Website erleichtert werden.</p>
				<p class="mb-4">Folgende, rein technisch notwendige Cookies sind auf dieser Website im Einsatz:</p>
				<p class="mb-4">
                    <strong>Name:</strong> laravel_session
                    <br/>
                    <strong>Anbieter:</strong> lan.descentforum.de
                    <br/>
                    <strong>Zweck:</strong> Dient der Aufrechterhaltung der Zustände des Benutzers über alle Seitenaufrufe hinweg
                    <br/>
                    <strong>Ablauf:</strong> Eine Stunde
                    <br/>
                    <strong>Typ:</strong> HTTP-Cookie
                    <br/>
                    <br/>
                    <strong>Name:</strong> remember_web_*
                    <br/>
                    <strong>Anbieter:</strong> lan.descentforum.de
                    <br/>
                    <strong>Zweck:</strong> Dient der Wiedererkennung des Besuchers, wenn dieser beim Login die Funktion "Angemeldet bleiben" aktiviert hat
                    <br/>
                    <strong>Ablauf:</strong> 1 Jahr
                    <br/>
                    <strong>Typ:</strong> HTTP-Cookie
                    <br/>
                    <br/>
                    <strong>Name:</strong> XSRF-TOKEN
                    <br/>
                    <strong>Anbieter:</strong> lan.descentforum.de
                    <br/>
                    <strong>Zweck:</strong> Dient der Sicherheit der Webseitenbesucher, indem sog. "Cross-Site Request Forgery" verhindert wird. Dient ausschließlich der Sicherheit des Webseiten-Besuchers und des Betreibers.
                    <br/>
                    <strong>Ablauf:</strong> Eine Stunde
                    <br/>
                    <strong>Typ:</strong> HTTP-Cookie
                </p>
				<h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Löschen von Cookies</h3>
				<p class="mb-4">Sie können einzelne Cookies oder den gesamten Cookie-Bestand löschen. Darüber hinaus erhalten Sie Informationen und Anleitungen, wie diese Cookies gelöscht oder deren Speicherung vorab blockiert werden können. Je nach Anbieter Ihres Browsers finden Sie die notwendigen Informationen unter den nachfolgenden Links:</p>
				<ul>
					<li>Mozilla Firefox: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen">https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen</a></li>
					<li>Microsoft Edge: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.microsoft.com/de-de/windows/verwalten-von-cookies-in-microsoft-edge-anzeigen-zulassen-blockieren-l%C3%B6schen-und-verwenden-168dab11-0753-043d-7c16-ede5947fc64d">https://support.microsoft.com/de-de/windows/verwalten-von-cookies-in-microsoft-edge-anzeigen-zulassen-blockieren-l%C3%B6schen-und-verwenden-168dab11-0753-043d-7c16-ede5947fc64d</a></li>
					<li>Google Chrome: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.google.com/accounts/answer/61416?hl=de">https://support.google.com/accounts/answer/61416?hl=de</a></li>
					<li>Opera: <a target="_blank" class="underline" rel="nofollow noopener" href="http://www.opera.com/de/help">http://www.opera.com/de/help</a></li>
					<li>Safari: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.apple.com/kb/PH17191?locale=de_DE&amp;viewlocale=de_DE">https://support.apple.com/kb/PH17191?locale=de_DE&amp;viewlocale=de_DE</a></li>
				</ul>
				<p class="mb-4">Zusätzlich können Sie standardmäßig das Laden sog. Scripts verhindern. NoScript erlaubt das Ausführen von JavaScript, Java und anderen Plugins nur bei vertrauenswürdigen Domains Ihrer Wahl.</p>
				<p class="mb-4">Informationen und Anleitungen, wie Sie diese Funktion bearbeiten können, erhalten Sie über den Anbieter Ihres Browsers (z.B. für Mozilla Firefox: <a target="_blank" class="underline" rel="nofollow noopener" href="https://addons.mozilla.org/de/firefox/addon/noscript/">https://addons.mozilla.org/de/firefox/addon/noscript/</a>).</p>
				<h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Technisch notwendige Cookies</h3>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Art und Zweck der Verarbeitung</h4>
				<p class="mb-4">Wir setzen Cookies ein, um unsere Website nutzerfreundlicher zu gestalten. Einige Elemente unserer Website erfordern es, dass der aufrufende Browser auch nach einem Seitenwechsel identifiziert werden kann.</p>
				<p class="mb-4">Der Zweck der Verwendung technisch notwendiger Cookies ist, die Nutzung von Websites für die Nutzer zu vereinfachen. Einige Funktionen unserer Website können ohne den Einsatz von Cookies nicht angeboten werden. Für diese ist es erforderlich, dass der Browser auch nach einem Seitenwechsel wiedererkannt wird.</p>
				<p class="mb-4">Für folgende Anwendungen benötigen wir Cookies:</p>
				<p class="mb-4">Eine Übersicht finden über die eingesetzten Cookies finden Sie in unserem Cookie-Consent-Tool.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage und berechtigtes Interesse</h4>
				<p class="mb-4">Die Datenverarbeitung erfolgt insoweit allein auf Basis unseres berechtigten Interesses an einer nutzerfreundlichen Gestaltung unserer Website und an der Dokumentation der Einwilligung gem. Art. 6 Abs. 1 lit. f DSGVO in Verbindung mit einer Abwägung nach §25 Abs. 2 TDDDG.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Empfänger</h4>
				<p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Website als Auftragsverarbeiter tätig werden.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Speicherdauer</h4>
				<p class="mb-4">Die jeweilige Speicherdauer der Cookies entnehmen Sie bitte dem Cookie-Consent-Tool.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich</h4>
				<p class="mb-4">Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben. Ohne diese Daten sind jedoch der Dienst und die Funktionsfähigkeit unserer Website nicht gewährleistet. Zudem können einzelne Dienste und Services nicht verfügbar oder eingeschränkt sein.</p>
				<h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Widerspruch</h4>
				<p class="mb-4">Lesen Sie dazu die Informationen über Ihr Widerspruchsrecht nach Art. 21 DSGVO weiter unten.</p>
				<h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Information über Ihr Widerspruchsrecht nach Art. 21 DSGVO</h2>
				<h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Einzelfallbezogenes Widerspruchsrecht</h3>
				<p class="mb-4">Sie haben das Recht, aus Gründen, die sich aus Ihrer besonderen Situation ergeben, jederzeit gegen die Verarbeitung Sie betreffender personenbezogener Daten, die aufgrund Art. 6 Abs. 1 lit. f DSGVO (Datenverarbeitung auf der Grundlage einer Interessenabwägung) erfolgt, Widerspruch einzulegen; dies gilt auch für ein auf diese Bestimmung gestütztes Profiling im Sinne von Art. 4 Nr. 4 DSGVO.</p>
				<p class="mb-4">Legen Sie Widerspruch ein, werden wir Ihre personenbezogenen Daten nicht mehr verarbeiten, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder die Verarbeitung dient der Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen.</p>
				<h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Empfänger eines Widerspruchs</h3>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('eW5hbXJlRyAvIGRuYWxoY3N0dWVE'))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
				</p>
				<h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Änderung unserer Datenschutzerklärung</h2>
				<p class="mb-4">Wir behalten uns vor, diese Datenschutzerklärung anzupassen, damit sie stets den aktuellen rechtlichen Anforderungen entspricht oder um Änderungen unserer Leistungen in der Datenschutzerklärung umzusetzen, z.B. bei der Einführung neuer Services. Für Ihren erneuten Besuch gilt dann die neue Datenschutzerklärung.</p>
				<h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Fragen zum Datenschutz</h2>
				<p class="mb-4">Wenn Sie Fragen zum Datenschutz haben, schreiben Sie uns bitte eine E-Mail an den oben genannten Verantwortlichen.</p>
				<h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Urheberrechtliche Hinweise</h2>
                <p class="mb-4"><em>Die Datenschutzerklärung wurde mithilfe der activeMind AG erstellt &mdash; den Experten für <a
                            href="https://www.activemind.de/datenschutz/datenschutzbeauftragter/" target="_blank"
                            rel="noopener" class="underline">externe Datenschutzbeauftragte</a>
                            <span class="personal">{!! str_rot13(strrev(base64_decode('KTUyLTAxLTQyMDIjIG5vaXNyZVYoCg' . '=='))) !!}</span>
                            .</em></p>
            </div>
        </div>
    </div>
</div>
@else
<div>
    <div class="bg-white shadow-sm overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6">
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto mb-4">Privacy Notice</h1>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Controller</h2>
                <p class="mb-4">The controller within the meaning of data protection laws, in particular the EU General Data Protection Regulation (GDPR), is:
                </p>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('eW5hbXJlRyAvIGRuYWxoY3N0dWVE'))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Your Rights as a Data Subject</h2>
                <p class="mb-4">Using the contact details provided, you may exercise the following rights at any time in accordance with the EU General Data Protection Regulation (GDPR):
                </p>
                <ul>
                    <li>Access to your data stored by us and information about its processing (Art. 15 GDPR),</li>
                    <li>Rectification of inaccurate personal data (Art. 16 GDPR),</li>
                    <li>Erasure of your data stored by us (Art. 17 GDPR),</li>
                    <li>Restriction of data processing if we are not yet allowed to delete your data due to legal obligations (Art. 18 GDPR),</li>
                    <li>Objection to the processing of your data by us (Art. 21 GDPR), and</li>
                    <li>Data portability, provided you have consented to data processing or have entered into a contract with us (Art. 20 GDPR).</li>
                </ul>
                <p class="mb-4">If you have given us consent, you may withdraw it at any time with effect for the future.</p>
                <p class="mb-4">You may lodge a complaint with a supervisory authority at any time, e.g., the authority responsible for your place of residence or the authority responsible for us as the controller.</p>
                <p class="mb-4">A list of supervisory authorities (for the non-public sector) with addresses can be found at: <a
                        href="https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html" target="_blank"
                        rel="noopener nofollow" class="underline">https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html</a>.</p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Processing Activities</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Collection of General Information When Visiting Our Website</h3>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Type and Purpose of Processing</h4>
                <p class="mb-4">When you access our website, i.e., when you do not register or otherwise transmit information, information of a general nature is automatically collected. This information (server log files) includes, for example, the type of web browser, the operating system used, the domain name of your Internet service provider, your IP address, and similar data.</p>
                <p class="mb-4">This information is processed in particular for the following purposes:</p>
                <ul>
                    <li>Ensuring a smooth connection to the website</li>
                    <li>Ensuring smooth use of the website</li>
                    <li>Ensuring and evaluating system security and stability, especially for detecting misuse</li>
                </ul>
                <p class="mb-4">We do not use your data to draw conclusions about your person. However, we reserve the right to check the server log files retrospectively if there are concrete indications of unlawful use.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Legal Basis and Legitimate Interest</h4>
                <p class="mb-4">Processing is carried out pursuant to Art. 6(1)(f) GDPR based on our legitimate interest in improving the stability and functionality of our website as well as ensuring system security and detecting misuse.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Recipients</h4>
                <p class="mb-4">Recipients of the data may be technical service providers who act as processors for the operation and maintenance of our website.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Storage Duration</h4>
                <p class="mb-4">Data is stored in server log files in a form that allows identification of the data subjects for a maximum of two months, unless a security-relevant incident occurs (e.g., a DDoS attack).</p>
                <p class="mb-4">In the event of such an incident, server log files are stored until the incident has been resolved and fully clarified.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Provision Required or Necessary</h4>
                <p class="mb-4">The provision of the aforementioned personal data is neither legally nor contractually required. However, without the IP address, the service and functionality of our website cannot be guaranteed. Additionally, individual services may be unavailable or limited.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Objection</h4>
                <p class="mb-4">Please refer to the information on your right to object under Art. 21 GDPR further below.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Contacting Us</h3>
                <p class="mb-4">Type and Purpose of Processing</p>
                <p class="mb-4">You may contact us using the email addresses provided. In this case, the personal data transmitted with the email is stored. This includes the date and time of sending, email address, IP addresses, and information about the servers involved in the communication.</p>
                <p class="mb-4">You may also contact us via the telephone numbers provided. In this case, we collect log data that includes your phone number and the duration of the call.</p>
                <p class="mb-4">Regardless of the communication method chosen, we collect the content of your inquiry. Your data is stored for the purpose of individual communication with you.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Legal Basis</h4>
                <p class="mb-4">Processing of the data is based on a legitimate interest (Art. 6(1)(f) GDPR).</p>
                <p class="mb-4">Our legitimate interest in processing your data is to enable uncomplicated communication with you.</p>
                <p class="mb-4">If you contact us to request an offer, the data is processed for the performance of pre-contractual measures (Art. 6(1)(b) GDPR).</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Recipients</h4>
                <p class="mb-4">Recipients of the data may be technical service providers who act as processors for the operation and maintenance of our website.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Storage Duration</h4>
                <p class="mb-4">Data is deleted no later than six months after the inquiry has been processed.</p>
                <p class="mb-4">If a contractual relationship is established, we are subject to statutory retention periods, which are generally 6 or 10 years for reasons of proper accounting and tax requirements.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Provision Required or Necessary</h4>
                <p class="mb-4">Providing your personal data is voluntary. However, we can only process your inquiry if you provide us with the necessary data and the reason for your inquiry.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Objection</h4>
                <p class="mb-4">Please refer to the information on your right to object under Art. 21 GDPR further below.</p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Cookies</h2>
                <p class="mb-4">A cookie is a small data record created when visiting a website and temporarily stored on the visitor’s system. When the server of this website is accessed again, the visitor’s browser sends the previously received cookie back to the server. The server can evaluate the information obtained through this process. Cookies can make navigating a website easier.</p>
                <p class="mb-4">The following strictly necessary cookies are used on this website:</p>
                <p class="mb-4">
                    <strong>Name:</strong> laravel_session
                    <br/>
                    <strong>Provider:</strong> lan.descentforum.de
                    <br/>
                    <strong>Purpose:</strong> Maintains the user’s session state across page views
                    <br/>
                    <strong>Expiration:</strong> One hour
                    <br/>
                    <strong>Type:</strong> HTTP cookie
                    <br/>
                    <br/>
                    <strong>Name:</strong> remember_web_*
                    <br/>
                    <strong>Provider:</strong> lan.descentforum.de
                    <br/>
                    <strong>Purpose:</strong> Recognizes the visitor if they activated the “Stay logged in” function during login
                    <br/>
                    <strong>Expiration:</strong> 1 year
                    <br/>
                    <strong>Type:</strong> HTTP cookie
                    <br/>
                    <br/>
                    <strong>Name:</strong> XSRF-TOKEN
                    <br/>
                    <strong>Provider:</strong> lan.descentforum.de
                    <br/>
                    <strong>Purpose:</strong> Ensures the security of website visitors by preventing “Cross-Site Request Forgery”. Used solely for the security of the visitor and the operator.
                    <br/>
                    <strong>Expiration:</strong> One hour
                    <br/>
                    <strong>Type:</strong> HTTP cookie
                </p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Deleting Cookies</h3>
                <p class="mb-4">You can delete individual cookies or the entire cookie inventory. You can also find information and instructions on how to delete or block cookies in advance. Depending on your browser provider, you can find the necessary information at the following links:</p>
                <ul>
                    <li>Mozilla Firefox: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen">https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen</a></li>
                    <li>Microsoft Edge: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.microsoft.com/de-de/windows/verwalten-von-cookies-in-microsoft-edge-anzeigen-zulassen-blockieren-l%C3%B6schen-und-verwenden-168dab11-0753-043d-7c16-ede5947fc64d">https://support.microsoft.com/de-de/windows/verwalten-von-cookies-in-microsoft-edge-anzeigen-zulassen-blockieren-l%C3%B6schen-und-verwenden-168dab11-0753-043d-7c16-ede5947fc64d</a></li>
                    <li>Google Chrome: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.google.com/accounts/answer/61416?hl=de">https://support.google.com/accounts/answer/61416?hl=de</a></li>
                    <li>Opera: <a target="_blank" class="underline" rel="nofollow noopener" href="http://www.opera.com/de/help">http://www.opera.com/de/help</a></li>
                    <li>Safari: <a target="_blank" class="underline" rel="nofollow noopener" href="https://support.apple.com/kb/PH17191?locale=de_DE&amp;viewlocale=de_DE">https://support.apple.com/kb/PH17191?locale=de_DE&amp;viewlocale=de_DE</a></li>
                </ul>
                <p class="mb-4">Additionally, you can generally prevent scripts from loading. NoScript allows JavaScript, Java, and other plugins to run only on trusted domains of your choice.</p>
                <p class="mb-4">Information and instructions on how to manage this function can be found from your browser provider (e.g., for Mozilla Firefox: <a target="_blank" class="underline" rel="nofollow noopener" href="https://addons.mozilla.org/de/firefox/addon/noscript/">https://addons.mozilla.org/de/firefox/addon/noscript/</a>).</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Technically Necessary Cookies</h3>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Type and Purpose of Processing</h4>
                <p class="mb-4">We use cookies to make our website more user-friendly. Some elements of our website require that the browser can be identified even after a page change.</p>
                <p class="mb-4">The purpose of using technically necessary cookies is to simplify the use of websites for users. Some functions of our website cannot be offered without the use of cookies. For these, it is necessary that the browser is recognized again after a page change.</p>
                <p class="mb-4">We require cookies for the following applications:</p>
                <p class="mb-4">An overview of the cookies used can be found in our cookie consent tool.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Legal Basis and Legitimate Interest</h4>
                <p class="mb-4">Data processing is carried out solely on the basis of our legitimate interest in a user-friendly design of our website and in documenting consent pursuant to Art. 6(1)(f) GDPR in conjunction with a balancing of interests under §25(2) TDDDG.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Recipients</h4>
                <p class="mb-4">Recipients of the data may be technical service providers who act as processors for the operation and maintenance of our website.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Storage Duration</h4>
                <p class="mb-4">The respective storage duration of the cookies can be found in the cookie consent tool.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Provision Required or Necessary</h4>
                <p class="mb-4">The provision of the aforementioned personal data is neither legally nor contractually required. However, without this data, the service and functionality of our website cannot be guaranteed. Additionally, individual services may be unavailable or limited.</p>
                <h4 class="text-lg font-semibold text-gray-900 w-auto my-3">Objection</h4>
                <p class="mb-4">Please refer to the information on your right to object under Art. 21 GDPR further below.</p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Information About Your Right to Object Under Art. 21 GDPR</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Right to Object on a Case-by-Case Basis</h3>
                <p class="mb-4">You have the right, for reasons arising from your particular situation, to object at any time to the processing of personal data concerning you that is carried out on the basis of Art. 6(1)(f) GDPR (data processing based on a balancing of interests); this also applies to profiling based on this provision within the meaning of Art. 4(4) GDPR.</p>
                <p class="mb-4">If you object, we will no longer process your personal data unless we can demonstrate compelling legitimate grounds for the processing that override your interests, rights, and freedoms, or the processing serves the establishment, exercise, or defense of legal claims.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Recipient of an Objection</h3>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('eW5hbXJlRyAvIGRuYWxoY3N0dWVE'))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
                <hr>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Changes to our privacy policy</h2>
                <p class="mb-4">We reserve the right to adapt this data protection declaration so that it always complies with the current legal
                    requirements or to implement changes to our services in the privacy policy, e.g. when introducing new services.
                    the introduction of new services. The new privacy policy will then apply to your next visit.</p>
                <p class="mb-4"><em>The privacy policy was created with the help of activeMind AG, the experts for <a
                            href="https://www.activemind.de/datenschutz/datenschutzbeauftragter/" target="_blank"
                            rel="noopener" class="underline">external data protection officers</a>
                            <span class="personal">{!! str_rot13(strrev(base64_decode('KTUyLTAxLTQyMDIjIG5vaXNyZVYoCg' . '=='))) !!}</span>
                            .</em></p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
