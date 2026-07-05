@props(['certificates'])

<div class="space-y-1.5 rounded-md border border-accent/5 px-5 py-3">
    {{-- header --}}
    <div class="flex justify-between items-center">
        <flux:heading class="font-black! text-lg!" level="2">Certificates</flux:heading>
        <div class="flex gap-1 items-center">
            <flux:link wire:navigate href="{{ route('certificates') }}" variant="subtle" class="text-[11px]">View All </flux:link>
            <flux:icon.chevron-right class="size-3 text-accent-content"/>
        </div>
    </div>
    {{-- content --}}
    <div class="space-y-3">
        @forelse ($certificates as $index => $certificate)
            {{-- card --}}
            <flux:card size="sm" class="text-sm py-2 px-3 hover:bg-accent/5">
                <flux:modal.trigger name="{{ 'view-cert' . $index  }}">
                    {{-- cert name --}}
                    <flux:heading level="3" class="text-sm! font-semibold!">{{ $certificate->name }}</flux:heading>
                    {{-- company --}}
                    <flux:text class="text-xs">{{ $certificate->platform }}</flux:text>
                </flux:modal.trigger>
            </flux:card>
            {{-- modal --}}
            <flux:modal variant="bare" name="{{ 'view-cert' . $index  }}" class="w-full sm:p-4 sm:max-w-4xl" :closable="false">
                <img src="{{ $certificate->image_url }}" alt="Certificate" class="w-full h-auto rounded-sm">
            </flux:modal>
        @empty
        <flux:text>-</flux:text>
        @endforelse
    </div>
</div>