<div>
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: true }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#" class="block" @click="open = !open">
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
                Die {{ $lan->name }} findet vom {{ date('d.m.', strtotime($lan->date_begin)) }} - {{ date('d.m.Y', strtotime($lan->date_end)) }} statt.
                <br/>
                Die Kosten hängen von der Teilnehmeranzahl ab und belaufen sich in etwa auf:
                <br/>
                <br/>
                <ul class="list-disc pl-6">
                    <li>Ein Tag ca. <strong>25 €</strong></li>
                    <li>Zwei Tage ca. <strong>45 €</strong></li>
                    <li>Drei Tage ca. <strong>60 €</strong></li>
                    <li>Vier Tage ca. <strong>70 €</strong></li>
                </ul>
                <br/>
                Im Preis enthalten sind Frühstück und Abendessen, mit Ausnahme von Donnerstagabend - hier wird traditionellerweise bestellt. Diese Kosten sind nicht gedeckt.
                <br/>
                Die Teilnahmegebühr beinhaltet außerdem Strom, Sitzplatz und Infrastruktur. PC und Ein-/Ausgabegeräte sind selbst mitzubringen, mehr unter "Checkliste".
                <br/>
                <br/>
                Getränke werden angeboten, hier wird einzeln abgerechnet. Eigene Getränke sind gestattet.
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6 relative" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#" class="block" @click="open = !open">
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
                Sportverein 1930 Erbacg eV
                <br/>
                Straße ist nicht verzeichnet
                <br/>
                65520 Selters (Taunus) / Bad Camberg
                <br/>
                <br/>
                GPS-Koordinaten: 50.3099269, 8.2507903
                <br/>
                <br/>
                <strong>Anreise mit dem Auto:</strong>
                <br/>
                (Autobahn) Ausfahrt A3 -> Ausfahrt 44 (Bei Raststätte Bad Camberg Ost)
                <br/>
                <br/>
                <strong>von Süden</strong> Abfahrt, rechts, Kreisverkehr zweite Ausfahrt, dann Ende der Straße rechts
                <br/>
                <strong>von Norden</strong> Abfahrt, an der Shell-Tankstelle vorbei, an der Ampel rechts abbiegen, dann am Ende der Straße rechts
                <br/>
                <br/>
                Direkt beim Abstieg der L3030 die erste Ausfahrt links nehmen, gleich nach der Bahnüberführung, wo die Hof-Gnadenthal-Straße beginnt.
                <br/>
                Diesen Weg bis zum Parkplatz zum Sportverein nehmen.
                <br/>
                <br/>
                <strong>Anreise mit dem Zug:</strong> Bahnhof "Bad Camberg"
            </div>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6" x-data="{ open: false }">
            <h3 class="text-lg leading-6 font-medium text-gray-900 relative">
                <a href="#" class="block" @click="open = !open">
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
                Es ist ein Gigabit-Switch vorhanden.
                <br/>
                Internet-Anbindung ist möglich, aber unter Vorbehalt - bitte bedenkt, dass wir gewisse Seiten aussperren, um die Bandbreite zu schonen.
                <br/>
                Stühle/Tische sind vorhanden, aber die Mitnahme eigener Stühle ist erlaubt.
                <br/>
                LAN-Kabel-Mitnahme ist nicht notwendig, aber ein Reserve-Kabel schadet nie. PC bitte unbedingt auf DCHP stellen.
                <br/>
                <br/>
                <strong>Bitte unbedingt mitnehmen:</strong>
                <ul class="list-disc pl-6">
                    <li>Steckdosenleiste - bitte mit mehr Anschlüssen, als ihr benötigt. Also lieber größere als kleinere Steckdosenleisten</li>
                    <li>Schlafsack (oder was ihr benötigt, um schlafen zu können) - es wird euch ein Bodenplatz angeboten, also empfehlen wir auch eine geeignete Unterlage</li>
                    <li>Köpferhörer/Headset, keine Boxen!</li>
                    <li>PC/Notebook mit allem, was ihr zum Zocken braucht</li>
                </ul>
                <br/>
                <strong>Bitte beschriftet all eure Kabel und ggf. Zubehör!</strong>
            </div>
        </div>
    </div>
</div>
