<div class="space-y-1.5 rounded-md border border-accent/5 px-5 py-3">
    {{-- header --}}
    <div class="flex justify-between items-center">
        <flux:heading class="font-black! text-lg!" level="2">Tech Stack</flux:heading>
        <div class="flex gap-1 items-center">
            <flux:link wire:navigate href="{{ route('tech-stack') }}" variant="subtle" class="text-[11px]">View All </flux:link>
            <flux:icon.chevron-right class="size-3 text-accent-content"/>
        </div>
    </div>
    {{-- content --}}
    <div class="space-y-4">
        {{-- main stack --}}
        <div class="flex flex-wrap gap-2">
            @foreach (config('app.tech_stack_main') as $tech)
                <flux:card size="sm" class="text-sm py-0.5 px-3.5">{{ $tech }}</flux:card>
            @endforeach
        </div>
    </div>
</div>