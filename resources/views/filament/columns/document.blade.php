<div>
    @if ($getState()!="")
        <a class="inline-flex items-center justify-center gap-0.5 font-medium hover:underline focus:outline-none focus:underline filament-link text-sm text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400 filament-tables-link-action" href="{{ asset('storage/'.$getState())}}"> Unduh Bukti</a>
    @else
        <p>-</p>
    @endif
</div>
