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
        <flux:heading class="font-black! text-xl!" level="2">Tech Stack</flux:heading>
    </div>

    {{-- main stack --}}
    <flux:card>
        <x-stack-category-list stackName="Main" :stack="config('app.tech_stack_main')"/>
    </flux:card>
    {{-- other stack --}}
    <flux:card>
        <x-stack-category-list stackName="Others" :stack="config('app.tech_stack_others')"/>
    </flux:card>
    {{-- tools --}}
    <flux:card>
        <x-stack-category-list stackName="Tools" :stack="config('app.tech_stack_tools')"/>
    </flux:card>
</div>