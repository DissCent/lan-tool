<footer class="mt-4">
    <div class="w-full bg-gray-800 h-24 sm:h-16">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="block px-2 sm:px-0 sm:flex w-full justify-between">
                <div class="text-white font-semibold">LAN-Tool v1.1</div>
                @if (date('Y') == '2022')
                <div class="text-gray-400">&copy; {{ date('Y') }} Philipp &quot;D.Cent&quot; Lorenz</div>
				@else
                <div class="text-gray-400">&copy; 2022-{{ date('Y') }} Philipp &quot;D.Cent&quot; Lorenz</div>
				@endif
                <div class="text-gray-400">
                    <a class="hover:text-gray-500" href="/imprint">Impressum</a>
                    &middot;
                    <a class="hover:text-gray-500" href="/data-privacy">Datenschutz</a>
                </div>
            </div>
        </div>
    </div>
</footer>
