<div>
    @if ($german)
    <a wire:click="changeLanguage('en');" href="#!" class="text-white hover:underline" title="Switch to English language">
        EN
    </a>
    @else
    <a wire:click="changeLanguage('de');" href="#!" class="text-white hover:underline" title="Zu Deutscher Sprache wechseln">
        DE
    </a>
    @endif
</div>
