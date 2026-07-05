@props(['about'])

<div class="space-y-1.5 rounded-md border border-accent/5 px-5 py-3">
    {{-- header --}}
    <flux:heading class="font-black! text-lg!" level="2">About</flux:heading>
    {{-- content --}}
    <flux:text class="text-md text-accent-content text-left">{{ $about ?? '-' }}</flux:text>
</div>