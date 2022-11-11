<div>
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
                Die Kosten hängen von der Teilnehmeranzahl ab. <u>Eine endgültige Schätzung der Preise steht noch aus</u> - basierend auf den Kosten der letzten Jahre belaufen sich diese aber in etwa auf:
                <br/>
                <br/>
                <ul class="list-disc pl-6">
                    <li>Ein Tag ca. <strong>25 €</strong></li>
                    <li>Zwei Tage ca. <strong>45 €</strong></li>
                    <li>Drei Tage ca. <strong>60 €</strong></li>
                    <li>Vier Tage ca. <strong>70 €</strong></li>
                </ul>
                <br/>
                Im Preis enthalten sind Frühstück und Abendessen, mit Ausnahme von Donnerstagabend - hier bestellen wir bei einem Lieferdienst, wobei jeder seine eigenen Kosten trägt.
                <br/>
                Ebenfalls enthalten sind Stromkosten und Sitzplatz. PC, Kabel und Ein-/Ausgabegeräte sind selbst mitzubringen, siehe "Checkliste".
                <br/>
                <br/>
                Getränke können vor Ort erworben werden. Vor der Abreise erfolgt dann die Abrechnung. Auch eigene Getränke sind gestattet.
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
                Direkt beim Abstieg der L3030 die erste Ausfahrt links nehmen, gleich nach der Bahnüberführung, wo die Hof-Gnadenthal-Straße beginnt.
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
                Die LAN-Kabel-Mitnahme ist notwendig, auch ein Reserve-Kabel schadet nie. PC bitte unbedingt auf DCHP stellen.
                <br/>
                <br/>
                <strong>Bitte unbedingt mitnehmen:</strong>
                <ul class="list-disc pl-6">
                    <li>Steckdosenleiste - bitte mit ausreichend Anschlüssen, sodass ggf. auch der Nachbar sich noch mit einstecken kann</li>
					<li>Netzwerkkabel - besser lang und gerne mehr als eines, um notfalls aushelfen zu können</li>
                    <li>Schlafsack/Feldbett/Luftmatratze - eben was ihr benötigt, um auf dem Boden (oder darüber) schlafen zu können</li>
                    <li>Köpferhörer/Headset - bitte verzichtet auf die Mitnahme von Lautsprechern!</li>
                    <li>PC/Notebook mit allem, was ihr zum Zocken braucht - idealerweise ist alles auf dem neuesten Stand</li>
                </ul>
            </div>
        </div>
    </div>
</div>
