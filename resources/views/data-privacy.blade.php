@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
<div>
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6"">
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto mb-4">Datenschutzerklärung</h1>
                <p class="mb-4">Verantwortlicher im Sinne der Datenschutzgesetze, insbesondere der EU-Datenschutzgrundverordnung (DSGVO), ist:
                </p>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Ihre Betroffenenrechte</h2>
                <p class="mb-4">Unter den angegebenen Kontaktdaten unseres Datenschutzbeauftragten können Sie jederzeit folgende Rechte ausüben:
                </p>
                <ul>
                    <li>Auskunft über Ihre bei uns gespeicherten Daten und deren Verarbeitung (Art. 15 DSGVO),</li>
                    <li>Berichtigung unrichtiger personenbezogener Daten (Art. 16 DSGVO),</li>
                    <li>Löschung Ihrer bei uns gespeicherten Daten (Art. 17 DSGVO),</li>
                    <li>Einschränkung der Datenverarbeitung, sofern wir Ihre Daten aufgrund gesetzlicher Pflichten noch nicht
                        löschen dürfen (Art. 18 DSGVO),</li>
                    <li>Widerspruch gegen die Verarbeitung Ihrer Daten bei uns (Art. 21 DSGVO) und</li>
                    <li>Datenübertragbarkeit, sofern Sie in die Datenverarbeitung eingewilligt haben oder einen Vertrag mit uns
                        abgeschlossen haben (Art. 20 DSGVO).</li>
                </ul>
                <p class="mb-4">Sofern Sie uns eine Einwilligung erteilt haben, können Sie diese jederzeit mit Wirkung für die Zukunft
                    widerrufen.</p>
                <p class="mb-4">Sie können sich jederzeit mit einer Beschwerde an eine Aufsichtsbehörde wenden, z. B. an die zuständige
                    Aufsichtsbehörde des Bundeslands Ihres Wohnsitzes oder an die für uns als verantwortliche Stelle zuständige
                    Behörde.</p>
                <p class="mb-4">Eine Liste der Aufsichtsbehörden (für den nichtöffentlichen Bereich) mit Anschrift finden Sie unter: <a
                        href="https://www.bfdi.bund.de/DE/Service/Anschriften/Laender/Laender-node.html" target="_blank"
                        rel="noopener nofollow" class="underline">https://www.bfdi.bund.de/DE/Service/Anschriften/Laender/Laender-node.html</a>.</p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Erfassung allgemeiner Informationen beim Besuch unserer Website</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Art und Zweck der Verarbeitung:</h3>
                <p class="mb-4">Wenn Sie auf unsere Website zugreifen, d.h., wenn Sie sich nicht registrieren oder anderweitig Informationen
                    übermitteln, werden automatisch Informationen allgemeiner Natur erfasst. Diese Informationen (Server-Logfiles)
                    beinhalten etwa die Art des Webbrowsers, das verwendete Betriebssystem, den Domainnamen Ihres
                    Internet-Service-Providers, Ihre IP-Adresse und ähnliches. </p>
                <p class="mb-4">Sie werden insbesondere zu folgenden Zwecken verarbeitet:</p>
                <ul>
                    <li>Sicherstellung eines problemlosen Verbindungsaufbaus der Website,</li>
                    <li>Sicherstellung einer reibungslosen Nutzung unserer Website,</li>
                    <li>Auswertung der Systemsicherheit und -stabilität sowie</li>
                    <li>zur Optimierung unserer Website.</li>
                </ul>
                <p class="mb-4">Wir verwenden Ihre Daten nicht, um Rückschlüsse auf Ihre Person zu ziehen. Informationen dieser Art werden von
                    uns ggfs. anonymisiert statistisch ausgewertet, um unseren Internetauftritt und die dahinterstehende Technik zu
                    optimieren. </p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage und berechtigtes Interesse:</h3>
                <p class="mb-4">Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der
                    Verbesserung der Stabilität und Funktionalität unserer Website.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Empfänger:</h3>
                <p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Webseite als
                    Auftragsverarbeiter tätig werden.</p>
                <p class="mb-4"></p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Speicherdauer:</h3>
                <p class="mb-4">Die Daten werden gelöscht, sobald diese für den Zweck der Erhebung nicht mehr erforderlich sind. Dies ist für die
                    Daten, die der Bereitstellung der Website dienen, grundsätzlich der Fall, wenn die jeweilige Sitzung beendet
                    ist. </p>
                <p class="mb-4"> Im Falle der Speicherung der Daten in Logfiles ist dies nach spätestens 14 Tagen der Fall. Eine
                    darüberhinausgehende Speicherung ist möglich. In diesem Fall werden die IP-Adressen der Nutzer anonymisiert,
                    sodass eine Zuordnung des aufrufenden Clients nicht mehr möglich ist.</p>
                <p class="mb-4"></p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich:</h3>
                <p class="mb-4">Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben.
                    Ohne die IP-Adresse ist jedoch der Dienst und die Funktionsfähigkeit unserer Website nicht gewährleistet. Zudem
                    können einzelne Dienste und Services nicht verfügbar oder eingeschränkt sein. Aus diesem Grund ist ein
                    Widerspruch ausgeschlossen. </p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Cookies</h2>
                <p class="mb-4">Wie viele andere Webseiten verwenden wir auch so genannte „Cookies“. Bei Cookies handelt es sich um kleine
                    Textdateien, die auf Ihrem Endgerät (Laptop, Tablet, Smartphone o.ä.) gespeichert werden, wenn Sie unsere
                    Webseite besuchen. </p>
                <p class="mb-4">Sie können einzelne Cookies oder den gesamten Cookie-Bestand löschen. Darüber hinaus erhalten Sie
                    Informationen und Anleitungen, wie diese Cookies gelöscht oder deren Speicherung vorab blockiert werden können.
                    Je nach Anbieter Ihres Browsers finden Sie die notwendigen Informationen unter den nachfolgenden Links:</p>
                <ul>
                    <li>Mozilla Firefox: <a href="https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen"
                            target="_blank" class="underline"
                            rel="nofollow noopener">https://support.mozilla.org/de/kb/cookies-loeschen-daten-von-websites-entfernen</a>
                    </li>
                    <li>Internet Explorer: <a
                            href="https://support.microsoft.com/de-de/help/17442/windows-internet-explorer-delete-manage-cookies"
                            target="_blank" class="underline"
                            rel="nofollow noopener">https://support.microsoft.com/de-de/help/17442/windows-internet-explorer-delete-manage-cookies</a>
                    </li>
                    <li>Google Chrome: <a href="https://support.google.com/accounts/answer/61416?hl=de" target="_blank" class="underline"
                            rel="nofollow noopener">https://support.google.com/accounts/answer/61416?hl=de</a></li>
                    <li>Opera: <a href="http://www.opera.com/de/help" target="_blank" class="underline"
                            rel="nofollow noopener">http://www.opera.com/de/help</a></li>
                    <li>Safari: <a href="https://support.apple.com/kb/PH17191?locale=de_DE&viewlocale=de_DE" target="_blank" class="underline"
                            rel="nofollow noopener">https://support.apple.com/kb/PH17191?locale=de_DE&viewlocale=de_DE</a></li>
                </ul>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Speicherdauer und eingesetzte Cookies:</h3>
                <p class="mb-4">Soweit Sie uns durch Ihre Browsereinstellungen oder Zustimmung die Verwendung von Cookies erlauben, können
                    folgende Cookies auf unseren Webseiten zum Einsatz kommen:</p>
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
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Technisch notwendige Cookies </h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Art und Zweck der Verarbeitung: </h3>
                <p class="mb-4">Wir setzen Cookies ein, um unsere Website nutzerfreundlicher zu gestalten. Einige Elemente unserer Internetseite
                    erfordern es, dass der aufrufende Browser auch nach einem Seitenwechsel identifiziert werden kann.</p>
                <p class="mb-4">Der Zweck der Verwendung technisch notwendiger Cookies ist, die Nutzung von Websites für die Nutzer zu
                    vereinfachen. Einige Funktionen unserer Internetseite können ohne den Einsatz von Cookies nicht angeboten
                    werden. Für diese ist es erforderlich, dass der Browser auch nach einem Seitenwechsel wiedererkannt wird.</p>
                <p class="mb-4"></p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage und berechtigtes Interesse: </h3>
                <p class="mb-4">Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an einer
                    nutzerfreundlichen Gestaltung unserer Website.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Empfänger: </h3>
                <p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Website als
                    Auftragsverarbeiter tätig werden.</p>
                <p class="mb-4"></p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich:</h3>
                <p class="mb-4">Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben.
                    Ohne diese Daten ist jedoch der Dienst und die Funktionsfähigkeit unserer Website nicht gewährleistet. Zudem
                    können einzelne Dienste und Services nicht verfügbar oder eingeschränkt sein.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Widerspruch</h3>
                <p class="mb-4">Lesen Sie dazu die Informationen über Ihr Widerspruchsrecht nach Art. 21 DSGVO weiter unten.</p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Registrierung auf unserer Website</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Art und Zweck der Verarbeitung:</h3>
                <p class="mb-4">Für die Registrierung auf unserer Website benötigen wir einige personenbezogene Daten, die über eine Eingabemaske
                    an uns übermittelt werden. </p>
                <p class="mb-4">Zum Zeitpunkt der Registrierung werden zusätzlich folgende Daten erhoben:</p>
                <p class="mb-4"></p>
                <p class="mb-4">Ihre Registrierung ist für das Bereithalten bestimmter Inhalte und Leistungen auf unserer Website erforderlich.
                </p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Rechtsgrundlage:</h3>
                <p class="mb-4">Die Verarbeitung der bei der Registrierung eingegebenen Daten erfolgt auf Grundlage einer Einwilligung des
                    Nutzers (Art. 6 Abs. 1 lit. a DSGVO).</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Empfänger:</h3>
                <p class="mb-4">Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Website als
                    Auftragsverarbeiter tätig werden.</p>
                <p class="mb-4"></p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Speicherdauer:</h3>
                <p class="mb-4">Daten werden in diesem Zusammenhang nur verarbeitet, solange die entsprechende Einwilligung vorliegt. </p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Bereitstellung vorgeschrieben oder erforderlich:</h3>
                <p class="mb-4">Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig, allein auf Basis Ihrer Einwilligung. Ohne
                    die Bereitstellung Ihrer personenbezogenen Daten können wir Ihnen keinen Zugang auf unsere angebotenen Inhalte
                    gewähren. </p>
                <p class="mb-4"></p>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">SSL-Verschlüsselung</h2>
                <p class="mb-4">Um die Sicherheit Ihrer Daten bei der Übertragung zu schützen, verwenden wir dem aktuellen Stand der Technik
                    entsprechende Verschlüsselungsverfahren (z. B. SSL) über HTTPS.</p>
                <p class="mb-4"></p>
                <hr>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Information über Ihr Widerspruchsrecht nach Art. 21 DSGVO</h2>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Einzelfallbezogenes Widerspruchsrecht</h3>
                <p class="mb-4">Sie haben das Recht, aus Gründen, die sich aus Ihrer besonderen Situation ergeben, jederzeit gegen die
                    Verarbeitung Sie betreffender personenbezogener Daten, die aufgrund Art. 6 Abs. 1 lit. f DSGVO
                    (Datenverarbeitung auf der Grundlage einer Interessenabwägung) erfolgt, Widerspruch einzulegen; dies gilt auch
                    für ein auf diese Bestimmung gestütztes Profiling im Sinne von Art. 4 Nr. 4 DSGVO.</p>
                <p class="mb-4">Legen Sie Widerspruch ein, werden wir Ihre personenbezogenen Daten nicht mehr verarbeiten, es sei denn, wir
                    können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und
                    Freiheiten überwiegen, oder die Verarbeitung dient der Geltendmachung, Ausübung oder Verteidigung von
                    Rechtsansprüchen.</p>
                <h3 class="text-xl font-semibold text-gray-900 w-auto my-3">Empfänger eines Widerspruchs</h3>
                <p class="mb-4">
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
                <hr>
                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">Änderung unserer Datenschutzbestimmungen</h2>
                <p class="mb-4">Wir behalten uns vor, diese Datenschutzerklärung anzupassen, damit sie stets den aktuellen rechtlichen
                    Anforderungen entspricht oder um Änderungen unserer Leistungen in der Datenschutzerklärung umzusetzen, z.B. bei
                    der Einführung neuer Services. Für Ihren erneuten Besuch gilt dann die neue Datenschutzerklärung.</p>
                <p class="mb-4"><em>Die Datenschutzerklärung wurde mithilfe der activeMind AG erstellt, den Experten für <a
                            href="https://www.activemind.de/datenschutz/datenschutzbeauftragter/" target="_blank"
                            rel="noopener" class="underline">externe Datenschutzbeauftragte</a>
                            <span class="personal">{!! str_rot13(strrev(base64_decode('KTAzLTkwLTAyMDIjIG5vaXNyZVYoCg' . '=='))) !!}</span>
                            .</em></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
