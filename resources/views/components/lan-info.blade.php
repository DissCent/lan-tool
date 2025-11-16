<div>
	{{--
    @if (Session::get('locale') == 'de')
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Termin

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Die <strong>{{ $lan->name }}</strong> findet <strong>vom {{ date('d.m.', strtotime($lan->date_begin)) }} - {{ date('d.m.Y', strtotime($lan->date_end)) }}</strong> statt.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Location &amp; Anfahrt

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Dieses Jahr feiern wir wieder im "Schweier Krug" in Nordwest-Deutschland - in der Wesermarsch - in Schwei (Stadland). Derzeit gehen wir davon aus, dass wir in der Location gut 20 Leute unterbekommen.
                <br/>
                <br/>
                <strong>Adresse:</strong>
                <br/>
                <br/>
                Schweier Krug
                <br/>
                Lindenstr. 25
                <br/>
                26936 Schwei-Stadland
                <br/>
                Tel.: <a class="underline" href="tel:+494737338">04737 - 338</a>
                <br/>
                Webseite: <a class="underline" target="blank" href="https://schweierkrug.de">https://schweierkrug.de</a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Facts

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Die Saalmiete wird durch die Anzahl der Teilnehmer geteilt. Bei 25 Leuten kamen z.B. dabei 15&nbsp;€ heraus.<br>
                Getränke und Speisen werden diesmal wieder von der Wirtschaft bezogen.<br>
                Deren Preise werden sich auch kaum ändern. Details werden demnächst bekannt gegeben.<br>
                Da wir dieses Jahr vermutlich deutlich weniger Teilnehmer haben:<br>
                Wir werden vermutlich bei ~25 € Tagespauschale für Miete, Duschen, Strom und Frühstück liegen.<br>
                Morgens gibt es ein Frühstücksbuffet mit Brötchen und Co.<br>
                Wer Mittags was zu Essen braucht, kann sich wahlweise beim Frühstück ein Brötchen mehr fertig machen oder müsste sich außer Haus verpflegen.<br>
                Diverse Optionen werden wir vor Ort bekannt geben, sind aber mit etwas Fahrt verbunden.<br>
                In den vergangen Jahren ist das Mittags-Angebot fast ungenutzt geblieben, weswegen wir es abgeschafft haben.<br>
                Abends kann man im Restaurant griechisch / mediterran essen (und direkt bar zahlen).<br>
                <br>
                Mehr Infos kommen auf Anfrage oder eben vor Ort :-)<br>
                <br>
                Wie immer geht es um eine Descent-LAN mit Schwerpunkt Descent 3 und Overload.<br>
                <br>
                So, wie es aussieht, haben wir für ca. <strong>20</strong> Leute Platz.<br>
                Geschlafen wird wieder im Saal, im Zelt (selber mitzubringen) oder Hotelzimmer
                (selber zu buchen und zu zahlen). Das heißt, dass sich jeder eine (Luft-)Matratze oder geeignete
                Unterlage sowie Schlafsack etc. mitbringen sollte! Zelten im hinteren Garten ist möglich!<br>
                <br>
                Ein Unterschied zu einem früheren Jahr, wo wir im Schweier Krug waren, wird wohl sein, dass wir NUR
                den großen Saal zum Spielen UND Schlafen haben. <br>
                Dadurch können wir wohl max. 20 Teilnehmer unterbringen - es sei denn, das Wetter
                ist super und einige zelten :)<br>
                <br>
                Wir haben unsere eigene Theke und werden den Getränke-Verbrauch mittels einer Strichliste, auf der jeder
                Teilnehmer seinen Konsum selbst einträgt, feststellen. Dabei vertrauen wir auf die Ehrlichkeit von jedem
                von Euch / Uns. Ich muss alles 1:1 zahlen, was nicht oder falsch eingetragen wird - also bitte gewissenhaft...
                :) Das hat auch in den letzten Jahren so weit sehr gut geklappt. Einige haben bei der Zahlung etwas
                aufgeschlagen, weil sie sich selbst nicht ganz trauten - damit bin ich dann letztendlich ohne draufzulegen
                rausgegangen. Überzahlte Beträge (Gewinne - wie auch immer) fließen dann in das
                <a href="http://www.descentforum.de/forum/viewtopic.php?t=1756" target="_blank">Descentforum.NET Projekt</a> (welches auch wieder neue Mitglieder sucht *hint* ;-) ).<br>
                <br>
                Das Thema Dusche wird so geregelt werden, dass einige Teilnehmer ihre jew. Hotelzimmer zur Verfügung stellen. <br>
                Der Preis für das Duschen ist in der LAN-Pauschale enthalten. <br>
                <br>
                Wir lassen uns auf keine Diskussion wie "ich will aber gar nicht duschen oder frühstücken - ich will 'nen Preisnachlass" ein.<br>
                <br>
                Ein Gruppenfoto-Termin ist für Samstag Abend ca. 18h (je nach Wetter) vorgesehen. Wäre schön,
                wenn das schnell und reibungslos klappen kann. Bei über 20 Leuten wird das SEHR nervig für einige,
                wenn es Leute gibt, die sich einfach nicht lösen können. Die ersten hauen dann schon wieder ab und
                werden sauer, wenn die letzten eintrudeln. Ist assi - also bitte dann eben raus kommen...<br>
                <br>
                Sodenn - ich denke, das soll's gewesen sein...<br>
                <br>
                Was ihr zum Spielen mitbringt, ist im Grunde alleine Euch überlassen, nur KEINE Lautsprecher!<br>
                <br>
                <br>
                <strong>"da fonk is da fonk is da fonk!!!"</strong><br>
                <br>
                Do_Checkor
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Checkliste

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Was man mitbringen sollte (zumindest wird Äquivalentes nicht gestellt):
                <br>
                <br>
                <ul class="list-disc pl-6">
                    <li>Kulturbeutel mit Duschsachen, Zahnbürste, -pasta, Kamm o. Bürste, Deo, ggf. Rasiersachen</li>
                    <li>Duschtuch, Handtuch (je nach Länge der LAN auch mehrere)</li>
                </ul>
                <br>

                <strong>Ohne Hotelzimmer:</strong>
                <br>
                <br>
                <ul class="list-disc pl-6">
                    <li>Luftmatratze - bitte nur KLEINE / schmale (also max. 1m breit), falls allein drauf geschlafen wird), oder Feldbett, o.ä.</li>
                    <li>Schlafsack, Decke, o.ä.</li>
                    <li>Genügend Bekleidung - auch warme, um abends draußen sitzen zu können (okay, ich denke, in eurem Alter weiß man, was man so braucht - also: 5 Tage das gleiche Shirt oder Socken, kommt nicht cool rüber)</li>
                    <li>Computer + Stromkabel (bei Laptops nicht das Netzteil vergessen - ist oft genug vorgekommen)</li>
                    <li>Monitor + Anschlusskabel + Stromkabel</li>
                    <li>Tastatur (ggf. + Funkempfänger)</li>
                    <li>Maus (ggf. + Funkempfänger)</li>
                </ul>
                <br>
                <strong>WICHTIG:</strong>
                <br>
                <br>
                <ul class="list-disc pl-6">
                    <li>Headset oder wenigstens Kopfhörer (keine Lautsprecher / Boxen)</li>
                    <li>Netzwerkkabel Cat. 5 (oder höher/kompatibel) Patchkabel von mindestens 10m - BESSER sogar 20m Länge</li>
                    <li>Stromverteiler (Mehrfachsteckdose) BESSER 2 oder 3 als 1 - davon sind nie zu viele da...</li>
                </ul>

                <br>
                nicht zwingend, aber IMMER gut dabei zu haben, wenn man hat / noch Platz hat NEBEN den obigen Sachen:
                <br>
                <br>

                <ul class="list-disc pl-6">
                    <li>2. Rechner / Server inkl. Peripherie nach Konfiguration</li>
                    <li>Kabeltrommel(n)</li>
                    <li>Mehrfachsteckdose(n)</li>
                    <li>weitere LANGE Netzwerkkabel</li>
                </ul>

                <br>
                <strong>weitere WICHTIGE Dinge zu beachten:</strong>
                <br>
                <br>

                <ul class="list-disc pl-6">
                    <li>KEINE FESTEN IPs / DNS Server-Adressen auf der LAN-Netzwerkkarte, sondern DHCP, also "vom Server zugewiesene Adressen". Wer 'nen Server dabei hat, bespricht die Config vor dem Anschluss bitte persönlich.
                    Dies ist VOR der LAN einzustellen. Der Dienst "DHCP-Client" muss automatisch gestartet sein (Windows +R --&gt; services.msc --&gt; DHCP-Client --&gt; Starttyp checken)</li>
                    <li>NIEMAND außer Do_Checkor fuchtelt an den Switches herum</li>
                    <li>NIEMAND steckt sein Netzwerkkabel in den Switch, ohne Bescheid zu sagen (Do_Checkor betreut JEDEN Einzelnen persönlich bei der Konfiguration und Verkabelung)</li>
                    <li>Speisen und Getränke werden in der Regel beim Wirt abgenommen bzw. von uns besorgt. Das Mitbringen von Getränken und Speisen ist untersagt (sollte dem mal anders sein, wird dies explizit auf der LAN-Seite niedergeschrieben). Süßigkeiten, Knabberkram o.ä. ist erlaubt.</li>
                </ul>
            </div>
        </div>
    </div>
	@else
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Event date

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                The <strong>{{ $lan->name }}</strong> will take place <strong>from {{ date('F d', strtotime($lan->date_begin)) }} until {{ date('F d Y', strtotime($lan->date_end)) }}</strong>.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Location &amp; Approach

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                This year we are celebrating again in the "Schweier Krug" in northwest Germany - in the Wesermarsch - in Schwei (Stadland). We are currently assuming that we will be able to accommodate a good 20 people in the location.
                <br/>
                <br/>
                <strong>Address:</strong>
                <br/>
                <br/>
                Schweier Krug
                <br/>
                Lindenstr. 25
                <br/>
                26936 Schwei-Stadland
                <br/>
				Germany
                <br/>
                Tel.: <a class="underline" href="tel:+494737338">+49 04737 - 338</a>
                <br/>
                Website: <a class="underline" target="blank" href="https://schweierkrug.de">https://schweierkrug.de</a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Facts

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
				The rent is divided by the number of participants. With 25 people, for example, this resulted in €&nbsp;15.<br>
                Drinks and food will again be provided by the restaurant.<br>
                Their prices will hardly change. Details will be announced soon.<br>
                Since we will probably have significantly fewer participants this year:<br>
                We will probably be at ~€25 per diem for rent, showers, electricity and breakfast.<br>
                In the morning there will be a breakfast buffet with bread rolls and co.<br>
                If you need something to eat at lunchtime, you can either make yourself an extra roll at breakfast or eat out.<br>
                We will announce various options on site, but they will involve a bit of a drive.<br>
                In recent years, the lunch offer has remained almost unused, which is why we have abolished it.<br>
                In the evening you can eat Greek / Mediterranean food in the restaurant (and pay directly in cash).<br>
                <br>
                More information is available on request or on site :-)<br>
                <br>
                As always, it's about a Descent LAN with a focus on Descent 3 and Overload.<br>
                <br>
				It looks like we have room for about 20 people.<br>
				We will sleep in the hall, in a tent (bring your own) or in a hotel room (book and pay for yourself).
				This means that everyone should bring their own (air) mattress or suitable mattress pad and sleeping bag etc.!
				Camping in the back garden is possible!<br>
                <br>
				One difference to a previous year, when we were in the Schweier Krug, will probably be that we ONLY
				have the large hall for playing AND sleeping.<br>
				This means that we can probably accommodate a maximum of 20 participants - unless the weather
				is great and some people camp out :)<br>
                <br>
				We have our own bar and will determine the consumption of drinks by means of a tally sheet on which each
				participant enters their own consumption. We rely on the honesty of each of you / us. I have to pay 1:1
				for everything that is not entered or entered incorrectly - so please be conscientious... :) This has also
				worked very well in recent years. Some have added something to the payment because they didn't quite trust
				themselves - in the end I went out without adding anything. Any overpayments (profits - whatever) then
				flow into the <a href="http://www.descentforum.de/forum/viewtopic.php?t=1756" target="_blank">Descentforum.NET project</a>
				(which is also looking for new members *hint* ;-) ).<br>
                <br>
                The shower issue will be arranged in such a way that some participants will make their hotel rooms available.<br>
                The price for showering is included in the LAN flat rate.<br>
                <br>
                We don't get into discussions like "I don't want to shower or have breakfast - I want a discount".<br>
                <br>
				A group photo session is planned for Saturday evening around 18h (depending on the weather). It would be nice
                if this can be organized quickly and smoothly. With over 20 people it will be VERY annoying for some,
                if there are people who just can't get away. The first ones leave again and
                get angry when the last ones arrive. It's ass - so please just come out...<br>
                <br>
                So then - I think this should be it...<br>
                <br>
                What you bring to play is basically up to you, just NO speakers!<br>
                <br>
                <br>
                <strong>"da fonk is da fonk is da fonk!!!"</strong><br>
                <br>
                Do_Checkor
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Checklist

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                What you should bring with you (at least nothing equivalent is provided):
                <br>
                <br>
                <ul class="list-disc pl-6">
                    <li>Toiletry bag with shower things, toothbrush, toothpaste, comb or brush, deodorant, shaving things if necessary</li>
                    <li>Shower towel, hand towel (several depending on the length of the LAN)</li>
                </ul>
                <br>

                <strong>Ohne Hotelzimmer:</strong>
                <br>
                <br>
                <ul class="list-disc pl-6">
					<li>Air mattress - please only SMALL / narrow (i.e. max. 1m wide), if sleeping alone), or camp bed, or similar.</li>
					<li>Sleeping bag, blanket, etc.</li>
					<li>Sufficient clothing - also warm clothes to be able to sit outside in the evening (okay, I think at your age you know what you need - so: the same shirt or socks for 5 days doesn't come across as cool)</li>
					<li>Computer + power cable (don't forget the power adapter for laptops - it's happened often enough)</li>
					<li>Monitor + connection cable + power cable</li>
					<li>Keyboard (if necessary + wireless receiver)</li>
					<li>Mouse (if necessary + wireless receiver)</li>
                </ul>
                <br>
                <strong>IMPORTANT:</strong>
                <br>
                <br>
                <ul class="list-disc pl-6">
					<li>Headset or at least headphones (no loudspeakers / speakers)</li>
					<li>Network cable Cat. 5 (or higher/compatible) patch cable of at least 10m - BETTER even 20m long</li>
					<li>Power distributor (multiple socket) BETTER 2 or 3 than 1 - there are never too many of them...</li>
                </ul>

                <br>
                not mandatory, but ALWAYS good to have with you if you have / still have room NEBEN the above items:
                <br>
                <br>

                <ul class="list-disc pl-6">
					<li>2nd computer / server incl. peripherals according to configuration</li>
					<li>Cable reel(s)</li>
					<li>Multiple socket(s)</li>
					<li>additional LANGE network cables</li>
                </ul>

                <br>
                <strong>other IMPORTANT things to note:</strong>
                <br>
                <br>

                <ul class="list-disc pl-6">
					<li>NO FIXED IPs / DNS server addresses on the LAN network card, but DHCP, i.e. "addresses assigned by the server". If you have a server with you, please discuss the config personally before connecting.</li>
					<li>This must be set BEFORE the LAN. The "DHCP client" service must be started automatically (Windows +R --&gt; services.msc --&gt; DHCP client --&gt; check startup type)</li>
					<li>NOBODY except Do_Checkor is fiddling with the switches</li>
					<li>NOBODY plugs their network cable into the switch without telling them (Do_Checkor personally supervises EVERY individual during configuration and cabling)</li>
					<li>Food and drinks are usually taken from the host or provided by us. It is forbidden to bring food and drinks (should this not be the case, this will be explicitly stated on the LAN page). Sweets, snacks etc. are permitted.</li>
                </ul>
            </div>
        </div>
    </div>
	@endif
	--}}

    @if (Session::get('locale') == 'de')
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Generelle Infos

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Die <strong>{{ $lan->name }}</strong> findet <strong>vom {{ date('d.m.', strtotime($lan->date_begin)) }} - {{ date('d.m.Y', strtotime($lan->date_end)) }}</strong> statt.
                <br/>
                Die Kosten hängen von der Teilnehmeranzahl ab. <u>Eine endgültige Schätzung der Preise steht noch aus</u>, allerdings werden die Kosten in diesem Jahr steigen, da die Miete für unsere Location angehoben wurde. Wir schätzen die Kosten pro Person ungefähr auf:
                <br/>
                <br/>
                <ul class="list-disc pl-6">
                    <li>Ein Tag ca. <strong>25 €</strong></li>
                    <li>Zwei Tage ca. <strong>45 €</strong></li>
                    <li>Drei Tage ca. <strong>65 €</strong></li>
                    <li>Vier Tage ca. <strong>85 €</strong></li>
                </ul>
                <br/>
                Im Preis enthalten sind Frühstück und Abendessen, mit Ausnahme von Donnerstagabend - hier bestellen wir bei einem Lieferdienst, wobei jeder seine eigenen Kosten trägt.
                <br/>
                Ebenfalls enthalten sind Stromkosten und Sitzplatz. PC, Kabel und Ein-/Ausgabegeräte sind selbst mitzubringen, siehe "Checkliste".
                <br/>
                <br/>
                Getränke können vor Ort erworben werden. Vor der Abreise erfolgt dann die Abrechnung, vorzugsweise in bar. Auch eigene Getränke sind gestattet.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6 relative" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Anfahrt

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Sportverein 1930 Erbach e.V.
                <br/>
                In der Fetz
                <br/>
                65520 Bad Camberg
                <br/>
                <br/>
                GPS-Koordinaten: 50.310158982441905, 8.25016724948831
                <br/>
                <br/>
                <strong>Anreise mit dem Auto:</strong>
                <br/>
                <br/>
                Autobahn A3 -&gt; Ausfahrt 44 (Raststätte Bad Camberg Ost)
				<br/>
				<br/>
				<a class="underline" href="https://www.google.de/maps/dir//50.3101566,8.2501691/@50.3101178,8.2502251,20.5z/data=!4m2!4m1!3e0" target="_blank">Zur Routenplanung mit Google Maps</a>
				<br/>
				<a class="underline" href="https://www.openstreetmap.org/directions?from=&to=50.31063%2C8.25054#map=18/50.30972/8.25077" target="_blank">Zur Routenplanung mit OpenStreetMap</a>
                <br/>
                <br/>
				Vorsicht bei der Anfahrt: Bei der Einfahrt in den Ort über die L3030 befindet sich die Ausfahrt zum Sportverein direkt hinter der Bahnüberführung!
                <br/>
                Direkt vor dem Vereinshaus befinden sich einige Parkplätze, welche zur freien Verfügung stehen.
                <br/>
                <br/>
                <strong>Anreise mit dem Zug:</strong>
				<br/>
				<br/>
				Der Bahnhof "Bad Camberg" befindet sich gute 1500 Meter vom Vereinshaus entfernt. Eine Abholung wird empfohlen und kann auch jederzeit durch andere Teilnehmer kurzfristig eingerichtet werden.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Checkliste

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Ein Gigabit-Switch wird organisiert.
                <br/>
				Ggf. ist eine Internet-Anbindung möglich, wobei eventuell Streaming-Seiten, etc. ausgesperrt werden, um die Leitung für Spiele brauchbarer zu halten.
                <br/>
                Wir verwenden die Tische und Stühle des Vereinshauses, allerdings können auch eigene Stühle mitgebracht werden.
                <br/>
                Die LAN-Kabel-Mitnahme ist nicht notwendig, es werden Kabel für alle Teilnehmer gestellt. PC bitte unbedingt auf DHCP stellen.
                <br/>
                <br/>
                <strong>Bitte unbedingt mitnehmen:</strong>
                <ul class="list-disc pl-6">
                    <li>Steckdosenleiste - bitte mit ausreichend Anschlüssen, sodass ggf. auch der Nachbar sich noch mit einstecken kann</li>
                    <li>Schlafsack/Feldbett/Luftmatratze - eben was ihr benötigt, um auf dem Boden (oder darüber) schlafen zu können</li>
                    <li>Köpferhörer/Headset - bitte verzichtet auf die Mitnahme von Lautsprechern!</li>
                    <li>PC/Notebook mit allem, was ihr zum Zocken braucht - idealerweise ist alles auf dem neuesten Stand</li>
                </ul>
            </div>
        </div>
    </div>
    @else
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    General information

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                The <strong>{{ $lan->name }}</strong> will take place <strong>from {{ date('F d', strtotime($lan->date_begin)) }} until {{ date('F d Y', strtotime($lan->date_end)) }}</strong>.
                <br/>
                Costs depend on the number of participants. <u>A final estimate of the prices is still pending</u>. However, we know that costs will increase this year since the rent for our location has been raised. We estimate the following prices per person:
                <br/>
                <br/>
                <ul class="list-disc pl-6">
                    <li>One day approx. <strong>25 €</strong></li>
                    <li>Two days approx. <strong>45 €</strong></li>
                    <li>Three days approx. <strong>65 €</strong></li>
                    <li>Four days approx. <strong>85 €</strong></li>
                </ul>
                <br/>
                Breakfast and dinner are included in the price, with the exception of Thursday evening - here we order from a delivery service, whereby everyone bears their own costs.
                <br/>
                Also included are electricity costs and seating. Please bring your own PC, cables and input/output devices, see "Checklist".
                <br/>
                <br/>
                Drinks can be purchased on site. The bill will be settled before departure - please pay cash if you can. Own drinks are also permitted.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6 relative" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Approach

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                Sportverein 1930 Erbach e.V.
                <br/>
                In der Fetz
                <br/>
                65520 Bad Camberg
                <br/>
                <br/>
                GPS coordinates: 50.310158982441905, 8.25016724948831
                <br/>
                <br/>
                <strong>Approach by car:</strong>
                <br/>
                <br/>
                Autobahn/Highway A3 -&gt; Exit 44 (Raststätte Bad Camberg Ost)
				<br/>
				<br/>
				<a class="underline" href="https://www.google.de/maps/dir//50.3101566,8.2501691/@50.3101178,8.2502251,20.5z/data=!4m2!4m1!3e0" target="_blank">Open route planner in Google Maps</a>
				<br/>
				<a class="underline" href="https://www.openstreetmap.org/directions?from=&to=50.31063%2C8.25054#map=18/50.30972/8.25077" target="_blank">Open route planner in OpenStreetMap</a>
                <br/>
                <br/>
				Be careful when arriving: When entering the village via the L3030, the exit to the location is located directly behind the railroad overpass!
                <br/>
                There are several parking spaces directly in front of the location, which are freely available.
                <br/>
                <br/>
                <strong>Approach by train:</strong>
				<br/>
				<br/>
                The train station "Bad Camberg" is located about 1.5 km (about 1 mile) from the location. Collection is recommended and can also be arranged at short notice by other participants at any time.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#!" class="block" @click="open = !open">
                    Checklist

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute right-0 top-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </a>
            </h3>
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                A gigabyte switch will be available.
                <br/>
                An internet connection might be available, although we might block streaming sites, etc. to enable a better online playing experience.
                <br/>
                We will use the desks and chairs provided by the location. Bringing your own chairs is permitted.
                <br/>
                Bringing your own LAN cable(s) is not required - we will provide those for everyone. Please set your PC's network card to 'DHCP'.
                <br/>
                <br/>
                <strong>Please be sure to bring:</strong>
                <ul class="list-disc pl-6">
                    <li>Power strip - with sufficient connections so that neighbors can also plug in if necessary</li>
                    <li>Sleeping bag/field bed/air mattress - just what you need to be able to sleep on the ground (or above it)</li>
                    <li>Headphones/headset - please refrain from bringing loudspeakers!</li>
                    <li>PC/notebook with everything you need for gaming - ideally everything should be up to date</li>
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>
