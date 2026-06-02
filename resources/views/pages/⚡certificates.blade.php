<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="space-y-4">
    {{-- header --}}
    <div class="flex gap-4 items-center">
        {{-- back button --}}
        <a wire:navigate href="{{ route('main') }}" class="flex w-fit rounded-md border border-accent/5 px-3 py-1 hover:bg-accent hover:text-accent-foreground shadow-xs">
            <flux:icon.arrow-long-left class="size-7"/>
        </a>
        {{-- header text --}}
        <flux:heading class="font-black! text-xl!" level="2">Certificates</flux:heading>
    </div>

    {{-- certificate list --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        @foreach (config('app.certificates') as $index => $certificate)
            <div>
                {{-- card --}}
                <flux:card size="sm" class="text-sm py-2 px-3 hover:bg-accent/5">
                    <flux:modal.trigger name="{{ 'view-cert' . $index  }}">
                        {{-- cert name --}}
                        <flux:heading level="3" class="text-sm! font-semibold!">{{ $certificate[0] }}</flux:heading>
                        {{-- company --}}
                        <flux:text class="text-xs">{{ $certificate[1] }}</flux:text>
                    </flux:modal.trigger>
                </flux:card>
                {{-- modal --}}
                <flux:modal variant="bare" name="{{ 'view-cert' . $index  }}" class="w-full sm:p-4 sm:max-w-4xl" :closable="false">
                    <img src="{{ asset("$certificate[2]") }}" alt="Certificate" class="w-full h-auto rounded-sm">
                </flux:modal>
            </div>
        @endforeach
    </div>
</div>