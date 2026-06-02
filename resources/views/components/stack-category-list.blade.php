@props([
    'stackName',
    'stack'
])

<div class="space-y-3">
    {{-- header --}}
    <flux:heading class="font-black! text-md!" level="2">{{ $stackName }}</flux:heading>
    {{-- content --}}
    <div class="flex flex-wrap gap-2 pl-1">
        @foreach ($stack as $tech)
            <flux:card size="sm" class="text-sm py-1">{{ $tech }}</flux:card>
        @endforeach
    </div>
</div>