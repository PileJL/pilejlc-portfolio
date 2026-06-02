<div class="space-y-1.5 rounded-md border border-accent/5 px-5 py-3">
    {{-- header --}}
    <flux:heading class="font-black! text-lg!" level="2">Social Links</flux:heading>
    {{-- content --}}
    <div class="grid grid-cols-2 gap-2 sm:flex sm:justify-between sm:items-center px-1">
        @foreach (config('app.socials') as $social)
            <a href="{{ $social[2] }}" target="_blank" class="flex gap-1 items-center">
                <x-dynamic-component :component="$social[1]" size="size-4"/>
                <flux:text class="text-accent-content font-semibold">{{ $social[0] }}</flux:text>
            </a>
        @endforeach
    </div>
</div>